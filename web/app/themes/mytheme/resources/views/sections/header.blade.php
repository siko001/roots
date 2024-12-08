<header class="banner relative z-[50] flex flex-col">
    {{-- Social Banner --}}
    <nav class="social-banner side-padding hidden w-full justify-end bg-[#737373] text-white md:flex">
        <div class="flex items-center gap-2 py-2">
            <p class="font-inter text-xs"> {{ __('Get in Touch', 'alogo-theme') }}</p>
            @if (has_nav_menu('social_navigation'))
                <nav class="social-nav" aria-label="{{ wp_get_nav_menu_name('social_navigation') }}">
                    {!! wp_nav_menu([
                        'theme_location' => 'social_navigation',
                        'menu_class' => 'social-nav',
                        'echo' => false,
                        'walker' => new \App\Walkers\SocialMenuWalker(),
                    ]) !!}
                </nav>
            @endif
        </div>
    </nav>
    <div class="side-padding relative flex items-center justify-between py-8">
        {{-- Site Logo --}}
        <a class="brand h-12 w-28" href="{{ home_url('/') }}">
            @php $header_image = get_header_image()  @endphp
            @if ($header_image)
                <img class="h-full w-full object-contain" src="{{ esc_url($header_image) }}"
                    alt="{{ get_bloginfo('name') }}">
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
            <a href="#contact" class="hidden rounded-sm bg-primary p-4 text-white md:block">Get in Touch</a>

            {{-- Burger Menu --}}
            <div id="burger-menu" class="flex w-16 flex-col items-end gap-2 hover:cursor-pointer xl:hidden">
                <span class="h-1 w-full bg-primary"></span>
                <span class="h-1 w-[65%] bg-primary"></span>
                <span class="h-1 w-[20%] bg-primary"></span>
            </div>

            <div id="close-mobile-menu" class="relative top-1 hidden h-10 w-6 flex-col gap-4">
                <span class="min-h-1 min-w-6 relative top-2 rotate-45 bg-primary"></span>
                <span class="min-h-1 min-w-6 relative bottom-3 -rotate-[43deg] bg-primary"></span>
            </div>

        </div>
    </div>
</header>


{{-- Mobile Menu --}}
<div data-open="false" id="mobile-menu"
    class="invisible absolute left-0 top-0 z-20 mt-36 w-full bg-white pb-16 pt-12 text-black xl:hidden">
    <div class="side-padding flex h-full w-full flex-col items-center justify-center gap-6">
        <div class="flex flex-col items-center gap-6 border-b pb-6">
            {{-- Navigation Menu Mobile --}}
            @if (has_nav_menu('primary_navigation'))
                <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
                    {!! wp_nav_menu([
                        'theme_location' => 'primary_navigation',
                        'menu_class' => 'primary-nav-mobile',
                        'echo' => false,
                    ]) !!}
                </nav>
            @endif
            <a href="#contact" class="block rounded-sm bg-primary p-4 text-center text-white md:hidden">Get in Touch</a>
        </div>
        {{-- Seperate nav bars create gsap animation .start inner product page code clean up. seperation of elements. bit bucket.. db extract. documentation. read me file --}}

        {{-- Social Menu Mobiles --}}
        @if (has_nav_menu('social_navigation'))
            <nav class="social-nav pt-6" aria-label="{{ wp_get_nav_menu_name('social_navigation') }}">
                {!! wp_nav_menu([
                    'theme_location' => 'social_navigation',
                    'menu_class' => 'social-nav-mobile',
                    'echo' => false,
                    'walker' => new \App\Walkers\SocialMenuWalker(),
                ]) !!}
            </nav>
        @endif
    </div>
</div>
