<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends MX_Controller {

	public function index()
	{
		if(isset($_POST['submit'])) {
			redirect(site_url().'/beranda', 'location');
		} else {		
			// HARUS ADA - Silahkan beri judul halaman
			$view['page_title'] = 'Login';
			
			// HARUS ADA - Proses keluaran untuk seluruh halaman
			$this->load->view('auth', $view);
		}
	}

	public function logout()
	{
		redirect(site_url().'/auth', 'location');
	}


}

/* End of file welcome.php */