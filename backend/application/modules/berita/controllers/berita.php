<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Berita extends MX_Controller {

	public function __construct()
	{
		parent::__construct();		
		$this->output->enable_profiler(false); //for debug set as true
		$this->login->is_logged();
		$this->login->has_access();
		$this->load->library('typography');
	}

	// -----------------------------------------------------------------------------------
	// List
	// -----------------------------------------------------------------------------------

	public function index()
	{
		$view['page_title'] 	= 'Berita';
		$view['page_desc'] 		= 'Berita';  			
        $config					= $this->general_model->pagination_rules(site_url().'/relawan/index/', 'relawan',10);
        
        $this->pagination->initialize($config); 	
		$view['list'] 			= $this->general_model->get('berita','id_berita, id_user, berita, judul, sumber, url','',$config['per_page'],$this->uri->segment(3));		
		$view['content'] 		= $this->load->view('berita', $view, true);			
		$view['breadcrumb']		= breadcrumbs(
									array(
										array('link'=> '#', 'title'=>'Konten')
									), 
									'Berita'
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
		                     'field'   => 'judul', 
		                     'label'   => 'Judul', 
		                     'rules'   => 'required'
		                  ),   
		               array(
		                     'field'   => 'berita', 
		                     'label'   => 'Berita', 
		                     'rules'   => 'required'
		                  )   
        );

		$this->form_validation->set_rules($config);
		$view['custom_error'] 	= '';		

        if ($this->form_validation->run() == false) {
             $view['custom_error'] = (validation_errors() ? '<div class="alert alert-danger">'.validation_errors().'</div>' : false);
        } else {                            
            $data = array(
            		'id_user'	=> $this->session->userdata('id'),
                    'berita' 	=> $this->typography->format_characters(set_value('berita')),
                    'judul' 	=> set_value('judul'),
                    'url' 		=> str_replace(' ','_',strtolower(set_value('judul')))                    
            );           
			if ($this->general_model->add('berita', $data) == TRUE) {
				$this->logs->record($this->session->userdata('name').' Menambah Berita Dengan Judul ' . ucwords(set_value('judul')));
				redirect(site_url().'/berita');
			} else {
				$view['custom_error'] = '<div class="aler alert-danger">Data Tidak Dapat Disimpan. Mohon dicoba kembali.</div>';
			}
		}		   

		$view['css_files'] = array(
			base_url().PLUGINS.'summernote/dist/summernote.css'			
		);

		$view['js_files'] = array(
			base_url().PLUGINS.'summernote/dist/summernote.min.js'			
		);

		$view['content'] 	= $this->load->view('berita_add',$view,true);			
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
		                     'field'   => 'judul', 
		                     'label'   => 'Judul', 
		                     'rules'   => 'required'
		                  ),   
		               array(
		                     'field'   => 'berita', 
		                     'label'   => 'Berita', 
		                     'rules'   => 'required'
		                  )   
        );

		$this->form_validation->set_rules($config);
		$view['custom_error'] = '';
        if ($this->form_validation->run() == false) {
             $view['custom_error'] = (validation_errors() ? '<div class="alert alert-danger">'.validation_errors().'</div>' : false);

        } else {                            
            $data = array(
            		'id_user'	=> $this->session->userdata('id'),
                    'berita' 	=> $this->typography->format_characters(set_value('berita')),
                    'judul' 	=> set_value('judul'),
                    'url' 		=> str_replace(' ','_',strtolower(set_value('judul')))                    
            );           
           
			if ($this->general_model->edit('berita', $data, 'id_berita', $this->input->post('id_berita')) == TRUE) {
				$this->logs->record($this->session->userdata('name').' Mengubah Berita Dengan Judul '.$this->input->post('judul'));
				redirect(site_url().'/berita');
			} else {
				$view['custom_error'] = '<div class="alert alert-danger">Data Tidak Dapat Disimpan. Mohon dicoba kembali.</div>';
			}
		}


		$view['css_files'] = array(
			base_url().PLUGINS.'summernote/dist/summernote.css'			
		);

		$view['js_files'] = array(
			base_url().PLUGINS.'summernote/dist/summernote.min.js'			
		);

		$view['result'] 			= $this->general_model->get('berita','id_berita, judul, berita','id_berita = '.$this->uri->segment(3));		
		$view['content'] 			= $this->load->view('berita_edit', $view, true);		

		$this->load->view('master', $view);
    }

	// -----------------------------------------------------------------------------------
	// Delete Item
	// -----------------------------------------------------------------------------------
    function delete($ID)
    {
	    $query 		= $this->db->get_where('berita', array('id_berita' => $ID));
	    $berita 	= $query->row(); 
		$this->logs->record($this->session->userdata('name').' Menghapus Berita Dengan Judul '.$berita->judul);
	    $this->general_model->delete('berita','id_berita',$ID);             
	    redirect(site_url().'/berita');
    }

}

/* End of file welcome.php */