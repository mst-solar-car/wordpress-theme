<?php
/**
 * Custom Shortcode for this theme
 *
 * @author Michael Rouse
 */

// Line break
register_shortcode( 'br', function ( $attributes, $content ) {
  $result = "<br/>";
  if ( $attributes['count'] )
  {
      for ($i = 1; $i < (int)$attributes['count']; $i++) {
        $result .= "<br/>";
      }
  }

  return $result;
}, ['break'] );


// Paragraph
register_shortcode( 'p', function( $attributes, $content ) {
  return '<p' . classes( $attributes ) . '>' . short_code( $content ) . '</p>';
} );


// Tab
register_shortcode( 'tab', function( $content ) {
  return '&nbsp;&nbsp;&nbsp;&nbsp;';
} );


// Code
register_shortcode( 'code', function( $attributes, $content ) {
  $language = $attributes['language'] ?: ($attributes['lang'] ?: '' );

  return '<pre '. classes($attributes, 'code' . ( !empty($language) ? ' lang:' . $language . ' decode:true' : '' ) ) .'>' . trim( strip_tags( $content ) ) . '</pre>';
} );


// Headers
register_shortcode( 'h1', function( $attributes, $content ) {
  return '<h1' . classes( $attributes ) . '>' . do_shortcode( $content ) . '</h1>';
} );

register_shortcode( 'h2', function( $attributes, $content ) {
  return '<h2' . classes( $attributes ) . '>' . do_shortcode( $content ) . '</h2>';
} );

register_shortcode( 'h3', function( $attributes, $content ) {
  return '<h3' . classes( $attributes ) . '>' . do_shortcode( $content ) . '</h3>';
} );


// Anchor tags
register_shortcode( 'a', function( $attributes, $content ) {
  return '<a href="' . ($attributes['href'] ?: $attributes['to'] ) . '" target="' . ($attributes['target'] ?: '_blank') . '"' .
          classes($attributes) . '>' . do_shortcode( $content ) . '</a>';
}, ['link'] );


// Image
register_shortcode( 'img', function( $attributes, $content ) {
  return '<img src="' . $attributes['src'] . '"' . classes( $attributes ) . ($attributes['alt'] ? ' alt="' . $attributes['alt'] . '"' : '') . '/>';
}, ['image'] );


// Telephone
register_shortcode( 'telephone', function( $attributes, $content ) {
  $number = preg_replace( '/( \(|\)|-|\s)/i', '', ( ( $attributes['number'] ) ?: '0123456789' ) );

  $areacode = substr( $number, 0, 3 );
  $first = substr( $number, 3, 3 );
  $last = substr( $number, 6, 4 );
  $title = ( $attributes['title'] ) ?: 'Call Us';

  $html = '<a href="tel:' . $number . '" onclick="refresh_page()" target="_blank" title="'. $title .'"' . classes( $attributes ) . '>(' . $areacode . ') ' . $first . '-' . $last . '</a>';

  return $html;
}, ['phone'] );


// Email
register_shortcode( 'email', function( $attributes ) {
  $html = '';
  if ( $attributes['address'] )
  {
    $title = ( $attributes['title'] ) ?: 'Email Us';
    $html = '<a href="mailto:' . ( ( $attributes['address'] ) ?: '' ) . '" target="_blank" onclick="refresh_page()" title="'.$title.'"' . classes( $attributes ) . '>' . ( ( $attributes['address'] ) ?: '' ) . '</a>';
  }
  return $html;
} );


// Section separator
register_shortcode( 'hr', function( ) {
  return '<div class="section-separator"></div>';
}, ['section_separator', 'separator'] );


// Split (float) left
register_shortcode( 'split_left', function( $attributes, $content ) {
  return '<div class="split-left">' . do_shortcode( $content ) . '</div>';
}, ['left'] );


// Split (float) Right
register_shortcode( 'split_right', function( $attributes, $content ) {
  return '<div class="split-right">' . do_shortcode( $content ) . '</div>';
 }, ['right']);


// IFrame
register_shortcode( 'responsive_iframe', function( $attributes ) {
  if ( !$attributes['src'] ) return '';

  $html = '<div class="flexible-iframe">';
    $html .= '<iframe src="' . $attributes['src'] . '"' . classes( $attributes ) .
              ' allowfullscreen>Your browser cannot display this content.</iframe>';
  $html .= '</div>';
  return $html;
}, ['sct_iframe', 'iframe'] );


