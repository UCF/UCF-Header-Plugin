<?php
/**
 * Place common functions here.
 **/

if ( !class_exists( 'UCF_Header_Common' ) )
{
    class UCF_Header_Common
    {
        public function display_header()
        {
            if (!is_admin())
            {
                $id = "ucfhb-script";
                $src = "//universityheader.ucf.edu/bar/js/university-header.js";
                $params = array (
                    "bootstrap_2_overrides" => get_option('bootstrap_2_overrides'),
                    "use_1200_breakpoint" => get_option('use_1200_breakpoint')
                );
                var_dump($params);
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
            }
        }
    }
}

?>