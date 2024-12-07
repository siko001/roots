<div class="{{ $block->classes }}  overflow-hidden" style="{{ $block->inlineStyle }}">
  @if (!empty($slides))
      {{-- Slider Container --}}
      <div class="swiper-container flex flex-col justify-between pb-12 relative" >
          {{-- Mandatory wrapper --}}
          <div class="swiper-wrapper">
              @foreach ($slides as $slide)
     
                  {{-- Slide --}}
                  <div class="swiper-slide relative">
                  
                      <div class="side-padding relative items-center flex max-h-screen min-h-screen  sm:max-h-[45.75rem] sm:min-h-[45.75rem]">

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
                              <img class="image absolute inset-0 z-10" src="{{ $slide['image']['url'] }}"
                                  alt="{{ $slide['image']['alt'] ?? 'Image' }}">
                          @else
                              <img class="image absolute inset-0 z-10" src="https://via.placeholder.com/1400"
                                  alt="Placeholder Image">
                          @endif

                          <div class="relative z-30 flex flex-col gap-4 text-white font-barlow  md:w-[100ch] pl-8 items-start">
                              {{-- Heading --}}
                              <p class="heading1 capitalize">{{ $slide['heading'] }}</p>
                              {{-- Subheading --}}
                              <p class="heading3 max-w-[25ch]">{{ $slide['subheading'] }}</p>

                              @if ($slide['link_field'])
                              {{-- CTA Button --}}
                              <a target="{{$slide["link_field"]['target']}}" href="{{$slide['link_field']['url']}}" class="bg-primary px-4 py-4 text-white uppercase mt-4">
                                      {{ $slide['link_field']['title'] }}
                              </a>
                              @endif
                          </div>

                      </div>
                  </div>
              @endforeach
          </div>
          {{-- Navigation --}}
          <div class="swiper-button-next pr-4 md:pr-12 xl:pr-20 "></div>
          <div class="swiper-button-prev pl-4 md:pl-12 xl:pl-20 "></div>

          {{-- pagination --}}
          <div class="swiper-pagination pl-8">Pa</div>

      </div>
  @else
      <p>{{ $block->preview ? 'Add an item...' : 'No items found!' }}</p>
  @endif
</div>