// YouTube
register_shortcode( 'youtube', function( $attributes ) {
  if ( !$attributes['video'] ) return '';

  $html = '';
  if ( $attributes['video'] )
  {
    $video_id = preg_replace( '/(http|https|)(:\/\/|)(m|www|)(\.|)(youtube\.com|youtu.be)\/(video\/|watch?v=|embed\/|)/', '', $attributes['video'] );

    $html = do_shortcode( '[responsive_iframe src="https://youtube.com/embed/' . $video_id . '" classes="' . ($attributes['classes'] ?: '') . '"][/responsive_iframe]' );

    //sct_iframe_shortcode( ['src' => 'https://youtube.com/embed/' . $video_id, 'classes' => $attributes['classes']] );
  }

  return $html;
} );


// Timeline
register_shortcode( 'timeline', function( $attributes, $content ) {
  return '<ol' . classes( $attributes, 'timeline' ) . '>' . do_shortcode( $content ) . '</ol>';
} );


// Timeline Entry
$last_align = 'left'; /* Since this starts out at left, the first element will be on the right since it switches with each timeline entry */

register_shortcode( 'timeline_entry', function( $attributes, $content ) {
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
} );


// Image and Description
register_shortcode( 'image_and_desc', function( $attributes, $content ) {
  return ( $attributes['title'] ? '<h2>' . $attributes['title'] . '</h2>' : '' ) . '<div' .
          classes( $attributes, 'image-and-desc image-' . ( ( $attributes['position'] ) ?: "left" ) ) . '>' .
          do_shortcode( $content ) . '</div>';
} );


// Image and Description Image
register_shortcode( 'image_and_desc_image', function( $attributes, $content ) {
  if ( $attributes['image'] ) {
    return '<div' . classes( $attributes, 'image-and-desc-image' ) . '>' .
            do_shortcode( '[image src="' . $attributes['image'] . '"]' ) . '</div>';
  }
  else {
    return '<div' . classes( $attributes, 'image-and-desc-image' ) . '>' .
            do_shortcode( $content ) . '</div>';
  }
} );


// Image and Description Description
register_shortcode( 'image_and_desc_desc', function( $attributes, $content ) {
  return '<div' . classes( $attributes, 'image-and-desc-desc' ) . '>' .
          do_shortcode( $content ) . '</div>';
} );


// Image with hover text
register_shortcode( 'image_text_hover', function( $attributes, $content ) {
  $html .= '<div' . classes( $attributes, 'image-hover-text-container' ) . '>';
    $html .= '<div class="image-hover-image">';
      $html .= '<img src="' . ( $attributes['image'] ?: header_image_url() ) . '" class="rounded fade-on-hover"/>';
    $html .= '</div>';
    $html .= '<div class="image-hover-text">';
      $html .= '<div class="image-hover-text-bubble rounded">';
        $html .= '<span class="image-hover-text-title">' . $attributes['title'] . '</span>';
        $html .= do_shortcode( $attributes['desc'] ?: $content );
      $html .= '</div>';
    $html .= '</div>';
  $html .= '</div>';

  return $html;
} );


/**
 * Emojis
 */
$sct_emojis = array( 'smile' => '60A', 'bigsmile' => '604', 'frown' => '641',
  'grin' => '600', 'laugh' => '602', 'wink' => '609', 'tongueout' => '61B',
  'tongueout-wink' => '61C', 'kiss' => '617', 'hearteyes' => '60D',
  'crying' => '622', 'loudcry' => '62D', 'angry' => '623', 'scream' => '631',
  'shocked' => '632', 'unamused' => '612', 'confused' => '615',
  'noexpression' => '611', 'smilewithhorns' => '608', 'relieved' => '60C',
  'sunglasses' => '60E', 'worried' => '61F', 'fearful' => '628',
  'triumph' => '624', 'sleeping' => '634', 'dizzy' => '635', 'nomouth' => '636',
  'medicalmask' => '637', 'angel' => '607', 'delicious' => '60B', 'sun' => '31E',
  'car' => '697', 'checkeredflag' => '3C1'
);

foreach( $sct_emojis as $emoji ) {
  register_shortcode( $emoji, function( $attributes, $content, $tag ) {
    global $sct_emojis;

    return '<span class="emoji" title="' . $tag . ' emoji">&#x1F' . ( $sct_emojis[$tag] ?: '31E' ) . ';</span>';
  } );
}


// Image Gallery
$lazyLoadingIcon = "";

register_shortcode( 'image_gallery', function( $attributes, $content ) {
  global $lazyLoadingIcon;
  $lazyLoadingIcon = $attributes['loader'];

  return '<div class="imageGallery">' . do_shortcode( $content ) . '</div>';
} );

