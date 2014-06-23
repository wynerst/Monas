<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pribadi extends MX_Controller {

	public function __construct()
	{
		parent::__construct();		
		$this->output->enable_profiler(true); //for debug set as true
		$this->login->is_logged();
		$this->login->has_access();
	}

	public function index()
	{		   
		$this->load->helper('file');
		$view['page_title'] = 'Data Pribadi';
		$view['page_desc'] 	= 'Tentang Diri Anda';  			

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
		                     'field'   => 'current_password', 
		                     'label'   => 'Password Lama', 
		                     'rules'   => 'min_length[4]'
		                  ),
		               array(
		                     'field'   => 'new_password', 
		                     'label'   => 'Password Baru', 
		                     'rules'   => 'min_length[4]'
		                  ),
		               array(
		                     'field'   => 'retype_password', 
		                     'label'   => 'Retype Password', 
		                     'rules'   => 'min_length[4]|matches[new_password]'
		                  )		               
        );

		$this->form_validation->set_rules($config);
		$view['custom_error'] 	= '';		
        if ($this->form_validation->run() == false) {
             $view['custom_error'] = (validation_errors() ? '<div class="alert alert-danger">'.validation_errors().'</div>' : false);
        } else {                            
            $data = array(
                    'nama' 				=> $this->input->post('nama'),
					'email' 			=> $this->input->post('email'),
					'username' 			=> $this->input->post('username')
            );
           
			if ($this->general_model->edit('user', $data, 'id_user', $this->session->userdata('id')) == TRUE) {
	        	if($this->input->post('current_password') != '') {
		           	$check = array(
		                    'id_user' 			=> $this->session->userdata('id'),
							'password' 			=> md5($this->input->post('current_password'))
		            );
		        	$user = $this->db->get_where('user', $check);
		        	if($user->num_rows() > 0) {
			            $data = array(
								'password' 			=> md5(set_value('retype_password'))
			            );		           
						if ($this->general_model->edit('user', $data, 'id_user', $this->session->userdata('id')) == TRUE) {
							$this->logs->record($this->session->userdata('name').' Mengubah Password');
							$view['custom_error'] = '<div class="alert alert-success">Password telah diubah.</div>';
						} else {
							$view['custom_error'] = '<div class="alert alert-danger">Data Tidak Dapat Disimpan. Mohon dicoba kembali.</div>';
						}
		        	} else {
			     		$view['custom_error']	= '<div class="alert alert-danger">Password lama salah. Silahkan dicoba kembali.</div>';
		        	}
	        	} else {
					$this->logs->record($this->session->userdata('name').' Mengubah Data Pribadi');
					redirect(site_url().'/pribadi');
	        	}
			} else {
				$view['custom_error'] = '<div class="alert alert-danger">'.$this->db->_error_message().'</div>';
			}
		}

		// User
		$sql 				= "	SELECT 
									*
								FROM 
									user
								WHERE
									id_user = '".$this->session->userdata('id')."'
								";

		$query 				= $this->db->query($sql);
		$pribadi 			= $query->row();
		$view['pribadi'] 	= $pribadi;			

/*
		$fileread 			= 'uploads/'.$pribadi->username.'.jpg';
		$photo 				= base64_encode(read_file($fileread));
		if($photo != '') {
			$view['photo']		= 'data:image/jpg;base64,'.$photo;
		} else {
			$view['photo']		= base_url().IMG.'/avatar/blank.jpg';
		}
*/
		// CSS Files
		$view['css_files'] 	= array(
							  base_url().PLUGINS.'select/bootstrap-select.min.css'

		);

		// JS Files
		$view['js_files'] 	= array(
								base_url().PLUGINS.'filestyle/src/bootstrap-filestyle.js',
  								base_url().PLUGINS.'select/bootstrap-select.min.js',
  								base_url().CUSTOM .'profil.js'
		);
		
		// HARUS ADA - Semua isi halaman akan diletakkan disini.
		$view['content'] 		= $this->load->view('pribadi', $view, true);			

		// HARUS ADA - Breadcrumbs - helper/monas_helper.php
		$view['breadcrumb']		= breadcrumbs(
									array(
										array('link'=>'#', 'title'=>'Pengguna')
									), 
									'Data Pribadi'
		);

		// HARUS ADA - Proses keluaran untuk seluruh halaman
		$this->load->view('master', $view);
	}
}

/* End of file welcome.php */