<div class="side-padding relative flex items-center justify-between py-8">
    {{-- Site Logo --}}
    <a class="brand h-12 w-28" href="{{ home_url('/') }}">
        @php $header_image = get_header_image()  @endphp
        @if ($header_image)
            <img class="h-full w-full object-contain" src="{{ esc_url($header_image) }}" alt="{{ get_bloginfo('name') }}">
        @endif
    </a>


    {{-- Primary Nav --}}
    @if (has_nav_menu('primary_navigation'))
        <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
            {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'primary-nav', 'echo' => false]) !!}
        </nav>
    @endif

    {{-- Call To action  / Mobile Menu --}}
    <div class="flex items-center justify-between gap-32">

        {{-- CTA --}}
        @include('components.cta-btn', [
            'link' => '#contact',
            'text' => 'Get in Touch',
            'classes' => 'hidden md:block btn text-center',
            'openNewTab' => '_self',
        ])


        {{-- Burger Menu --}}
        <div id="burger-menu" class="flex w-16 flex-col items-end gap-2 hover:cursor-pointer xl:hidden">
            <span class="h-1 w-full bg-primary"></span>
            <span class="h-1 w-[65%] bg-primary"></span>
            <span class="h-1 w-[20%] bg-primary"></span>
        </div>

        {{-- Close Button --}}
        <div id="close-mobile-menu" class="relative top-1 hidden h-10 w-6 flex-col gap-4">
            <span class="min-h-1 min-w-6 relative top-2 rotate-45 bg-primary"></span>
            <span class="min-h-1 min-w-6 relative bottom-3 -rotate-[43deg] bg-primary"></span>
        </div>
    </div>
</div>
