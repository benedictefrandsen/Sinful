<?php
// Kør funktionen, når WordPress indlæser CSS og JavaScript
add_action( 'wp_enqueue_scripts',
            'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
  $parenthandle = 'parent-style';
  $theme = wp_get_theme();

  // 1. Først mother themets style.css
  wp_enqueue_style( $parenthandle,
    get_template_directory_uri() . '/style.css',
    array(),
    $theme->parent()->get( 'Version' )
  );

  // 2. Derefter child themets style.css
  wp_enqueue_style( 'child-style',
    get_stylesheet_uri(),
    array( $parenthandle ),
    $theme->get( 'Version' )
  );
}
add_action( 'wp_enqueue_scripts', function () {
    wp_enqueue_style(
        'plus-jakarta-sans',
        'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap',
        array(),
        null
    );
} );