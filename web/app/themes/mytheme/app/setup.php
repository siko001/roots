<?php

/**
 * Theme setup.
 */

namespace App;

use function Roots\bundle;
use enshrined\svgSanitize\Sanitizer;

/**
 * Register the theme assets.
 *
 * @return void
 */
add_action('wp_enqueue_scripts', function () {
    bundle('app')->enqueue();
}, 100);

/** 
 * 
 * Accept SVG files in the media uploader
 */
add_filter('upload_mimes', function ($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
});

/**
 * Sanitize SVG files during upload.
 * Optional but recommended for security.
 */
add_filter('wp_check_filetype_and_ext', function ($data, $file, $filename, $mimes) {
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if ($ext === 'svg') {
        $data['ext'] = 'svg';
        $data['type'] = 'image/svg+xml';
    }
    return $data;
}, 10, 4);


// Use the SVG sanitizer to sanitize the uploaded SVG files
add_filter('wp_handle_upload_prefilter', function ($file) {
    if ($file['type'] === 'image/svg+xml') {
        // Instantiate the sanitizer
        $sanitizer = new Sanitizer();

        // Read the raw SVG content
        $svgContent = file_get_contents($file['tmp_name']);

        // Sanitize the SVG
        $cleanSVG = $sanitizer->sanitize($svgContent);

        // Replace the content of the uploaded file with the sanitized SVG
        if ($cleanSVG) {
            file_put_contents($file['tmp_name'], $cleanSVG);
        } else {
            // Handle errors (optional)
            $file['error'] = 'The uploaded SVG file could not be sanitized.';
        }
    }

    return $file;
});




/**
 * Register the theme assets with the block editor.
 *
 * @return void
 */
add_action('enqueue_block_editor_assets', function () {
    bundle('editor')->enqueue();
}, 100);

/**
 * Register the initial theme setup.
 *
 * @return void
 */
add_action('after_setup_theme', function () {
    /**
     * Disable full-site editing support.
     *
     * @link https://wptavern.com/gutenberg-10-5-embeds-pdfs-adds-verse-block-color-options-and-introduces-new-patterns
     */
    remove_theme_support('block-templates');

    /**
     * Register the navigation menus.
     *
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage'),
        'social_navigation' => __('Socials Navigation', 'sage'),
        'footer_navigation' => __('Footer Navigation', 'sage'),
    ]);

    /**
     * Disable the default block patterns.
     *
     * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-the-default-block-patterns
     */
    remove_theme_support('core-block-patterns');

    /**
     * Enable plugins to manage the document title.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Enable post thumbnail support.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable responsive embed support.
     *
     * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/#responsive-embedded-content
     */
    add_theme_support('responsive-embeds');

    add_theme_support('custom-header');

    /**
     * Enable HTML5 markup support.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
        'script',
        'style',
    ]);

    /**
     * Enable selective refresh for widgets in customizer.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#customize-selective-refresh-widgets
     */
    add_theme_support('customize-selective-refresh-widgets');
}, 20);

/**
 * Register the theme sidebars.
 *
 * @return void
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ];

    register_sidebar([
        'name' => __('Primary', 'sage'),
        'id' => 'sidebar-primary',
    ] + $config);

    register_sidebar([
        'name' => __('Footer', 'sage'),
        'id' => 'sidebar-footer',
    ] + $config);
});




// Define rewrite rule for 'products' URL structure
add_action('init', function () {
    add_rewrite_rule('^products/product-([0-9]+)/?', 'index.php?product_id=$matches[1]', 'top');
});

// Register the 'product_id' query variable so WordPress recognizes it
add_filter('query_vars', function ($vars) {
    $vars[] = 'product_id';
    return $vars;
});


add_filter('template_include', function ($template) {
    // Check if the 'product_id' query variable is set
    $product_id = get_query_var('product_id');

    if ($product_id) {
        // If 'product_id' is set, load a custom template for the product page
        return locate_template('resources/views/single-product.blade.php');
    }

    return $template; // Otherwise, return the default template
});
