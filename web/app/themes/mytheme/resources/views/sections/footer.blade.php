<footer
    class="content-info side-padding flex w-full flex-col gap-8 bg-[#737373] py-8 text-center text-white md:flex-row md:items-center md:justify-between md:py-6">


    {{-- Footer Navigation --}}
    <div class="footer-menu flex justify-center md:justify-start">
        @if (has_nav_menu('footer_navigation'))
            {!! wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'nav', 'echo' => false]) !!}
        @endif
    </div>

    {{-- Site Author Logo --}}
    <div
        class="flex justify-center gap-2 pb-4 text-center font-space-grotesk text-xs uppercase md:justify-start md:pb-0">
        <p>
            {{ __('Powered by', 'alogo-theme') }}
        </p>
        
        <a href="https://9hdigital.com/" class="h-full w-12">
            <img class="h-full w-full object-contain" src="{{ asset('images/9h.png') }}"
                alt="Website Designer and Author Logo">
        </a>
    </div>


</footer>
