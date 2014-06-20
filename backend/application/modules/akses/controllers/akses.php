<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Akses extends MX_Controller {

	public function __construct()
	{
		parent::__construct();		
		$this->output->enable_profiler(false); //for debug set as true
		$this->login->is_logged();
		$this->login->has_access();
	}
	
	public function index()
	{
		// HARUS ADA - Silahkan beri judul halaman
		$view['page_title'] = 'Hak Akses';
		$view['page_desc'] 	= 'Menentukan Akses Sistem Berdasarkan User';  			

		// Rekening Bank
		$sql 				= "	SELECT 
									a.id_group,
									b.nama_group
								FROM 
									hak_akses a
								LEFT JOIN 
									user_group b ON a.id_group = b.id_group
								GROUP BY
									a.id_group
								";

		$query 				= $this->db->query($sql);
		$view['list'] 		= $query->result();			
		
		// HARUS ADA - Semua isi halaman akan diletakkan disini.
		$view['content'] 		= $this->load->view('akses', $view, true);			

		// HARUS ADA - Breadcrumbs - helper/monas_helper.php
		$view['breadcrumb']		= breadcrumbs(
									array(
										array('link'=>'#', 'title'=>'Pengguna')
									), 
									'Hak Akses'
		);

		// HARUS ADA - Proses keluaran untuk seluruh halaman
		$this->load->view('master', $view);
	}

	public function add()
	{
		$view['page_title'] = 'Pengguna';
		$view['page_desc'] 	= 'Menentukan Akses Sistem Berdasarkan User';  			
		$view['breadcrumb']		= breadcrumbs(
									array(
										array('link'=>'#', 'title'=>'Pengguna'),
										array('link'=>'#', 'title'=>'Hak Akses')
									), 
									'Tambah Data Hak Akses'
		);

		// Aturan data input
		$config = array(
		               array(
		                     'field'   => 'modul_id', 
		                     'label'   => 'Status Akses', 
		                     'rules'   => 'required'
		                  )   
        );

		$this->form_validation->set_rules($config);
		$view['custom_error'] 	= '';		

        if ($this->form_validation->run() == false) {
             $view['custom_error'] = (validation_errors() ? '<div class="alert alert-danger">'.validation_errors().'</div>' : false);
        } else {                            

        	$group_id = $this->input->post('akses');
        	$modul_id = $this->input->post('modul_id');

        	foreach($modul_id as $modul) 
        	{
				$data[] = array(
						      'id_modul' => $modul,
						      'id_group' => $group_id
				);        		
        	}

        	// debug($data, true);

			if($this->db->insert_batch('hak_akses', $data)) {
				redirect(site_url().'/akses');    				
			} else {
				$view['custom_error'] = '<div class="aler alert-danger">Data Tidak Dapat Disimpan. Mohon dicoba kembali.</div>';
			}

		}		   

		// Group User Dropdown
		$sql 				= "	SELECT 
									*
								FROM 
									user_group									
								";

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

		$view['menu']		= $menu;
		$view['css_files'] = array(
			base_url().PLUGINS.'select/bootstrap-select.min.css'
		);

		$view['js_files'] = array(
			base_url().PLUGINS.'select/bootstrap-select.min.js',
			base_url().PLUGINS.'parsley/dist/parsley.min.js',
			base_url().CUSTOM.'setting.js'
		);

		$view['content'] 	= $this->load->view('akses_add',$view,true);			
		$this->load->view('master', $view);
	}

	public function edit()
	{
		
	}	

	public function delete()
	{
	
	}	

}

/* End of file welcome.php */