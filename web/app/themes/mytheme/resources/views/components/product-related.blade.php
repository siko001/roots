<div class="side-padding flex flex-col gap-12 py-32">

    {{-- Section Title --}}
    <div class="flex items-center justify-between gap-6 md:gap-12">

        {{-- Title --}}
        <h2 class="heading2">
            {{ __('Similar products you might like', 'alogo-theme') }}
        </h2>

        {{-- Slider Nav --}}
        <div class="flex justify-between gap-8 md:gap-12">
            <div class="related-products-prev">Prev</div>
            <div class="related-products-next">Next</div>
        </div>

    </div>



    {{-- related products  --}}
    <div class="w-full overflow-hidden">
        <div id="related-product-slider">
            <div class="swiper-wrapper">
                @foreach ($product as $card)
                    <div class="swiper-slide">
                        <x-product-card :product="$card" />
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- All Products Button --}}
    <div></div>
</div>
