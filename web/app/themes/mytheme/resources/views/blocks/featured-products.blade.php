<div class="{{ $block->classes }} side-padding py-24" style="{{ $block->inlineStyle }}">
    {{-- container wrapper --}}
    <div class="featured-products flex flex-col gap-16 overflow-hidden">
        {{-- Title/Slider Nav --}}
        <div class="flex items-center justify-between gap-8">

            {{-- prev --}}
            <div class="featured-products-prev slow-transition cursor-pointer text-[#3F3F3F] hover:text-primary">
                {{-- Change svgs to blade directive --}}
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
            </div>

            {{-- Title --}}
            <h2 class="text-black heading2">@field('section_title')</h2>

            {{-- Next --}}
            <div class="featured-products-next slow-transition cursor-pointer text-[#3F3F3F] hover:text-primary">
                {{-- Change svgs to blade directive --}}
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </div>

        </div>

        {{-- Mandatory wrapper --}}
        <div class="swiper-wrapper">
            @foreach ($block->with()['products'] as $product)
                {{-- Product slide (turn product into template) --}}
                <div class="product-item swiper-slide bg-off-white-1000">
                    {{-- Product Image --}}
                    <div class="w-full bg-white">
                        <img class="image" src="{{ esc_url($product['image']) }}"
                            alt="{{ esc_attr($product['name']) }}" class="product-image" />
                    </div>

                    {{-- Product Info  --}}
                    <div class="flex flex-col p-8">

                        <div class="flex flex-col gap-4 border-b pb-6">
                            {{-- Name --}}
                            <h3 class="text-black heading4">
                                {{-- Remove the copy from the name --}}
                                {{ esc_html(str_replace('(Copy)', '', $product['name'])) }}
                            </h3>
                            {{-- Description --}}
                            <p class="product-description text-body body-text">
                                {{ html_entity_decode(wp_strip_all_tags($product['description'])) }}
                            </p>
                        </div>

                        <div class="flex flex-col items-start gap-4 pt-6 font-barlow font-medium">
                            {{-- Price --}}
                            <h6 class="text-lg text-black">
                                {!! $product['price_html'] !!}
                            </h6>
                            {{-- Learn More Btn turn button into compontent (user hero and products) --}}
                            <a href="">
                                <button class="rounded-sm bg-primary p-4 uppercase text-white">
                                    Learn more
                                </button>
                            </a>
                        </div>

                    </div>

                </div>
            @endforeach
        </div>

    </div>

</div>
