<?php
/**
 * Header
 *
 * @author Michael Rouse
 * Displays the header, and the <head> for all pages
 */
?>
<?php
  $options  = get_option( 'solarcar_theme_options' );
  $author = null;

  if ( isset( $author_name ) ) {
    $author = get_user_by( 'slug', $author_name );
  } else {
    get_userdata( intval( $author ) );
  }
  $curauth  = $author; // I think this is needed for wordpress, but I want the variable named as $author...

  $page_title = trim( url_spaces( wp_title( '', false ) ) ?: 'Home' );
?>
<!DOCTYPE html>
<html  <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0" />

    <title><?php echo $page_title . ' - '; ?><?php bloginfo( 'name' ); ?></title>

    <meta property="og:url" content="<?php echo get_permalink( $post ); ?>" />
    <meta property="og:type" content="<?php page_type(); ?>" />
    <meta property="og:site_name" content="<?php echo bloginfo( 'name' ); ?>" />
    <meta property="og:title" name="twitter:title" content="<?php echo $page_title; ?>" />
    <meta name="twitter:card" content="<?php echo ( ( !is_home() && !is_search() && has_post_thumbnail() ) ? 'summary_large_image' : 'summary' ); ?>" />
    <?php if( is_setting( 'twitter_url' ) ) :?>
      <meta name="twitter:site" content="@<?php socialmedia_url( 'twitter' ); ?>" />
    <?php endif; ?>
    <?php if ( !is_home() && !is_search() && has_post_thumbnail() && !is_author() ) : ?>
      <meta property="og:image" name="twitter:image" content="<?php featured_image(); ?>" />
    <?php else: ?>
      <meta property="og:image" name="twitter:image" content="<?php sct_get_first_image( $post->post_content ); ?>" />
    <?php endif; ?>

    <?php
    // Meta information for posts
    if ( is_single() ) :?>
      <meta name="description" content="<?php meta_description( $post->post_content ); ?>" />
      <meta property="og:description" name="twitter:description" content="<?php meta_description( $post->post_content ); ?>" />
      <meta property="article:author" content="<?php echo get_author_posts_url( $post->post_author ); ?>" />
      <meta property="article:published_time" content="<?php echo get_the_date(); ?>" />
      <meta property="article:modified_time" content="<?php echo get_the_modified_date(); ?>" />
      <meta name="author" content="<?php echo the_author_meta( 'display_name', $post->post_author ); ?>" />
    <?php

    // Meta information for author page
    elseif ( is_author() ) : ?>
      <meta name="description" content="<?php meta_description( $author->description ); ?>" />
      <meta property="og:description" name="twitter:description" content="<?php meta_description( $author->description ); ?>" />
      <?php if ( get_avatar_url( $author->id, [ 'size' => '500' ] ) ) : ?>
        <meta property="og:image" name="twitter:image" content="<?php echo get_avatar_url( $author->id, [ 'size' => '500' ] ); ?>" />
      <?php endif; ?>
      <meta property="profile:first_name" content="<?php echo ( explode( ' ', $author->display_name )[0] ) ?>" />
      <meta property="profile:last_name" content="<?php echo ( explode( ' ', $author->display_name )[1] ) ?>" />
      <meta name="author" content="<?php echo $author->display_name; ?>" />
    <?php

    // Default Meta Information
    else: ?>
      <meta name="description" content="<?php meta_description( $post->post_content ); ?>" />
      <meta property="og:description" name="twitter:description" content="<?php meta_description( $post->post_content ); ?>" />
      <meta name="author" content="<?php bloginfo( 'name' ); ?>" />
    <?php endif; ?>

    <link rel="stylesheet" href="<?php asset( 'css/style.min.css' ); ?>" type="text/css" >
    <link rel="stylesheet" href="<?php asset( 'css/social-share.min.css' ); ?>" type="text/css">

    <?php wp_head(); ?>

    <style>svg{width:80%;height:80%}[id=line]{stroke-width:3}text{font-size:1em}[id=mover]{animation:sun-motion 5s cubic-bezier(.175,.885,.32,1.275) infinite}[id=main]{fill:transparent;stroke-width:7}[id=eyes]{animation:eye-motion 5s ease-out infinite}[id=ray]{stroke-width:4}[id=rays]{animation:rot 5s linear infinite}@keyframes rot{to{transform:rotate(.25turn)}}@keyframes eye-motion{0%,100%,20%,49%{transform:translate(-13px)}21%,25%,29%,47%{transform:translate(13px) scaleY(1)}27%{transform:translate(13px) scaleY(0)}48%{transform:translate(0)}}@keyframes sun-motion{0%,100%,99%{transform:translateY(-16px)}50%{transform:translateY(-29px)}52%,98%{transform:translate(4px) scaleY(1.25)}53%,97%{transform:translateY(23px)}}#wpadminbar{position:static!important;z-index:100!important;overflow-x:hidden!important;}#wpadminbar .quicklinks ul {z-index:100!important}#wpadminbar .ab-top-secondary{z-index:100!important;}
    <?php if (is_home() || !has_post_thumbnail() || is_search()) {?>.hero { display: none; }.content{margin-top: 100px;min-height:75vh;}<?php } ?></style>

    <?php show_custom_css(); ?>
  </head>
  <body class="is-loading">
    <div id="loading-page">
      <div class="loading-text">
        <!-- Sunrise SVG Animation by Ana Tudor (http://codepen.io/thebabydino/) -->
        <svg viewbox="-200 -150 400 300">
          <defs>
            <line id="ray" x1="-5" x2="5"></line>
            <clipPath id="cp">
              <rect x="-200" y="-150" width="400" height="150"></rect>
            </clipPath>
          </defs>
          <line id="line" x1="-76" x2="76"></line>
          <text text-anchor="middle" y="45">Loading...</text>
          <g id="sun" clip-path="url(#cp)">
            <g id="mover">
              <circle id="main" r="50"></circle>
              <g id="eyes">
                <circle r="3" cx="-13"></circle>
                <circle r="3" cx="13"></circle>
              </g>
              <g id="rays">
                <use xlink:href="#ray" transform="rotate(315) translate(70)"></use>
                <use xlink:href="#ray" transform="rotate(270) translate(70)"></use>
                <use xlink:href="#ray" transform="rotate(225) translate(70)"></use>
                <use xlink:href="#ray" transform="rotate(180) translate(70)"></use>
                <use xlink:href="#ray" transform="rotate(135) translate(70)"></use>
                <use xlink:href="#ray" transform="rotate(90) translate(70)"></use>
                <use xlink:href="#ray" transform="rotate(45) translate(70)"></use>
                <use xlink:href="#ray" transform="rotate(0) translate(70)"></use>
              </g>
            </g>
          </g>
        </svg>
      </div>
    </div>

    <!-- Navbar -->
    <div id="nav-bar" class="navigation-bar full-navbar">
      <div class="fluid-nav width-limit reading-width">
        <div class="navbar-logo navbar-absolute navbar-left" onclick="window.location.href = '<?php bloginfo('url'); ?>'">
          <div class="navbar-text">
            <img alt="Brand" src="<?php logo_url(); ?>">
            <span class="navbar-title-top"><?php setting( 'title_top_long' ); ?></span>
            <span class="navbar-title-top-short"><?php setting( 'title_top_short' ); ?></span>
            <span class="navbar-title-bottom"><?php setting( 'title_bottom_long' ); ?></span>
            <span class="navbar-title-bottom-short"><?php setting( 'title_bottom_short' ); ?></span>
          </div>
        </div>
        <div id="nav-menu-button" class="navbar-menu-btn navbar-relative navbar-right">
          <span class="regular-text"><?php setting( 'menu_btn_text', 'Menu' ); ?></span><span class="close-text">Close</span>
        </div>
      </div>
    </div>
    <!-- End navbar -->

    <!-- Navigation Menu -->
    <div id="nav-menu" class="navigation-menu pre-load">
      <?php wp_nav_menu(); ?>
    </div>
    <!-- End Navigation -->

    <div class="wrapper width-limit">
      <div class="hero width-limit height-limit"></div>
      <div class="content reading-width">
