<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chat extends MX_Controller {

	public function index()
	{
		// HARUS ADA - Silahkan beri judul halaman
		$view['page_title'] = 'Chat';
		$view['page_desc'] 	= 'Wireless Communication';  			
		
		// HARUS ADA - Semua isi halaman akan diletakkan disini.
		$view['content'] 		= $this->load->view('chat', $view, true);			

		// HARUS ADA - Breadcrumbs - helper/monas_helper.php
		$view['breadcrumb']		= breadcrumbs(
									array(
									), 
									'Chat'
		);

		// HARUS ADA - Proses keluaran untuk seluruh halaman
		$this->load->view('master', $view);
	}


	public function get_chats()
	{

		$this->load->model('chat_model');
		echo json_encode($this->chat_model->get_chat_after($_REQUEST["time"]));
	}

	public function insert_chat()
	{

		$this->load->model('chat_model');
		$this->chat_model->insert_message($_REQUEST["message"], $_REQUEST["user"]);
	}

	public function time()
	{
		echo "[{\"time\":" + time() + "}]";
	}
}

/* End of file welcome.php */