{{-- Product Description --}}
<span>
    @php

        // Shorten the Description (for featured, related products and the product info)
        $description = wp_strip_all_tags($product['description']);
        $description = html_entity_decode($description);

        if (strlen($description) > 200) {
            $shortened = substr($description, 0, 200);
            $lastSpace = strrpos($shortened, ' ');
            $description = substr($shortened, 0, $lastSpace) . '...';
        }

    @endphp

    {{ $description }}
</span>
