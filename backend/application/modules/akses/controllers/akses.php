<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Akses extends MX_Controller {

	public function index()
	{
		// HARUS ADA - Silahkan beri judul halaman
		$view['page_title'] = 'Hak Akses';
		$view['page_desc'] 	= 'Menentukan Akses Sistem Berdasarkan User';  			

		// Rekening Bank
		$sql 				= "	SELECT 
									*
								FROM 
									hak_akses";

		$query 				= $this->db->query($sql);
		$view['list'] 		= $query->result();			
		
		// HARUS ADA - Semua isi halaman akan diletakkan disini.
		$view['content'] 		= $this->load->view('akses', $view, true);			

		// HARUS ADA - Breadcrumbs - helper/monas_helper.php
		$view['breadcrumb']		= breadcrumbs(
									array(
										array('link'=>'#', 'title'=>'Pengguna')
									), 
									'Hak Akses'
		);

		// HARUS ADA - Proses keluaran untuk seluruh halaman
		$this->load->view('master', $view);
	}

	public function add()
	{
		// HARUS ADA - Silahkan beri judul halaman
		$view['page_title'] = 'Pengguna';
		$view['page_desc'] 	= 'Menentukan Akses Sistem Berdasarkan User';  			

		// HARUS ADA - Semua isi halaman akan diletakkan disini.
		$view['content'] 	= $this->load->view('akses_add',$view,true);			

		// HARUS ADA - Breadcrumbs - helper/monas_helper.php
		$view['breadcrumb']		= breadcrumbs(
									array(
										array('link'=>'#', 'title'=>'Pengguna'),
										array('link'=>'#', 'title'=>'Hak Akses')
									), 
									'Tambah Data Hak Akses'
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