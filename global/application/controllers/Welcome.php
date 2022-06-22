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

		$login_user = $this->db->get_where('tbl_user',array('email'=> $email))->result();
		foreach($login_user as $d){
				$nama = $d->nama;
				$id_user = $d->id_user;//Untuk mengambil ID User
				$email = $d->email;
				$password = $d->password;
				$level_user = $d->level_user;
				$bulan_tahun = $d->bulan_tahun;
				$sisa_cuti = $d->sisa_cuti;
			}
	
		$cek = $this->mod_login->cek_login("tbl_user",$where)->num_rows();
		if($cek > 0){
			$data_session = array(
				'nama' => $nama,
				'status' => "login",
				'id_user' => $id_user,
				'email' => $email,
				'password' => $password,
				'level_user' => $level_user,
				'bulan_tahun' => $bulan_tahun,
				'sisa_cuti' => $sisa_cuti
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
