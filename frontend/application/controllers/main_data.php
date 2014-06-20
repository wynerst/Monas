<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Operator extends MX_Controller {

	// -----------------------------------------------------------------------------------
	// List
	// -----------------------------------------------------------------------------------
	public function index()
	{
		// HARUS ADA - Silahkan beri judul halaman
		$view['page_title'] = 'Data Operator';
		$view['page_desc'] 	= 'Data Pengguna Sistem';

		// Operator
		$sql 				= "	SELECT
									*
								FROM
									user";

		$query 				= $this->db->query($sql);
		$view['list'] 		= $query->result();

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
		                     'field'   => 'username',
		                     'label'   => 'Username',
		                     'rules'   => 'required'
		                  ),
		               array(
		                     'field'   => 'password',
		                     'label'   => 'Password',
		                     'rules'   => 'required'
		                  ),
		               array(
		                     'field'   => 'nama',
		                     'label'   => 'Nama',
		                     'rules'   => 'required'
		                  ),
		               array(
		                     'field'   => 'email',
		                     'label'   => 'Email',
		                     'rules'   => 'required'
		                  )
        );

		$this->form_validation->set_rules($config);

		$view['custom_error'] 	= '';

        if ($this->form_validation->run() == false) {
             $view['custom_error'] = (validation_errors() ? '<div class="alert alert-danger">'.validation_errors().'</div>' : false);
        } else {

            $data = array(
                    'id_group' 			=> set_value('akses	'),
					'username' 			=> set_value('username'),
                    'nama' 				=> set_value('nama'),
					'password' 			=> md5(set_value('password')),
					'email' 			=> set_value('email')
            );

			if ($this->general_model->add('user', $data) == TRUE) {
				redirect(site_url().'/operator');
			} else {
				$view['custom_error'] = '<div class="aler alert-danger">Data Tidak Dapat Disimpan. Mohon dicoba kembali.</div>';
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

	public function edit()
	{

	}

	// -----------------------------------------------------------------------------------
	// Delete Item
	// -----------------------------------------------------------------------------------
    function delete(){
	    $ID =  $this->uri->segment(3);
	    $this->general_model->delete('user','id_user',$ID);
	    redirect(site_url().'/operator');
    }
}

/* End of file welcome.php */
