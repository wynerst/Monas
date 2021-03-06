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
        $config	= $this->general_model->pagination_rules(site_url().'/penyumbang/index/', 'penyumbang',10);
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

		$view['list'] 			= $this->general_model->get('penyumbang','id_penyumbang, nama, bank_transfer, nominal, tgl','',10,$this->uri->segment(3));
		
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
					'kota'			=> $this->input->post('kota'),
					'akun_bank'		=> $this->input->post('akun_bank'),
					'nominal' 		=> set_value('nominal'),
					'tgl' 			=> set_value('tanggal_transfer'),
					'no_identitas'	=> $this->input->post('identitas'),
					'npwp'			=> $this->input->post('npwp'),
					'alamat'		=> $this->input->post('alamat'),
					'pekerjaan'		=> $this->input->post('pekerjaan'),
					'kantor'		=> $this->input->post('kantor'),
					'asal_dana'		=> $this->input->post('sumber_dana'),
            );
           
			if ($this->general_model->add('penyumbang', $data) == TRUE) {
				$this->logs->record($this->session->userdata('name').' Menambah Data Penyumbang Atas Nama '.set_value('nama'));
				redirect(base_url().'index.php/penyumbang');
			} else {
				$view['custom_error'] = '<div class="aler alert-danger">Data Tidak Dapat Disimpan. Mohon dicoba kembali.</div>';
			}
		}		   

		$view['bank_list'] 			= $this->general_model->bank_list();
		$view['content'] 			= $this->load->view('penyumbang_add', $view, true);   

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
					'kota'			=> $this->input->post('kota'),
					'akun_bank'		=> $this->input->post('akun_bank'),
					'nominal' 		=> $this->input->post('nominal'),
					'tgl' 			=> $this->input->post('tanggal_transfer'),
					'no_identitas'	=> $this->input->post('identitas'),
					'npwp'			=> $this->input->post('npwp'),
					'alamat'		=> $this->input->post('alamat'),
					'pekerjaan'		=> $this->input->post('pekerjaan'),
					'kantor'		=> $this->input->post('kantor'),
					'asal_dana'		=> $this->input->post('sumber_dana'),
            );
           
			if ($this->general_model->edit('penyumbang', $data, 'id_penyumbang', $this->input->post('id_penyumbang')) == TRUE) {
				$this->logs->record($this->session->userdata('name').' Mengubah Data Penyumbang Atas Nama '.$this->input->post('nama'));
				redirect(site_url().'/penyumbang');
			} else {
				$view['custom_error'] = '<div class="alert alert-danger">Data Tidak Dapat Disimpan. Mohon dicoba kembali.</div>';
			}
		}

		$view['bank_list'] 			= $this->general_model->bank_list();
		$view['result'] 			= $this->general_model->get('penyumbang','id_penyumbang, nama, bank_transfer, kota, akun_bank, nominal, tgl, no_identitas, npwp, alamat, pekerjaan, kantor, asal_dana, create','id_penyumbang = '.$this->uri->segment(3));		
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
    function delete($ID){
	    $query 		= $this->db->get_where('penyumbang', array('id_penyumbang' => $ID));
	    $penyumbang = $query->row(); 
		$this->logs->record($this->session->userdata('name').' Menghapus Data Penyumbang Atas Nama '.$penyumbang->nama);
	    $this->general_model->delete('penyumbang','id_penyumbang',$ID);             
	    redirect(site_url().'/penyumbang');
    }

	// -----------------------------------------------------------------------------------
	// Print
	// -----------------------------------------------------------------------------------
    function print_all()
    {
		// Fasilitas untuk konversi hasil database menjadi CSV
		$this->load->dbutil();

		// Fasilitas generate table
		$this->load->library('table');

        $this->db->select('nama, bank_transfer, kota, akun_bank, nominal, tgl, no_identitas, npwp, alamat, pekerjaan, kantor, asal_dana')
                 ->from('penyumbang');
        
        $query  		= $this->db->get(); 
		$tmpl 			= array ('table_open' => '<table border="0" cellpadding="4" cellspacing="0" class="table table-bordered">');
		$this->table->set_template($tmpl);
		$this->logs->record($this->session->userdata('name').' Mencetak Seluruh Data Penyumbang');
		$view['content'] = $this->table->generate($query);
		$this->load->view('print', $view);    	
    } 

	// -----------------------------------------------------------------------------------
	// CSV
	// -----------------------------------------------------------------------------------
    public function csv_all()
    {
		$this->logs->record($this->session->userdata('name').' Mengunduh File CSV Seluruh Data Penyumbang');
		$this->load->library('excsv');
        $this->db->select('nama, bank_transfer, kota, akun_bank, nominal, tgl, no_identitas, npwp, alamat, pekerjaan, kantor, asal_dana, create');
		$this->db->from('penyumbang');        
        $query      = $this->db->get();  
		$filename 	= 'penyumbang-'.date('Ymd-his').'.csv';
		$this->excsv->export_to_file($query, $filename,TRUE);
	}

	// -----------------------------------------------------------------------------------
	// Import CSV
	// -----------------------------------------------------------------------------------
	public function import()
	{		
		// HARUS ADA - Silahkan beri judul halaman
		$view['page_title'] 	= 'Penyumbang';
		$view['page_desc'] 		= 'Import File CSV Penyumbang';  			
		$view['custom_error'] 	= '';			
		
		if(isset($_POST['submit'])) {
			if ($_FILES["userfile"]["error"] > 0) {
			  $view['custom_error'] = "Error: " . $_FILES["userfile"]["error"] . "<br>";
			} else {
				if($this->input->post('delimiter'))
				{
					$delimiter = $this->input->post('delimiter');
				} else {
					$delimiter 	= ",";				
				}
				$i = 1;
				$file = $_FILES["userfile"]["tmp_name"];
				$data = $this->csvimport->get_array($file,'',TRUE,0,$delimiter);	
				foreach ($data as $sql) {
					$this->db->insert('penyumbang', $sql);
					$i++;
				}
				$this->logs->record($this->session->userdata('name').' Mengimpor File CSV Untuk '.$i.' Data Penyumbang Baru');
				redirect(site_url().'/penyumbang');
			}
		}

		// HARUS ADA - Semua isi halaman akan diletakkan disini.
		$view['content'] 		= $this->load->view('penyumbang_import', $view, true);			

		// HARUS ADA - Breadcrumbs - helper/monas_helper.php
		$view['breadcrumb']		= breadcrumbs(
									array(
										array('link'=> '#', 'title'=>'Sumbangan'),
										array('link'=> site_url().'/penyumbang', 'title'=>'Penyumbang')
									), 
									'Import CSV'
		);

		// HARUS ADA - Proses keluaran untuk seluruh halaman
		$this->load->view('master', $view);
	}

}

/* End of file penyumbang.php */