<?php
require_once ( get_template_directory() . '/functions/custom_css_and_js.php' );
require_once( get_template_directory() . '/functions/shortcode.php' );
require_once( get_template_directory() . '/functions/documentation.php' );


add_theme_support( 'title-tag' );
add_theme_support( 'custom-header' );
add_theme_support( 'site-logo', 500 );
add_theme_support( 'html5' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' ); // Add it for posts
add_filter( 'menu_image_default_sizes', function( $sizes ) { unset( $sizes['menu-36x36'] ); $sizes['menu-50x50'] = array( 50,50 ); return $sizes; } );




function change_author_permalinks () {
  global $wp_rewrite;
  $wp_rewrite->author_base = 'team'; // Change 'team' to be the base URL you wish to use
  $wp_rewrite->author_structure = '/' . $wp_rewrite->author_base. '/%author%';
  //$wp_rewrite->flush_rules();
}
add_action( 'init','change_author_permalinks' );

/**
 * Limits the post content to 299 characters (for preview)
 */
function post_content($more_link_text = null, $strip_teaser = false)
{
  $content = get_the_content($more_link_text, $strip_teaser);

  if (strlen($content) > 300)
  {
    $content = substr($content, 0, 299) . ' <!--more-->';
  }

  echo apply_filters('the_content', $content);
}


function spaces($content)
{
  return preg_replace('/(_|\+|%20)/', ' ', $content);
}


/**
 * Add options to the Customize Menu
 */
add_action( 'customize_register' , 'customize_options' );
function customize_options( $wp_customize ) {
  // Add Primary Color
  $wp_customize->add_setting( 'primary_color', [
    'default'   => '#f47f45',
    'transport' => 'refresh',
  ]);
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color', [
    'label'   => 'Primary Color (Not the setting above)',
    'section' => 'colors',
    'settings' => 'primary_color'
  ]));

	// Add Secondary Color to theme settings
  $wp_customize->add_setting( 'secondary_color' , [
    'default'     => '#17a84b',
    'transport'   => 'refresh',
  ]);
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'secondary_color', [
    'label' => 'Secondary Color',
    'section' => 'colors',
    'settings' => 'secondary_color'
  ]));

  // Add Third Color to theme settings
  $wp_customize->add_setting( 'third_color', [
    'default'   => '#303030',
    'transport' => 'refresh',
  ]);
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'third_color', [
    'label' => 'Navbar/Footer Color',
    'section' => 'colors',
    'settings' => 'third_color',
  ]));

  // Text Color
  $wp_customize->add_setting( 'font_color', [
    'default' => '#323131',
    'transport' => 'refresh'
  ]);
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'font_color', [
    'label' => 'Font Color',
    'section' => 'colors',
    'settings' => 'font_color'
  ]));


  /*
   * Navbar Section
   */
  $wp_customize->add_section( 'navbar_settings', [
    'title'       => 'Navigation Bar',
    'priority'    => 100,
    'capability'  => 'edit_theme_options',
    'description' => 'Customize the navigation bar'
  ]);

  // Title text
  $wp_customize->add_setting( 'title_top_long', [
    'default' => '',
    'transport' => 'refresh'
  ]);
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'title_top_long', [
    'label' => 'Long Title Top Line',
    'section' => 'navbar_settings',
    'settings'  => 'title_top_long'
  ]));
  $wp_customize->add_setting( 'title_bottom_long', [
    'default' => '',
    'transport' => 'refresh'
  ]);
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'title_bottom_long', [
    'label' => 'Long Title Bottom Line',
    'section' => 'navbar_settings',
    'settings' => 'title_bottom_long'
  ]));

  $wp_customize->add_setting( 'title_top_short', [
    'default' => '',
    'transport' => 'refresh'
  ]);
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'title_top_short', [
    'label' => 'Short Title Top Line',
    'section' => 'navbar_settings',
    'settings'  => 'title_top_short'
  ]));
  $wp_customize->add_setting( 'title_bottom_short', [
    'default' => '',
    'transport' => 'refresh'
  ]);
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'title_bottom_short', [
    'label' => 'Short Title Bottom Line',
    'section' => 'navbar_settings',
    'settings' => 'title_bottom_short'
  ]));

  // Menu Button Text
  $wp_customize->add_setting( 'menu_btn_text', [
    'default'   => 'Menu',
    'transport' => 'refresh'
  ]);
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'menu_btn_text', [
    'label' => 'Menu Button Text',
    'section' => 'navbar_settings',
    'settings'  => 'menu_btn_text'
  ]));


  /*
   * Footer Section
   */
  $wp_customize->add_section( 'footer_settings', [
    'title'       => 'Footer',
    'priority'    => 100,
    'capability'  => 'edit_theme_options',
    'description' => 'Customize the theme footer'
  ]);

  // Include Social Media
  $wp_customize->add_setting( 'include_social_media', [
    'default' => '',
    'transport' => 'refresh'
  ]);
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'include_social_media', [
    'label'     => 'Include Social Media Links',
    'section'   => 'footer_settings',
    'settings'  => 'include_social_media',
    'type'      => 'checkbox',
    'choices'   => ['yes' => 'y']
  ]));

  // Facebook Page
  $wp_customize->add_setting( 'facebook_url', [
    'default' => '',
    'transport' => 'refresh'
  ]);
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'facebook_url', [
    'label'     => 'Facebook (facebook.com/your_name)',
    'section'   => 'footer_settings',
    'settings'  => 'facebook_url'
  ]));

  // Twitter URL
  $wp_customize->add_setting( 'twitter_url', [
    'default' => '',
    'transport' => 'refresh'
  ]);
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'twitter_url', [
    'label' => 'Twitter Handle (@your_name)',
    'section' => 'footer_settings',
    'settings' => 'twitter_url'
  ]));

  // Instagram Url
  $wp_customize->add_setting( 'instagram_url', [
    'default' => '',
    'transport' => 'refresh'
  ]);
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'instagram_url', [
    'label' => 'Instagram Handle (@your_name)',
    'section' => 'footer_settings',
    'settings' => 'instagram_url'
  ]));
}



