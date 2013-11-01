<?php
/* based on http://ottopress.com/2009/wordpress-settings-api-tutorial/ */

add_action( 'admin_menu', 'theme_options_add_page' );
/**
 * Load up the menu page
 */
if( !function_exists('theme_options_add_page'))  {
	function theme_options_add_page() {
		add_theme_page( 
			__( 'Theme Options', 'themename' ), // Title for the page
			__( 'Theme Options', 'themename' ), //  Page name in admin menu
			'edit_theme_options', //  Minimum role required to see the page
			'theme_options_page', // unique identifier
			'theme_options_do_page'  // name of function to display the page
		);
		
		add_action( 'admin_init', 'theme_options_settings' );	
	}
}
/**
 * Create the options page
 */

if( !function_exists('theme_options_do_page'))  {
	function theme_options_do_page() { 
	if (isset($_GET['settings-updated'])){
	$is_updated= $_GET['settings-updated'];
	if ($is_updated == 'true'){ ?>
		<div id="message" class="updated">
		<p><?php _e('Theme options were successfully updated','themename') ?></p>
		</div>

	<?php }
	}
?>

<div class="wrap">

      <h2><?php _e( 'Theme Options', 'themename' ) ?></h2>  
      
      <?php 
      /*** To debug, use this to print the theme options **/
      /* 
      echo '<pre>';
      $options = get_option( 'inpixel_theme_settings_options' );
      print_r($options); 
      echo '</pre>';
      */
       ?>
 
      <form method="post" action="options.php">
      		<?php settings_fields( 'inpixel_theme_settings_options' ); ?>
			<?php do_settings_sections('setting_section'); ?>
			<p><input class="button-primary"  name="Submit" type="submit" value="<?php esc_attr_e(__('Save Changes','themename')); ?>" /></p>		
      </form>
   </div>

<?php
	}
}

/**
 * Init plugin options to white list our options
 */
if( !function_exists('theme_options_settings'))  {
	function theme_options_settings(){
		/* Register the Theme settings. */
		register_setting( 
			'inpixel_theme_settings_options',  //$option_group , A settings group name. Must exist prior to the register_setting call. This must match what's called in settings_fields()
			'inpixel_theme_settings_options', // $option_name The name of an option to sanitize and save.
			'theme_options_validate' // $sanitize_callback  A callback function that sanitizes the option's value.
			);

		/** Add a section, you can as many as you like **/
		add_settings_section(
			'theme_option_main', //  section name unique ID
			__( 'Section Title', 'themename' ), // Title or name of the section (to be output on the page), you can leave nbsp here if not wished to display
			'theme_option_section_text',  // callback to display the content of the section itself
			'setting_section' // The page name. This needs to match the text we gave to the do_settings_sections function call 
			);

		/* Register each option **/
		add_settings_field(
			'textfield_option',  //$id a unique id for the field 
			__( 'Text field', 'themename' ), // the title for the field
			'func_textfield_option',  // the function callback, to display the input box
			'setting_section',  // the page name that this is attached to (same as the do_settings_sections function call).
			'theme_option_main' // the id of the settings section that this goes into (same as the first argument to add_settings_section).
			); 

		 add_settings_field(
			'numeric_option', 
			__( 'Numeric field', 'themename' ), 
			'func_numeric_option', 
			'setting_section',  
			'theme_option_main' 
			); 

		  add_settings_field(
			'radio_option', 
			__( 'Radio button field', 'themename' ), 
			'func_radio_option', 
			'setting_section',  
			'theme_option_main' 
			); 

		  add_settings_field(
			'textarea_option', 
			__( 'Textarea button field', 'themename' ), 
			'func_textarea_option', 
			'setting_section',  
			'theme_option_main' 
			); 
		  add_settings_field(
			'checkbox_option', 
			__( 'Checkbox field', 'themename' ), 
			'func_checkbox_option', 
			'setting_section',  
			'theme_option_main' 
			); 

	}
}

/** the theme section output**/
if( !function_exists('theme_option_section_text'))  {
	function theme_option_section_text(){
	echo '<p>'.__( ' Echo some texte section description here !', 'themename' ).'</p>';
	}
}

