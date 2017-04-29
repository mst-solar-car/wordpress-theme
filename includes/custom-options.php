<?php
/**
 * Adds custom options to the WordPress Customization screen for this theme
 *
 * @author Michael Rouse
 */
add_action( 'customize_register' , 'sct_customize_options' );

function sct_customize_options( $wp_customize ) {
  // Add Primary Color
  $wp_customize->add_setting( 'primary_color', array(
    'default'   => SCT_DEFAULT_PRIMARY_COLOR,
    'transport' => 'refresh',
  ) );
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color', array(
    'label'     => 'Primary Color (Not the setting above)',
    'section'   => 'colors',
    'settings'  => 'primary_color',
  ) ) );

  // Add Secondary Color to theme settings
  $wp_customize->add_setting( 'secondary_color' , array(
    'default'     => SCT_DEFAULT_SECONDARY_COLOR,
    'transport'   => 'refresh',
  ) );
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'secondary_color', array(
    'label'     => 'Secondary Color',
    'section'   => 'colors',
    'settings'  => 'secondary_color',
  ) ) );

  // Add Third Color to theme settings
  $wp_customize->add_setting( 'third_color', array(
    'default'   => SCT_DEFAULT_THIRD_COLOR,
    'transport' => 'refresh',
  ) );
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'third_color', array(
    'label'    => 'Navbar/Footer Color',
    'section'  => 'colors',
    'settings' => 'third_color',
  ) ) );

  // Add Loading Animation Color
  $wp_customize->add_setting( 'loading_color', array(
    'default'   => SCT_DEFAULT_LOADING_COLOR,
    'transport' => 'refresh',
  ) );
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'loading_color', array(
    'label'    => 'Loading Screen Font Color',
    'section'  => 'colors',
    'settings' => 'loading_color',
  ) ) );
  // Text Color
  $wp_customize->add_setting( 'font_color', array(
    'default'   => SCT_DEFAULT_FONT_COLOR,
    'transport' => 'refresh',
  ) );
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'font_color', array(
    'label'     => 'Font Color',
    'section'   => 'colors',
    'settings'  => 'font_color',
  ) ) );


  /*
  * Navbar Section
  */
  $wp_customize->add_section( 'navbar_settings', array(
    'title'       => 'Navigation Bar',
    'priority'    => 100,
    'capability'  => 'edit_theme_options',
    'description' => 'Customize the navigation bar',
  ) );

  // Title text
  $wp_customize->add_setting( 'title_top_long', array(
    'default'   => '',
    'transport' => 'refresh',
  ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'title_top_long', array(
    'label'     => 'Long Title Top Line',
    'section'   => 'navbar_settings',
    'settings'  => 'title_top_long',
  ) ) );

  $wp_customize->add_setting( 'title_bottom_long', array(
    'default'   => '',
    'transport' => 'refresh',
  ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'title_bottom_long', array(
    'label'     => 'Long Title Bottom Line',
    'section'   => 'navbar_settings',
    'settings'  => 'title_bottom_long',
  ) ) );

  $wp_customize->add_setting( 'title_top_short', array(
    'default'   => '',
    'transport' => 'refresh',
  ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'title_top_short', array(
    'label'     => 'Short Title Top Line',
    'section'   => 'navbar_settings',
    'settings'  => 'title_top_short',
  ) ) );

  $wp_customize->add_setting( 'title_bottom_short', array(
    'default'   => '',
    'transport' => 'refresh',
  ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'title_bottom_short', array(
    'label'     => 'Short Title Bottom Line',
    'section'   => 'navbar_settings',
    'settings'  => 'title_bottom_short',
  ) ) );

  // Menu Button Text
  $wp_customize->add_setting( 'menu_btn_text', array(
    'default'   => 'Menu',
    'transport' => 'refresh',
  ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'menu_btn_text', array(
    'label'     => 'Menu Button Text',
    'section'   => 'navbar_settings',
    'settings'  => 'menu_btn_text',
  ) ) );


  // Include Social Media
  $wp_customize->add_setting( 'include_social_media', array(
    'default'   => '',
    'transport' => 'refresh',
  ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'include_social_media', array(
    'label'     => 'Include Social Media Links',
    'section'   => 'navbar_settings',
    'settings'  => 'include_social_media',
    'type'      => 'checkbox',
    'choices'   => array( 'yes' => 'y' ),
  ) ) );

  // Facebook Page
  $wp_customize->add_setting( 'facebook_url', array(
    'default'   => '',
    'transport' => 'refresh',
  ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'facebook_url', array(
    'label'     => 'Facebook (facebook.com/your_name)',
    'section'   => 'navbar_settings',
    'settings'  => 'facebook_url',
  ) ) );

  // Twitter URL
  $wp_customize->add_setting( 'twitter_url', array(
    'default'   => '',
    'transport' => 'refresh',
  ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'twitter_url', array(
    'label'     => 'Twitter Handle (@your_name)',
    'section'   => 'navbar_settings',
    'settings'  => 'twitter_url',
  ) ) );

  // Instagram Url
  $wp_customize->add_setting( 'instagram_url', array(
    'default'   => '',
    'transport' => 'refresh',
  ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'instagram_url', array(
    'label'     => 'Instagram Handle (@your_name)',
    'section'   => 'navbar_settings',
    'settings'  => 'instagram_url',
  ) ) );

  /**
   * Footer Section
   */
  $wp_customize->add_section( 'footer_section', array(
    'title'   => 'Footer',
    'priortity' => 100,
    'capability' => 'edit_theme_options',
    'description' => 'Update items in the footer',
  ) );

  // Sponsors
  $wp_customize->add_setting( 'sponsor1', array(
    'default'   => '',
    'transport' => 'refresh',
  ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sponsor1', array(
    'label'     => 'Sponsor Image',
    'section'   => 'footer_section',
    'settings'  => 'sponsor1',
  ) ) );
  $wp_customize->add_setting( 'sponsor2', array(
    'default'   => '',
    'transport' => 'refresh',
  ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sponsor2', array(
    'label'     => 'Sponsor Image',
    'section'   => 'footer_section',
    'settings'  => 'sponsor2',
  ) ) );
  $wp_customize->add_setting( 'sponsor3', array(
    'default'   => '',
    'transport' => 'refresh',
  ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sponsor3', array(
    'label'     => 'Sponsor Image',
    'section'   => 'footer_section',
    'settings'  => 'sponsor3',
  ) ) );
  $wp_customize->add_setting( 'sponsor4', array(
    'default'   => '',
    'transport' => 'refresh',
  ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sponsor4', array(
    'label'     => 'Sponsor Image',
    'section'   => 'footer_section',
    'settings'  => 'sponsor4',
  ) ) );
  $wp_customize->add_setting( 'sponsor5', array(
    'default'   => '',
    'transport' => 'refresh',
  ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sponsor5', array(
    'label'     => 'Sponsor Image',
    'section'   => 'footer_section',
    'settings'  => 'sponsor5',
  ) ) );


  /**
   * Custom CSS Section
   */
   $wp_customize->add_section( 'custom_script_section', array(
    'title'       => 'Custom CSS/JS',
    'priority'    => 100,
    'capability'  => 'edit_theme_options',
    'description' => 'Add custom CSS or JS to the theme',
  ) );

  // Custom CSS
  $wp_customize->add_setting( 'custom_theme_css', array(
    'default'   => '',
    'transport' => 'refresh',
  ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'custom_theme_css', array(
    'type'      => 'textarea',
    'label'     => 'Custom CSS',
    'section'   => 'custom_script_section',
    'setting'   => 'custom_theme_css',
  ) ) );

  // Custom JS
  $wp_customize->add_setting( 'custom_theme_js', array(
    'default'   => '',
    'transport' => 'refresh',
  ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'custom_theme_js', array(
    'type'      => 'textarea',
    'label'     => 'Custom JavaScript',
    'section'   => 'custom_script_section',
    'setting'   => 'custom_theme_js',
  ) ) );


  /**
   * Misc. Section
   */
   $wp_customize->add_section( 'custom_misc_section', array(
     'title'        => 'Misc.',
     'priority'     => 100,
     'capability'   => 'edit_theme_options',
     'description'  => 'Misc. theme settings'
   ) );

   // Default profile picture
   $wp_customize->add_setting( 'default_profile_picture', array(
     'default'   => '',
     'transport' => 'refresh'
   ) );
   $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'default_profile_picture', array(
     'label'     => 'Default Profile Picture (URL)',
     'section'   => 'custom_misc_section',
     'settings'  => 'default_profile_picture',
   ) ) );
}
