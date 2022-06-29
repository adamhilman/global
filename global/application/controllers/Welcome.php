<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('mod_login');
		$this->load->model('Mod_admin');

 
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

			// cek hak cuti
			$where_id_user = array(
				'id_user' => $id_user
				);
			$cek_cuti = $this->Mod_admin->cek_cuti_terakhir("tbl_form_cuti",$where_id_user)->num_rows();
 			$hari_ini=date('Y-m-d');
			$berhak_cuti=date('Y-m-d', strtotime('+1 year', strtotime($bulan_tahun)));
			if ($hari_ini >= $berhak_cuti && $cek_cuti == 0){
				$data = array(
					'sisa_cuti' => "12");
				$where = array(
					'id_user' => $id_user
				);
				$this->Mod_admin->update_user($where, $data, 'tbl_user');
			}
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