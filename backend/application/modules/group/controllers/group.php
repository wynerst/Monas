<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Group extends MX_Controller {

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
									'Data Group '
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
										array('link'=>'#', 'title'=>'Data Group')
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
		
	}	

	// -----------------------------------------------------------------------------------
	// Delete Item
	// -----------------------------------------------------------------------------------
    function delete(){
	    $ID =  $this->uri->segment(3);
	    $this->general_model->delete('user_group','id_group',$ID);             
	    redirect(site_url().'/group');
    }

}

/* End of file welcome.php */