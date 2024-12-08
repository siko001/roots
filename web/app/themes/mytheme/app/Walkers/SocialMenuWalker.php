<?php

namespace App\Walkers;

use Walker_Nav_Menu;

class SocialMenuWalker extends Walker_Nav_Menu {
    /**
     * Starts the element output.
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item   Menu item data object.
     * @param int    $depth  Depth of menu item. Used for padding.
     * @param array  $args   An array of arguments. @see wp_nav_menu().
     * @param int    $id     Current item ID.
     */
    public function start_el(&$output, $item, $depth = 0, $args = [], $id = 0) {
        $classes = empty($item->classes) ? [] : (array) $item->classes;
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' .  strtolower($item->title) . ' ' . esc_attr($class_names) . '"' : '';

        $output .= '<li' . $class_names . '>';

        // Get the ACF SVG fields
        $desktop_svg_icon = get_field('image_field', $item);
        $mobile_svg_icon = get_field('mobile_image_field', $item);

        // Generate the link with SVG
        $attributes = ' class="social-menu-link"';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';

        $item_output = '<a' . $attributes . '>';

        // Add desktop SVG if it exists
        if ($desktop_svg_icon && $desktop_svg_icon['mime_type'] === 'image/svg+xml') {
            $item_output .= '<img src="' . esc_url($desktop_svg_icon['url']) . '" alt="' . esc_attr($item->title) . '" class="social-icon desktop-icon" />';
        }

        // Add mobile SVG if it exists
        if ($mobile_svg_icon && $mobile_svg_icon['mime_type'] === 'image/svg+xml') {
            $item_output .= '<img src="' . esc_url($mobile_svg_icon['url']) . '" alt="' . esc_attr($item->title) . '" class="social-icon mobile-icon" />';
        }

        $item_output .= $args->link_before . $args->link_after;
        $item_output .= '</a>';

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}
