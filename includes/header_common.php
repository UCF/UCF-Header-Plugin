<?php
/**
 * Place common functions here.
 **/

if ( !class_exists( 'UCF_Header_Common' ) )
{
    class UCF_Header_Common
    {
        public static function display_header()
        {
            if (!is_admin())
            {
                $src = "//universityheader.ucf.edu/bar/js/university-header.js";
                $params = array
                (
                    "bootstrap_2_overrides" => get_option('bootstrap_2_overrides'),
                    "use_1200_breakpoint" => get_option('use_1200_breakpoint')
                );
                //There is at least one option checked.
                if(count(array_filter($params)))
                {
                    $src .= '?';
                    foreach($params as $option => $value)
                    {
                        if($value)
                        {
                            $src .=$option . "=" . $value . "&";
                        }
                    }
                    unset($value);
                    $src = substr($src, 0, -1);
                }
                wp_register_script('ucf-header', $src, array(), null, true);
                wp_enqueue_script('ucf-header',$src, array(), null, true);
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