<?php
/**
 * Place common functions here.
 **/

if ( !class_exists( 'UCF_Header_Common' ) ){
	class UCF_Header_Common{
		/**
		* The canonical University Header script URL, used when no base URL is configured.
		**/
		const DEFAULT_SCRIPT_URL = 'https://universityheader.ucf.edu/bar/js/university-header.js';

		/**
		* Build the javascript query from options and enqueue the header script.
		**/
		public static function display_header(){
			if ( ! is_admin() ){
				$src = self::get_script_url();
				
				$params = array(
					'use-bootstrap-overrides' => get_option('bootstrap_2_overrides'),
					'use-1200-breakpoint'   => get_option('use_1200_breakpoint'),
				);

				$params = array_filter( $params );

				if ( ! empty( $params ) ){
					$src = add_query_arg( $params, $src );
				}

				wp_register_script( 'ucf-header', $src, null, null, true );
				wp_enqueue_script( 'ucf-header' );
			}
		}

		/**
		* Returns the configured University Header script URL. Falls back to the
		* canonical URL when the option is empty or is not a valid http(s) URL.
		**/
		public static function get_script_url(){
			$src = esc_url_raw( trim( (string) get_option( 'ucf_header_base_url' ) ), array( 'http', 'https' ) );

			if ( empty( $src ) ){
				$src = self::DEFAULT_SCRIPT_URL;
			}

			return $src;
		}

		public static function ucfhb_script_handle( $tag, $handle, $src ) {
			if ( 'ucf-header' === $handle ) {
				$tag = str_replace( "{$handle}-js", 'ucfhb-script', $tag );
			}
		
			return $tag;
		}

		/**
		* Add ID attribute to registered University Header script.
		**/
		public static function add_id_to_ucfhb( $url ) {
			$base = self::get_script_url();

			if ( ( 0 === strpos( $url, $base ) ) ||
				( false !== strpos($url, 'bar/js/university-header.js' ) ) ||
				(false !== strpos($url, 'bar/js/university-header-full.js') ) ) {
				remove_filter('clean_url', 'add_id_to_ucfhb', 10, 3);
				return "$url' id='ucfhb-script";
			}
			return $url;
		}
	}

	global $wp_version;

	if ( version_compare( $wp_version, '6.3.0', '>=' ) ) {
		add_filter( 'script_loader_tag', array( 'UCF_Header_Common', 'ucfhb_script_handle' ), 10, 3 );
	} else {
		add_filter( 'clean_url', array( 'UCF_Header_Common', 'add_id_to_ucfhb' ), 10, 1 );
	}
}
