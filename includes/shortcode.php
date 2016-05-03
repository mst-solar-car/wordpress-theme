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
function sct_br_shortcode( $attributes, $content ) {
  return '<br />';
}

// Paragraph
function sct_p_shortcode( $attributes, $content ) {
  return '<p' . classes( $attributes ) . '>' . short_code( $content ) . '</p>';
}


// Code
function sct_code_shortcode( $attributes, $content ) {
  return '<pre><code' . classes( $attributes, 'code' ) . '>' . trim( strip_tags( $content ) ) . '</code></pre>';
}

// Headers
function sct_header1_shortcode( $attributes, $content ) {
  return '<h1' . classes( $attributes ) . '>' . $content . '</h1>';
}
function sct_header2_shortcode( $attributes, $content ) {
  return '<h2' . classes( $attributes ) . '>' . $content . '</h2>';
}
function sct_header3_shortcode( $attributes, $content ) {
  return '<h3' . classes( $attributes ) . '>' . $content . '</h3>';
}

// Anchor tags ( two functions for two different ways )
function sct_anchor_shortcode( $attributes, $content ) {
  return '<a href="' . $attributes['href'] . '" target="' . ( ( $attributes['target'] ) ?: '_blank' ) . '"' . classes( $attributes ) . '>' . short_code( $content ) . '</a>';
}
function sct_link_shortcode( $attributes, $content ) {
  return '<a href="' . $attributes['to'] . '" target="' . ( ( $attributes['target'] ) ?: '_blank' ) . '"' . classes( $attributes ) . '>' . short_code( $content ) . '</a>';
}

// Images
function sct_img_shortcode( $attributes ) {
  return '<img src="' . $attributes['src'] . '"' . classes( $attributes ) . ( ( $attributes['alt'] ) ? ' alt="' . $attributes['alt'] . '"' : '' ) . '/>';
}

// Link to telephone number
function sct_telephone_link_shortcode( $attributes ) {
  $number = preg_replace( '/( \(|\)|-|\s)/i', '', ( ( $attributes['number'] ) ?: '0123456789' ) );

  $areacode = substr( $number, 0, 3 );
  $first = substr( $number, 3, 3 );
  $last = substr( $number, 6, 4 );
  $title = ( $attributes['title'] ) ?: 'Call Us';

  $html = '<a href="tel:' . $number . '" onclick="refresh_page()" target="_blank" title="'. $title .'"' . classes( $attributes ) . '>(' . $areacode . ') ' . $first . '-' . $last . '</a>';

  return $html;
}

// Link to an email address
function sct_email_link_shortcode( $attributes ) {
  $html = '';
  if ( $attributes['address'] )
  {
    $title = ( $attributes['title'] ) ?: 'Email Us';
    $html = '<a href="mailto:' . ( ( $attributes['address'] ) ?: '' ) . '" target="_blank" onclick="refresh_page()" title="'.$title.'"' . classes( $attributes ) . '>' . ( ( $attributes['address'] ) ?: '' ) . '</a>';
  }
  return $html;
}

// Section spearator
function sct_section_separator_shortcode( $attributes, $content ) {
  return '<div class="section-separator"></div>';
}


// 1/3rd Column formatting
function sct_onethird_shortcode( $attributes, $content ) {
  return '<div' . classes( $attributes, 'one-third-column' ) .'>' . do_shortcode( $content ) . '</div>';
}

// 1/4th Column formatting
function sct_onefourth_shortcode( $attributes, $content ) {
  return '<div' . classes( $attributes, 'one-fourth-column' ) .'>' . do_shortcode( $content ) . '</div>';
}

// Split Left
function sct_splitleft_shortcode( $attributes, $content ) {
  return '<div class="split-left">' . do_shortcode( $content ) . '</div>';
}

// Split Right
function sct_splitright_shortcode( $attributes, $content ) {
  return '<div class="split-right">' . do_shortcode( $content ) . '</div>';
}

