{{-- Mobile Menu --}}

<div data-open="false" id="mobile-menu"
    class="invisible absolute left-0 top-0 z-20 mt-28 w-full bg-white pb-16 pt-12 text-black xl:hidden">

    <div class="side-padding flex h-full w-full flex-col items-center justify-center gap-6">

        <div class="flex flex-col items-center gap-6 whitespace-nowrap border-b pb-6">
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

            {{-- CTA --}}
            <a href="#contact" class="block rounded-sm bg-primary p-4 text-center text-white md:hidden">Get in Touch</a>

        </div>

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
