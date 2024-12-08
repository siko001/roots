<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class ProductComposer extends Composer {
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'single-product',
    ];

    /**
     * Data to be passed to the view.
     *
     * @return array
     */
    public function with() {
        $product = $this->getProductDetails();
        return [
            'product' => $product,
            'related_products' => $this->getRelatedProducts($product),
        ];
    }

    // Fetch the product details from the API for the given product ID
    private function getProductDetails() {
        $product_id = get_query_var('product_id');
        if (!$product_id) {
            return ['error' => 'No product ID provided.'];
        }


        $api_url = "https://staging-supermarket.kinsta.cloud/wp-json/wc/v3/products/{$product_id}";
        $consumer_key = 'ck_0e35fd460345dc5a36401828b3431fb89c890e25';
        $consumer_secret = 'cs_5879d038c1d69d29089aac49aa70575b27731620';

        $response = wp_remote_get(
            $api_url,
            [
                'headers' => [
                    'Authorization' => 'Basic ' . base64_encode($consumer_key . ':' . $consumer_secret),
                ],
            ]
        );

        if (is_wp_error($response)) {
            return ['error' => 'Unable to fetch product details.'];
        }
        return json_decode(wp_remote_retrieve_body($response), true);
    }




    /**
     * Fetch related products based on related IDs.
     *
     * @return array
     */
    private function getRelatedProducts() {
        $product = $this->getProductDetails(); // Get product details
        if (isset($product['related_ids']) && !empty($product['related_ids'])) {
            return $this->fetchRelatedProductData($product['related_ids']);
        }
        return [];
    }

    /**
     * Fetch related products from API using related IDs.
     *
     * @param array $related_ids
     * @return array
     */
    private function fetchRelatedProductData($related_ids) {
        $api_url = 'https://staging-supermarket.kinsta.cloud/wp-json/wc/v3/products';
        $consumer_key = 'ck_0e35fd460345dc5a36401828b3431fb89c890e25';
        $consumer_secret = 'cs_5879d038c1d69d29089aac49aa70575b27731620';

        // Build the API request with the related IDs
        $response = wp_remote_get(
            add_query_arg(
                [
                    'include' => implode(',', $related_ids), // Related product IDs
                    'per_page' => count($related_ids),
                ],
                $api_url
            ),
            [
                'headers' => [
                    'Authorization' => 'Basic ' . base64_encode($consumer_key . ':' . $consumer_secret),
                ],
            ]
        );

        if (is_wp_error($response)) {
            return []; // Fallback if the API request fails
        }

        // Decode the JSON response
        $products = json_decode(wp_remote_retrieve_body($response), true);
        if (!is_array($products)) {
            return []; // Fallback if API response is not valid
        }

        return $products;
    }
}
