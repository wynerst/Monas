<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Total extends MX_Controller {

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
		$view['page_title'] 	= 'Total Sementara';
		$view['page_desc'] 		= 'Data Total Sementara';  			

		// Aturan data input
		$config = array(
		               array(
		                     'field'   => 'bca', 
		                     'label'   => 'BCA', 
		                     'rules'   => 'required'
		                  ),
		               array(
		                     'field'   => 'bri', 
		                     'label'   => 'BRI', 
		                     'rules'   => 'required'
		                  ),
		               array(
		                     'field'   => 'mandiri', 
		                     'label'   => 'Mandiri', 
		                     'rules'   => 'required'
		                  )   
        );
		$this->form_validation->set_rules($config);
		$view['custom_error'] 	= '';		

        if ($this->form_validation->run() == false) {
             $view['custom_error'] = (validation_errors() ? '<div class="alert alert-danger">'.validation_errors().'</div>' : false);
        } else {                            

            $data = array(
					'bca'		=> $this->input->post('bca'),
					'bri'		=> $this->input->post('bri'),
					'mandiri'	=> $this->input->post('mandiri'),
            );

			$sql 					= "SELECT bca, bri, mandiri FROM settings";
			$query 					= $this->db->query($sql);
			if($query->num_rows() > 0 )
			{	
				if ($this->db->update('settings', $data) == TRUE) {
					$this->logs->record($this->session->userdata('name').' Memperbaiki Data Total Sementara Dana Sumbangan');
					redirect(base_url().'index.php/total');
				} else {
					$view['custom_error'] = '<div class="aler alert-danger">Data Tidak Dapat Disimpan. Mohon dicoba kembali.</div>';
				}
			} else {
				if ($this->db->insert('settings', $data) == TRUE) {
					redirect(base_url().'index.php/total');
				} else {
					$view['custom_error'] = '<div class="aler alert-danger">Data Tidak Dapat Disimpan. Mohon dicoba kembali.</div>';
				}				
			}	           
		}		   

		$sql 					= "SELECT bca, bri, mandiri FROM settings";
		$query 					= $this->db->query($sql);
		if($query->num_rows() > 0 )
		{	
			$jml 				= $query->row();
			$view['bca']		= (int)$jml->bca;
			$view['bri']		= (int)$jml->bri;
			$view['mandiri']	= (int)$jml->mandiri;
		} else {
			$view['bca']		= 0;
			$view['bri']		= 0;
			$view['mandiri']	= 0;			
		}

		// HARUS ADA - Semua isi halaman akan diletakkan disini.
		$view['content'] 		= $this->load->view('total', $view, true);			

		// HARUS ADA - Breadcrumbs - helper/monas_helper.php
		$view['breadcrumb']		= breadcrumbs(
									array(
										array('link'=>'#', 'title'=>'Sumbangan')
									), 
									'Total Sementara'
		);

		// HARUS ADA - Proses keluaran untuk seluruh halaman
		$this->load->view('master', $view);
	}

	public function import()
	{
		$sql = "SELECT 	
					SUM(bca) AS bca,
					SUM(bri) AS bri,
					SUM(mandiri) AS mandiri
				FROM
					sumbangan
				";

		$query 	= $this->db->query($sql);
		if($query->num_rows() > 0 )
		{	
			$import = $query->row(); 
			$this->db->set('bca', $import->bca);
			$this->db->set('bri', $import->bri);
			$this->db->set('mandiri', $import->mandiri);
			if($this->db->update('settings'))
			{
				$this->logs->record($this->session->userdata('name').' Mengimpor Total Sementara Dana Sumbangan');
				redirect(base_url().'index.php/total');
			}
		}

	}
}

/* End of file welcome.php */