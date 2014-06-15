<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Konfigurasi extends MX_Controller {

	public function index()
	{
		// HARUS ADA - Silahkan beri judul halaman
		$view['page_title'] = 'Konfigurasi Umum';
		$view['page_desc'] 	= 'Informasi Sistem dan Konfigurasi Umum';  			

		// Rekening Bank
		$sql 				= "	SELECT 
									*
								FROM 
									settings";

		$query 				= $this->db->query($sql);
		$view['list'] 		= $query->result();			
		
		// HARUS ADA - Semua isi halaman akan diletakkan disini.
		$view['content'] 		= $this->load->view('konfigurasi', $view, true);			

		// HARUS ADA - Breadcrumbs - helper/monas_helper.php
		$view['breadcrumb']		= breadcrumbs(
									array(
										array('link'=>'#', 'title'=>'Konfigurasi')
									), 
									'Umum'
		);

		// HARUS ADA - Proses keluaran untuk seluruh halaman
		$this->load->view('master', $view);
	}

}

/* End of file welcome.php */