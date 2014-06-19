<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grafik extends MX_Controller {

	public function index()
	{
		// HARUS ADA - Silahkan beri judul halaman
		$view['page_title'] = 'Semua data grafik';
		$view['page_desc'] 	= '';

		// Rekening Bank
		$sql1 				= "	SELECT
									bca, mandiri, bri, date_update
								FROM
									settings";
		$sql2				= "	SELECT
									bca, mandiri, bri, date_update
								FROM
									settings";

		$query 				= $this->db->query($sql);
		$view['list'] 		= $query->result();

		// HARUS ADA - Semua isi halaman akan diletakkan disini.
		$view['content'] 		= $this->load->view('tentang', $view, true);

		// HARUS ADA - Breadcrumbs - helper/monas_helper.php
		$view['breadcrumb']		= breadcrumbs(
									array(
										array('link'=>'#', 'title'=>'Konfigurasi')
									),
									'Tentang'
		);

		// HARUS ADA - Proses keluaran untuk seluruh halaman
		$this->load->view('master', $view);
	}

}

/* End of file welcome.php */
