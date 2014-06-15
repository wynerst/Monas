<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penyumbang extends MX_Controller {

	public function index()
	{
		// HARUS ADA - Silahkan beri judul halaman
		$view['page_title'] = 'Penyumbang';
		$view['page_desc'] 	= 'Data Penyumbang Dana';  			

		// Rekening Bank
		$sql 				= "	SELECT 
									*
								FROM 
									penyumbang";

		$query 				= $this->db->query($sql);
		$view['list'] 		= $query->result();			
		
		// HARUS ADA - Semua isi halaman akan diletakkan disini.
		$view['content'] 		= $this->load->view('penyumbang', $view, true);			

		// HARUS ADA - Breadcrumbs - helper/monas_helper.php
		$view['breadcrumb']		= breadcrumbs(
									array(
										array('link'=>'#', 'title'=>'Sumbangan')
									), 
									'Penyumbang'
		);

		// HARUS ADA - Proses keluaran untuk seluruh halaman
		$this->load->view('master', $view);
	}

	public function add()
	{
		// HARUS ADA - Silahkan beri judul halaman
		$view['page_title'] = 'Penyumbang';
		$view['page_desc'] 	= 'Data Penyumbang Dana';  			

		// HARUS ADA - Semua isi halaman akan diletakkan disini.
		$view['content'] 	= $this->load->view('penyumbang_add',$view,true);			

		// HARUS ADA - Breadcrumbs - helper/monas_helper.php
		$view['breadcrumb']		= breadcrumbs(
									array(
										array('link'=>'#', 'title'=>'Sumbangan'),
										array('link'=>'#', 'title'=>'Penyumbang')
									), 
									'Tambah Data Penyumbang'
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