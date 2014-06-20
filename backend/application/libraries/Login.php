<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Login {

	var $ci;

	function __construct() {
		$this->ci = &get_instance();
	}

    public function is_logged()
    {
		$this->ci->load->helper('url');
		$this->ci->load->library('session');
		if($this->ci->session->userdata('logged_in') != '1')
		{
			redirect(site_url().'/auth/login', 'location');
		}
    }

    public function has_access()
    {
		$this->ci->load->helper('url');
		$this->ci->load->library('session');
		$modul = $this->ci->uri->segment(1);
		$group = $this->ci->session->userdata('id_group');

		if($modul != '')
		{		
			$sql = "SELECT 
					* 
					FROM 
						mst_modul a
					LEFT JOIN
						hak_akses b ON a.id_modul = b.id_modul
					WHERE
						a.path = '$modul'
						AND b.id_group = '$group'
					";
			$query = $this->ci->db->query($sql);
			if($query->num_rows() > 0)
			{
				//continue
			} else {
				show_error('Access Forbidden. Please contact your web administrator to change your privilledge to this page.');
			}
		}
    }

}

/* End of file Login.php */