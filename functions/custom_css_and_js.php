<?php
add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
	register_setting( 'solarcar_options', 'solarcar_theme_options', 'theme_options_validate' );
}

/**
 * Load up the menu page
 */
function theme_options_add_page() {
	add_theme_page( __( 'Custom CSS/JS', 'solarcartheme' ), __( 'Custom CSS/JS', 'solarcartheme' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}

/**
 * Create the options page
 */
function theme_options_do_page() {

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
	<div class="wrap">
		<?php screen_icon(); echo "<style>.separator-row {border-top: 1px solid #ccc;}</style><h1>Custom CSS/JS</h1> This page allows you to add custom CSS and custom JavaScript to your theme."; ?>

		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'solarcartheme' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'solarcar_options' ); ?>
			<?php $options = get_option( 'solarcar_theme_options' ); ?>

			<table class="form-table">

				<tr valign="top"><th scope="row"><?php _e( 'CSS', 'solarcartheme' ); ?></th>
					<td>
						<textarea id="solarcar_theme_options[custom_css]" class="large-text" cols="50" rows="15" name="solarcar_theme_options[custom_css]"><?php echo esc_textarea( $options['custom_css'] ); ?></textarea>
						<label class="description" for="solarcar_theme_options[custom_css]"><?php _e( 'Enter Custom CSS', 'solarcartheme' ); ?></label>
					</td>
				</tr>

				<tr valign="top"><th scope="row"><?php _e( 'JavaScript', 'solarcartheme' ); ?></th>
					<td>
						<textarea id="solarcar_theme_options[custom_css]" class="large-text" cols="50" rows="15" name="solarcar_theme_options[custom_js]"><?php echo esc_textarea( $options['custom_js'] ); ?></textarea>
						<label class="description" for="solarcar_theme_options[custom_css]"><?php _e( 'Enter custom JavaScript, including the &lt;script&gt; tags', 'solarcartheme' ); ?></label>
					</td>
				</tr>

			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save', 'solarcartheme' ); ?>" />
			</p>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {

  $options = [];

	$options['custom_css'] = $input['custom_css'];
	$options['custom_js'] = $input['custom_js'];


	return $options;
}
