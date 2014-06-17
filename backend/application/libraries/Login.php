<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Login {

    public function is_logged()
    {
    	$CI =& get_instance();
		$CI->load->helper('url');
		$CI->load->library('session');
		if($CI->session->userdata('logged_in') != '1')
		{
			redirect(site_url().'/auth/login', 'location');
		}
    }
}

/* End of file Login.php */