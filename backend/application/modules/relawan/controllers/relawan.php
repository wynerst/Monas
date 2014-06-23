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
		$view['page_title'] 	= 'Relawan';
		$view['page_desc'] 		= 'Data Para Relawan';  			
        $config					= $this->general_model->pagination_rules(site_url().'/relawan/index/', 'relawan',10);
        
        $this->pagination->initialize($config); 	
		$view['list'] 			= $this->general_model->get('relawan','id_relawan, nama_relawan,url','',$config['per_page'],$this->uri->segment(3));		
		$view['content'] 		= $this->load->view('relawan', $view, true);			
		$view['breadcrumb']		= breadcrumbs(
									array(
										array('link'=> '#', 'title'=>'Konten')
									), 
									'Relawan'
		);
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
										array('link'=> '#', 'title'=>'Konten'),
										array('link'=> site_url().'/relawan', 'title'=>'Relawan')
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
				$this->logs->record($this->session->userdata('name').' Menambah Data Relawan Atas Nama ' . ucwords(set_value('relawan')));
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

	// -----------------------------------------------------------------------------------
	// Edit Item
	// -----------------------------------------------------------------------------------    
    function edit()
    {        
		$view['page_title'] 	= 'Relawan';
		$view['page_desc'] 		= 'Data Para Relawan';  			
		$view['breadcrumb']		= breadcrumbs(
									array(
										array('link'=>'#', 'title'=>'Konten'),
										array('link'=> site_url().'/relawan', 'title'=>'Relawan')
									), 
									'Ubah Data Relawan'
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
		$view['custom_error'] = '';
        if ($this->form_validation->run() == false) {
             $view['custom_error'] = (validation_errors() ? '<div class="alert alert-danger">'.validation_errors().'</div>' : false);

        } else {                            
            $data = array(
                    'nama_relawan' 	=> $this->input->post('relawan'),
                    'url' 			=> $this->input->post('link')
            );
           
			if ($this->general_model->edit('relawan', $data, 'id_relawan', $this->input->post('id_relawan')) == TRUE) {
				$this->logs->record($this->session->userdata('name').' Mengubah Data Relawan Atas Nama '.$this->input->post('nama'));
				redirect(site_url().'/relawan');
			} else {
				$view['custom_error'] = '<div class="alert alert-danger">Data Tidak Dapat Disimpan. Mohon dicoba kembali.</div>';
			}
		}

		$view['result'] 			= $this->general_model->get('relawan','id_relawan, nama_relawan, url','id_relawan = '.$this->uri->segment(3));		
		$view['content'] 			= $this->load->view('relawan_edit', $view, true);		

		$this->load->view('master', $view);
    }

	// -----------------------------------------------------------------------------------
	// Delete Item
	// -----------------------------------------------------------------------------------
    function delete($ID)
    {
	    $query 		= $this->db->get_where('relawan', array('id_relawan' => $ID));
	    $relawan 	= $query->row(); 
		$this->logs->record($this->session->userdata('name').' Menghapus Data Relawan Atas Nama '.$relawan->nama_relawan);
	    $this->general_model->delete('relawan','id_relawan',$ID);             
	    redirect(site_url().'/relawan');
    }

}

/* End of file welcome.php */