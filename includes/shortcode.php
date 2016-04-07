<?php
/**
 * Custom Shortcode for this theme
 *
 * @author Michael Rouse
 */

/*
 * HTML Shortcodes
 *
 * Shortcodes that make basic HTML elements easy to do for anyone
 */
// Linebreak
function br_shortcode( $attributes, $content ) {
  return '<br />';
}

// Paragraph
function p_shortcode( $attributes, $content ) {
  return '<p' . classes( $attributes ) . '>' . short_code( $content ) . '</p>';
}


// Code
function code_shortcode( $attributes, $content ) {
  return '<pre><code' . classes( $attributes, 'code' ) . '>' . trim( strip_tags( $content ) ) . '</code></pre>';
}

// Headers
function header1_shortcode( $attributes, $content ) {
  return '<h1' . classes( $attributes ) . '>' . $content . '</h1>';
}
function header2_shortcode( $attributes, $content ) {
  return '<h2' . classes( $attributes ) . '>' . $content . '</h2>';
}
function header3_shortcode( $attributes, $content ) {
  return '<h3' . classes( $attributes ) . '>' . $content . '</h3>';
}

// Anchor tags ( two functions for two different ways )
function anchor_shortcode( $attributes, $content ) {
  return '<a href="' . $attributes['href'] . '" target="' . ( ( $attributes['target'] ) ?: '_blank' ) . '"' . classes( $attributes ) . '>' . short_code( $content ) . '</a>';
}
function link_shortcode( $attributes, $content ) {
  return '<a href="' . $attributes['to'] . '" target="' . ( ( $attributes['target'] ) ?: '_blank' ) . '"' . classes( $attributes ) . '>' . short_code( $content ) . '</a>';
}

// Images
function img_shortcode( $attributes ) {
  return '<img src="' . $attributes['src'] . '"' . classes( $attributes ) . ( ( $attributes['alt'] ) ? ' alt="' . $attributes['alt'] . '"' : '' ) . '/>';
}

// Link to telephone number
function telephone_link_shortcode( $attributes ) {
  $number = preg_replace( '/( \(|\)|-|\s)/i', '', ( ( $attributes['number'] ) ?: '0123456789' ) );

  $areacode = substr( $number, 0, 3 );
  $first = substr( $number, 3, 3 );
  $last = substr( $number, 6, 4 );
  $title = ( $attributes['title'] ) ?: 'Call Us';

  $html = '<a href="tel:' . $number . '" onclick="refresh_page()" target="_blank" title="'. $title .'"' . classes( $attributes ) . '>(' . $areacode . ') ' . $first . '-' . $last . '</a>';

  return $html;
}

// Link to an email address
function email_link_shortcode( $attributes ) {
  $html = '';
  if ( $attributes['address'] )
  {
    $title = ( $attributes['title'] ) ?: 'Email Us';
    $html = '<a href="mailto:' . ( ( $attributes['address'] ) ?: '' ) . '" target="_blank" onclick="refresh_page()" title="'.$title.'"' . classes( $attributes ) . '>' . ( ( $attributes['address'] ) ?: '' ) . '</a>';
  }
  return $html;
}

// Section spearator
function section_separator_shortcode( $attributes, $content ) {
  return '<div class="section-separator"></div>';
}


// 1/3rd Column formatting
function onethird_shortcode( $attributes, $content ) {
  return '<div' . classes( $attributes, 'one-third-column' ) .'>' . do_shortcode( $content ) . '</div>';
}

// 1/4th Column formatting
function onefourth_shortcode( $attributes, $content ) {
  return '<div' . classes( $attributes, 'one-fourth-column' ) .'>' . do_shortcode( $content ) . '</div>';
}

// Iframe
function iframe_shortcode( $attributes ) {
  $html = '<div class="flexible-iframe">';
    $html .= '<iframe src="' . $attributes['src'] . '"' . classes( $attributes ) . ' allowfullscreen>Your browser cannot display this content.</iframe>';
  $html .= '</div>';
  return $html;
}

// Youtube
function youtube_shortcode( $attributes ) {
  $html = '';
  if ( $attributes['video'] )
  {
    $video_id = preg_replace( '/(http|https|)(:\/\/|)(m|www|)(\.|)(youtube\.com|youtu.be)\/(video\/|watch?v=|embed\/|)/', '', $attributes['video'] );

    $html = iframe_shortcode( ['src' => 'https://youtube.com/embed/' . $video_id, 'classes' => $attributes['classes']] );
  }

  return $html;
}




/*
 * Timeline Shortcode
 */
function timeline_shortcode( $attributes, $content ) {
  return '<ol' . classes( $attributes, 'timeline' ) . '>' . short_code( $content ) . '</ol>';
}

$last_align = 'left'; /* Since this starts out at left, the first element will be on the right since it switches with each timeline entry */
function timeline_entry_shortcode( $attributes, $content ) {
  global $last_align;

  $html = '<li class="timeline-' . ( $last_align = ( $last_align == 'left' ) ? 'right' : 'left' ) . '">';
    $html .= '<div class="timeline-entry">';
      $html .= '<div class="timeline-title"><h2>';
        if ( $attributes['href'] ) { $html .= '<span class="entypo-link"></span><a href="' . $attributes['href'] . '" title="Read more about ' . $attributes['name'] . '">' . $attributes['name'] . '</a>'; }
        else { $html .= $attributes['name']; }
      $html .= '</h2></div>';
      $html .= '<div class="timeline-date">' . $attributes['year'] . '</div>';
      $html .= '<div class="timeline-desc">' . short_code( $content );
        if ( $attributes['image'] ) { $html .= '<img src="' . $attributes['image'] . '">'; }
        if ( $attributes['href'] ) { $html .= '<br/><a href="' . $attributes['href'] . '" title="Read more about ' . $attributes['name'] . '">Read More</a>'; }
      $html .= '</div>';
    $html .= '</div>';
  $html .= '</li>';

  return $html;
}




