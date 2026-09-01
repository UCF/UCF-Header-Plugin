<?php
/**
* Handles plugin options
*/
if ( ! class_exists( 'UCF_Header_Config' ) )
{
	class UCF_Header_Config
	{
		public static function add_options_page(){
			add_options_page(
				'UCF Header',
				'UCF Header',
				'manage_options',
				'UCF-Header-plugin',
				array(
					'UCF_Header_Config',
					'add_options_form'
				)
			);

			add_action( 'admin_init', array( 'UCF_Header_Config', 'register_options' ) );
		}

		public static function register_options(){
			register_setting(
				'ucf-header-group',
				'ucf_header_base_url',
				array(
					'type'              => 'string',
					'default'           => UCF_Header_Common::DEFAULT_SCRIPT_URL,
					'sanitize_callback' => array( 'UCF_Header_Config', 'sanitize_base_url' )
				)
			);
			register_setting( 'ucf-header-group', 'bootstrap_2_overrides' );
			register_setting( 'ucf-header-group', 'use_1200_breakpoint' );
		}

		/**
		* Normalizes the base URL on save. Values that aren't valid http(s) URLs
		* are replaced with the canonical University Header URL.
		**/
		public static function sanitize_base_url( $value ){
			$value = esc_url_raw( trim( (string) $value ), array( 'http', 'https' ) );

			if ( empty( $value ) ){
				$value = UCF_Header_Common::DEFAULT_SCRIPT_URL;
			}

			return $value;
		}

		public static function add_options_form(){
			?>
			<div class="wrap">
			<h2>UCF Header Options</h2>
				<form method="post" action="options.php">
				<?php settings_fields('ucf-header-group'); ?>
				<?php do_settings_sections('ucf-header-group'); ?>
				<table class="form-table">
					<tr valign="top">
						<th scope="row">UCF Header Base URL</th>
						<td><input type="url" class="regular-text" name="ucf_header_base_url" value="<?php echo esc_attr( get_option( 'ucf_header_base_url', UCF_Header_Common::DEFAULT_SCRIPT_URL ) ); ?>" />
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">Bootstrap 2.x overrides</th>
						<td><input type="checkbox" name="bootstrap_2_overrides" value="1" <?php checked( get_option( 'bootstrap_2_overrides' ), 1); ?>>
						Bootstrap 2.x overrides
						</input></td>
					</tr>
					<tr valign="top">
						<th scope="row">Max-width greater than 1200px</th>
						<td><input type="checkbox" name="use_1200_breakpoint" value="1" <?php checked( get_option( 'use_1200_breakpoint' ), 1);  ?>>
						Use-1200-breakpoint
						</input></td>
					</tr>
				<?php submit_button(); ?>
				</form>
			</div>
			<?php
		}
	}
}
