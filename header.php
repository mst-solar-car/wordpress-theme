<?php
/**
 * Header
 *
 * @author Michael Rouse
 * Displays the header, and the <head> for all pages
 */

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

    <link rel="stylesheet" type="text/css" href="https://campus.mst.edu/emctest/t4v3/fonts/391663/23944D55C353AB485.css" />
    <link rel="stylesheet" type="text/css" href="https://campus.mst.edu/emctest/t4v3/fonts/Orgon/orgon_slab.css">
    <link rel="stylesheet" type="text/css" href="https://campus.mst.edu/emctest/t4v3/fonts/tstar/tstar.css" />

    <link rel="stylesheet" href="<?php get_file( 'style.css' ); ?>" type="text/css" >

    <?php wp_head(); ?>

    <meta property="og:type" content="<?php page_type(); ?>" />
    <meta property="og:site_name" content="<?php echo bloginfo( 'name' ); ?>" />
    <meta property="og:title" name="twitter:title" content="<?php echo $page_title; ?>" />
    <meta name="twitter:card" content="<?php echo ( ( !is_home() && !is_search() && has_post_thumbnail() ) ? 'summary_large_image' : 'summary' ); ?>" />
    <?php if( is_setting( 'twitter_url' ) ) :?>
      <meta name="twitter:site" content="@<?php socialmedia_url( 'twitter' ); ?>" />
    <?php endif; ?>
    <?php if ( !is_home() && !is_search() && has_post_thumbnail() && !is_author() ) : ?>
      <meta property="og:image" name="twitter:image" content="<?php featured_image(); ?>" />
    <?php else:  // No featured image, use the first image in the post, or the site logo ?>
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

    <style>
        #wpadminbar {
            position: static !important;
            overflow-x: hidden !important;
        }
        #wpadminbar * {
            z-index: 900 !important;
        }
        a.screen-reader-shortcut { display: none; }

        <?php if (is_home() || !has_post_thumbnail() || is_search() || is_author()) {?>.hero { display: none; } <?php } ?>

        <?php if (is_user_logged_in()) : ?> body { margin-top: -48px !important; } @media screen and (max-width: 782px) { body { margin-top: -46px !important; } }<?php endif; # Hide the gap left by the admin bar ?>
    </style>

    <?php show_custom_css(); ?>
  </head>
  <body id="MSTSolarCarTheme">
    <!-- Navbar -->
    <input type="checkbox" id="menu-hack" autocomplete="off" tabindex="-1">
    <div id="nav-container">
      <div id="nav-bar" class="navigation-bar uppercase">
        <div class="fluid-nav width-limit reading-width no-select">
          <div id="NavBarHeaderLink" class="navbar-brand absolute left">
            <a href="<?php bloginfo('url') ?>" tabindex="5" class="no-underline" tabindex="0">
              <div id="InnerNavBarHeaderLink" class="navbar-text">
                <img alt="Brand" src="<?php logo_url(); ?>" class="navbar-image">
                <span class="navbar-title-top"><?php setting( 'title_top_long' ); ?></span>
                <span class="navbar-title-top-short"><?php setting( 'title_top_short' ); ?></span>
                <span class="navbar-title-bottom"><?php setting( 'title_bottom_long' ); ?></span>
                <span class="navbar-title-bottom-short"><?php setting( 'title_bottom_short' ); ?></span>
              </div>
            </a>
          </div>
          <div id="nav-navigation" class="navbar-nav right">
            <?php if ( get_theme_mod( 'include_social_media', '' ) == 'y' ) : ?>
              <?php if ( is_setting( 'facebook_url' ) ) :?>
                <div class="navbar-social relative" class="relative">
                  <a href="https://www.facebook.com/<?php socialmedia_url( 'facebook' ); ?>" target="_blank" title="Like us on Facebook"><span class="social facebook"></span></a>
                </div><?php endif; ?><?php if( is_setting( 'twitter_url' ) ) :?><div class="navbar-social relative" class="relative">
                  <a href="https://twitter.com/<?php socialmedia_url( 'twitter' ); ?>" target="_blank" title="Follow us on Twitter"><span class="social twitter"></span></a>
                </div><?php endif; ?><?php if( is_setting( 'instagram_url' ) ) :?><div class="navbar-social relative" class="relative">
                  <a href="https://instagram.com/<?php socialmedia_url( 'instagram' ); ?>" target="_blank" title="Follow us on Instagram"><span class="social instagram"></span></a>
                </div><?php endif; ?>
            <?php endif; ?>
            <label for="menu-hack" id="nav-menu-button2" class="navbar-menu-btn relative" tabindex="10">

            </label>
          </div>
        </div>
      </div>
      <!-- End navbar -->

      <!-- Navigation Menu -->
      <div id="nav-menu" class="navigation-menu">
        <?php wp_nav_menu(); ?>
      </div>
    </div>
    <!-- End Navigation -->

    <div id="content-wrapper" class="wrapper width-limit">
      <div class="hero width-limit height-limit"></div>
      <div class="content reading-width">
