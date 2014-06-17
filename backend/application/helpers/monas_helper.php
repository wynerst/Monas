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
 * Terbilang
 * @author Rio Astamal <me@rioastamal.net>
 */
if(!function_exists('terbilang'))
{
	function terbilang($angka) {
	    $angka = (float)$angka;
	    $bilangan = array(
	            '',
	            'Satu',
	            'Dua',
	            'Tiga',
	            'Empat',
	            'Lima',
	            'Enam',
	            'Tujuh',
	            'Delapan',
	            'Sembilan',
	            'Sepuluh',
	            'Sebelas'
	    );
	    if ($angka < 12) {
	        return $bilangan[$angka];
	    } else if ($angka < 20) {
	        return $bilangan[$angka - 10] . ' Belas';
	    } else if ($angka < 100) {
	        $hasil_bagi = (int)($angka / 10);
	        $hasil_mod = $angka % 10;
	        return trim(sprintf('%s Puluh %s', $bilangan[$hasil_bagi], $bilangan[$hasil_mod]));
	    } else if ($angka < 200) {
	        return sprintf('Seratus %s', terbilang($angka - 100));
	    } else if ($angka < 1000) {
	        $hasil_bagi = (int)($angka / 100);
	        $hasil_mod = $angka % 100;
	        return trim(sprintf('%s Ratus %s', $bilangan[$hasil_bagi], terbilang($hasil_mod)));
	    } else if ($angka < 2000) {
	        return trim(sprintf('Seribu %s', terbilang($angka - 1000)));
	    } else if ($angka < 1000000) {
	        $hasil_bagi = (int)($angka / 1000); 
	        $hasil_mod = $angka % 1000;
	        return sprintf('%s Ribu %s', terbilang($hasil_bagi), terbilang($hasil_mod));
	    } else if ($angka < 1000000000) {
	        $hasil_bagi = (int)($angka / 1000000);
	        $hasil_mod = $angka % 1000000;
	        return trim(sprintf('%s Juta %s', terbilang($hasil_bagi), terbilang($hasil_mod)));
	    } else if ($angka < 1000000000000) {
	        $hasil_bagi = (int)($angka / 1000000000);
	        $hasil_mod = fmod($angka, 1000000000);
	        return trim(sprintf('%s Milyar %s', terbilang($hasil_bagi), terbilang($hasil_mod)));
	    } else if ($angka < 1000000000000000) {
	        $hasil_bagi = $angka / 1000000000000;
	        $hasil_mod = fmod($angka, 1000000000000);
	        return trim(sprintf('%s Triliun %s', terbilang($hasil_bagi), terbilang($hasil_mod)));
	    } else {
	        return 'Wow...';
	    }
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