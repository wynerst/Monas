<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pribadi extends MX_Controller {

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
		$view['page_title'] = 'Data Pribadi';
		$view['page_desc'] 	= 'Tentang Diri Anda';  			

		// Rekening Bank
		$sql 				= "	SELECT 
									*
								FROM 
									user
								WHERE
									id_user = '".$this->session->userdata('id')."'
								";

		$query 				= $this->db->query($sql);
		$view['pribadi'] 		= $query->row();			

		// CSS Files
		$view['css_files'] 	= array(
							  base_url().PLUGINS.'select/bootstrap-select.min.css'

		);

		// JS Files
		$view['js_files'] 	= array(
								base_url().PLUGINS.'filestyle/src/bootstrap-filestyle.js',
  								base_url().PLUGINS.'select/bootstrap-select.min.js',
  								base_url().CUSTOM.'profil.js'
		);
		
		// HARUS ADA - Semua isi halaman akan diletakkan disini.
		$view['content'] 		= $this->load->view('pribadi', $view, true);			

		// HARUS ADA - Breadcrumbs - helper/monas_helper.php
		$view['breadcrumb']		= breadcrumbs(
									array(
										array('link'=>'#', 'title'=>'Pengguna')
									), 
									'Data Pribadi'
		);

		// HARUS ADA - Proses keluaran untuk seluruh halaman
		$this->load->view('master', $view);
	}

	public function add()
	{
		// HARUS ADA - Silahkan beri judul halaman
		$view['page_title'] = 'Bank';
		$view['page_desc'] 	= 'Tambah Data Bank';  			

		// HARUS ADA - Semua isi halaman akan diletakkan disini.
		$view['content'] 	= $this->load->view('bank_add',$view,true);			

		// HARUS ADA - Breadcrumbs - helper/monas_helper.php
		$view['breadcrumb']		= breadcrumbs(
									array(
										array('link'=>'#', 'title'=>'Masterfile'),
										array('link'=>'#', 'title'=>'Bank')
									), 
									'Tambah Data Bank'
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