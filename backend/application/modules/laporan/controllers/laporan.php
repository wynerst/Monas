<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends MX_Controller {


	public function index() {
		$this->sumbangan();
	}

	public function sumbangan()
	{
		// Cek proses berdasarkan segmentasi pada alamat URL.
		switch($this->uri->segment(3)) {
			default:

				// HARUS ADA - Silahkan beri judul halaman
				$view['page_title'] = 'Seluruh Sumbangan';
				$view['page_desc'] 	= 'Laporan Seluruh Sumbangan Yang Diterima';  			

				// Sumbangan
				$sql 				= "	SELECT 
											a.nominal,
											a.tgl,
											a.create,
											b.nama AS penyumbang,
											c.nama AS bank
										FROM 
											sumbangan a
										LEFT JOIN penyumbang b 
											ON a.id_penyumbang = b.id_penyumbang
										LEFT JOIN mst_bank c 
											ON a.id_bank = c.id_bank
										";

				$query 				= $this->db->query($sql);
				$view['list'] 		= $query->result();			

				// HARUS ADA - Semua isi halaman akan diletakkan disini.
				$view['content'] 		= $this->load->view('sumbangan', $view, true);			

				// CSS dan Plugin
				$view['js_files'] = array(
											base_url().PLUGINS.'/chartjs/chart.min.js',     
											base_url().CUSTOM.'/report.js'  
				);

				// HARUS ADA - Breadcrumbs - helper/monas_helper.php
				$view['breadcrumb']		= breadcrumbs(
											array(
												array('link'=>'#', 'title'=>'Laporan')
											), 
											'Sumbangan'
				);

				// HARUS ADA - Proses keluaran untuk seluruh halaman
				$this->load->view('master', $view);

			break;

			case 'csv' :
				// Helper untuk membuat download file
				$this->load->helper('download');
				$filename = 'sumbangan-'.date('Y-m-d h:i:s').'.csv';

				// Fasilitas untuk konversi hasil database menjadi CSV
				$this->load->dbutil();

				// Sumbangan
				$sql 				= "	SELECT 
											a.nominal,
											a.tgl,
											a.create,
											b.nama AS penyumbang,
											c.nama AS bank
										FROM 
											sumbangan a
										LEFT JOIN penyumbang b 
											ON a.id_penyumbang = b.id_penyumbang
										LEFT JOIN mst_bank c 
											ON a.id_bank = c.id_bank
										";

				$query 	= $this->db->query($sql);
				$data 	= $this->dbutil->csv_from_result($query);			
				force_download($filename, $data);
			break;

			case 'print' :
				// Fasilitas untuk konversi hasil database menjadi CSV
				$this->load->dbutil();

				// Fasilitas generate table
				$this->load->library('table');

				// Sumbangan
				$sql 				= "	SELECT 
											a.nominal,
											a.tgl,
											a.create,
											b.nama AS penyumbang,
											c.nama AS bank
										FROM 
											sumbangan a
										LEFT JOIN penyumbang b 
											ON a.id_penyumbang = b.id_penyumbang
										LEFT JOIN mst_bank c 
											ON a.id_bank = c.id_bank
										";

				$query 	= $this->db->query($sql);

				$tmpl = array ('table_open' => '<table border="0" cellpadding="4" cellspacing="0" class="table table-bordered">');
				$this->table->set_template($tmpl);
				$view['content'] = $this->table->generate($query);
				$this->load->view('print', $view);
			break;
		}
	}

	public function bank()
	{
		// Cek proses berdasarkan segmentasi pada alamat URL.
		switch($this->uri->segment(3)) {
			default:

				// HARUS ADA - Silahkan beri judul halaman
				$view['page_title'] = 'Sumbangan Per Bank';
				$view['page_desc'] 	= 'Laporan Berdasarkan Rekening Bank';  			

				// Sumbangan
				$sql 				= "	SELECT 
											a.nominal,
											a.tgl,
											a.create,
											b.nama AS penyumbang,
											c.nama AS bank
										FROM 
											sumbangan a
										LEFT JOIN penyumbang b 
											ON a.id_penyumbang = b.id_penyumbang
										LEFT JOIN mst_bank c 
											ON a.id_bank = c.id_bank
										";

				$query 				= $this->db->query($sql);
				$view['list'] 		= $query->result();			
				
				// HARUS ADA - Semua isi halaman akan diletakkan disini.
				$view['content'] 		= $this->load->view('bank', $view, true);			

				// CSS dan Plugin
				$view['js_files'] = array(
											base_url().PLUGINS.'/chartjs/chart.min.js',     
											base_url().CUSTOM.'/report.js'  
				);

				// HARUS ADA - Breadcrumbs - helper/monas_helper.php
				$view['breadcrumb']		= breadcrumbs(
											array(
												array('link'=>'#', 'title'=>'Laporan')
											), 
											'Bank'
				);

				// HARUS ADA - Proses keluaran untuk seluruh halaman
				$this->load->view('master', $view);

			break;

			case 'csv' :
				// Helper untuk membuat download file
				$this->load->helper('download');
				$filename = 'bank-'.date('Y-m-d h:i:s').'.csv';

				// Fasilitas untuk konversi hasil database menjadi CSV
				$this->load->dbutil();

				// Sumbangan
				$sql 				= "	SELECT 
											a.nominal,
											a.tgl,
											a.create,
											b.nama AS penyumbang,
											c.nama AS bank
										FROM 
											sumbangan a
										LEFT JOIN penyumbang b 
											ON a.id_penyumbang = b.id_penyumbang
										LEFT JOIN mst_bank c 
											ON a.id_bank = c.id_bank
										";

				$query 	= $this->db->query($sql);
				$data 	= $this->dbutil->csv_from_result($query);			
				force_download($filename, $data);
			break;

			case 'print' :
				// Fasilitas untuk konversi hasil database menjadi CSV
				$this->load->dbutil();

				// Fasilitas generate table
				$this->load->library('table');

				// Sumbangan
				$sql 				= "	SELECT 
											a.nominal,
											a.tgl,
											a.create,
											b.nama AS penyumbang,
											c.nama AS bank
										FROM 
											sumbangan a
										LEFT JOIN penyumbang b 
											ON a.id_penyumbang = b.id_penyumbang
										LEFT JOIN mst_bank c 
											ON a.id_bank = c.id_bank
										";

				$query 	= $this->db->query($sql);

				$tmpl = array ('table_open' => '<table border="0" cellpadding="4" cellspacing="0" class="table table-bordered">');
				$this->table->set_template($tmpl);
				$view['content'] = $this->table->generate($query);
				$this->load->view('print', $view);
			break;
		}
	}
}

/* End of file welcome.php */