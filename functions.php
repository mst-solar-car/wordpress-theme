<?php
namespace SolarCarTeam;

/**
 * Missouri S&T Solar Car WordPress Theme
 *
 * Author: Michael Rouse 2016
 */
require_once ( get_template_directory() . '/includes/mstsolarcar.php' );

//remove_filter( 'the_content', 'wpautop' ); // Remove stupid auto-formatting
//remove_filter( 'the_excerpt', 'wpautop' );


// Add a filter to automatically add <br/> for every two new liness
add_filter ('the_content', function ( $content ) {
  $content = preg_replace( '/(\n\s*){2}/', '<br/>', $content );
  $content = preg_replace( '/\[br-([0-9]+)\]/', '[br count="$1"]', $content );

  return $content;
});


// Remove stuff from the admin bar
add_action(  'wp_before_admin_bar_render', function() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments'); // Remove comments
 } );



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
  $wp_rewrite->author_base = 'team/members'; // Change 'team' to be the base URL you wish to use
  $wp_rewrite->author_structure = '/' . $wp_rewrite->author_base. '/%author%';
} );


/**
 * Add CSS Using customize settings
 */
add_action( 'wp_head', function() {
  $primary      = get_setting( 'primary_color', SCT_DEFAULT_PRIMARY_COLOR );
  $secondary    = get_setting( 'secondary_color', SCT_DEFAULT_SECONDARY_COLOR );
  $third        = get_setting( 'third_color', SCT_DEFAULT_THIRD_COLOR );
  $loading      = get_setting( 'loading_color', SCT_DEFAULT_LOADING_COLOR );
  $font_color   = get_setting( 'font_color', SCT_DEFAULT_FONT_COLOR );

  $rgb_primary  = get_rgb( $primary );    // Primary color in RGBA
  $rgb_secondary = get_rgb( $secondary );
  $rgb_third    = get_rgb( $third );  // Third color in RGBA
  $rgb_loading = get_rgb( $loading );

  // Determine width for the number of sponsors in the footer
  $num_footer_sponsors = 0;
  if ( is_setting( 'sponsor1' ) ) : $num_footer_sponsors++; endif;
  if ( is_setting( 'sponsor2' ) ) : $num_footer_sponsors++; endif;
  if ( is_setting( 'sponsor3' ) ) : $num_footer_sponsors++; endif;
  if ( is_setting( 'sponsor4' ) ) : $num_footer_sponsors++; endif;
  if ( is_setting( 'sponsor5' ) ) : $num_footer_sponsors++; endif;
  if ( is_setting( 'sponsor6' ) ) : $num_footer_sponsors++; endif;
  $sponsor_size = 100 / $num_footer_sponsors;
  ?>
  <style type="text/css">
    .color-primary { color: <?php echo $primary; ?> !important; }
    .color-secondary { color: <?php echo $secondary; ?> !important; }
    .color-third, .color-tertiary { color: <?php echo $third; ?> !important; }
    .color-font { color: <?php echo $font_color; ?> !important; }

    /**
     * Navigation bar
     */
     #nav-bar { background: <?php rgba( $rgb_third, '0.85' ); ?> }
     #nav-bar.minimized-navbar { background: <?php rgba( $rgb_third, '0.95' ); ?>; }
    .navbar-menu-btn, .navbar-social { background: <?php rgba( $rgb_third, '0.8'); ?>; }
     .navbar-menu-btn:hover, #menu-hack:not(:checked) + #nav-container .navbar-menu-btn:focus, .navbar-social:hover, .navbar-social:focus, .navbar-social a:focus, .navbar-social a:hover { background: <?php rgba( $rgb_secondary, '0.9') ?>; }
    .navbar-brand { color: <?php echo $secondary; ?> !important; }
    .navbar-brand:hover, .navbar-brand:focus { color: <?php echo $primary; ?> !important; }


    /**
     * Footer
     */
    footer { background: <?php rgba( $rgb_third, '0.8' ); ?>; }
    .footer-sponsor { max-width: <?php echo $sponsor_size ?>%; max-width: <?php echo $sponsor_size ?>%; min-width: <?php echo $sponsor_size ?>%; }


    #nav-menu .menu-item, #loading-page { background: <?php echo $primary; ?> }
    .image-hover-text-title { color: <?php echo $secondary; ?> !important; }
    .timeline-left .timeline-date::after, .timeline-title::before { border: 4px solid <?php echo $secondary; ?> !important; }
    blockquote.quote { border-left: 5px solid <?php echo $secondary; ?>; }
    h1, h2, h3, h4, h5, h6,  .post-title a:hover, .post-title a:focus { color: <?php echo $primary; ?> !important; }

    .hero {background-image: url('<?php featured_image(); ?>') !important; background-color: <?php rgba( $rgb_third, '0.8'); ?>;}
    #nav-menu .menu-item a:hover, #nav-menu .menu-item a:focus { color: #ede9e9 !important; }
    .time-wrapper { color: <?php echo $third; ?>; }
    .navigation-menu { background: <?php echo $third; ?>; }

    #nav-menu .menu-item a { background: <?php rgba( $rgb_third, '0.75' ); ?>; }
    #nav-menu .menu-item > a:hover, #nav-menu .menu-item > a:focus { background: <?php rgba( $rgb_third, '0.5' ); ?>; }


    /*.minimized-navbar, .peek-navbar { background: <?php rgba( $rgb_third, '0.95' ); ?> !important }
    .minimized-navbar .navbar-menu-btn, .minimized-navbar .nav-bar-social, footer { background: <?php rgba( $rgb_third, '0.9' ); ?>}
    */

    .designTeamBanner { position:relative !important; background: rgba($rgb_third, '0.9') !important; z-index:900!important }

    #designTeamBlinder { position: relative !important; }


    html, body, .sub-heading > a, .preview-sub-heading > a, .author-meta-description  a, .author-meta-description a:hover, .post-entry.post-content-preview, .author-meta, input[type=text], input[type=button], input[type=submit] { color: <?php echo $font_color; ?> }
    input[type=text] { border-bottom: 1px solid <?php echo $font_color; ?> !important; }
    input[type=text]:focus { border-bottom: 1px solid <?php echo $primary; ?> !important; }
    input[type=button], input[type=submit] { border: 1px solid <?php echo $font_color; ?> }
    input[type=button]:focus, input[type=button]:hover, input[type=submit]:hover { border: 1px solid <?php echo $primary; ?>; color: <?php echo $primary; ?>; }
    .sub-heading > a::after, .preview-sub-heading > a::after, .author-meta > .author-meta-description > a::after { background: <?php echo $font_color; ?> }

    #nav-menu .menu-item { background-position: center center !important; }

    .more-link::after { background: #838383 !important; }
    .image-caption .caption { background-color: <?php rgba($rgb_third, '0.9'); ?>; }
  </style>
  <?php
} );
