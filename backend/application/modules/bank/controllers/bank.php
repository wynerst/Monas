<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bank extends MX_Controller {

	public function __construct()
	{
		parent::__construct();		
		$this->output->enable_profiler(false); //for debug set as true
		$this->login->is_logged();
		$this->login->has_access();
	}

	// -----------------------------------------------------------------------------------
	// List
	// -----------------------------------------------------------------------------------
	public function index()
	{
		// HARUS ADA - Silahkan beri judul halaman
		$view['page_title'] 	= 'Bank';
		$view['page_desc'] 		= 'Data Total Per Bank';  			


        // Paging
        $config	= $this->general_model->pagination_rules(site_url().'/bank/index/', 'sumbangan','',null,null);
        $this->pagination->initialize($config); 	

		$view['list'] 			= $this->general_model->get('sumbangan','id_sumbangan, bca, bri, mandiri, tanggal','',$config['per_page'],$this->uri->segment(3));		
		$query 					= $this->db->query("SET group_concat_max_len=1024");
		$sql 					= " SELECT 
										GROUP_CONCAT(CONCAT(\"'\",DATE_FORMAT(tanggal, '%m/%d'),\"'\")) AS tanggal,
										GROUP_CONCAT(CONCAT(\"'\",bca,\"'\")) AS bca,
										GROUP_CONCAT(CONCAT(\"'\",bri,\"'\")) AS bri,
										GROUP_CONCAT(CONCAT(\"'\",mandiri,\"'\")) AS mandiri
									FROM 
										sumbangan
									ORDER BY 
										tanggal DESC";

		$query 					= $this->db->query($sql);
		if($query->num_rows() > 0 )
		{			
			$view['graph']		= $query->row();
		} 

		// HARUS ADA - Semua isi halaman akan diletakkan disini.
		$view['content'] 		= $this->load->view('bank', $view, true);			

		$view['js_files'] = array(
			base_url().PLUGINS.'chartjs/chart.min.js'
		);

		// HARUS ADA - Breadcrumbs - helper/monas_helper.php
		$view['breadcrumb']		= breadcrumbs(
									array(
										array('link'=>'#', 'title'=>'Sumbangan')
									), 
									'Per Bank'
		);

		// HARUS ADA - Proses keluaran untuk seluruh halaman
		$this->load->view('master', $view);
	}

	public function add()
	{
		// HARUS ADA - Silahkan beri judul halaman
		$view['page_title'] 	= 'Bank';
		$view['page_desc'] 		= 'Data Total Per Bank';  

		// HARUS ADA - Semua isi halaman akan diletakkan disini.
		$view['content'] 		= $this->load->view('bank_add', $view, true);	

		// HARUS ADA - Breadcrumbs - helper/monas_helper.php
		$view['breadcrumb']		= breadcrumbs(
									array(
										array('link'=>'#', 'title'=>'Sumbangan')
									), 
									'Per Bank'
		);

		// Aturan data input
		$config = array(
		               array(
		                     'field'   => 'tanggal', 
		                     'label'   => 'Tanggal', 
		                     'rules'   => 'required'
		                  ),
		               array(
		                     'field'   => 'bca', 
		                     'label'   => 'Total Rekening BCA', 
		                     'rules'   => 'required'
		                  ),
		               array(
		                     'field'   => 'bri', 
		                     'label'   => 'Total Rekening BRI', 
		                     'rules'   => 'required'
		                  ),
		               array(
		                     'field'   => 'mandiri', 
		                     'label'   => 'Total Rekening Mandiri', 
		                     'rules'   => 'required'
		                  )
        );
		$this->form_validation->set_rules($config);

		$view['custom_error'] 	= '';		

        if ($this->form_validation->run() == false) {
             $view['custom_error'] = (validation_errors() ? '<div class="alert alert-danger">'.validation_errors().'</div>' : false);
        } else {                            

            $data = array(
                    'tanggal' 		=> set_value('tanggal'),
					'bca' 			=> set_value('bca'),
					'bri' 			=> set_value('bri'),
					'mandiri' 		=> set_value('mandiri'),
					'operator'		=> $this->session->userdata('id')
            );
           
			if ($this->general_model->add('sumbangan', $data) == TRUE) {
				redirect(base_url().'index.php/bank');
			} else {
				$view['custom_error'] = '<div class="aler alert-danger">Data Tidak Dapat Disimpan. Mohon dicoba kembali.</div>';
			}
		}		   


		$view['css_files'] = array(
			base_url().PLUGINS.'select/bootstrap-select.min.css',
			base_url().PLUGINS.'daterangepicker/daterangepicker-bs3.css'
		);

		$view['js_files'] = array(
			base_url().PLUGINS.'daterangepicker/moment.min.js',
			base_url().PLUGINS.'daterangepicker/daterangepicker.js',
			base_url().PLUGINS.'select/bootstrap-select.min.js',
			base_url().PLUGINS.'parsley/parsley.js',
			base_url().CUSTOM.'select.js'
		);

		// HARUS ADA - Proses keluaran untuk seluruh halaman
		$this->load->view('master', $view);		
	}

	public function prints()
	{
		// Fasilitas untuk konversi hasil database menjadi CSV
		$this->load->dbutil();

		// Fasilitas generate table
		$this->load->library('table');

		// Sumbangan
		$sql 				= "	SELECT 
									tanggal,
									bca,
									bri,
									mandiri,
									date_create
								FROM 
									sumbangan
								ORDER BY
									tanggal DESC
								";

		$query 	= $this->db->query($sql);

		$tmpl = array ('table_open' => '<table border="0" cellpadding="4" cellspacing="0" class="table table-bordered">');
		$this->table->set_template($tmpl);
		$view['content'] = $this->table->generate($query);
		$this->load->view('print', $view);
	}

	public function csv()
	{
		// Helper untuk membuat download file
		$this->load->helper('download');
		$filename = 'sumbangan-'.date('Y-m-d h:i:s').'.csv';

		// Fasilitas untuk konversi hasil database menjadi CSV
		$this->load->dbutil();

		// Sumbangan
		$sql 				= "	SELECT 
									tanggal,
									bca,
									bri,
									mandiri,
									date_create
								FROM 
									sumbangan
								ORDER BY
									tanggal DESC
								";

		$query 	= $this->db->query($sql);
		$data 	= $this->dbutil->csv_from_result($query);			
		force_download($filename, $data);
	}
}

/* End of file welcome.php */