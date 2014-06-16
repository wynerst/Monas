<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Alert
 */
if(!function_exists('alert'))
{
	function alert($mode, $title = 'Perhatian : ', $message = '', $dismis_button=false)
	{
		$output = '
		<div class="alert alert-'.$mode.'">';

		if($dismis_button == true) {
		$output .= '
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
		}

		$output .= '
			<strong>'.$title.'</strong> '.$message.'
		</div>
		';

		return $output;
	}
}

/**
 * Breadcrumbs
 */
if(!function_exists('breadcrumbs'))
{
	function breadcrumbs($link = array(), $current = '')
	{
		$output = '
              <ol class="breadcrumb">
                <li class="breadcrumb-header">Anda Disini :</li>';

        foreach ($link as $breadcrumb) {
			$output .= '<li><a href="'.$breadcrumb['link'].'">'.$breadcrumb['title'].'</a></li>';
		}

		$output .= '
                <li class="active">'.$current.'</li>
              </ol>';                

		return $output;
	}
}

/**
 * Ribuan
 */
if(!function_exists('ribuan'))
{
	function ribuan($nominal = 0)
	{
		$output = number_format($nominal,'0', '.', '.');                
		return $output;
	}
}

/**
 * Debug
 */
if ( ! function_exists('debug'))
{
	function debug( $output = '', $is_array = false)
	{
	   	echo "<pre>";
	   	if($is_array){
        	print_r($output);
	   	} else {
	   		echo $output;
	   	}
        echo "</pre>";
        die();
        return 0;
	}
}


// ------------------------------------------------------------------------

/* End of file xml_helper.php */
/* Location: ./system/helpers/xml_helper.php */