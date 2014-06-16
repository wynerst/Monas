<?php
class Chat_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}

	function get_last_item()
	{
		$this->db->order_by('id_chat', 'DESC');
		$query = $this->db->get('chat', 1);
		return $query->result();
	}

	function insert_message($message, $user)
	{
		$this->pesan 	= $message;
		$this->user 	= $user;
		$this->db->insert('chat', $this);
	}

	function get_chat_after($time)
	{
		$this->db->where('create >', $time)->order_by('create', 'DESC')->limit(10);
		$query = $this->db->get('chat');
		$results = array();
		foreach ($query->result() as $row)
		{
			$results[] = array($row->pesan, $row->user, $row->create);
		}
		return array_reverse($results);
	}
}