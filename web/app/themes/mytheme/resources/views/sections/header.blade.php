<header class="banner">
  
  <a class="brand" href="{{ home_url('/') }}">
    {!! $siteName !!}
  </a>
  @php
  $svg_id = 28;
  $svg_file = get_attached_file($svg_id);
  $svg_content = file_get_contents($svg_file);
  @endphp
{{-- {!! $svg_content !!} --}}

  @if (has_nav_menu('primary_navigation'))
    <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
      {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'echo' => false]) !!}
    </nav>
  @endif
</header>