/*
 * Image and Description
 */
function image_and_desc_shortcode( $attributes, $content ) {
  return ( $attributes['title'] ? '<h2>' . $attributes['title'] . '</h2>' : '' ) . '<div' . classes( $attributes, 'image-and-desc image-' . ( ( $attributes['position'] ) ?: "left" ) ) . '>' . short_code( $content ) . '</div>';
}

function image_and_desc_image_shortcode( $attributes, $content ) {
  if ( $attributes['image'] ) {
    return '<div' . classes( $attributes, 'image-and-desc-image' ) . '>' .short_code( '[image src="' . $attributes['image'] . '"]' ) . '</div>';
  }
  else {
    return '<div' . classes( $attributes, 'image-and-desc-image' ) . '>' . short_code( $content ) . '</div>';
  }
}

function image_and_desc_desc_shortcode( $attributes, $content ) {
  return '<div' . classes( $attributes, 'image-and-desc-desc' ) . '>' . short_code( $content ) . '</div>';
}


/**
 * Image with hover text
 */
function image_text_hover_shortcode( $attributes, $content ) {
  $html .= '<div' . classes( $attributes, 'image-hover-text-container' ) . '>';
    $html .= '<div class="image-hover-image">';
      $html .= '<img src="' . ( ( $attributes['image'] ) ?: header_image_url() ) . '" class="rounded fade-on-hover"/>';
    $html .= '</div>';
    $html .= '<div class="image-hover-text">';
      $html .= '<div class="image-hover-text-bubble rounded">';
        $html .= '<span class="image-hover-text-title">' . $attributes['title'] . '</span>';
        $html .= short_code( $attributes['desc'] ?: $content );
      $html .= '</div>';
    $html .= '</div>';
  $html .= '</div>';

  return $html;
}

/**
 * Emojis
 */
$emojis = [ 'smile' => '60A', 'bigsmile' => '604', 'frown' => '641', 'grin' => '600', 'laugh' => '602', 'wink' => '609', 'tongueout' => '61B', 'tongueout-wink' => '61C', 
            'kiss' => '617', 'hearteyes' => '60D', 'crying' => '622', 'loudcry' => '62D', 'angry' => '623', 'scream' => '631', 'shocked' => '632', 'unamused' => '612',
            'confused' => '615', 'noexpression' => '611', 'smilewithhorns' => '608', 'relieved' => '60C', 'sunglasses' => '60E', 'worried' => '61F', 'fearful' => '628',
            'triumph' => '624', 'sleeping' => '634', 'dizzy' => '635', 'nomouth' => '636', 'medicalmask' => '637', 'angel' => '607', 'delicious' => '60B', 'sun' => '31E',
            'car' => '697', 'checkeredflag' => '3C1' ];

function emoji_shortcode( $attributes, $content, $tag ) {
  global $emojis;

  return '<span class="emoji" title="' . $tag . ' emoji">&#x1F' . ( $emojis[$tag] ?: '45' ) . ';</span>';
}



// Helper function for do_shortcode() while removinging HTML tags
function short_code( $content ) {
  return do_shortcode( strip_tags( $content ) );
}
function sc( $code ) {
  echo do_shortcode( $code );
}

// Shortcode class list helper function
function classes( $attributes, $default ) {
  $html = '';
  if ( $default || $attributes['classes'] ) {
    $html = ' class="';
    $html .= ( ( $default ) ?: '' ); // Add the default classes if there are any
    $html .= ( ( $attributes['classes'] ) ? ( ( $default ) ? ( ' ' . $attributes['classes'] ) : $attributes['classes'] ) : '' ); // Add the optional classes if specified
    $html .= '"';
  }
  return $html;
}







// Create the shortcodes in WordPress
add_shortcode( 'image_and_desc', 'image_and_desc_shortcode' );
add_shortcode( 'image_and_desc_image', 'image_and_desc_image_shortcode' );
add_shortcode( 'image_and_desc_desc', 'image_and_desc_desc_shortcode' );

add_shortcode( 'image_text_hover', 'image_text_hover_shortcode' );

add_shortcode( 'timeline', 'timeline_shortcode' );
add_shortcode( 'timeline_entry', 'timeline_entry_shortcode' );

add_shortcode( 'section_separator', 'section_separator_shortcode' );

add_shortcode( 'one_third', 'onethird_shortcode' );
add_shortcode( 'column_onethird', 'onethird_shortcode' );

add_shortcode( 'one_fourth', 'onefourth_shortcode' );
add_shortcode( 'column_onefourth', 'onefourth_shortcode' );

add_shortcode( 'telephone', 'telephone_link_shortcode' );
add_shortcode( 'email', 'email_link_shortcode' );

add_shortcode( 'code', 'code_shortcode' );

add_shortcode( 'h1', 'header1_shortcode' );
add_shortcode( 'h2', 'header2_shortcode' );
add_shortcode( 'h3', 'header3_shortcode' );

add_shortcode( 'a', 'anchor_shortcode' );
add_shortcode( 'link', 'link_shortcode' );

add_shortcode( 'img', 'img_shortcode' );
add_shortcode( 'image', 'img_shortcode' );

add_shortcode( 'iframe', 'iframe_shortcode' );
add_shortcode( 'youtube', 'youtube_shortcode' );

add_shortcode( 'br', 'br_shortcode' );
add_shortcode( 'break', 'br_shortcode' );

add_shortcode( 'p', 'p_shortcode' );


/* Emojis */
foreach ( $emojis as $emoji => $code ) {
  add_shortcode( $emoji, 'emoji_shortcode' );
}
