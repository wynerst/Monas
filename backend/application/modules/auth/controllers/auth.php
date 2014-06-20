<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
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
	
		    $this->db->select('id_user, id_group, username, password, nama')
		             ->from('user')
		             ->where('username', $username)
		             ->where('password', md5($password))
		             ->limit(1);

		    $query = $this->db->get();
		    if($query->num_rows() == 1) {
		    	$row 		= $query->row();
				$sess_array = array(
					'id' 		=> $row->id_user,
					'id_group'	=> $row->id_group,
					'username' 	=> $row->username,
					'name' 		=> $row->nama,
					'logged_in'	=> TRUE
				);				
					$this->session->set_userdata($sess_array);
					redirect(site_url().'/beranda', 'refresh');
			} else {
				$view['page_title'] 	= 'Login';			
				$view['message'] 		= 'Invalid username or password';
				$this->load->view('auth', $view);
			}					    
		}
	}

	public function logout()
	{
		$array_items = array('id' => '', 'username' => '', 'name' => '');
		$this->session->unset_userdata($array_items);
		$this->session->sess_destroy();
		redirect(site_url().'/auth/login', 'location');
	}

}

/* End of file welcome.php */