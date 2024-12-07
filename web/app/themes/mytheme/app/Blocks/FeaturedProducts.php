<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;
use WP_Error;

class FeaturedProducts extends Block {
    public $name = 'Featured Products';
    public $description = 'Featured WooCommerce Products';
    public $category = 'widgets';
    public $icon = 'editor-ul';
    public $keywords = ['featured', 'products', 'woocommerce'];
    public $mode = 'preview';

    /**
     * Data to be passed to the block before rendering.
     */
    public function with(): array {
        return [
            'products' => $this->fetch_products(),
        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array {
        $fields = Builder::make('featured_products');
        $fields->addText('section_title', [
            'label' => 'Section Title',
            'default_value' => 'Featured Products',
        ]);
        return $fields->build();
    }

    /**
     * Fetch products from WooCommerce API.
     *
     * @return array
     */
    // turn into Acf Option Page
    public function fetch_products() {
        $api_url = 'https://staging-supermarket.kinsta.cloud/wp-json/wc/v3/products';
        $consumer_key = 'ck_0e35fd460345dc5a36401828b3431fb89c890e25';
        $consumer_secret = 'cs_5879d038c1d69d29089aac49aa70575b27731620';

        $response = wp_remote_get(
            add_query_arg(
                [
                    'per_page' => 9,
                    'order' => 'desc',
                    'orderby' => 'date',
                ],
                $api_url
            ),
            [
                'headers' => [
                    'Authorization' => 'Basic ' . base64_encode($consumer_key . ':' . $consumer_secret),
                ]
            ]
        );

        if (is_wp_error($response)) {
            return []; // Fallback if API request fails
        }

        $products = json_decode(wp_remote_retrieve_body($response), true);

        if (!is_array($products)) {
            return []; // Fallback if API response is not valid
        }

        // Process each product and handle missing data
        $featured_products = [];
        foreach ($products as $product) {
            // var_dump($product);
            $featured_products[] = [
                'id' => $product['id'] ?? null,
                'name' => $product['name'] ?? 'No name available',
                // 'price' => $product['price'] ?? 'No price available',
                // 'sale_price' => $product['sale_price'] ?? 'No sale price available',
                // 'regular_price' => $product['regular_price'] ?? 'No regular price available',
                'price_html' => $product['price_html'] ?? 'No price available',
                'image' => !empty($product['images'][0]['src']) ? $product['images'][0]['src'] : 'fallback-image.jpg',
                'description' => $product['description'] ?? 'No description available',
                'permalink' => $product['permalink'] ?? '#',
            ];
        }

        return $featured_products;
    }

    /**
     * Assets enqueued when rendering the block.
     */
    public function assets(array $block): void {
        // Optionally add CSS/JS if needed
    }
}
