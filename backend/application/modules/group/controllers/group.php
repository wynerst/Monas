<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Group extends MX_Controller {

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
		$view['page_title'] 	= 'Group';
		$view['page_desc'] 		= 'Data Group Operator';  			

		// Operator
		$sql 				= "	SELECT 
									id_group,
									nama_group
								FROM 
									user_group";

		$query 				= $this->db->query($sql);
		$view['list'] 		= $query->result();					

		// HARUS ADA - Semua isi halaman akan diletakkan disini.
		$view['content'] 		= $this->load->view('group', $view, true);			

		// HARUS ADA - Breadcrumbs - helper/monas_helper.php
		$view['breadcrumb']		= breadcrumbs(
									array(
										array('link'=>'#', 'title'=>'Pengguna')
									), 
									'Group '
		);

		// HARUS ADA - Proses keluaran untuk seluruh halaman
		$this->load->view('master', $view);
	}

	// -----------------------------------------------------------------------------------
	// Add Item
	// -----------------------------------------------------------------------------------

	public function add()
	{
		$view['page_title'] 	= 'Group';
		$view['page_desc'] 		= 'Data Group Operator';  			
		$view['breadcrumb']		= breadcrumbs(
									array(
										array('link'=>'#', 'title'=>'Pengguna'),
										array('link'=> site_url().'/group', 'title'=>'Group')
									), 
									'Tambah Data Group'
		);

		// Aturan data input
		$config = array(
		               array(
		                     'field'   => 'group', 
		                     'label'   => 'Nama Group', 
		                     'rules'   => 'required'
		                  )   
        );

		$this->form_validation->set_rules($config);
		$view['custom_error'] 	= '';		

        if ($this->form_validation->run() == false) {
             $view['custom_error'] = (validation_errors() ? '<div class="alert alert-danger">'.validation_errors().'</div>' : false);
        } else {                            

            $data = array(
                    'nama_group' 	=> set_value('group')
            );
           
			if ($this->general_model->add('user_group', $data) == TRUE) {
				$this->logs->record($this->session->userdata('name').' Menambah Group Dengan Nama '.set_value('group'));
				redirect(site_url().'/group');
			} else {
				$view['custom_error'] = '<div class="aler alert-danger">Data Tidak Dapat Disimpan. Mohon dicoba kembali.</div>';
			}
		}		   

		$view['js_files'] = array(
			base_url().PLUGINS.'parsley/dist/parsley.min.js'
		);

		$view['content'] 	= $this->load->view('group_add',$view,true);			
		$this->load->view('master', $view);
	}

	public function edit()
	{
		$view['page_title'] 	= 'Group';
		$view['page_desc'] 		= 'Data Group Operator';  			
		$view['breadcrumb']		= breadcrumbs(
									array(
										array('link'=>'#', 'title'=>'Pengguna'),
										array('link'=> site_url().'/group', 'title'=>'Group')
									), 
									'Ubah Data Group'
		);

		// Aturan data input
		$config = array(
		               array(
		                     'field'   => 'group', 
		                     'label'   => 'Nama Group', 
		                     'rules'   => 'required'
		                  )   
        );

		$this->form_validation->set_rules($config);
		$view['custom_error'] 	= '';		

        if ($this->form_validation->run() == false) {
             $view['custom_error'] = (validation_errors() ? '<div class="alert alert-danger">'.validation_errors().'</div>' : false);
        } else {                            
            $data = array(
                    'nama_group' 	=> $this->input->post('group')
            );
           
			if ($this->general_model->edit('user_group', $data, 'id_group', $this->input->post('id_group')) == TRUE) {
				$this->logs->record($this->session->userdata('name').' Mengubah Nama Group Menjadi '.$this->input->post('group'));
				redirect(site_url().'/group');
			} else {
				$view['custom_error'] = '<div class="aler alert-danger">Data Tidak Dapat Disimpan. Mohon dicoba kembali.</div>';
			}
		}		   

		$view['js_files'] = array(
			base_url().PLUGINS.'parsley/dist/parsley.min.js'
		);

		$view['result'] 			= $this->general_model->get('user_group','id_group, nama_group','id_group = '.$this->uri->segment(3));		
		$view['content'] 			= $this->load->view('group_edit', $view, true);			
		$this->load->view('master', $view);
	}	

	// -----------------------------------------------------------------------------------
	// Delete Item
	// -----------------------------------------------------------------------------------
    function delete($ID)
    {
	    $query 		= $this->db->get_where('user_group', array('id_group' => $ID));
	    $group 		= $query->row(); 
		$this->logs->record($this->session->userdata('name').' Menghapus Group '.$group->nama_group);
	    $this->general_model->delete('user_group','id_group',$ID);             
	    redirect(site_url().'/group');		
    }

}

/* End of file welcome.php */