<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Menu {

	var $ci;

	function __construct() {
		$this->ci = &get_instance();
	}

    public function access($user_group)
    {
		// Modul List
		$menu 				= array();
		$sql 				= "	SELECT 
									*
								FROM 
									mst_modul a
								LEFT JOIN
									hak_akses b ON a.id_modul = b.id_modul
								WHERE
									b.id_group = $user_group
									AND a.modul_parent = 0
								";

		$query 				= $this->ci->db->query($sql);

		if($query->num_rows() > 0) {
			foreach ($query->result() as $modul) {
				$menu[$modul->id_modul]['menu']	= $modul->modul;
				$menu[$modul->id_modul]['path']	= $modul->path;
				$sql 		= " SELECT 
									*
								FROM 
									mst_modul a
								LEFT JOIN
									hak_akses b ON a.id_modul = b.id_modul
								WHERE
									b.id_group = $user_group
									AND a.modul_parent = ".$modul->id_modul;
				$sub_modul 	= $this->ci->db->query($sql);
				if($sub_modul->num_rows() > 0 )
				{
					foreach ($sub_modul->result() as $sub) {
						$menu[$modul->id_modul]['sub'][$sub->path] = $sub->modul;
					}
				} else {
					$menu[$modul->id_modul]['sub'] = array();
				}
			}
		}
		return $menu;
    }
}

/* End of file Login.php */