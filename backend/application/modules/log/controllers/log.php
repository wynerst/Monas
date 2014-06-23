<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Log extends MX_Controller {

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
		$view['page_title'] = 'Catatan Sistem';
		$view['page_desc'] 	= 'Pencatatan Kegiatan Sistem';  			

		// Rekening Bank
		$sql 				= "	SELECT 
									a.message,
									a.waktu,
									b.nama,
									c.modul
								FROM 
									log a
								LEFT JOIN 
									user b ON a.id_user = b.id_user
								LEFT JOIN 
									mst_modul c ON a.id_modul = c.id_modul
								ORDER BY
									waktu DESC
								";

		$query 				= $this->db->query($sql);
		$view['list'] 		= $query->result();			
		
		// HARUS ADA - Semua isi halaman akan diletakkan disini.
		$view['content'] 		= $this->load->view('log', $view, true);			

		// HARUS ADA - Breadcrumbs - helper/monas_helper.php
		$view['breadcrumb']		= breadcrumbs(
									array(
										array('link'=>'#', 'title'=>'Konfigurasi')
									), 
									'Log System'
		);

		// HARUS ADA - Proses keluaran untuk seluruh halaman
		$this->load->view('master', $view);
	}

	public function clear()
	{
		$this->db->truncate('log'); 
		$this->logs->record($this->session->userdata('name').' Menghapus Data Log');
		redirect(site_url().'/log');
	}
}

/* End of file welcome.php */