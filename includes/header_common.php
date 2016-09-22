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
            $id = "ucfhb-script";
            $src = "//universityheader/ucf.edu/bar/js/university-header.js";
            $bootstrap_2_overrides = get_option('bootstrap_2_overrides');
            $use_1200_breakpoint = get_option('use_1200_breakpoint');

            if ( $bootstrap_2_overrides && !$use_1200_breakpoint )
			{
				$headerscript .= '?use-bootstrap-overrides=1';
			}
			else if ( !$bootstrap_2_overrides && $use_1200_breakpoint)
			{
				$headerscript .= '?use-1200-breakpoint=1';
			}
            else if ( $bootstrap_2_overrides && $use_1200_breakpoint)
            {
                $headerscript .= '?use-1200-breakpoint=1&use-bootstrap-overrides=1';
            }

			$headerscript .= '"></script>';
			echo $headerscript;
		}
	}
}

?>