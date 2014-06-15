<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Belanja extends MX_Controller {

	public function index()
	{
		// HARUS ADA - Silahkan beri judul halaman
		$view['page_title'] = 'Belanja';
		$view['page_desc'] 	= 'Data Belanja';  			

		// Rekening Bank
		$sql 				= "	SELECT 
									*
								FROM 
									belanja";

		$query 				= $this->db->query($sql);
		$view['list'] 		= $query->result();			
		
		// HARUS ADA - Semua isi halaman akan diletakkan disini.
		$view['content'] 		= $this->load->view('belanja', $view, true);			

		// HARUS ADA - Breadcrumbs - helper/monas_helper.php
		$view['breadcrumb']		= breadcrumbs(
									array(
										array('link'=>'#', 'title'=>'Sumbangan')
									), 
									'Belanja'
		);

		// HARUS ADA - Proses keluaran untuk seluruh halaman
		$this->load->view('master', $view);
	}

	public function add()
	{
		// HARUS ADA - Silahkan beri judul halaman
		$view['page_title'] = 'Belanja';
		$view['page_desc'] 	= 'Data Belanja';  			

		// HARUS ADA - Semua isi halaman akan diletakkan disini.
		$view['content'] 	= $this->load->view('belanja_add',$view,true);			

		// HARUS ADA - Breadcrumbs - helper/monas_helper.php
		$view['breadcrumb']		= breadcrumbs(
									array(
										array('link'=>'#', 'title'=>'Sumbangan'),
										array('link'=>'#', 'title'=>'Belanja')
									), 
									'Tambah Data Belanja'
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