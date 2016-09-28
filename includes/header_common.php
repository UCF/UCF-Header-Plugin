<?php
/**
 * Place common functions here.
 **/

if ( !class_exists( 'UCF_Header_Common' ) ){
	class UCF_Header_Common{
		/**
		* Build the javascript query from options and enqueue the header script.
		**/
		public static function display_header(){
			if ( ! is_admin() ){
				$src = '//universityheader.ucf.edu/bar/js/university-header.js';
				$params = array(
					'bootstrap_2_overrides' => get_option('bootstrap_2_overrides'),
					'use_1200_breakpoint'   => get_option('use_1200_breakpoint')
				);
				if( count( array_filter($params) ) ){
					$src .= '?'.http_build_query( array_filter($params) );
				}
				wp_register_script('ucf-header', $src, null, null, true);
				wp_enqueue_script('ucf-header');
				add_filter('clean_url', array('UCF_Header_Common', 'add_id_to_ucfhb'), 10, 3);
			}
		}

		/**
		* Add ID attribute to registered University Header script.
		**/
		public static function add_id_to_ucfhb($url) {
			if ( (false !== strpos($url, 'bar/js/university-header.js')) || (false !== strpos($url, 'bar/js/university-header-full.js')) ) {
			remove_filter('clean_url', 'add_id_to_ucfhb', 10, 3);
			return "$url' id='ucfhb-script";
			}
			return $url;
		}
	}
}

?>