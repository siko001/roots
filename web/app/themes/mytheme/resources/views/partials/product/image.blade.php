{{-- Product Image --}}

@if (isset($product['images']) && !empty($product['images']))
    {{-- Use product images (inner product page) --}}
    @php
        $src = $product['images'][0]['src'];
        $alt = $product['images'][0]['alt'];
        $class = 'w-full h-full object-contain';
    @endphp
@else
    {{-- Fallback to product image (for featured product) --}}
    @php
        $src = $product['image'];
        $alt = $product['name'];
        $class = 'image';
    @endphp
@endif

<img class="{{ $class }}" src="{{ $src }}" alt="{{ $alt }}">
