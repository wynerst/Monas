<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Beranda extends MX_Controller {

	public function __construct()
	{
		parent::__construct();		
		$this->output->enable_profiler(false); //for debug set as true
		$this->login->is_logged();
		$this->login->has_access();
	}

	public function index()
	{
		// HARUS ADA - Silahkan beri judul halaman
		$view['page_title'] = 'Beranda';			//
		$view['page_desc'] 	= 'Ringkasan Singkat'; 	// 			

		// Donatur
		$view['donatur'] 	= $this->db->count_all('penyumbang');

		//Total Sementara
		$query	 			= $this->db->get('settings');
		$sum 				= $query->row();
		$view['total']		= (int)$sum->bca + (int)$sum->bri + (int)$sum->mandiri;

		//Jumlah Kemaren
		$this->db->limit(1)->order_by('date_create');
		$query	 			= $this->db->get('sumbangan');
		$sum 				= $query->row();
		$view['kemaren']	= (int)$sum->bca + (int)$sum->bri + (int)$sum->mandiri;

		//Chart
		$sql 					= " SELECT 
										DATE_FORMAT(tanggal, '%m/%d') AS tanggal,
										SUM(bca) bca,
										SUM(bri) bri,
										SUM(mandiri) mandiri
									FROM 
										sumbangan
									GROUP BY
										tanggal
									ORDER BY 
										tanggal DESC
									LIMIT 
										10";

		$query 					= $this->db->query($sql);
		$tanggal 				= '';
		$bca 					= '';
		$bri 					= '';
		$mandiri 				= '';
		if($query->num_rows() > 0 )
		{			
			foreach($query->result() as $graph) {
				$tanggal	.= '"'.$graph->tanggal.'",';				
				$bca		.= $graph->bca.',';				
				$bri		.= $graph->bri.',';				
				$mandiri	.= $graph->mandiri.',';				
			}
		}

		$view['tanggal']	= substr($tanggal,0,strlen($tanggal)-1);				
		$view['bca']		= $bca;				
		$view['bri']		= $bri;				
		$view['mandiri']	= $mandiri;				

		// HARUS ADA - Semua isi halaman akan diletakkan disini.
		$view['content'] = $this->load->view('beranda', $view,true);			

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