/** Output for all the settings fields added **/
if( !function_exists('func_textfield_option'))  {
	function func_textfield_option(){
	/* Get the option value from the database. */
		$options = get_option( 'inpixel_theme_settings_options' );
		$textfield_option = $options['textfield_option'];	
		/* Echo the field. */ ?>
		<input type="text" id="textfield_option" name="inpixel_theme_settings_options[textfield_option]" value="<?php echo esc_attr($textfield_option); ?>" />

	<?php }
}

if( !function_exists('func_numeric_option'))  {
	function func_numeric_option(){
	/* Get the option value from the database. */
		$options = get_option( 'inpixel_theme_settings_options' );
		$numeric_option = $options['numeric_option'];
		/* Echo the field. */ ?>
		<input type="text" id="numeric_option" name="inpixel_theme_settings_options[numeric_option]" value="<?php echo esc_attr($numeric_option); ?>" />
	<?php }

	function func_radio_option() {
		 /* Get the option value from the database. */
		$options = get_option( 'inpixel_theme_settings_options' );
		$radio_option = $options['radio_option'];	
		/* Echo the field. */ ?>
		<label for="radio_true" > <?php _e( 'Yes', 'themename' ); ?></label>
		<input type="radio" <?php if ($radio_option == "true") echo'checked="checked"' ; ?> id="radio_true" name="inpixel_theme_settings_options[radio_option]" value="true" /> 
		<label for="radio_false" > <?php _e( 'False', 'themename' ); ?></label>
		<input type="radio" id="radio_false" <?php if ($radio_option == "false") echo'checked="checked"' ; ?> name="inpixel_theme_settings_options[radio_option]" value="false" /> 
		<?php
	}
}
if( !function_exists('func_textarea_option'))  {
	function func_textarea_option(){
	/* Get the option value from the database. */
		$options = get_option( 'inpixel_theme_settings_options' );
		$textarea_option = $options['textarea_option'];	
		/* Echo the field. */ ?>
		<textarea id="textarea_option" class="large-text"  name="inpixel_theme_settings_options[textarea_option]"><?php echo esc_attr($textarea_option); ?>
		</textarea>	
	<?php }
}

if( !function_exists('func_checkbox_option'))  {
	function func_checkbox_option(){
	/* Get the option value from the database. */
		$options = get_option( 'inpixel_theme_settings_options' );
		$checkbox_option = $options['checkbox_option'];	
		/* Echo the field. */ ?>
		<label class="description" for="checkbox_one"><?php _e( 'Sample checkbox', 'themename' ); ?></label>
		<input id="checkbox_one" name="inpixel_theme_settings_options[checkbox_option]" type="checkbox" value="1" <?php if ($checkbox_option == "1") echo'checked="checked"' ; ?> />
	<?php }
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
if( !function_exists('theme_options_validate'))  {
	function theme_options_validate( $input ) {
	$options = get_option( 'inpixel_theme_settings_options' );
	/** clean text field, no HTML allowed or it won't update settings */
	$options['textfield_option'] = wp_filter_nohtml_kses($input['textfield_option'] );

	/** validate only numbers */
	$options['numeric_option'] = wp_filter_nohtml_kses( intval( $input['numeric_option'] ) );

	/** validation radio buttons **/
	$options['radio_option'] = $input['radio_option'];

	// Our radio option must actually be in our array of radio options
	if ( ! isset( $input['radio_option'] ) )
		$input['radio_option'] = null;
	if ( ! array_key_exists( $input['radio_option'], $radio_option) )
		$input['radio_option'] = null;

	/** validate textareas **/
	$options['textarea_option'] = wp_filter_nohtml_kses($input['textarea_option'] );


	/** validate checkboxes **/
	$options['checkbox_option'] = $input['checkbox_option'];
	if ( ! isset( $input['checkbox_option'] ) )
		$input['checkbox_option'] = null;
	if ( ! array_key_exists( $input['checkbox_option'], $checkbox_option) )
		$input['checkbox_option'] = null;

	return $options;	
	}
}
