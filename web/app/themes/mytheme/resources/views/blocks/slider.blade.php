<div class="{{ $block->classes }} overflow-hidden" style="{{ $block->inlineStyle }}">
    @if (!empty($slides))
        {{-- Slider Container --}}
        <div class="swiper-container relative flex flex-col justify-between pb-12">
            {{-- Mandatory wrapper --}}
            <div class="swiper-wrapper">
                @foreach ($slides as $slide)
                    {{-- Slide --}}
                    <div class="swiper-slide relative">
                        
                        <div
                            class="side-padding relative flex max-h-screen min-h-screen items-center sm:max-h-[45.75rem] sm:min-h-[45.75rem]">
                            @if ($slide['gradient'])
                                {{-- Overlay Gradient --}}
                                @php
                                    $rgb = str_replace(['rgb(', ')'], '', $slide['gradient_color']);
                                @endphp
                                <div style="background: linear-gradient(to right, rgba({{ $rgb }}, 0.8), rgba({{ $rgb }}, 0));"
                                    class="absolute inset-0 z-20">
                                </div>
                            @endif

                            {{-- Image --}}
                            @if (is_array($slide['image']))
                                <img class="absolute inset-0 z-10 image" src="{{ $slide['image']['url'] }}"
                                    alt="{{ $slide['image']['alt'] ?? 'Image' }}">
                            @else
                                <img class="absolute inset-0 z-10 image" src="https://via.placeholder.com/1400"
                                    alt="Placeholder Image">
                            @endif

                            <div
                                class="relative z-30 flex flex-col items-start gap-4 pl-8 font-barlow text-white md:w-[100ch]">
                                {{-- Heading --}}
                                <p class="capitalize heading1">
                                    {{ $slide['heading'] }}
                                </p>
                                {{-- Subheading --}}
                                <p class="max-w-[25ch] heading3">
                                    {{ $slide['subheading'] }}
                                </p>

                                @if ($slide['link_field'])
                                    {{-- CTA Button --}}
                                    <a target="{{ $slide['link_field']['target'] }}"
                                        href="{{ $slide['link_field']['url'] }}"
                                        class="mt-4 bg-primary px-4 py-4 uppercase text-white">
                                        {{ $slide['link_field']['title'] }}
                                    </a>
                                @endif
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
            {{-- Navigation --}}
            <div class="swiper-button-next pr-4 md:pr-12 xl:pr-20"></div>
            <div class="swiper-button-prev pl-4 md:pl-12 xl:pl-20"></div>

            {{-- pagination --}}
            <div class="swiper-pagination pl-8"></div>

        </div>
    @else
        <p>{{ $block->preview ? 'Add an item...' : 'No items found!' }}</p>
    @endif
</div>