/**
 * Helper Functions
 */
function get_asset($file) { return bloginfo('template_directory') . '/assets/' . $file; }
function asset($file) { echo get_asset($file); return; }
function __setting($name, $default) { return htmlspecialchars(get_theme_mod($name, (($default) ?: ''))); }
function _setting($name, $default) { echo __setting($name, $default); }
function is_setting($name) { return (!empty(__setting($name)) && !ctype_space(__setting($name))); }

function socialmedia_url($name)
{
  $name = str_replace('_url', '', $name) . '_url';
  $url = '';

  if (is_setting($name))
  {
    $url = __setting($name);
    $url = preg_replace('/(https|http):\/\/(.*?)\.(.*?)\/(@|)/i', '', $url);
    $url = preg_replace('/\/(.*)/i', '', $url);
  }
  return $url;
}

function meta_description($content, $echo)
{
  $echo = ($echo) ?: true;

  $desc = get_bloginfo('name') . ' - ';
  $content = strip_content_tags(strip_tags($content));

  if (strlen($content) > 100)
  {
    $content = substr($content, 0, 99);
    if (in_array(substr($content, -1), ['.', ',', ';', ':', '!', '?', '-', '$', '(', '[', '{'])){$content = substr_replace($content, '', -1);}
    $content .= '...';
  }
  $desc .= $content;
  if ($echo)
  {
    echo $desc;
  }
  return $desc;
}


function hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }

   return ['r' => $r, 'g' => $g, 'b' => $b]; // returns an array with the rgb values
}

function rgba($rgb, $a) { echo 'rgba(' . $rgb['r'] .', ' . $rgb['g'] . ', ' . $rgb['b'] . ', ' . $a . ')'; }



/**
 * Add CSS Using customize settings
 */
