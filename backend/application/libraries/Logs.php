<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Logs {

	var $ci;

	function __construct() {
		$this->ci = &get_instance();
	}

    public function record($message='')
    {
		$this->ci->load->helper('url');
		$this->ci->load->library('session');
		$path = $this->ci->uri->segment(1);
		$group = $this->ci->session->userdata('id');

		if($message != '')
		{		
			$sql 	= "	SELECT 
							id_modul 
						FROM 
							mst_modul
						WHERE
							path = '$path'
						";
			$query 		= $this->ci->db->query($sql);
			if($query->num_rows() > 0) {				
				$menu 		= $query->row(); 
				$modul		= $menu->id_modul;
			} else {
				$modul		= 'Login';				
			}

			$data = array(
				'id_modul'	=> $modul,
				'id_user'	=> $group,
				'message'	=> $message
			);

			$this->ci->db->insert('log', $data);

		}
    }

}

/* End of file Login.php */