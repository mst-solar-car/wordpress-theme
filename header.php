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
  $author   = ( isset( $_GET['author_name'] ) ) ? get_user_by( 'slug', $author_name ) : get_userdata( intval( $author ) );
  $curauth  = $author; // I think this is needed for wordpress, but I want the variable named as $author...
?>
<!DOCTYPE html>
<html  <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0" />

    <title><?php echo trim( spaces( wp_title( '', false) ?: 'Home')) . ' - '; ?><?php bloginfo('name')?></title>

    <meta property="og:url" content="<?php echo get_permalink( $post ); ?>" />
    <meta property="og:type" content="<?php echo ((is_single()) ? 'article' : ((is_author()) ? 'profile' : 'website')); ?>" />
    <meta property="og:site_name" content="<?php echo bloginfo('name'); ?>" />
    <meta property="og:title" name="twitter:title" content="<?php echo trim(wp_title('', false) ?: 'Home'); ?>" />
    <meta name="twitter:card" content="<?php echo ((!is_home() && !is_search() && has_post_thumbnail()) ? 'summary_large_image' : 'summary'); ?>" />
    <?php if(is_setting('twitter_url')) {?><meta name="twitter:site" content="@<?php echo socialmedia_url('twitter'); ?>" /><?php } ?>
    <?php if (!is_home() && !is_search() && has_post_thumbnail() && !is_author()) { ?> <meta property="og:image" name="twitter:image" content="<?php featured_image(); ?>" /> <?php }else{?><meta property="og:image" name="twitter:image" content="<?php header_image_url(); ?>" /><?php } ?>

    <?php
    // Meta information for posts
    if ( is_single() ) { ?>
      <meta name="description" content="<?php meta_description($post->post_content); ?>" />
      <meta property="og:description" name="twitter:description" content="<?php meta_description($post->post_content); ?>" />
      <meta property="article:author" content="<?php echo get_author_posts_url($post->post_author); ?>" />
      <meta property="article:published_time" content="<?php echo get_the_date(); ?>" />
      <meta property="article:modified_time" content="<?php echo get_the_modified_date(); ?>" />
      <meta name="author" content="<?php echo the_author_meta('display_name', $post->post_author); ?>" />
    <?php }

    // Meta information for author page
    else if ( is_author() ) {?>
      <meta name="description" content="<?php meta_description($author->description); ?>" />
      <meta property="og:description" name="twitter:description" content="<?php meta_description($author->description); ?>" />
      <?php if (get_avatar_url($author->id, ['size' => '500'])) {
        ?><meta property="og:image" name="twitter:image" content="<?php echo get_avatar_url($author->id, ['size' => '500']); ?>" />
      <?php } ?>
      <meta property="profile:first_name" content="<?php echo (explode(' ', $author->display_name)[0]) ?>" />
      <meta property="profile:last_name" content="<?php echo (explode(' ', $author->display_name)[1]) ?>" />
      <meta name="author" content="<?php echo $author->display_name; ?>" />
    <?php }

    // Default Meta Information
    else { ?>
      <meta name="description" content="<?php meta_description($post->post_content); ?>" />
      <meta property="og:description" name="twitter:description" content="<?php meta_description($post->post_content); ?>" />
      <meta name="author" content="<?php bloginfo('name') ?>" />
    <?php } ?>

    <link rel="stylesheet" href="<?php asset('css/style.min.css'); ?>" type="text/css" >
    <link rel="stylesheet" href="<?php asset('css/social-share.min.css'); ?>" type="text/css">

    <?php wp_head(); ?>

    <style>#wpadminbar{position:static!important;z-index:100!important;overflow-x:hidden!important;}#wpadminbar .quicklinks ul {z-index:100!important}#wpadminbar .ab-top-secondary{z-index:100!important;}<?php if (is_home() || !has_post_thumbnail() || is_search()) {?>.hero { display: none; }.content{margin-top: 100px;min-height:75vh;}
    <?php } if (isset($options['custom_css']) && !empty($options['custom_css'])) { echo minify_css($options['custom_css']); } ?></style>
  </head>
  <body class="is-loading">
    <div id="loading-page">
      <div class="loading-text"><h1>Loading...</h1></div>
    </div>

    <!-- Navbar -->
    <div id="nav-bar" class="navigation-bar full-navbar">
      <div class="fluid-nav width-limit reading-width">
        <div class="navbar-logo navbar-absolute navbar-left" onclick="window.location.href = '<?php bloginfo('url'); ?>'">
          <div class="navbar-text">
            <img alt="Brand" src="<?php header_image_url(); ?>">
            <span class="navbar-title-top"><?php _setting('title_top_long'); ?></span>
            <span class="navbar-title-top-short"><?php _setting('title_top_short'); ?></span>
            <span class="navbar-title-bottom"><?php _setting('title_bottom_long'); ?></span>
            <span class="navbar-title-bottom-short"><?php _setting('title_bottom_short'); ?></span>
          </div>
        </div>
        <div id="nav-menu-button" class="navbar-menu-btn navbar-relative navbar-right">
          <span class="regular-text"><?php _setting('menu_btn_text', 'Menu'); ?></span><span class="close-text">Close</span>
        </div>
      </div>
    </div>
    <!-- End navbar -->


    <!-- Navigation Menu -->
    <div id="nav-menu" class="navigation-menu hidden pre-load">
      <?php wp_nav_menu(); ?>
    </div>
    <!-- End Navigation -->

    <div class="wrapper width-limit">
      <div class="hero width-limit height-limit"></div>
      <div class="content reading-width">
