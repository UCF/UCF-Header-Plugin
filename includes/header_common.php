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
            $headerscript = '<script type="text/javascript" id="ucfhb-script" src="//universityheader.ucf.edu/bar/js/university-header.js';

            if ( get_option( 'bootstrap_2_overrides' ) )
            {
                $headerscript .= '?use-bootstrap-overrides=1';
            }
            if ( get_option( 'use_1200_breakpoint' ) )
            {
                $headerscript .= '?use-1200-breakpoint=1';
            }

            $headerscript .= '"></script>';
            echo $headerscript;
        }
    }
}

?>