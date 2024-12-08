@props(['name'])
@php
    $path = resource_path("svgs/{$name}.svg");
@endphp

@if (file_exists($path))
    {!! file_get_contents($path) !!}
@else
    <span>
        {{ ucfirst($name) }}
    </span>
@endif
