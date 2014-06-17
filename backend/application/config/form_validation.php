<?php
$config = array(
				'berita' => array(array(
                                	'field'=>'id_user',
                                	'label'=>'Id_user',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'berita',
                                	'label'=>'Berita',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'sumber',
                                	'label'=>'Sumber',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'url',
                                	'label'=>'Url',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'create',
                                	'label'=>'Create',
                                	'rules'=>'required|trim|xss_clean'
                                ))
			   
			   
				,

				'hak_akses' => array(array(
                                	'field'=>'id_modul',
                                	'label'=>'Id_modul',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'id_group',
                                	'label'=>'Id_group',
                                	'rules'=>'required|trim|xss_clean'
                                ))
			   
			   
				,

				'mst_modul' => array(array(
                                	'field'=>'modul',
                                	'label'=>'Modul',
                                	'rules'=>'required|trim|xss_clean'
                                ))
			   
			   
				,

				'penyumbang' => array(array(
                                	'field'=>'nama',
                                	'label'=>'Nama',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'bank_nama',
                                	'label'=>'Bank_nama',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'bank_akun',
                                	'label'=>'Bank_akun',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'status',
                                	'label'=>'Status',
                                	'rules'=>'required|trim|xss_clean'
                                ))
			   
			   
				,

				'settings' => array(array(
                                	'field'=>'app_name',
                                	'label'=>'App_name',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'versi',
                                	'label'=>'Versi',
                                	'rules'=>'required|trim|xss_clean'
                                ))
			   
			   
				,

				'sumbangan' => array(array(
                                	'field'=>'id_penyumbang',
                                	'label'=>'Id_penyumbang',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'nominal',
                                	'label'=>'Nominal',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'tgl',
                                	'label'=>'Tgl',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'bank',
                                	'label'=>'Bank',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'create',
                                	'label'=>'Create',
                                	'rules'=>'required|trim|xss_clean'
                                ))
			   
			   
				,

				'user' => array(array(
                                	'field'=>'id_group',
                                	'label'=>'Id_group',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'username',
                                	'label'=>'Username',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'password',
                                	'label'=>'Password',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'nama',
                                	'label'=>'Nama',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'email',
                                	'label'=>'Email',
                                	'rules'=>'required|trim|valid_email|xss_clean'
                                ),
								array(
                                	'field'=>'create_time',
                                	'label'=>'Create_time',
                                	'rules'=>'required|trim|xss_clean'
                                ))
			   
			   
				,

				'user_group' => array(array(
                                	'field'=>'nama_group',
                                	'label'=>'Nama_group',
                                	'rules'=>'required|trim|xss_clean'
                                ))
			   );
			   
?>