function settings_css()
{
    $def = '#000000';
    $third = hex2rgb(__setting('third_color', $def));

    ?>
         <style type="text/css">
            .menu-item, #loading-page, a::after {background: <?php _setting('secondary_color', $def);?> }
            a, a:hover, .navbar-logo, .navbar-text, .image-hover-text-title { color: <?php _setting('secondary_color', $def);?>; }

            .timeline-left .timeline-date::after, .timeline-title::before {border: 4px solid <?php _setting('secondary_color', $def);?>; }
            blockquote { border-left: 5px solid <?php _setting('secondary_color', $def); ?>; }

            h1, h2, h3, h4, h5, h6, .navbar-text:hover, .timeline-entry a, #loading-page, .post-title a:hover { color: <?php _setting('primary_color', $def); ?> !important; }
           .post-title a::after, .timeline-entry a::after {background: <?php _setting('primary_color', $def);?>; }

            .hero{background-image: url('<?php featured_image(); ?>'), linear-gradient(<?php _setting('secondary_color', $def);?>,<?php _setting('primary_color', $def);?>) !important;}

            .menu-item a:hover { color: #ede9e9 !important; }

            .time-wrapper { color: <?php _setting('third_color', $def);?>; }
            .navigation-menu { background: <?php _setting('third_color', $def);?>;}
            .menu-item a { background: <?php rgba($third, '0.75');?>;}
            .menu-item > a:hover { background: <?php rgba($third, '0.5');?>; }

            .full-navbar { background: <?php rgba($third, '0.85');?> }
            .navbar-menu-btn { background: <?php rgba($third, '0.8');?> }
            .minimized-navbar { background: <?php rgba($third, '0.95');?> }
            .minimized-navbar .navbar-menu-btn, footer { background: <?php rgba($third, '0.9'); ?>}
            .navbar-menu-btn:hover
            {
              background: <?php rgba(hex2rgb(__setting('primary_color', $def)), '0.9'); ?>;
            }

            html, body, .sub-heading > a,
            .preview-sub-heading > a,
            .author-meta-description  a, .author-meta-description a:hover, .post-entry.post-content-preview, .author-meta, input[type=text], input[type=button], input[type=submit]
            { color: <?php _setting('font_color', '#323131'); ?> }

            input[type=text]
            {border-bottom: 1px solid <?php _setting('font_color', '#323131'); ?>}
            input[type=text]:focus
            { border-bottom: 1px solid <?php _setting('primary_color', $def); ?>}
            input[type=button], input[type=submit]
            {border: 1px solid <?php _setting('font_color', '#323131'); ?>}
            input[type=button]:focus, input[type=button]:hover, input[type=submit]:hover
            { border: 1px solid <?php _setting('primary_color', $def); ?>; color: <?php _setting('primary_color', $def); ?>; }

            .sub-heading > a::after,
            .preview-sub-heading > a::after,
            .author-meta > .author-meta-description > a::after { background: <?php _setting('font_color', '#323131'); ?>}
         </style>
    <?php
}
add_action( 'wp_head', 'settings_css');





/**
 * More Helper Functions
 */
function featured_image() { return the_post_thumbnail_url('full'); }
function header_image_url($size = 'full'){ echo get_header_image(); }
function avatar($id, $args = null){ echo get_auth_avatar($id, $args); }

function get_auth_avatar($id, $args = null)
{
  $avatar = '';

  // Generate default arguments
  $args = ($args) ?: [];
  $args['size'] = ($args['size']) ?: '100';
  $args['default'] = ($args['default']) ?: get_header_image('full');
  $args['alt'] = ($args['alt']) ?: 'Author Avatar';
  $args['class'] = ($args['class']) ?: 'rounded fade-on-hover';


  // Get the avatar or default avatar
  if (function_exists('get_avatar'))
  {
    $avatar = get_avatar($id, $args['size'], $args['default'], $args['alt'], ['class' => $args['class']]);
  }
  else
  {
    $avatar = '<img class="avatar avatar-' . $args['size'] . ' photo ' . $args['class'] . '" width="100" src="'. $args['default'] . '"></img>';
  }

  return $avatar;
}

function strip_content_tags($content) {

	$content = strip_shortcodes($content);
	$content = str_replace(']]>', ']]>', $content);
	$content = preg_replace('/<img[^>]+./','',$content);
  $matches = [];

  if (preg_match('/([\s\S]*)<!--(.*)?-->/', $content, $matches))
  {
    $content = preg_replace('/<!--(.*)?-->/', '', $matches[0]);
  }
	return $content;
}




function minify_css($input) {
    if(trim($input) === "") return $input;
    return preg_replace(
        array(
            // Remove comment(s)
            '#("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\')|\/\*(?!\!)(?>.*?\*\/)|^\s*|\s*$#s',
            // Remove unused white-space(s)
            '#("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\'|\/\*(?>.*?\*\/))|\s*+;\s*+(})\s*+|\s*+([*$~^|]?+=|[{};,>~+]|\s*+-(?![0-9\.])|!important\b)\s*+|([[(:])\s++|\s++([])])|\s++(:)\s*+(?!(?>[^{}"\']++|"(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\')*+{)|^\s++|\s++\z|(\s)\s+#si',
            // Replace `0(cm|em|ex|in|mm|pc|pt|px|vh|vw|%)` with `0`
            '#(?<=[\s:])(0)(cm|em|ex|in|mm|pc|pt|px|vh|vw|%)#si',
            // Replace `:0 0 0 0` with `:0`
            '#:(0\s+0|0\s+0\s+0\s+0)(?=[;\}]|\!important)#i',
            // Replace `background-position:0` with `background-position:0 0`
            '#(background-position):0(?=[;\}])#si',
            // Replace `0.6` with `.6`, but only when preceded by `:`, `,`, `-` or a white-space
            '#(?<=[\s:,\-])0+\.(\d+)#s',
            // Minify string value
            '#(\/\*(?>.*?\*\/))|(?<!content\:)([\'"])([a-z_][a-z0-9\-_]*?)\2(?=[\s\{\}\];,])#si',
            '#(\/\*(?>.*?\*\/))|(\burl\()([\'"])([^\s]+?)\3(\))#si',
            // Minify HEX color code
            '#(?<=[\s:,\-]\#)([a-f0-6]+)\1([a-f0-6]+)\2([a-f0-6]+)\3#i',
            // Replace `(border|outline):none` with `(border|outline):0`
            '#(?<=[\{;])(border|outline):none(?=[;\}\!])#',
            // Remove empty selector(s)
            '#(\/\*(?>.*?\*\/))|(^|[\{\}])(?:[^\s\{\}]+)\{\}#s'
        ),
        array(
            '$1',
            '$1$2$3$4$5$6$7',
            '$1',
            ':0',
            '$1:0 0',
            '.$1',
            '$1$3',
            '$1$2$4$5',
            '$1$2$3',
            '$1:0',
            '$1$2'
        ),
    $input);
}
