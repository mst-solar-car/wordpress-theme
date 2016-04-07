<?php
require_once ( get_template_directory() . '/includes/mstsolarcar.php' );


/**
 * Theme Support
 */
add_theme_support( 'title-tag' );
add_theme_support( 'custom-header' );
add_theme_support( 'site-logo', 500 );
add_theme_support( 'html5' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );

add_filter( 'menu_image_default_sizes', function( $sizes ) {
  unset( $sizes['menu-36x36'] );
  $sizes['menu-50x50'] = array( 50,50 );
  return $sizes;
} );


/**
 * Change the base for the author permalink
 */
add_action( 'init', function() {
  global $wp_rewrite;
  $wp_rewrite->author_base = 'team'; // Change 'team' to be the base URL you wish to use
  $wp_rewrite->author_structure = '/' . $wp_rewrite->author_base. '/%author%';
} );


/**
 * Add CSS Using customize settings
 */
add_action( 'wp_head', function() {
  $primary      = get_setting( 'primary_color', DEFAULT_PRIMARY_COLOR );
  $secondary    = get_setting( 'secondary_color', DEFAULT_SECONDARY_COLOR );
  $third        = get_setting( 'third_color', DEFAULT_THIRD_COLOR );
  $loading      = get_setting( 'loading_color', DEFAULT_LOADING_COLOR );
  $font_color   = get_setting( 'font_color', DEFAULT_FONT_COLOR );

  $rgb_primary  = get_rgb( $primary );    // Primary color in RGBA
  $rgb_third    = get_rgb( $third );  // Third color in RGBA
  ?>
       <style type="text/css">
          .menu-item, #loading-page, a::after {background: <?php echo $secondary; ?> }
          a, a:hover, .navbar-logo, .navbar-text, .image-hover-text-title { color: <?php echo $secondary; ?>; }
          .timeline-left .timeline-date::after, .timeline-title::before {border: 4px solid <?php echo $secondary; ?>; }
          blockquote { border-left: 5px solid <?php echo $secondary; ?>; }
          h1, h2, h3, h4, h5, h6, .navbar-text:hover, .timeline-entry a, #loading-page, .post-title a:hover { color: <?php echo $primary; ?> !important; }
         .post-title a::after, .timeline-entry a::after {background: <?php echo $primary; ?>; }
          .hero{background-image: url('<?php featured_image(); ?>'), linear-gradient(<?php echo $secondary; ?>,<?php echo $primary; ?>) !important;}
          .menu-item a:hover { color: #ede9e9 !important; }
          .time-wrapper { color: <?php echo $third; ?>; }
          .navigation-menu { background: <?php echo $third; ?>;}
          .menu-item a { background: <?php rgba( $rgb_third, '0.75' ); ?>;}
          .menu-item > a:hover { background: <?php rgba( $rgb_third, '0.5' ); ?>; }
          .full-navbar { background: <?php rgba( $rgb_third, '0.85' ); ?> }
          .navbar-menu-btn { background: <?php rgba( $rgb_third, '0.8' ); ?> }
          .minimized-navbar { background: <?php rgba( $rgb_third, '0.95' ); ?> }
          .minimized-navbar .navbar-menu-btn, footer { background: <?php rgba( $rgb_third, '0.9' ); ?>}
          .navbar-menu-btn:hover { background: <?php rgba( $rgb_primary, '0.9' ); ?>; }
          html, body, .sub-heading > a, .preview-sub-heading > a, .author-meta-description  a, .author-meta-description a:hover, .post-entry.post-content-preview, .author-meta, input[type=text], input[type=button], input[type=submit] { color: <?php echo $font_color; ?> }
          input[type=text] {border-bottom: 1px solid <?php echo $font_color; ?>}
          input[type=text]:focus { border-bottom: 1px solid <?php echo $primary; ?>}
          input[type=button], input[type=submit] {border: 1px solid <?php echo $font_color; ?>}
          input[type=button]:focus, input[type=button]:hover, input[type=submit]:hover { border: 1px solid <?php echo $primary; ?>; color: <?php echo $primary; ?>; }
          .sub-heading > a::after, .preview-sub-heading > a::after, .author-meta > .author-meta-description > a::after { background: <?php echo $font_color; ?>}
          svg > * { stroke: <?php echo $loading; ?>;stroke-linecap: round;
          vector-effect: non-scaling-stroke;}
          svg > *, svg > text, svg [id='eyes'] circle {fill: <?php echo $loading; ?>}
       </style>
  <?php
} );