// Iframe
function sct_iframe_shortcode( $attributes ) {
  $html = '<div class="flexible-iframe">';
    $html .= '<iframe src="' . $attributes['src'] . '"' . classes( $attributes ) . ' allowfullscreen>Your browser cannot display this content.</iframe>';
  $html .= '</div>';
  return $html;
}

// Youtube
function sct_youtube_shortcode( $attributes ) {
  $html = '';
  if ( $attributes['video'] )
  {
    $video_id = preg_replace( '/(http|https|)(:\/\/|)(m|www|)(\.|)(youtube\.com|youtu.be)\/(video\/|watch?v=|embed\/|)/', '', $attributes['video'] );

    $html = sct_iframe_shortcode( ['src' => 'https://youtube.com/embed/' . $video_id, 'classes' => $attributes['classes']] );
  }

  return $html;
}




/*
 * Timeline Shortcode
 */
function sct_timeline_shortcode( $attributes, $content ) {
  return '<ol' . classes( $attributes, 'timeline' ) . '>' . short_code( $content ) . '</ol>';
}

$last_align = 'left'; /* Since this starts out at left, the first element will be on the right since it switches with each timeline entry */
function sct_timeline_entry_shortcode( $attributes, $content ) {
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
function sct_image_and_desc_shortcode( $attributes, $content ) {
  return ( $attributes['title'] ? '<h2>' . $attributes['title'] . '</h2>' : '' ) . '<div' . classes( $attributes, 'image-and-desc image-' . ( ( $attributes['position'] ) ?: "left" ) ) . '>' . short_code( $content ) . '</div>';
}

function sct_image_and_desc_image_shortcode( $attributes, $content ) {
  if ( $attributes['image'] ) {
    return '<div' . classes( $attributes, 'image-and-desc-image' ) . '>' .short_code( '[image src="' . $attributes['image'] . '"]' ) . '</div>';
  }
  else {
    return '<div' . classes( $attributes, 'image-and-desc-image' ) . '>' . short_code( $content ) . '</div>';
  }
}

function sct_image_and_desc_desc_shortcode( $attributes, $content ) {
  return '<div' . classes( $attributes, 'image-and-desc-desc' ) . '>' . short_code( $content ) . '</div>';
}


/**
 * Image with hover text
 */
function sct_image_text_hover_shortcode( $attributes, $content ) {
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
$sct_emojis = array( 'smile' => '60A', 'bigsmile' => '604', 'frown' => '641', 'grin' => '600', 'laugh' => '602', 'wink' => '609', 'tongueout' => '61B', 'tongueout-wink' => '61C',
            'kiss' => '617', 'hearteyes' => '60D', 'crying' => '622', 'loudcry' => '62D', 'angry' => '623', 'scream' => '631', 'shocked' => '632', 'unamused' => '612',
            'confused' => '615', 'noexpression' => '611', 'smilewithhorns' => '608', 'relieved' => '60C', 'sunglasses' => '60E', 'worried' => '61F', 'fearful' => '628',
            'triumph' => '624', 'sleeping' => '634', 'dizzy' => '635', 'nomouth' => '636', 'medicalmask' => '637', 'angel' => '607', 'delicious' => '60B', 'sun' => '31E',
            'car' => '697', 'checkeredflag' => '3C1'
          );

function sct_emoji_shortcode( $attributes, $content, $tag ) {
  global $sct_emojis;

  return '<span class="emoji" title="' . $tag . ' emoji">&#x1F' . ( $sct_emojis[$tag] ?: '31E' ) . ';</span>';
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
if ( !shortcode_exists( 'image_and_desc' ) ) {
  add_shortcode( 'image_and_desc', 'sct_image_and_desc_shortcode' );
}
if ( !shortcode_exists( 'image_and_desc_image' ) ) {
  add_shortcode( 'image_and_desc_image', 'sct_image_and_desc_image_shortcode' );
}
if ( !shortcode_exists( 'image_and_desc_desc' ) ) {
  add_shortcode( 'image_and_desc_desc', 'sct_image_and_desc_desc_shortcode' );
}

if ( !shortcode_exists( 'image_text_hover' ) ) {
  add_shortcode( 'image_text_hover', 'sct_image_text_hover_shortcode' );
}

if ( !shortcode_exists( 'timeline' ) ) {
  add_shortcode( 'timeline', 'sct_timeline_shortcode' );
}
if ( !shortcode_exists( 'timeline_entry' ) ) {
  add_shortcode( 'timeline_entry', 'sct_timeline_entry_shortcode' );
}

if ( !shortcode_exists( 'section_separator' ) ) {
  add_shortcode( 'section_separator', 'sct_section_separator_shortcode' );
}

if ( !shortcode_exists( 'one_third' ) ) {
  add_shortcode( 'one_third', 'sct_onethird_shortcode' );
}
if ( !shortcode_exists( 'column_onethird' ) ) {
  add_shortcode( 'column_onethird', 'sct_onethird_shortcode' );
}

if ( !shortcode_exists( 'one_fourth' ) ) {
  add_shortcode( 'one_fourth', 'sct_onefourth_shortcode' );
}
if ( !shortcode_exists( 'column_onefourth' ) ) {
  add_shortcode( 'column_onefourth', 'sct_onefourth_shortcode' );
}

if ( !shortcode_exists( 'split_left' ) ) {
  add_shortcode( 'split_left', 'sct_splitleft_shortcode' );
}
if ( !shortcode_exists( 'split_right' ) ) {
  add_shortcode( 'split_right', 'sct_splitright_shortcode' );
}

if ( !shortcode_exists( 'telephone' ) ) {
  add_shortcode( 'telephone', 'sct_telephone_link_shortcode' );
}

if ( !shortcode_exists( 'email' ) ) {
  add_shortcode( 'email', 'sct_email_link_shortcode' );
}

if ( !shortcode_exists( 'code' ) ) {
  add_shortcode( 'code', 'sct_code_shortcode' );
}

if ( !shortcode_exists( 'h1' ) ) {
  add_shortcode( 'h1', 'sct_header1_shortcode' );
}
if ( !shortcode_exists( 'h2' ) ) {
  add_shortcode( 'h2', 'sct_header2_shortcode' );
}
if ( !shortcode_exists( 'h3' ) ) {
  add_shortcode( 'h3', 'sct_header3_shortcode' );
}

if ( !shortcode_exists( 'a' ) ) {
  add_shortcode( 'a', 'sct_anchor_shortcode' );
}
if ( !shortcode_exists( 'link' ) ) {
  add_shortcode( 'link', 'sct_link_shortcode' );
}

if ( !shortcode_exists( 'img' ) ) {
  add_shortcode( 'img', 'sct_img_shortcode' );
}
if ( !shortcode_exists( 'image' ) ) {
  add_shortcode( 'image', 'sct_img_shortcode' );
}

if ( !shortcode_exists( 'responsive_iframe' ) ) {
  add_shortcode( 'responsive_iframe', 'sct_iframe_shortcode' );
}
if ( !shortcode_exists( 'youtube' ) ) {
  add_shortcode( 'youtube', 'sct_youtube_shortcode' );
}

if ( !shortcode_exists( 'br' ) ) {
  add_shortcode( 'br', 'sct_br_shortcode' );
}
if ( !shortcode_exists( 'break' ) ) {
  add_shortcode( 'break', 'sct_br_shortcode' );
}

if ( !shortcode_exists( 'p' ) ) {
  add_shortcode( 'p', 'sct_p_shortcode' );
}


/* Emojis */
foreach ( $sct_emojis as $emoji => $code ) {
  if ( !shortcode_exists( $emoji ) ) {
    add_shortcode( $emoji, 'sct_emoji_shortcode' );
  }
}
