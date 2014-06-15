<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kelompok extends MX_Controller {

	public function index()
	{
		// HARUS ADA - Silahkan beri judul halaman
		$view['page_title'] = 'Kelompok Penyumbang';
		$view['page_desc'] 	= 'Pembagian Jenis Penyumbang';  			

		// Kelompok Penyumbang
		$sql 				= "	SELECT 
									kel_penyumbang_id, 
									nama 
								FROM 
									mst_kel_penyumbang";

		$query 				= $this->db->query($sql);
		$view['list'] 		= $query->result();			

		// HARUS ADA - Semua isi halaman akan diletakkan disini.
		$view['content'] 		= $this->load->view('kelompok', $view, true);			

		// HARUS ADA - Breadcrumbs - helper/monas_helper.php
		$view['breadcrumb']		= breadcrumbs(
									array(
										array('link'=>'#', 'title'=>'Masterfile')
									), 
									'Kelompok Penyumbang'
		);

		// HARUS ADA - Proses keluaran untuk seluruh halaman
		$this->load->view('master', $view);
	}

	public function add()
	{
		// HARUS ADA - Silahkan beri judul halaman
		$view['page_title'] = 'Tambah Kelompok Penyumbang';
		$view['page_desc'] 	= 'Pembagian Jenis Penyumbang';  			

		// HARUS ADA - Semua isi halaman akan diletakkan disini.
		$view['content'] 	= $this->load->view('kelompok_add',$view,true);			

		// HARUS ADA - Breadcrumbs - helper/monas_helper.php
		$view['breadcrumb']		= breadcrumbs(
									array(
										array('link'=>'#', 'title'=>'Masterfile'),
										array('link'=>'#', 'title'=>'Kelompok Penyumbang')
									), 
									'Tambah Kelompok Penyumbang'
		);

		// HARUS ADA - Proses keluaran untuk seluruh halaman
		$this->load->view('master', $view);
	}

	public function edit()
	{
		
	}	

	public function delete()
	{
	
	}	

}

/* End of file welcome.php */