<div class="side-padding flex flex-col gap-12 bg-[#F6F6F6] py-24">
    <h2 class="heading2">
        {{ __('Additional Info', 'alogo-theme') }}
    </h2>

    <div id="overview-accordion-header" class="flex gap-4">
        {{-- Description --}}
        @if (isset($product['description']) && $product['description'])
            <p class="accordion-active" data-accordion-head>
                {{ __('Product Overview', 'alogo-theme') }}
            </p>
            {{-- Show  separators is other headers are present --}}
            @if (
                (isset($product['key_features']) && $product['key_features']) ||
                    (isset($product['specifications']) && $product['specifications']))
                <span class="h-full w-1 bg-[#9F9F9F]"></span>
            @endif
        @endif

        {{-- Key Features --}}
        @if (isset($product['key_features']) && $product['key_features'])
            <p data-accordion-head>
                {{ __('Key Features', 'alogo-theme') }}
            </p>
            {{-- Show  separators is specifications header is present --}}
            @if (isset($product['specifications']) && $product['specifications'])
                <span class="h-full w-1 bg-[#9F9F9F]"></span>
            @endif
        @endif

        {{-- Specifications --}}
        @if (isset($product['specifications']) && $product['specifications'])
            <p data-accordion-head>
                {{ __('Specifications', 'alogo-theme') }}
            </p>
        @endif
    </div>

    {{-- Accordion Body --}}
    <div id="overview-accordion-body" aria-hidden="false">
        {{-- Description --}}
        @if (isset($product['description']) && $product['description'])
            <div class="overview-description body-text">
                {!! $product['description'] !!}
            </div>
        @endif

        {{-- Key Features --}}
        @if (isset($product['key_features']) && $product['key_features'])
            <ul class="hidden list-inside list-disc body-text">
                @foreach ($product['key_features'] as $feature)
                    <li>
                        {{ $feature }}
                    </li>
                @endforeach
            </ul>

        @endif

        {{-- Specifications --}}
        @if (isset($product['specifications']) && $product['specifications'])
            @foreach ($product['specifications'] as $spec)
                <div class="hidden">
                    <p>
                        {{ $spec['label'] }}
                    </p>
                    <p>
                        {{ $spec['value'] }}
                    </p>
                </div>
            @endforeach
    </div>
    @endif
</div>
