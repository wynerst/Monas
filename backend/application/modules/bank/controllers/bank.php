<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bank extends MX_Controller {

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
		$view['page_title'] 	= 'Berdasar Bank';
		$view['page_desc'] 		= 'Sumbangan Berdasar Bank';  			

        // Paging
        $config	= $this->general_model->pagination_rules(site_url().'/bank/index/', 'sumbangan',10);
        $this->pagination->initialize($config); 	

		// List Data
		if(isset($_POST['q'])) {
			switch($_POST['filter']) {
				default 	:
				case 'tanggal':
					$filter = 'tanggal';
					$this->db->where($filter, "date_format('".$_POST['q']."', '%y/%m/%d')", false);
				break;

				case 'bca' :
					$filter = 'bca';
					$this->db->like($filter, $_POST['q']);
				break;

				case 'bri' :
					$filter = 'bri';
					$this->db->like($filter, $_POST['q']);
				break;

				case 'mandiri' :
					$filter = 'mandiri';
					$this->db->like($filter, $_POST['q']);
				break;
			}
		}

        $this->db->order_by('date_create', 'desc');
		$view['list'] 			= $this->general_model->get('sumbangan','id_sumbangan, bca, bri, mandiri, tanggal','',$config['per_page'],$this->uri->segment(3));		

		// HARUS ADA - Semua isi halaman akan diletakkan disini.
		$view['content'] 		= $this->load->view('bank', $view, true);			

		// HARUS ADA - Breadcrumbs - helper/monas_helper.php
		$view['breadcrumb']		= breadcrumbs(
									array(
										array('link'=>'#', 'title'=>'Sumbangan')
									), 
									'Berdasar Bank'
		);

		// HARUS ADA - Proses keluaran untuk seluruh halaman
		$this->load->view('master', $view);
	}

	public function add()
	{
		// HARUS ADA - Silahkan beri judul halaman
		$view['page_title'] 	= 'Berdasar Bank';
		$view['page_desc'] 		= 'Sumbangan Berdasar Bank';  	

		// HARUS ADA - Breadcrumbs - helper/monas_helper.php
		$view['breadcrumb']		= breadcrumbs(
									array(
										array('link'=>'#', 'title'=>'Sumbangan'),
										array('link'=>site_url().'/bank', 'title'=>'Berdasar Bank')
									), 
									'Tambah Data Berdasar Bank'
		);

		// Aturan data input
		$config = array(
		               array(
		                     'field'   => 'tanggal', 
		                     'label'   => 'Tanggal', 
		                     'rules'   => 'required'
		                  ),
		               array(
		                     'field'   => 'bca', 
		                     'label'   => 'Total Rekening BCA', 
		                     'rules'   => 'required'
		                  ),
		               array(
		                     'field'   => 'bri', 
		                     'label'   => 'Total Rekening BRI', 
		                     'rules'   => 'required'
		                  ),
		               array(
		                     'field'   => 'mandiri', 
		                     'label'   => 'Total Rekening Mandiri', 
		                     'rules'   => 'required'
		                  )
        );
		$this->form_validation->set_rules($config);
		$view['custom_error'] 	= '';		
        if ($this->form_validation->run() == false) {
             $view['custom_error'] = (validation_errors() ? '<div class="alert alert-danger">'.validation_errors().'</div>' : false);
        } else {                            

            $data = array(
                    'tanggal' 		=> set_value('tanggal'),
					'bca' 			=> set_value('bca'),
					'bri' 			=> set_value('bri'),
					'mandiri' 		=> set_value('mandiri'),
					'operator'		=> $this->session->userdata('id')
            );
           
			if ($this->general_model->add('sumbangan', $data) == TRUE) {
				$this->logs->record($this->session->userdata('name').' Menambah Data Berdasar Bank Per Tanggal '.set_value('tanggal'));
				redirect(base_url().'index.php/bank');
			} else {
				$view['custom_error'] = '<div class="aler alert-danger">Data Tidak Dapat Disimpan. Mohon dicoba kembali.</div>';
			}
		}		   

		// HARUS ADA - Semua isi halaman akan diletakkan disini.
		$view['content'] 		= $this->load->view('bank_add', $view, true);	

		$view['css_files'] = array(
			base_url().PLUGINS.'select/bootstrap-select.min.css',
			base_url().PLUGINS.'daterangepicker/daterangepicker-bs3.css'
		);

		$view['js_files'] = array(
			base_url().PLUGINS.'daterangepicker/moment.min.js',
			base_url().PLUGINS.'daterangepicker/daterangepicker.js',
			base_url().PLUGINS.'select/bootstrap-select.min.js',
			base_url().PLUGINS.'parsley/parsley.js',
			base_url().CUSTOM.'select.js'
		);

		// HARUS ADA - Proses keluaran untuk seluruh halaman
		$this->load->view('master', $view);		
	}

	// -----------------------------------------------------------------------------------
	// Edit Item
	// -----------------------------------------------------------------------------------    
    function edit()
    {        
		$view['page_title'] 	= 'Berdasar Bank';
		$view['page_desc'] 		= 'Sumbangan Berdasar Bank';  			
		$view['breadcrumb']		= breadcrumbs(
									array(
										array('link'=>'#', 'title'=>'Sumbangan'),
										array('link'=>site_url().'/bank', 'title'=>'Berdasar Bank')
									), 
									'Ubah Data Berdasar Bank'
		);

		// Aturan data input
		$config = array(
		               array(
		                     'field'   => 'tanggal', 
		                     'label'   => 'Tanggal', 
		                     'rules'   => 'required'
		                  ),
		               array(
		                     'field'   => 'bca', 
		                     'label'   => 'Total Rekening BCA', 
		                     'rules'   => 'required'
		                  ),
		               array(
		                     'field'   => 'bri', 
		                     'label'   => 'Total Rekening BRI', 
		                     'rules'   => 'required'
		                  ),
		               array(
		                     'field'   => 'mandiri', 
		                     'label'   => 'Total Rekening Mandiri', 
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
                    'tanggal' 		=> $this->input->post('tanggal'),
					'bca' 			=> $this->input->post('bca'),
					'bri' 			=> $this->input->post('bri'),
					'mandiri' 		=> $this->input->post('mandiri'),
					'operator'		=> $this->session->userdata('id')
            );
           
			if ($this->general_model->edit('sumbangan', $data, 'id_sumbangan', $this->input->post('id_sumbangan')) == TRUE) {
				$this->logs->record($this->session->userdata('name').' Mengubah Data Berdasar Bank Per Tanggal '.$this->input->post('tanggal'));
				redirect(site_url().'/bank');
			} else {
				$view['custom_error'] = '<div class="alert alert-danger">Data Tidak Dapat Disimpan. Mohon dicoba kembali.</div>';
			}
		}

		$view['result'] 			= $this->general_model->get('sumbangan','id_sumbangan, tanggal, bca, bri, mandiri','id_sumbangan = '.$this->uri->segment(3));		
		$view['content'] 			= $this->load->view('bank_edit', $view, true);		

		$view['css_files'] 			= array(
			base_url().PLUGINS.'select/bootstrap-select.min.css',
			base_url().PLUGINS.'daterangepicker/daterangepicker-bs3.css'
		);

		$view['js_files'] 			= array(
			base_url().PLUGINS.'daterangepicker/moment.min.js',
			base_url().PLUGINS.'daterangepicker/daterangepicker.js',
			base_url().PLUGINS.'select/bootstrap-select.min.js',
			base_url().PLUGINS.'parsley/dist/parsley.min.js',
			base_url().CUSTOM.'select.js'
		);

		$this->load->view('master', $view);
    }

	// -----------------------------------------------------------------------------------
	// Delete Item
	// -----------------------------------------------------------------------------------
    public function delete($ID){
	    $query 		= $this->db->get_where('sumbangan', array('id_sumbangan' => $ID));
	    $sumbangan 	= $query->row(); 
		$this->logs->record($this->session->userdata('name').' Menghapus Data Sumbangan Per Bank Tanggal '.$sumbangan->tanggal);
	    $this->general_model->delete('sumbangan','id_sumbangan',$ID);             
	    redirect(site_url().'/bank');
    }

	// -----------------------------------------------------------------------------------
	// Prints
	// -----------------------------------------------------------------------------------
	public function prints()
	{
		$this->logs->record($this->session->userdata('name').' Mencetak Seluruh Data Sumbangan Berdasar Bank');
		$this->load->dbutil();
		$this->load->library('table');
		$sql 				= "	SELECT 
									tanggal,
									bca,
									bri,
									mandiri,
									date_create
								FROM 
									sumbangan
								ORDER BY
									tanggal DESC
								";

		$query 		= $this->db->query($sql);
		$tmpl 		= array ('table_open' => '<table border="0" cellpadding="4" cellspacing="0" class="table table-bordered">');
		$this->table->set_template($tmpl);
		$view['content'] = $this->table->generate($query);
		$this->load->view('print', $view);
	}

	// -----------------------------------------------------------------------------------
	// CSV
	// -----------------------------------------------------------------------------------
	public function csv()
	{
		$this->load->library('excsv');
		$this->logs->record($this->session->userdata('name').' Mengunduh File CSV Seluruh Data Sumbangan Berdasar Bank');
        $this->db->select('tanggal, bca, bri, mandiri, date_create');
		$this->db->from('sumbangan');        
		$query 		= $this->db->get();
		$filename 	= 'bank-'.date('Ymd-his').'.csv';
		$this->excsv->export_to_file($query, $filename,TRUE);

	}

	// -----------------------------------------------------------------------------------
	// Import CSV
	// -----------------------------------------------------------------------------------
	public function import()
	{		
		// HARUS ADA - Silahkan beri judul halaman
		$view['page_title'] 	= 'Berdasar Bank';
		$view['page_desc'] 		= 'Sumbangan Per Bank';  			
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
					$this->db->insert('sumbangan', $sql);
					$i++;
				}
				$this->logs->record($this->session->userdata('name').' Mengimpor File CSV Untuk '.$i.' Data Sumbangan Baru');
				redirect(site_url().'/bank');
			}
		}

		// HARUS ADA - Semua isi halaman akan diletakkan disini.
		$view['content'] 		= $this->load->view('bank_import', $view, true);			

		// HARUS ADA - Breadcrumbs - helper/monas_helper.php
		$view['breadcrumb']		= breadcrumbs(
									array(
										array('link'=> '#', 'title'=>'Sumbangan'),
										array('link'=> site_url().'/bank', 'title'=>'Berdasar Bank')
									), 
									'Import CSV'
		);

		// HARUS ADA - Proses keluaran untuk seluruh halaman
		$this->load->view('master', $view);
	}
}

/* End of file bank.php */