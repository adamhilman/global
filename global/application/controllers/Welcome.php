<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('mod_login');
 
	}

	public function index()
	{
		$this->load->view('login');
	}

	function aksi_login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$where = array(
			'email' => $email,
			'password' => md5($password)
			);
		$cek = $this->mod_login->cek_login("tbl_user",$where)->num_rows();
		if($cek > 0){
 
			$data_session = array(
				'nama' => $nama,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url("admin"));
 
		}else{
			$this->session->set_flashdata('gagal_login', 'Username/Password salah.');
			redirect(base_url("Welcome"));
		}
	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('Welcome'));
	}
}
