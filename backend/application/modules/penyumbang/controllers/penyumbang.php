<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penyumbang extends MX_Controller {

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
		$view['page_title'] 	= 'Penyumbang';
		$view['page_desc'] 		= 'Data Penyumbang Dana';  			


        // Paging
        $config	= $this->general_model->pagination_rules(site_url().'/penyumbang/index/', 'sumbangan',10	);
        $this->pagination->initialize($config); 	

		// List Data
		if(isset($_POST['q'])) {
			switch($_POST['filter']) {
				default 	:
				case 'nama' :
					$filter = 'nama';
					$this->db->like($filter, $_POST['q']);
				break;

				case 'tanggal':
					$filter = 'tgl';
					$this->db->where($filter, "date_format('".$_POST['q']."', '%y/%m/%d')", false);
				break;

				case 'nominal' :
					$filter = 'nominal';
					$this->db->where($filter, $_POST['q']);
				break;
			}
		}

		$view['list'] 			= $this->general_model->get('sumbangan','id_sumbangan, nama, bank_transfer, nominal, tgl','',$config['per_page'],$this->uri->segment(3));
		
		// HARUS ADA - Semua isi halaman akan diletakkan disini.
		$view['content'] 		= $this->load->view('penyumbang', $view, true);			

		$view['css_files'] = array(
			base_url().PLUGINS.'daterangepicker/daterangepicker-bs3.css'
		);

		$view['js_files'] = array(
			base_url().PLUGINS.'daterangepicker/moment.min.js',
			base_url().PLUGINS.'daterangepicker/daterangepicker.js'
		);


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

	// -----------------------------------------------------------------------------------
	// Add Item
	// -----------------------------------------------------------------------------------
    function add()
    {        
		$view['page_title'] 	= 'Penyumbang';
		$view['page_desc'] 		= 'Data Penyumbang Dana';  			
		$view['breadcrumb']		= breadcrumbs(
									array(
										array('link'=>'#', 'title'=>'Sumbangan'),
										array('link'=>'#', 'title'=>'Penyumbang')
									), 
									'Tambah Data Penyumbang'
		);

		// Aturan data input
		$config = array(
		               array(
		                     'field'   => 'nama', 
		                     'label'   => 'Nama', 
		                     'rules'   => 'required'
		                  ),
		               array(
		                     'field'   => 'bank_transfer', 
		                     'label'   => 'Transfer Bank', 
		                     'rules'   => 'required'
		                  ),
		               array(
		                     'field'   => 'tanggal_transfer', 
		                     'label'   => 'Tanggal Transfer', 
		                     'rules'   => 'required'
		                  ),
		               array(
		                     'field'   => 'nominal', 
		                     'label'   => 'Nominal', 
		                     'rules'   => 'required'
		                  )   
        );
		$this->form_validation->set_rules($config);

		$view['custom_error'] 	= '';		

        if ($this->form_validation->run() == false) {
             $view['custom_error'] = (validation_errors() ? '<div class="alert alert-danger">'.validation_errors().'</div>' : false);
        } else {                            

            $data = array(
                    'nama' 			=> set_value('nama'),
					'bank_transfer' => set_value('bank_transfer'),
					'nominal' 		=> set_value('nominal'),
					'tgl' 			=> set_value('tanggal_transfer')
            );
           
			if ($this->general_model->add('sumbangan', $data) == TRUE) {
				redirect(base_url().'index.php/penyumbang');
			} else {
				$view['custom_error'] = '<div class="aler alert-danger">Data Tidak Dapat Disimpan. Mohon dicoba kembali.</div>';
			}
		}		   

		$view['bank_list'] 			= $this->general_model->bank_list();
		$view['content'] = $this->load->view('penyumbang_add', $view, true);   

		$view['css_files'] = array(
			base_url().PLUGINS.'select/bootstrap-select.min.css',
			base_url().PLUGINS.'daterangepicker/daterangepicker-bs3.css'
		);

		$view['js_files'] = array(
			base_url().PLUGINS.'daterangepicker/moment.min.js',
			base_url().PLUGINS.'daterangepicker/daterangepicker.js',
			base_url().PLUGINS.'select/bootstrap-select.min.js',
			base_url().PLUGINS.'parsley/dist/parsley.min.js',
			base_url().CUSTOM.'select.js',
		);

		$this->load->view('master', $view);
    }	

	// -----------------------------------------------------------------------------------
	// Edit Item
	// -----------------------------------------------------------------------------------    
    function edit()
    {        
		$view['page_title'] 	= 'Penyumbang';
		$view['page_desc'] 		= 'Data Penyumbang Dana';  			
		$view['breadcrumb']		= breadcrumbs(
									array(
										array('link'=>'#', 'title'=>'Sumbangan'),
										array('link'=>'#', 'title'=>'Penyumbang')
									), 
									'Tambah Data Penyumbang'
		);

		// Aturan data input
		$config = array(
		               array(
		                     'field'   => 'nama', 
		                     'label'   => 'Nama', 
		                     'rules'   => 'required'
		                  ),
		               array(
		                     'field'   => 'bank_transfer', 
		                     'label'   => 'Transfer Bank', 
		                     'rules'   => 'required'
		                  ),
		               array(
		                     'field'   => 'tanggal_transfer', 
		                     'label'   => 'Tanggal Transfer', 
		                     'rules'   => 'required'
		                  ),
		               array(
		                     'field'   => 'nominal', 
		                     'label'   => 'Nominal', 
		                     'rules'   => 'required'
		                  )   
        );

		$this->form_validation->set_rules($config);

		$view['custom_error'] = '';
		
        if ($this->form_validation->run() == false)
        {
             $view['custom_error'] = (validation_errors() ? '<div class="alert alert-danger">'.validation_errors().'</div>' : false);

        } else {                            

            $data = array(
                    'nama' 			=> $this->input->post('nama'),
					'bank_transfer' => $this->input->post('bank_transfer'),
					'nominal' 		=> $this->input->post('nominal'),
					'tgl' 			=> $this->input->post('tanggal_transfer')
            );
           
			if ($this->general_model->edit('sumbangan', $data, 'id_sumbangan', $this->input->post('id_sumbangan')) == TRUE)
			{
				redirect(site_url().'/penyumbang');
			} else {
				$view['custom_error'] = '<div class="alert alert-danger">Data Tidak Dapat Disimpan. Mohon dicoba kembali.</div>';
			}
		}

		$view['bank_list'] 			= $this->general_model->bank_list();
		$view['result'] 			= $this->general_model->get('sumbangan','id_sumbangan, nama, bank_transfer, nominal, tgl','id_sumbangan = '.$this->uri->segment(3));		
		$view['content'] 			= $this->load->view('penyumbang_edit', $view, true);		

		$view['css_files'] 			= array(
			base_url().PLUGINS.'select/bootstrap-select.min.css',
			base_url().PLUGINS.'daterangepicker/daterangepicker-bs3.css'
		);

		$view['js_files'] 			= array(
			base_url().PLUGINS.'daterangepicker/moment.min.js',
			base_url().PLUGINS.'daterangepicker/daterangepicker.js',
			base_url().PLUGINS.'select/bootstrap-select.min.js',
			base_url().PLUGINS.'parsley/dist/parsley.min.js',
			base_url().CUSTOM.'select.js',
		);

		$this->load->view('master', $view);
    }
	
	// -----------------------------------------------------------------------------------
	// Delete Item
	// -----------------------------------------------------------------------------------
    function delete(){
	    $ID =  $this->uri->segment(3);
	    $this->general_model->delete('sumbangan','id_sumbangan',$ID);             
	    redirect(site_url().'/penyumbang');
    }

}

/* End of file welcome.php */