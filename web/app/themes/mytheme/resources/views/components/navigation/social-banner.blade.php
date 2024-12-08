{{-- Top Socials Banner --}}
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