// Image Gallery Image
register_shortcode( 'gallery_image', function( $attributes ) {
  global $lazyLoadingIcon;

  return '<div class="imageGallery_container"><img src="' . $lazyLoadingIcon .
          '" data-lazyLoadSrc="' . $attributes['img'] . '"' .
          classes( $attributes, 'zoomIn imageGallery_img' ) .
          ( $attributes['alt'] ? ' alt="' . $attributes['alt'] . '"' : '' ) .
          '/></div>';
} );


// Lazy Load Image
register_shortcode( 'lazy_image', function( $attributes ) {
  if ( !$attributes['loader'] || !$attributes['img'] )
    return 'Lazy Loaded images require an attribute of \'loader\' and \'img\'';

  return '<img src="' . $attributes['loader'] . '" data-lazyLoadSrc="' .
          $attributes['img'] . '"' . classes( $attributes, 'zoomIn' ) .
          ( $attributes['alt'] ? ' alt="' . $attributes['alt'] . '"' : '' ) .
          '/>';
} );


// Zoomable Image
register_shortcode( 'zoom_image', function( $attributes ) {
  return '<img src="' . $attributes['src'] . '"' .
          classes( $attributes, 'zoomIn' ) . ( $attributes['alt'] ? ' alt="' .
          $attributes['alt'] . '"' : '' ) . '/>';
} );




/**
 * Grid
 */
register_shortcode( 'grid', function( $attributes, $content ) {
    return '<div ' . classes( $attributes, 'grid' ) . ' >' .
            do_shortcode( $content ) . '</div>';
} );


// Grid half
register_shortcode( 'grid_half', function( $attributes, $content ) {
  return '<div ' . classes( $attributes, 'cell cell-one-half' ) . ' >' .
          do_shortcode( $content ) . '</div>';
} );


// Grid third
register_shortcode( 'grid_third', function( $attributes, $content ) {
  return '<div ' . classes( $attributes, 'cell cell-one-third' ) . ' >' .
          do_shortcode( $content ) . '</div>';
} );

// One Half
register_shortcode( 'col_half', function( $attributes, $content ) {
  return '<div ' . classes( $attributes, 'col col-half' ) . ' >' .
          do_shortcode( $content ) . '</div>';
} );

// One Third
register_shortcode( 'col_third', function( $attributes, $content ) {
  return '<div ' . classes( $attributes, 'col col-third' ) . ' >' .
          do_shortcode( $content ) . '</div>';
} );

// One Fourth
register_shortcode( 'col_fourth', function( $attributes, $content ) {
  return '<div ' . classes( $attributes, 'col col-fourth' ) . ' >' .
          do_shortcode( $content ) . '</div>';
} );

// One Fifth
register_shortcode( 'col_fifth', function( $attributes, $content ) {
  return '<div ' . classes( $attributes, 'col col-fifth' ) . ' >' .
          do_shortcode( $content ) . '</div>';
} );



// 1/3rd Column
register_shortcode( 'one_third', function( $attributes, $content ) {
  return '<div' . classes( $attributes, 'one-third-column' ) .'>' .
          do_shortcode( $content ) . '</div>';
}, ['column_onethird'] );


// 1/4th Column
register_shortcode( 'one_fourth', function( $attributes, $content ) {
  return '<div' . classes( $attributes, 'one-fourth-column' ) .'>' .
          do_shortcode( $content ) . '</div>';
}, ['column_onefourth'] );




/**
 * Function to register shortcode
 */
function register_shortcode ( $shortcode_name, $fn, $aliases = [] ) {
  // Register the shortcode if it doesn't exist
  if ( !shortcode_exists( $shortcode_name ) ) {
    add_shortcode( $shortcode_name, $fn );
  }

  // Register aliases
  foreach ( $aliases as $alias ) {
    register_shortcode( $alias, $fn ); // Yup, recursive
  }
}




// Helper function for do_shortcode() while removinging HTML tags
function shortcode ( $content ) {
  return short_code ( $content );
}
function short_code( $content ) {
  return do_shortcode( strip_tags( $content ) );
}
function sc( $code ) {
  echo do_shortcode( $code );
}

/**
 * Helper function to get classes from the attributes
 */
function classes( $attributes, $default ) {
  $html = '';
  if ( $default || $attributes['classes'] || $attributes['class'] ) {
    $classes = $attributes['classes'] ?: ($attributes['class'] ?: '');
    $html = ' class="';
    $html .= $default ?: '' ; // Add the default classes if there are any
    $html .= $classes ? ( $default ? ( ' ' . $classes ) : $classes ) : '' ; // Add the optional classes if specified
    $html .= '"';
  }
  return $html;
}
