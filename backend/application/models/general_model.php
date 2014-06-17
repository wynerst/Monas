<?php
class General_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    
    function get($table, $fields, $where='', $perpage=0, $start=0, $one=false){
        
        $this->db->select($fields)
                 ->from($table);

        if($perpage) {
            $this->db->limit($perpage, $start);
        }

        if($where) {
            $this->db->where($where);
        }
        
        $query  = $this->db->get();        
        $result =!$one ? $query->result() : $query->row() ;
        return $result;
    }
    
    function add($table,$data){
        $this->db->insert($table, $data);         
        if ($this->db->affected_rows() == '1') {
			return TRUE;
		}		
		return FALSE;       
    }
    
    function edit($table,$data,$fieldID,$ID){
        $this->db->where($fieldID,$ID);
        $this->db->update($table, $data);

        if ($this->db->affected_rows() >= 0) {
			return TRUE;
		}
		
		return FALSE;       
    }
    
    function delete($table,$fieldID,$ID){
        $this->db->where($fieldID,$ID);
        $this->db->delete($table);
        if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;        
    }   
	
	function count($table){
		return $this->db->count_all($table);
	}

    function bank_list() {
        $bank = array(
            'BRI'       => 'Bank Rakyak Indonesia (BRI) - 1223 0 1000 1723 09',
            'BCA'       => 'Bank Central Asia (BCA) - 5015.500015',
            'MANDIRI'   => 'Bank Mandiri - 070-00-0909096-5'
        );        
        return $bank;
    }

    function pagination_rules($site, $table, $perpage = 10)
    {

        $config = array(
            'base_url'          => $site,
            'per_page'          => $perpage,
            'total_rows'        => $this->general_model->count($table),
            'full_tag_open'     => '<ul class="pagination">',
            'first_tag_open'    => '<li>',
            'last_tag_open'     => '<li>',
            'next_tag_open'     => '<li>',
            'prev_tag_open'     => '<li>',
            'cur_tag_open'      => '<li class="active"><a href="#">',
            'num_tag_open'      => '<li>',
            'full_tag_close'    => '</ul>',
            'first_tag_close'   => '</li>',
            'last_tag_close'    => '</li>',
            'next_tag_close'    => '</li>',
            'prev_tag_close'    => '</li>',
            'cur_tag_close'     => '</a></li>',
            'num_tag_close'     => '</li>',
            'first_link'        => '<i class="fa fa-angle-double-left"></i>',
            'last_link'         => '<i class="fa fa-angle-double-right"></i>',
            'prev_link'         => '<i class="fa fa-angle-left"></i>',
            'next_link'         => '<i class="fa fa-angle-right"></i>',
            'anchor_class'      => 'class="btn btn-inverse"'
        );

        return $config;        
    }
}