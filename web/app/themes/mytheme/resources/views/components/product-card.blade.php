<div class="product-item swiper-slide bg-off-white-1000">

    {{-- Product Image --}}
    <div class="w-full bg-white">
        @include('partials.product.image', ['product' => $product])
    </div>

    {{-- Product Info  --}}
    <div class="flex flex-col p-8">
        <div class="flex flex-col gap-4 border-b pb-6">

            {{-- Name --}}
            <h3 class="text-black heading4">
                @include('partials.product.name', ['product' => $product])
            </h3>

            {{-- Description --}}
            <div class="text-body body-text">
                @include('partials.product.description', ['product' => $product])
            </div>
        </div>

        <div class="flex flex-col items-start gap-4 pt-6 font-barlow font-medium">
            {{-- Price --}}
            <h6>
                @include('partials.product.price', ['product' => $product])
            </h6>

            @include('partials.product.cta', [
                'product' => $product,
                'link' => '/products/product-',
                'text' => 'Learn More',
            ])
        </div>

    </div>

</div>
