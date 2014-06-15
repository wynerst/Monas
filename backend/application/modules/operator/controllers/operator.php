<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Operator extends MX_Controller {

	public function index()
	{
		// HARUS ADA - Silahkan beri judul halaman
		$view['page_title'] = 'Data Operator';
		$view['page_desc'] 	= 'Data Pengguna Sistem';  			

		// Rekening Bank
		$sql 				= "	SELECT 
									*
								FROM 
									user";

		$query 				= $this->db->query($sql);
		$view['list'] 		= $query->result();			
		
		// HARUS ADA - Semua isi halaman akan diletakkan disini.
		$view['content'] 		= $this->load->view('operator', $view, true);			

		// HARUS ADA - Breadcrumbs - helper/monas_helper.php
		$view['breadcrumb']		= breadcrumbs(
									array(
										array('link'=>'#', 'title'=>'Pengguna')
									), 
									'Data Operator'
		);

		// HARUS ADA - Proses keluaran untuk seluruh halaman
		$this->load->view('master', $view);
	}

	public function add()
	{
		// HARUS ADA - Silahkan beri judul halaman
		$view['page_title'] = 'Pengguna';
		$view['page_desc'] 	= 'Tambah Data Operator';  			

		// HARUS ADA - Semua isi halaman akan diletakkan disini.
		$view['content'] 	= $this->load->view('operator_add',$view,true);			

		// HARUS ADA - Breadcrumbs - helper/monas_helper.php
		$view['breadcrumb']		= breadcrumbs(
									array(
										array('link'=>'#', 'title'=>'Pengguna'),
										array('link'=>'#', 'title'=>'Data Operator')
									), 
									'Tambah Data Operator'
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