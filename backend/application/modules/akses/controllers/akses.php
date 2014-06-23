<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Akses extends MX_Controller {

	public function __construct()
	{
		parent::__construct();		
		$this->output->enable_profiler(false); //for debug set as true
		$this->login->is_logged();
		// $this->login->has_access();
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
										array('link'=> site_url(). '/akses', 'title'=>'Hak Akses')
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
        	$group_id 	= $this->input->post('akses');
        	$modul_id 	= $this->input->post('modul_id');

        	// Nama Group 
        	$query 		= $this->db->get('user_group', array('id_group' => $group_id));
        	$group 		= $query->row();

        	foreach($modul_id as $modul) 
        	{
				$data[] = array(
						      'id_modul' => $modul,
						      'id_group' => $group_id
				);        		
        	}

			if($this->db->insert_batch('hak_akses', $data)) {
				$this->logs->record($this->session->userdata('name').' Membuat Hak Akses Group '.$group->nama_group);
				redirect(site_url().'/akses');    				
			} else {
				$view['custom_error'] = '<div class="aler alert-danger">Data Tidak Dapat Disimpan. Mohon dicoba kembali.</div>';
			}

		}		   

		// Group User Dropdown
		$sql 				= "	SELECT 
									a.id_group,
									a.nama_group
								FROM 
									user_group a	
								LEFT JOIN
									hak_akses b ON a.id_group = b.id_group
								WHERE 
									b.id_group IS NULL
								GROUP BY 
									a.id_group
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

		// Modul List
		$menu 				= array();
		$sql 				= "	SELECT 
									*
								FROM 
									mst_modul
								WHERE
									modul_parent = 0
								";

		$query 				= $this->db->query($sql);

		if($query->num_rows() > 0) {
			foreach ($query->result() as $modul) {
				$menu[$modul->id_modul]['menu']	= $modul->modul;
				$sql 		= " SELECT 
									*
								FROM 
									mst_modul
								WHERE
									modul_parent 	= ".$modul->id_modul;

				$sub_modul 	= $this->db->query($sql);
				if($sub_modul->num_rows() > 0 )
				{
					foreach ($sub_modul->result() as $sub) {
						$menu[$modul->id_modul]['sub'][$sub->id_modul] = $sub->modul;
					}
				} else {
					$menu[$modul->id_modul]['sub'] = array();
				}
			}
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

	// -----------------------------------------------------------------------------------
	// Edit Item
	// -----------------------------------------------------------------------------------

	public function edit($id)
	{
		$view['page_title'] = 'Pengguna';
		$view['page_desc'] 	= 'Menentukan Akses Sistem Berdasarkan User';  			
		$view['breadcrumb']		= breadcrumbs(
									array(
										array('link'=>'#', 'title'=>'Pengguna'),
										array('link'=> site_url(). '/akses', 'title'=>'Hak Akses')
									), 
									'Ubah Data Hak Akses'
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
        	$this->db->delete('hak_akses', array('id_group' => $this->input->post('akses')));
        	$group_id = $this->input->post('akses');
        	$modul_id = $this->input->post('modul_id');

        	// Nama Group 
        	$query 		= $this->db->get('user_group', array('id_group' => $group_id));
        	$group 		= $query->row();

        	foreach($modul_id as $modul) 
        	{
				$data[] = array(
						      'id_modul' => $modul,
						      'id_group' => $group_id
				);        		
        	}

			if($this->db->insert_batch('hak_akses', $data)) {
				$this->logs->record($this->session->userdata('name').' Mengubah Hak Akses Group '.$group->nama_group);
				redirect(site_url().'/akses');    				
			} else {
				$view['custom_error'] = '<div class="aler alert-danger">Data Tidak Dapat Disimpan. Mohon dicoba kembali.</div>';
			}

		}		   

		// Group User Dropdown
		$sql 				= "	SELECT 
									a.id_group,
									a.nama_group
								FROM 
									user_group a	
								LEFT JOIN
									hak_akses b ON a.id_group = b.id_group
								WHERE 
									a.id_group = $id
								GROUP BY 
									a.id_group
								";
		$query 				= $this->db->query($sql);
		if($query->num_rows() > 0 ) {
			$group 	= $query->result();						
			foreach ($group as $user_group) {
				$akses[$user_group->id_group] = $user_group->nama_group;
			}
			$view['user_group'] = $akses;
		} else {
			$view['user_group']	= 0;
		}

		// Modul List
		$menu 				= array();
		$sql 				= "	SELECT 
									*
								FROM 
									mst_modul
								WHERE
									modul_parent = 0
								";

		$query 				= $this->db->query($sql);

		if($query->num_rows() > 0) {
			foreach ($query->result() as $modul) {
				$menu[$modul->id_modul]['menu']	= $modul->modul;
				$sql 		= " SELECT 
									*
								FROM 
									mst_modul
								WHERE
									modul_parent 	= ".$modul->id_modul;

				$sub_modul 	= $this->db->query($sql);
				if($sub_modul->num_rows() > 0 )
				{
					foreach ($sub_modul->result() as $sub) {
						$menu[$modul->id_modul]['sub'][$sub->id_modul] = $sub->modul;
					}
				} else {
					$menu[$modul->id_modul]['sub'] = array();
				}
			}
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

		$view['content'] 	= $this->load->view('akses_edit',$view,true);			
		$this->load->view('master', $view);
	}

	// -----------------------------------------------------------------------------------
	// Delete Item
	// -----------------------------------------------------------------------------------
    public function delete($ID){
	    $query 		= $this->db->get_where('user_group', array('id_group' => $ID));
	    $group 		= $query->row(); 
		$this->logs->record($this->session->userdata('name').' Menghapus Hak Akses Group '.$group->nama_group);
	    $this->general_model->delete('hak_akses','id_group',$ID);             
	    redirect(site_url().'/akses');
    }


}

/* End of file welcome.php */