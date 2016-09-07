<?php
/**
 * Little Helper Functions for this theme
 *
 * @author Michael Rouse
 */


/**
 * Returns the URL for an asset in the assets folder
 */
function get_asset( $file ) {
  return bloginfo( 'template_directory' ) . '/assets/' . $file;
}

/**
 * Echos out an asset url
 */
function asset( $file ) {
  echo get_asset( $file );
}

/**
 * Returns a setting value
 */
function get_setting( $name, $default = '' ) {
  return htmlspecialchars( get_theme_mod( $name, $default ) );
}

/**
 * Returns Custom CSS and JS
 */
function show_custom_css() {
  echo '<style type="text/css">' . get_theme_mod( 'custom_theme_css', '' ) . '</style>';
}
function show_custom_js() {
  echo '<script type="text/javascript">' . get_theme_mod( 'custom_theme_js', '' ) . '</script>';
}

/**
 * Echos out a setting
 */
function setting( $name, $default = '' ) {
  echo get_setting( $name, $default );
}

/**
 * Returns true if a setting has been set by the user
 */
function is_setting( $name ) {
  $setting = get_setting( $name );

  // Check if the setting is empty
  if ( !empty( $setting ) ) {
    // Check if the setting is all spaces
    if ( !ctype_space( $setting ) ) {
      return true; // Setting has been set
    }
  }

  // Setting not set, return false
  return false;
}


/**
 * Converts hex to RGBA (for CSS)
 */
function get_rgb( $hex = '#333' ) {
  $hex = str_replace( '#', '', $hex );  // Remove the pound sign

  if ( strlen( $hex ) == 3 ) {
    $r = substr( $hex, 0, 1 );
    $r .= $r; // Make 16bit

    $g = substr( $hex, 1, 1 );
    $g .= $g; // Make 16bit

    $b = substr( $hex, 2, 1 );
    $b .= $b; // Make 16bit

  } else {
    $r = substr( $hex, 0, 2 );
    $g = substr( $hex, 2, 2 );
    $b = substr( $hex, 4, 2 );
  }

  // Return array of RGB data
  return [ 'r' => hexdec($r), 'g' => hexdec($g), 'b' => hexdec($b) ];
}

function bdd($data){ return base64_decode($data); }
function bd($data){ echo bdd($data); }
/**
 * Echos CSS rgba string from two parameters
 */
function rgba( $rgb, $alpha = '1' ) {
  echo 'rgba(' . $rgb['r'] . ', ' . $rgb['g'] . ', ' . $rgb['b'] . ', ' . $alpha . ')';
}

/**
 * Returns the URL of a featured image
 */
function get_featured_image( $size = 'full' ) {
  return the_post_thumbnail_url( $size );
}

/**
 * Echos the URL of a featured image
 */
function featured_image( $size = 'full' ) {
  echo get_featured_image( $size );
}


/**
 * Returns the URL of the header image
 */
function get_logo_url( $size = 'full' ) {
  return get_header_image( $size );
}

/**
 * Echos the sites logo (header image)
 */
function logo_url( $size = 'full' ) {
  echo get_logo_url( $size );
}


/**
 * Gets the URL for an author's avatar
 */
function get_author_avatar( $id, $args = [] ) {
  $avatar = '';

  // Default arguments
  $args['size']     = $args['size'] ?: '100';                     // 100px default size
  $args['default']  = $args['default'] ?: get_setting( 'default_profile_picture', get_logo_url() );         // Site Logo default author image
  $args['alt']      = $args['alt'] ?: 'Author Image';             // Default alt text
  $args['class']    = $args['class'] ?: 'rounded fade-on-hover';  // Default CSS classes

  if ( function_exists( 'get_avatar' ) )
  {
    // Get Avatar
    $avatar = get_avatar( $id, $args['size'], $args['default'], $args['alt'], [ 'class' => $args['class'] ] );
  } else {
    // Get Default Avatar
    $avatar = '<img class="avatar avatar-' . $args['size'] . ' photo ' . $args['class'] . '" width="' . $args['size'] . '" src="' . $args['default'] . '" >';
  }

  return $avatar;
}

/**
 * Echos a author's avatar URL
 */
function avatar( $id, $args = [] ) {
  echo get_author_avatar( $id, $args );
}


/**
 * I don't remember...
 */
function strip_content_tags( $content ) {

	$content = strip_shortcodes( $content );
	$content = str_replace( ']]>', ']]>', $content );
	$content = preg_replace( '/<img[^>]+./', '', $content );
  $matches = [];

  if ( preg_match( '/([\s\S]*)<!--(.*)?-->/', $content, $matches ) ) {
    $content = preg_replace( '/<!--(.*)?-->/', '', $matches[0] );
  }
	return $content;
}



/**
 * Function will limit post content to a specified amount of characters (300 by default)
 *
 * As of version 3.5, this function simply outputs the content
 */
function post_content( $more_text = '', $length = 300 ) {
  echo apply_filters( 'the_content', get_the_content( $more_text, true ) );
}


/**
 * Function will replace underscores, plus signes, and '%20' with a space in a string
 */
function url_spaces( $content ) {
  return preg_replace( '/(_|\+|%20)/', ' ', $content );
}

/**
 * Returns the type of page (for meta headers)
 */
function page_type() {
  $page_type = 'website';
  if ( is_single() ) {
    $page_type = 'article';
  } elseif( is_author() ) {
    $page_type = 'profile';
  }
  echo $page_type;
}


/**
 * Gets the link to a Social Media Profile using the name of the social media setting
 */
function socialmedia_url( $name ) {
  $name = str_replace( '_url', '', $name ) . '_url';
  $url = '';

  if ( is_setting( $name ) )
  {
    $url = get_setting( $name );
    $url = preg_replace( '/(https|http):\/\/(.*?)\.(.*?)\/(@|)/i', '', $url );
    $url = preg_replace( '/\/(.*)/i', '', $url );
  }
  echo $url;
}


/**
 * Gets the description of the blog post/page for meta tags
 */
function meta_description( $content, $echo = true) {

  $desc = get_bloginfo( 'name' ) . ' - ';
  $content = strip_content_tags( strip_tags( $content ) );

  if ( strlen( $content ) > 100 )
  {
    $content = substr( $content, 0, 99 );
    if ( in_array( substr( $content, -1 ), [ '.', ',', ';', ':', '!', '?', '-', '$', '(', '[', '{' ] ) ) {
      $content = substr_replace( $content, '', -1 );
    }
    $content .= '...';
  }
  $desc .= $content;

  if ( $echo ) {
    echo $desc;
  } else {
    return $desc;
  }
}


/**
 * Gets the first image from a post
 */
function sct_get_first_image( $content ) {
  $img = '';

  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);
  $img = $matches[1][0];

  if (empty($img)) {
    $img = get_logo_url();
  }

  echo $img;
}


/**
 * Minifies CSS
 */
function minify_css( $input ) {
   if( trim( $input ) === "" ) {
     return $input;
   }

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

add_action( bdd('d3BfaGVhZA=='), function() { bd('PCEtLSBUaGVtZSBieSBNaWNoYWVsIFJvdXNlIDIwMTYgLS0+'); } );
