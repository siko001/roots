<div class="{{ $block->classes }} side-padding py-24" style="{{ $block->inlineStyle }}">

    {{-- container wrapper --}}
    <div class="featured-products flex flex-col gap-16 overflow-hidden">

        {{-- Title/Slider Nav --}}
        <div class="flex items-center justify-between gap-8">
            {{-- prev --}}
            @include('components.slider.prev', ['classes' => 'featured-products-prev'])

            {{-- Title --}}
            <h2 class="text-black heading2">
                @field('section_title')
            </h2>

            {{-- Next  --}}
            @include('components.slider.next', ['classes' => 'featured-products-next'])
        </div>


        {{-- Mandatory wrapper --}}
        <div class="swiper-wrapper">
            @foreach ($block->with()['products'] as $product)
                {{-- Product slide (turn product into template) --}}
                <div class="product-item swiper-slide bg-off-white-1000">
                    <x-product-card :product="$product" />
                </div>
            @endforeach
        </div>

    </div>

</div>
