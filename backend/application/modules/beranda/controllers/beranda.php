<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Beranda extends MX_Controller {

	public function index()
	{
		// HARUS ADA - Silahkan beri judul halaman
		$view['page_title'] = 'Beranda';			//
		$view['page_desc'] 	= 'Ringkasan Singkat'; 	// 			

		// HARUS ADA - Semua isi halaman akan diletakkan disini.
		$view['content'] = $this->load->view('beranda','',true);			

		// CSS dan Plugin
		$view['css_files'] = array( 
									base_url().PLUGINS.'/easypiechart/jquery.easy-pie-chart.css'
		);

		$view['js_files'] = array(
									base_url().PLUGINS.'/sparkline/jquery.sparkline.min.js',  
									base_url().PLUGINS.'/chartjs/chart.min.js',     
									base_url().CUSTOM.'/dashboard.js'  
		);

		// HARUS ADA - Breadcrumbs - helper/monas_helper.php
		$view['breadcrumb']		= breadcrumbs(array(), 'Beranda');

		// HARUS ADA - Proses keluaran untuk seluruh halaman
		$this->load->view('master', $view);
	}

}

/* End of file welcome.php */