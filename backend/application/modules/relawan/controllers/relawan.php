<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Relawan extends MX_Controller {

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
		$view['page_title'] = 'Relawan';
		$view['page_desc'] 	= 'Data Para Relawan';  			

		// Operator
		$sql 				= "	SELECT 
									id_relawan,
									nama_relawan,
									url
								FROM 
									relawan";

		$query 				= $this->db->query($sql);
		$view['list'] 		= $query->result();					

		// HARUS ADA - Semua isi halaman akan diletakkan disini.
		$view['content'] 		= $this->load->view('relawan', $view, true);			

		// HARUS ADA - Breadcrumbs - helper/monas_helper.php
		$view['breadcrumb']		= breadcrumbs(
									array(
										array('link'=>'#', 'title'=>'Konten')
									), 
									'Relawan'
		);

		// HARUS ADA - Proses keluaran untuk seluruh halaman
		$this->load->view('master', $view);
	}

	// -----------------------------------------------------------------------------------
	// Add Item
	// -----------------------------------------------------------------------------------

	public function add()
	{
		$view['page_title'] 	= 'Relawan';
		$view['page_desc'] 		= 'Data Para Relawan';  			
		$view['breadcrumb']		= breadcrumbs(
									array(
										array('link'=>'#', 'title'=>'Konten'),
										array('link'=>'#', 'title'=>'Relawan')
									), 
									'Tambah Data Relawan'
		);

		// Aturan data input
		$config = array(
		               array(
		                     'field'   => 'relawan', 
		                     'label'   => 'Nama Relawan', 
		                     'rules'   => 'required'
		                  )   
        );

		$this->form_validation->set_rules($config);
		$view['custom_error'] 	= '';		

        if ($this->form_validation->run() == false) {
             $view['custom_error'] = (validation_errors() ? '<div class="alert alert-danger">'.validation_errors().'</div>' : false);
        } else {                            

            $data = array(
                    'nama_relawan' 	=> set_value('relawan'),
                    'url' 			=> $this->input->post('link')
            );
           
			if ($this->general_model->add('relawan', $data) == TRUE) {
				redirect(site_url().'/relawan');
			} else {
				$view['custom_error'] = '<div class="aler alert-danger">Data Tidak Dapat Disimpan. Mohon dicoba kembali.</div>';
			}
		}		   

		$view['js_files'] = array(
			base_url().PLUGINS.'parsley/dist/parsley.min.js'
		);

		$view['content'] 	= $this->load->view('relawan_add',$view,true);			
		$this->load->view('master', $view);
	}

	public function edit()
	{
		
	}	

	// -----------------------------------------------------------------------------------
	// Delete Item
	// -----------------------------------------------------------------------------------
    function delete(){
	    $ID =  $this->uri->segment(3);
	    $this->general_model->delete('relawan','id_relawan',$ID);             
	    redirect(site_url().'/relawan');
    }

}

/* End of file welcome.php */