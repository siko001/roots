@extends('layouts.app')
@section('content')
    {{-- Show the Inner Product Page --}}
    @if ($product)
        <section>
            {{-- Component Product Info --}}
            <x-product-info :product="$product" />
        </section>

        <section>
            {{-- Component Additional Info --}}
            <x-product-additional-info :product="$product" />
        </section>

        <section>
            {{-- Component Related Products  --}}
            <x-product-related :product="$related_products" />
        </section>
    @else
        <p>
            {{ __('Sorry, this product could not be found.', 'alogo-theme') }}
        </p>
    @endif
@endsection
