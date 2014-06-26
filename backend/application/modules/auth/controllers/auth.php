<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler(false);
	}

	public function index()
	{
		$this->login->is_logged();
	}

	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

		if($this->form_validation->run() == FALSE)
		{
			$view['page_title'] = 'Login';
			$this->load->view('auth', $view);
		} else {
			$username 		= $this->input->post('username');
			$password 		= $this->input->post('password');
		    $sql 			= " SELECT
		    						a.id_user, 
		    						a.id_group, 
		    						a.username, 
		    						a.password, 
		    						a.nama, 
		    						b.nama_group
		    					FROM
		    						user a
		    					LEFT JOIN 
		    						user_group b ON a.id_group = b.id_group 		    						
		    					WHERE
		    						a.username = '".$username."'
		    						AND a.password = '".md5($password)."'
		    					LIMIT 1
							    ";
			$query = $this->db->query($sql);
		    if($query->num_rows() > 0) {
		    	$row 		= $query->row();
				$sess_array = array(
					'id' 			=> $row->id_user,
					'id_group'		=> $row->id_group,
					'nama_group'	=> $row->nama_group,
					'name' 			=> $row->nama,
					'logged_in'		=> '1'
				);
				$this->session->set_userdata($sess_array);
				$this->logs->record('User '.$this->input->post('username').' Berhasil Login');
				redirect(site_url().'/beranda', 'refresh');
			} else {
				$view['page_title'] 	= 'Login';
				$this->logs->record('User '.$this->input->post('username').' Gagal Login');
				$this->load->view('auth', $view);
			}
		}
	}

	public function logout()
	{
		$this->logs->record($this->session->userdata('name').' Telah Logout');
		$array_items = array('id' => '', 'username' => '', 'name' => '');
		$this->session->unset_userdata($array_items);
		$this->session->sess_destroy();
		redirect(site_url().'/auth/login', 'location');
	}

	public function forgot()
	{
		$url 	= 'http://www.gotong-royong.com/frontend';
		$config = array(
		    'protocol' 	=> 'smtp',
		    'smtp_host' => 'ssl://smtp.googlemail.com',
		    'smtp_port' => 465,
		    'smtp_user' => 'mucill@gmail.com',
		    'smtp_pass' => '*********',
		    'mailtype'  => 'html', 
		    'charset'   => 'iso-8859-1'
		);

		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");

		$config = array(
		               array(
		                     'field'   => 'forgot_email', 
		                     'label'   => 'Email', 
		                     'rules'   => 'required'
		                  )
        );
		$this->form_validation->set_rules($config);
        if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('error', validation_errors() ? '<div class="alert alert-danger">'.validation_errors().'</div>' : false);		        			
        } else {     
        	$mail = $this->input->post('forgot_email');
        	$query = $this->db->get_where('user', array('email' => $mail)); 
        	if($query->num_rows() > 0) {

        		$forgot_key = md5(random_string());
        		$data 	= array(
        			'forgot_key' => $forgot_key
        		);

        		$message  = 'Silahkan klik tautan berikut untuk mengubah password anda.<br/><br/><br/>'; 
        		$message .= '<a href="'.$url.'/index.php/auth/new_password/'.$forgot_key.'">Regenerate New Password</a>'; 
        		$message .= '<br/><br/>*) Abaikan email ini jika anda tidak merasa melakukan proses Lupa Password.'; 
        		if($this->db->update('user', $data, array('email' => $mail))) {
					$this->email->from('mucill@gmail.com', 'Monas System');
					$this->email->to($mail); 
					$this->email->subject('Do not Reply - Forgot Mail Service');
					$this->email->message($message);	
					if (!$this->email->send()) {
					    show_error($this->email->print_debugger());	
					} else {
						$view['content'] = '<div class="col-lg-6 col-lg-offset-3">
											<div class="alert alert-warning text-center">
											<p>
											Sebuah email konfirmasi telah terkirim ke email anda. 
											</p>
											<p>
											Silahkan ikuti petunjuk didalam email tersebut.
											</p>
											<br/>
											<br/>
											<br/>
											<p><a href="'.base_url().'" class="btn btn-inverse">Back</a></p>
											</div>
											</div>';											
						$view['page_title'] 	= 'Congratulations';
						$this->load->view('login', $view);		
					}
        		} else {
					$this->session->set_flashdata('error', 'Data anda tidak ditemukan. Silahkan masukkan alamat email dengan benar.');		        			
        		}
        	} else {
				$this->logs->record(' Seseorang melakukan proses Lupa Password.');
				redirect(site_url().'/auth');        		
        	}                              
		}		  
	}

	public function new_password($key)
	{
		$this->load->helper('captcha');
		$query = $this->db->get_where('user', array('forgot_key' => $key));
		if($query->num_rows() > 0 ) {
			$vals = array(
			    'img_path'	 	=> './captcha/',
			    'img_url'	 	=> base_url().'/captcha/',
				'img_width'	 	=> 200,
				'img_height' 	=> 50,
				'expiration' 	=> 7200		    
		    );
			$cap = create_captcha($vals);
			$data = array(
			    'captcha_time'	=> $cap['time'],
			    'ip_address'	=> $this->input->ip_address(),
			    'word'	 		=> $cap['word']
			    );
			$query 				= $this->db->insert_string('captcha', $data);
			$this->db->query($query);
			$view['captcha'] 	= $cap['image'];

			// Aturan data input
			$config = array(
			               array(
			                     'field'   => 'new_password', 
			                     'label'   => 'Password Baru', 
			                     'rules'   => 'required'
			                  ),
			               array(
			                     'field'   => 'retype_new_password', 
			                     'label'   => 'Ketik Ulang Password', 
			                     'rules'   => 'required|matches[new_password]'
			                  ),
			               array(
			                     'field'   => 'captcha', 
			                     'label'   => 'Captcha', 
			                     'rules'   => 'required'
			                  )
	        );
			$this->form_validation->set_rules($config);
			$view['custom_error'] 	= '';		
	        if ($this->form_validation->run() == false) {
	             $view['custom_error'] = (validation_errors() ? '<div class="alert alert-danger">'.validation_errors().'</div>' : false);
				$this->logs->record('Seseorang mencoba menjalankan Lupa Password dengan alamat email '.$this->input->post('new_password').' tetapi gagal.');
	        } else {
				$expiration 	= time() - 7200; 
				$sql 			= "	DELETE FROM 
										captcha 
									WHERE captcha_time < ".$expiration;

				$this->db->query($sql);	
				$sql 			= "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
				$binds 			= array($this->input->post('captcha'), $this->input->ip_address(), $expiration);
				$query 			= $this->db->query($sql, $binds);
				$row = $query->row();
				if ($row->count == 0) {
				    $view['custom_error'] = '<div class="alert alert-danger">Mohon ketikkan kode sesuai gambar.</div>';
				} else {
					$new_password  = md5($this->input->post('retype_new_password'));
		            $data = array(
		            		'password' 		=> $new_password,
		            		'forgot_key'	=> NULL
		            		);
					if ($this->general_model->edit('user', $data, 'forgot_key', $key) == TRUE) {
						$this->logs->record('Seseorang mencoba menjalankan Lupa Password dengan alamat email '.$this->input->post('new_password').' dan berhasil dijalankan.');
						$view['custom_error'] = '<div class="alert alert-success">Selamat, password anda telah diubah. Silahkan <a href="'.site_url().'/auth/login">kembali ke halaman login</a> untuk melakukan proses login.</div>';
					} else {
						$view['custom_error'] = '<div class="alert alert-danger">Data Tidak Dapat Disimpan. Mohon dicoba kembali.</div>';
					}
				}           
			}		   
			$this->load->view('forgot', $view);		
		} else {
			show_error('Unidentified key numbers or key numbers has been expired. Please try again.');			
		}
	}

}

/* End of file welcome.php */
