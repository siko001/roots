@php $images = $product['images'] @endphp
<div class="product-gallery flex gap-4">
    @foreach ($images as $image)
        <div class="gallery-item h-20 w-20">
            <img class="image" src="{{ $image['src'] }}" alt="{{ $image['alt'] }}">
        </div>
    @endforeach
</div>
