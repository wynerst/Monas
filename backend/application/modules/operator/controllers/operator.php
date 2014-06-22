<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Operator extends MX_Controller {

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
		$view['page_title'] = 'Data Operator';
		$view['page_desc'] 	= 'Data Pengguna Sistem';  			

        // Paging
        $config	= $this->general_model->pagination_rules(site_url().'/operator/index/', 'user',10);
        $this->pagination->initialize($config); 	

        // Operator
        $this->db->order_by('create_time', 'desc');
		$view['list'] 			= $this->general_model->get('user','id_user, username, nama, email, create_time','',$config['per_page'],$this->uri->segment(3));

		// HARUS ADA - Semua isi halaman akan diletakkan disini.
		$view['content'] 		= $this->load->view('operator', $view, true);			

		// HARUS ADA - Breadcrumbs - helper/monas_helper.php
		$view['breadcrumb']		= breadcrumbs(
									array(
										array('link'=>'#', 'title'=>'Pengguna')
									), 
									'Data Operator'
		);

		// HARUS ADA - Proses keluaran untuk seluruh halaman
		$this->load->view('master', $view);
	}

	// -----------------------------------------------------------------------------------
	// Add Item
	// -----------------------------------------------------------------------------------
	public function add()
	{
		$view['page_title'] 	= 'Pengguna';
		$view['page_desc'] 		= 'Tambah Data Operator';  			
		$view['breadcrumb']		= breadcrumbs(
									array(
										array('link'=>'#', 'title'=>'Pengguna'),
										array('link'=>'#', 'title'=>'Data Operator')
									), 
									'Tambah Data Operator'
		);

		// Group User Dropdown
		$sql 				= "	SELECT 
									*
								FROM 
									user_group";

		$query 				= $this->db->query($sql);

		if($query->num_rows() > 0 ){
			$group 	= $query->result();						
			foreach ($group as $user_group) {
				$akses[$user_group->id_group] = $user_group->nama_group;
			}
			$view['user_group'] = $akses;
		} else {
			$view['user_group']	= 0;
		}

		// Aturan data input
		$config = array(
		               array(
		                     'field'   => 'nama', 
		                     'label'   => 'Nama', 
		                     'rules'   => 'required'
		                  ),
		               array(
		                     'field'   => 'email', 
		                     'label'   => 'Email', 
		                     'rules'   => 'required'
		                  ),   
		               array(
		                     'field'   => 'username', 
		                     'label'   => 'Username', 
		                     'rules'   => 'required'
		                  ),
		               array(
		                     'field'   => 'password', 
		                     'label'   => 'Password', 
		                     'rules'   => 'required|min_length[4]'
		                  ),
		               array(
		                     'field'   => 'retype-password', 
		                     'label'   => 'Retype Password', 
		                     'rules'   => 'required|min_length[4]|matches[password]'
		                  )
        );

		$this->form_validation->set_rules($config);

		$view['custom_error'] 	= '';		

        if ($this->form_validation->run() == false) {
             $view['custom_error'] = (validation_errors() ? '<div class="alert alert-danger">'.validation_errors().'</div>' : false);
        } else {                            

            $data = array(
                    'id_group' 			=> $this->input->post('akses'),
					'username' 			=> set_value('username'),
                    'nama' 				=> set_value('nama'),
					'password' 			=> md5(set_value('retype-password')),
					'email' 			=> set_value('email')
            );
           
			if ($this->general_model->add('user', $data) == TRUE) {
				$this->logs->record($this->session->userdata('name').' Menambah Data Operator Atas Nama '.$this->input->post('nama'));
				redirect(site_url().'/operator');
			} else {
				$view['custom_error'] = '<div class="alert alert-danger">'.$this->db->_error_message().'</div>';
			}
		}		   

		$view['content'] 	= $this->load->view('operator_add',$view,true);			

		$view['css_files'] = array(
			base_url().PLUGINS.'select/bootstrap-select.min.css'
		);

		$view['js_files'] = array(
			base_url().PLUGINS.'select/bootstrap-select.min.js',
			base_url().PLUGINS.'parsley/dist/parsley.min.js',
			base_url().CUSTOM.'setting.js'
		);


		$this->load->view('master', $view);
	}

	// -----------------------------------------------------------------------------------
	// Edit Item
	// -----------------------------------------------------------------------------------    
	public function edit()
	{
		$view['page_title'] 	= 'Pengguna';
		$view['page_desc'] 		= 'Tambah Data Operator';  			
		$view['breadcrumb']		= breadcrumbs(
									array(
										array('link' => '#', 'title'=>'Pengguna'),
										array('link' => site_url().'/operator', 'title'=>'Data Operator')
									), 
									'Ubah Data Operator'
		);

		// Group User Dropdown
		$sql 				= "	SELECT 
									*
								FROM 
									user_group";

		$query 				= $this->db->query($sql);

		if($query->num_rows() > 0 ){
			$group 	= $query->result();						
			foreach ($group as $user_group) {
				$akses[$user_group->id_group] = $user_group->nama_group;
			}
			$view['user_group'] = $akses;
		} else {
			$view['user_group']	= 0;
		}

		// Aturan data input
		$config = array(
		               array(
		                     'field'   => 'nama', 
		                     'label'   => 'Nama', 
		                     'rules'   => 'required'
		                  ),
		               array(
		                     'field'   => 'email', 
		                     'label'   => 'Email', 
		                     'rules'   => 'required'
		                  ),   
		               array(
		                     'field'   => 'username', 
		                     'label'   => 'Username', 
		                     'rules'   => 'required'
		                  ),
		               array(
		                     'field'   => 'password', 
		                     'label'   => 'Password', 
		                     'rules'   => 'required|min_length[4]'
		                  ),
		               array(
		                     'field'   => 'retype-password', 
		                     'label'   => 'Retype Password', 
		                     'rules'   => 'required|min_length[4]|matches[password]'
		                  )
        );

		$this->form_validation->set_rules($config);

		$view['custom_error'] 	= '';		

        if ($this->form_validation->run() == false) {
            $view['custom_error'] = (validation_errors() ? '<div class="alert alert-danger">'.validation_errors().'</div>' : false);
        } else {                            
            $data = array(
                    'id_group' 			=> $this->input->post('akses'),
					'username' 			=> $this->input->post('username'),
                    'nama' 				=> $this->input->post('nama'),
					'password' 			=> md5($this->input->post('retype-password')),
					'email' 			=> $this->input->post('email')
            );
           
			if ($this->general_model->edit('user', $data, 'id_user', $this->input->post('id_user')) == TRUE) {
				$this->logs->record($this->session->userdata('name').' Mengubah Data Operator Atas Nama '.$this->input->post('nama'));
				redirect(site_url().'/operator');
			} else {
				$view['custom_error'] = '<div class="aler alert-danger">Data Tidak Dapat Disimpan. Mohon dicoba kembali.</div>';
			}
		}		   

		$view['result']		= $this->general_model->get('user','id_user, id_user, id_group, username, nama, email','id_user = '.$this->uri->segment(3));		
		$view['content'] 	= $this->load->view('operator_edit',$view,true);			

		$view['css_files'] 	= array(
			base_url().PLUGINS.'select/bootstrap-select.min.css'
		);

		$view['js_files'] 	= array(
			base_url().PLUGINS.'select/bootstrap-select.min.js',
			base_url().PLUGINS.'parsley/dist/parsley.min.js',
			base_url().CUSTOM.'setting.js'
		);


		$this->load->view('master', $view);
	}

	// -----------------------------------------------------------------------------------
	// Delete Item
	// -----------------------------------------------------------------------------------
    function delete($ID){
	    $query 		= $this->db->get_where('user', array('id_user' => $ID));
	    $user 		= $query->row(); 
		$this->logs->record($this->session->userdata('name').' Menghapus Data Operator Atas Nama '.$user->nama);
	    $this->general_model->delete('user','id_user',$ID);             
	    redirect(site_url().'/operator');
    }
}

/* End of file welcome.php */