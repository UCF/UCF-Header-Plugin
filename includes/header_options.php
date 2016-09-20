<?php
/**
* Handles plugin options
*/

	if ( ! class_exists( 'UCF_Header_Config' ) ) {
	class UCF_Header_Config
	{
		public static function add_options_page() {
		add_options_page(
			'UCF Header',
			'UCF Header Plugin Options',
			'manage_options',
			'UCF-Header-plugin',
			array(
			'UCF_Header_Config',
			'add_page'
			)
		);

		add_action( 'admin_init', array( 'UCF_Header_Config', 'register_options' ) );
		}

		public static function register_settings()
		{
		register_setting( 'ucf-header-group', 'bootstrap_2_overrides' );
		register_setting( 'ucf-header-group', 'use_1200_breakpoint' );
		}

		public static function add_options_page()
		{
			?>
			<div class="wrap">
			<h2>UCF Header Options</h2>
				<form method="post" action="header_options.php">
				<?php settings_fields('ucf-header-group'); ?>
				<?php do_settings_sections('ucf-header-group'); ?>
				<table class="form-table">
					<tr valign="top">
						<th scope="row">Bootstrap 2.x overrides</th>
						<td><input type="checkbox" name="ucf_news_include_css" <?php echo ( get_option( 'ucf_news_include_css' ) === 'on' ) ? 'checked' : ''; ?>>
						Bootstrap 2.x overrides
						</input></td>
					</tr>
					<tr valign="top">
						<th scope="row">Max-width greater than 1200px</th>
						<td><input type="checkbox" name="ucf_news_include_css" <?php echo ( get_option( 'ucf_news_include_css' ) === 'on' ) ? 'checked' : ''; ?>>
						Use-1200-breakpoint
						</input></td>
					</tr>
				</table>
				<?php submit_button(); ?>
				</form>
			</div>
			<?php
		}
	}
?>

