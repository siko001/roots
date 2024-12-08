<div class="product-info side-padding grid gap-8 gap-y-8 pb-12 pt-16 md:grid-cols-2 md:gap-x-16 xl:gap-x-24">

    {{-- Product Image  --}}
    <div class="order-1 flex w-full flex-col gap-8">
        @include('partials.product.image', ['product' => $product])
    </div>

    {{-- Product Info --}}
    <div class="order-3 flex flex-col gap-8 pt-4 md:order-2">
        
        {{-- name --}}
        <h1 class="heading1">
            @include('partials.product.name', ['product' => $product])
        </h1>

        {{-- price --}}
        <h3>
            @include('partials.product.price', ['product' => $product])
        </h3>

        {{-- description --}}
        <div class="product-description w-full body-text">
            @include('partials.product.description', ['product' => $product])
        </div>

        {{-- CTA --}}
        @include('partials.product.cta', [
            'product' => $product,
            'link' => '/learn-more/product-',
            'text' => 'Learn More',
        ])

        {{-- Sharable link --}}
        <div class="border-t pt-8">
            {{-- sharbale links --}}
            @include('partials.product.share', ['product' => $product])
        </div>

    </div>

    {{-- Product Gallery --}}
    <div class="order-2 col-span-1 md:order-3">
        @include('partials.product.gallery', ['product' => $product])
    </div>

</div>
