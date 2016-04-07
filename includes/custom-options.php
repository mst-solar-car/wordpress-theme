<?php
/**
 * Adds custom options to the WordPress Customization screen for this theme
 *
 * @author Michael Rouse
 */
add_action( 'customize_register' , 'customize_options' );

function customize_options( $wp_customize ) {
   // Add Primary Color
   $wp_customize->add_setting( 'primary_color', [
     'default'   => DEFAULT_PRIMARY_COLOR,
     'transport' => 'refresh',
   ]);
   $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color', [
     'label'   => 'Primary Color (Not the setting above)',
     'section' => 'colors',
     'settings' => 'primary_color'
   ]));

 	// Add Secondary Color to theme settings
   $wp_customize->add_setting( 'secondary_color' , [
     'default'     => DEFAULT_SECONDARY_COLOR,
     'transport'   => 'refresh',
   ]);
   $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'secondary_color', [
     'label' => 'Secondary Color',
     'section' => 'colors',
     'settings' => 'secondary_color'
   ]));

   // Add Third Color to theme settings
   $wp_customize->add_setting( 'third_color', [
     'default'   => DEFAULT_THIRD_COLOR,
     'transport' => 'refresh',
   ]);
   $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'third_color', [
     'label'    => 'Navbar/Footer Color',
     'section'  => 'colors',
     'settings' => 'third_color',
   ]));

    // Add Loading Animation Color
    $wp_customize->add_setting( 'loading_color', [
      'default'   => DEFAULT_LOADING_COLOR,
      'transport' => 'refresh',
    ]);
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'loading_color', [
      'label'    => 'Loading Color',
      'section'  => 'colors',
      'settings' => 'loading_color',
    ]));
   // Text Color
   $wp_customize->add_setting( 'font_color', [
     'default' => DEFAULT_FONT_COLOR,
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
