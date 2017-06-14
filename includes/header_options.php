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
			register_setting( 'ucf-header-group', 'bootstrap-2-overrides' );
			register_setting( 'ucf-header-group', 'use-1200-breakpoint' );
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
						<th scope="row">Bootstrap 2.x overrides</th>
						<td><input type="checkbox" name="bootstrap-2-overrides" value="1" <?php checked( get_option( 'bootstrap-2-overrides' ), 1); ?>>
						Bootstrap 2.x overrides
						</input></td>
					</tr>
					<tr valign="top">
						<th scope="row">Max-width greater than 1200px</th>
						<td><input type="checkbox" name="use-1200-breakpoint" value="1" <?php checked( get_option( 'use-1200-breakpoint' ), 1);  ?>>
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
?>

