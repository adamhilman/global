<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('status') != "login"){
			redirect(base_url("Welcome"));
		}
		//load Helper for Form
		$this->load->helper('url', 'form', 'string');
		$this->load->library('form_validation');
		$this->load->model('Mod_admin');
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('admin/dashboard');
		$this->load->view('footer');
	}

	public function data_karyawan()
	{
		$this->load->view('header');
		$data['karyawan'] = $this->Mod_admin->get_karyawan()->result();
		$this->load->view('admin/karyawan/index', $data);
		$this->load->view('footer');
	}
	public function reset_user($id_user)
	{
            $data = array(
				'password'      => md5('admin123'),);
			$where = array(
				'id_user' => $id_user
			);
			$this->Mod_admin->update_profile($where, $data, 'tbl_user');
			
            redirect('admin/data_karyawan');
    }
	public function edit_user($id_user)
	{
		$this->load->view('header');
		$data['karyawan'] = $this->Mod_admin->get_user_data($id_user, 'tbl_user')->row();
		$this->load->view('admin/karyawan/edit_user', $data);
		$this->load->view('footer');
    }

	function update_user($id_user)
	{
		$this->form_validation->set_rules('nama_lengkap','Nama','trim|required');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		if($this->form_validation->run() == FALSE){
        //Views
		$this->edit_user($id_user);
		// Jika tidak ada error validasi
        } else {
            //Create Data Array
			$data = array(
				'nama' => $this->input->post('nama_lengkap'),
				'email' => $this->input->post('email'),
				'bulan_tahun' => $this->input->post('bulan_tahun'),
				'level_user' => $this->input->post('jabatan')
			);
		$where = array(
			'id_user' => $id_user
		);

		$this->Mod_admin->update_user($where, $data, 'tbl_user');
		redirect('admin/data_karyawan');
		}
	}
	
	public function tambah_karyawan()
	{
		$this->load->view('header');
		$this->load->view('admin/karyawan/tambah_karyawan');
		$this->load->view('footer');
	}
	public function add_karyawan()
	{
		$data = array(
			'nama' => $this->input->post('nama_lengkap'),
			'email' => $this->input->post('email'),
			'bulan_tahun' => $this->input->post('bulan_tahun'),
			'level_user' => $this->input->post('jabatan'),
			'password' => md5("admin123")
		);
		$this->session->set_flashdata('notif', 'di tambah', 'Success');
		$this->Mod_admin->insert_user($data);
		redirect(base_url() . 'admin/data_karyawan');
	}
	function delete_user($id_user)
	{
		$where = array('id_user' => $id_user);
		$this->Mod_admin->hapus_user($where, 'tbl_user');
		redirect('admin/data_karyawan');
	}

	public function update_profile()
	{
		$this->form_validation->set_rules('nama','Nama','trim|required');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$password_changed = $this->input->post('password_changed');
		if ($password_changed == "on"){
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
			$this->session->set_flashdata('checkbox', 'style="display: flex"');
			$this->session->set_flashdata('ganti_password', 'checked');
			// Save data submit jika gagal password
			$data = array(
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password'),
				'confirm_password' => NULL,
				'bulan_tahun' =>  $this->session->userdata('bulan_tahun')
			);
			$this->session->set_flashdata('notif', 'di update', 'Success');
		} else {
			// Save data submit gagal kalau gak pake password
			$data = array(
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'bulan_tahun' =>  $this->session->userdata('bulan_tahun')
			);
		}
		
		// Jika ada error valid form
        if($this->form_validation->run() == FALSE){
            //Views
			$this->load->view('header');
            $this->load->view('admin/profile/index', $data);
			$this->load->view('footer');
		// Jika tidak ada error validasi
        } else {
            //Create Data Array
			if ($password_changed == "on"){
			$id = $this->session->userdata('id_user');
            $data = array(
                'nama'    		=> $this->input->post('nama'),
				'password'      => md5($this->input->post('password')),
                'email'         => $this->input->post('email')
            	);
			}else{
				$id = $this->session->userdata('id_user');
            	$data = array(
                'nama'    		=> $this->input->post('nama'),
                'email'         => $this->input->post('email')
				);
			};

            //Table Insert
			$where = array(
				'id_user' => $id
			);
			$this->Mod_admin->update_profile($where, $data, 'tbl_user');


            //Create Message
            // $this->session->set_flashdata('user_saved', 'User has been saved');
			$this->session->set_flashdata('notif', 'di update', 'Success');
			$login_user = $this->db->get_where('tbl_user',array('id_user'=> $id))->result();
			foreach($login_user as $d){
				$nama = $d->nama;
				$id_user = $d->id_user; //Untuk mengambil ID User
				$email = $d->email;
				$password = $d->password;
				$level_user = $d->level_user;
				$bulan_tahun = $d->bulan_tahun;
				
			}
			$data_session = array(
				'nama' => $nama,
				'status' => "login",
				'id_user' => $id_user,
				'email' => $email,
				'password' => $password,
				'level_user' => $level_user,
				'bulan_tahun' => $bulan_tahun
				);
 
			$this->session->set_userdata($data_session);

            //Redirect to pages
            redirect('admin/profile');
        }
	}

	public function profile()
	{
		$this->load->view('header');
		$data = array(
			'nama' => $this->session->userdata('nama'),
			'email' => $this->session->userdata('email'),
			'password' => $this->session->userdata('password'),
			'confirm_password' => NULL,
			'bulan_tahun' => $this->session->userdata('bulan_tahun'),
			'level_user' => $this->session->userdata('level_user')

		);
		$data['sisa_cuti'] = $this->db->get_where('tbl_user',array('id_user'=> $this->session->userdata('id_user')))->result();
		
		$this->session->set_flashdata('checkbox', 'style="display: none"');
		$this->session->set_flashdata('ganti_password', '');
		$this->load->view('admin/profile/index',$data);
		$this->load->view('footer');
	}

	public function project()
	{
		$this->load->view('header');
		$data['project'] = $this->Mod_admin->get_project()->result();
		$this->load->view('admin/project/index', $data);
		$this->load->view('footer');
	}

	public function add_aktivitas_project($id_project)
	{
		$data = array(
			'keterangan' => $this->input->post('aktivitas'),
			'id_project' => $id_project,
			'id_user' => $this->session->userdata('id_user'),
			'update_date' => date("Y-m-d H:i:s")
		);
		$this->Mod_admin->insert_aktivitas_project($data);
		$this->detail_project($id_project);
	}

	function delete_history($id_project, $id_aktivitas)
	{
		$where = array('id_aktivitas' => $id_aktivitas);
		$this->Mod_admin->hapus_history($where, 'tbl_aktivitas_project');
		$this->session->set_flashdata('notif', 'di hapus', 'Success');
		redirect('admin/detail_project/'.$id_project);
	}

	public function detail_project($id_project)
	{
		// untuk mengambil id_project untuk mengembalikan halaman setelah hapus file
		$project_id = array(
			'id_project'  => $id_project
		);

		$this->session->set_userdata($project_id);
		//-------------------------------------------------------

		$id_project = $this->uri->segment('3');
		$this->load->view('header');
		$data['project'] = $this->Mod_admin->detail_project($id_project, 'tbl_project')->row();
		$data['riwayat'] = $this->Mod_admin->history_project($id_project)->result();
		$data['file_project'] = $this->Mod_admin->detail_file_project($id_project)->result();
		$this->load->view('admin/project/detail_project', $data);
		$this->load->view('footer');
	}

	public function tambah_project()
	{
		$this->load->view('header');
		$this->load->view('admin/project/tambah_project');
		$this->load->view('footer');
	}

	public function add_project()
	{
		$nominal = $this->input->post('nilai_kontrak');
		$nilai_kontrak = str_replace(".", "", $nominal);
		$data = array(
			'nama_paket' => $this->input->post('nama_paket'),
			'sub_pekerjaan' => $this->input->post('sub_pekerjaan'),
			'lokasi_pekerjaan' => $this->input->post('lokasi_pekerjaan'),
			'nama_ppk' => $this->input->post('nama_ppk'),
			'alamat_ppk' => $this->input->post('alamat_ppk'),
			'nomor_kontrak' => $this->input->post('nomor_kontrak'),
			'nilai_kontrak' => $nilai_kontrak,
			'selesai_kontrak' => $this->input->post('selesai_kontrak'),
			'serah_terima' => $this->input->post('serah_terima'),
		);
		$this->session->set_flashdata('notif', 'di tambah', 'Success');
		$this->Mod_admin->insert_project($data);
		redirect(base_url() . 'admin/project');
	}

	public function upload_file_project($id_project)
	{
		$random_string = random_string('numeric',5);
		$file = $_FILES['file_project']['name'];
		$token = $this->input->post('token_file');
		$this->load->library('image_lib');
		$config['upload_path'] = FCPATH . "/assets/upload/project/";
		$config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx|jpeg';
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = FALSE;
		$config['file_name'] = $random_string.$file;
		$config['max_size'] = 10000;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if (isset($_FILES['file_project']) && !empty($_FILES['file_project']['name'])) {
			if ($this->upload->do_upload('file_project')) {
				$image_data =   $this->upload->data('file_project');
				// this db insert
				$file_project = $file;
				$data = array(
					'token' => $token,
					'nama_file' => $random_string.$file_project,
					'id_project' => $id_project
				);
				$this->Mod_admin->insert_file_project($data);
			} else {
				print_r($this->upload->display_errors());
				exit;
			}
		}
	}

	public function hapus_file_project()
	{
		// Ambil Token
		$token = $this->input->post('token');
		$project_file = $this->db->query("select * from tbl_file_project where token = '$token'");
		if ($project_file->num_rows() > 0) {
			$hasil = $project_file->row();
			$nama_file = $hasil->nama_file;
			// $explode = explode('.', $nama_file);
			// $extid = end($explode);
			if (file_exists($file = FCPATH . 'assets/upload/project/' . $nama_file)) {
				unlink($file);
			}
			$this->db->delete('tbl_file_project', array('token' => $token));
		}

		echo "{}";
	}

	public function delete_file_project($id_file)
	{
		$u = $this->session->userdata('id_project');
		$project_file = $this->db->query("select * from tbl_file_project where id_file = '$id_file'");
		if ($project_file->num_rows() > 0) {
			$hasil = $project_file->row();
			$nama_file = $hasil->nama_file;
			// $token = $hasil->token;
			// $explode = explode('.', $nama_file);
			// $extid = end($explode);
			if (file_exists($file = FCPATH . 'assets/upload/project/' . $nama_file)) {
				unlink($file);
			}
			$this->db->delete('tbl_file_project', array('id_file' => $id_file));
			redirect('admin/detail_project/' . $u);
		}

		echo "{}";
	}

	public function edit_project($id_project)
	{
		$this->load->view('header');
		$data['project'] = $this->Mod_admin->detail_project($id_project, 'tbl_project')->row();
		$this->load->view('admin/project/edit_project', $data);
		$this->load->view('footer');
	}

	function update_project()
	{
		$id = $this->input->post('id_project');
		$nominal = $this->input->post('nilai_kontrak');
		$nilai_kontrak = str_replace(".", "", $nominal);

		$data = array(
			'nama_paket' => $this->input->post('nama_paket'),
			'sub_pekerjaan' => $this->input->post('sub_pekerjaan'),
			'lokasi_pekerjaan' => $this->input->post('lokasi_pekerjaan'),
			'nama_ppk' => $this->input->post('nama_ppk'),
			'alamat_ppk' => $this->input->post('alamat_ppk'),
			'nomor_kontrak' => $this->input->post('nomor_kontrak'),
			'nilai_kontrak' => $nilai_kontrak,
			'selesai_kontrak' => $this->input->post('selesai_kontrak'),
			'serah_terima' => $this->input->post('serah_terima'),
		);

		$where = array(
			'id_project' => $id
		);
		$this->session->set_flashdata('notif', 'di update', 'Success');
		$this->Mod_admin->update_project($where, $data, 'tbl_project');
		redirect('admin/project');
	}

	function hapus_project($id)
	{
		$where_project = array('id_project' => $id);
		$this->Mod_admin->hapus_data($where_project, 'tbl_project');
		$this->Mod_admin->hapus_data($where_project, 'tbl_file_project');

		redirect('admin/project');
	}

	public function form_cuti()
	{
		$this->load->view('header');
		$id_user = $this->session->userdata('id_user');
		$data['cuti'] = $this->Mod_admin->get_cuti_user($id_user)->result();
		$data['acc_pm'] = $this->Mod_admin->get_cuti_all_teknisi()->result();
		$data['acc_hrd'] = $this->Mod_admin->get_cuti_all()->result();
		$this->load->view('admin/formulir_cuti/index', $data);
		$this->load->view('footer');
	}
	
	function acc_cuti_pm($id_cuti)
	{
		$data = array(
			'approval_pm' => "1"
		);
		$where = array('id_cuti' => $id_cuti);
		$this->Mod_admin->update_cuti($where, $data, 'tbl_form_cuti');
		$this->session->set_flashdata('notif', 'di setujui', 'Success');
		redirect('admin/form_cuti');
	}

	function cancel_cuti_pm($id_cuti)
	{
		$data = array(
			'approval_pm' => "0"
		);
		$where = array('id_cuti' => $id_cuti);
		$this->Mod_admin->update_cuti($where, $data, 'tbl_form_cuti');
		$this->session->set_flashdata('notif', 'di batalkan', 'Success');
		redirect('admin/form_cuti');
	}

	function acc_cuti_hrd($id_cuti)
	{
		$data = array(
			'approval_direksi' => "1"
		);
		$where = array('id_cuti' => $id_cuti);
		$this->Mod_admin->update_cuti($where, $data, 'tbl_form_cuti');

		// Kirim notif Email
		$this->load->config('email');
        $this->load->library('email');
		// Ambil email dari database
		$email_notif = $this->Mod_admin->get_cuti_email($id_cuti)->result();
		foreach($email_notif as $d){
				$nama = $d->nama;
				$email = $d->email;
				$keterangan = $d->keterangan;
				$tanggal_mulai = $d->tanggal_mulai;
				$tanggal_selesai = $d->tanggal_selesai;
			}
		//Kirim
        $from = "noreply@global-integrasi.co.id";
        $to = $email;
        $subject = "Approval Cuti Karyawan Atas Nama ".$nama;
        $message = "Selamat formulir cuti anda dengan tanggal mulai ".$tanggal_mulai." sampai dengan ".$tanggal_selesai." telah disetujui.";

        $this->email->set_newline("\r\n");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);

        if ($this->email->send()) {
            // echo 'Your Email has successfully been sent.';
        } else {
            show_error($this->email->print_debugger());
        }

		$this->session->set_flashdata('notif', 'di setujui', 'Success');
		redirect('admin/form_cuti');
	}

	function cancel_cuti_hrd($id_cuti)
	{
		$data = array(
			'approval_direksi' => "0"
		);
		
		$where = array('id_cuti' => $id_cuti);
		$this->Mod_admin->update_cuti($where, $data, 'tbl_form_cuti');
		// Kirim notif Email
		$this->load->config('email');
        $this->load->library('email');
		// Ambil email dari database
		$email_notif = $this->Mod_admin->get_cuti_email($id_cuti)->result();
		foreach($email_notif as $d){
				$nama = $d->nama;
				$email = $d->email;
				$keterangan = $d->keterangan;
				$tanggal_mulai = $d->tanggal_mulai;
				$tanggal_selesai = $d->tanggal_selesai;
			}
		//Kirim
        $from = "noreply@global-integrasi.co.id";
        $to = $email;
        $subject = "Ammend Cuti Karyawan Atas Nama ".$nama;
        $message = "Mohon Maaf, formulir cuti anda dengan tanggal mulai ".$tanggal_mulai." sampai dengan ".$tanggal_selesai." telah dibatalkan.";

        $this->email->set_newline("\r\n");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);

        if ($this->email->send()) {
            // echo 'Your Email has successfully been sent.';
        } else {
            show_error($this->email->print_debugger());
        }
		$this->session->set_flashdata('notif', 'di batalkan', 'Success');
		redirect('admin/form_cuti');
	}

	public function tambah_cuti()
	{
		$this->load->view('header');
		$this->load->view('admin/formulir_cuti/tambah_cuti');
		$this->load->view('footer');
	}
	public function add_cuti()
	{
		$jumlah_hari = $this->input->post('jumlah_hari');
		$level_user = $this->session->userdata('level_user');
		$id_user = $this->session->userdata('id_user');
		$user_cuti = $this->db->get_where('tbl_user',array('id_user'=> $id_user))->row();
		$sisa_cuti = $user_cuti->sisa_cuti;
		if ($sisa_cuti >= $jumlah_hari){
		$hasil_sisa = $sisa_cuti - $jumlah_hari;
			if ( $level_user == 6){
				$data = array(
				'tanggal_mulai' => $this->input->post('tanggal_mulai'),
				'tanggal_selesai' => $this->input->post('tanggal_selesai'),
				'keterangan' => $this->input->post('keterangan'),
				'jumlah_hari' => $jumlah_hari,
				'id_user' => $this->session->userdata('id_user')
			);}else{
			$data = array(
				'tanggal_mulai' => $this->input->post('tanggal_mulai'),
				'tanggal_selesai' => $this->input->post('tanggal_selesai'),
				'keterangan' => $this->input->post('keterangan'),
				'jumlah_hari' => $jumlah_hari,
				'id_user' => $this->session->userdata('id_user'),
				'approval_pm' => "1",
			);}
		$data_user = array(
			'sisa_cuti' => $hasil_sisa
		);
		$where_user = array('id_user' => $id_user);
		$this->session->set_flashdata('notif', 'di tambah', 'Success');
		$this->Mod_admin->insert_cuti($data);
		$this->Mod_admin->update_user($where_user, $data_user, 'tbl_user');
		}else{
			$this->session->set_flashdata('notif_cuti', 'Harap periksa sisa cuti pada halaman profile', 'Error');
		}
		redirect(base_url() . 'admin/form_cuti');
	}

	public function edit_cuti($id_cuti)
	{
		$this->load->view('header');
		$data['cuti'] = $this->Mod_admin->detail_cuti($id_cuti, 'tbl_form_cuti')->row();
		$this->load->view('admin/formulir_cuti/edit_cuti', $data);
		$this->load->view('footer');
	}

	function update_cuti()
	{
		$id_cuti = $this->input->post('id_cuti');
		$jumlah_hari = $this->input->post('jumlah_hari');
		$jumlah_cuti_before = $this->input->post('jumlah_hari_before');
		$id_user = $this->session->userdata('id_user');
		$user_cuti = $this->db->get_where('tbl_user',array('id_user'=> $id_user))->row();
		$sisa_cuti = $user_cuti->sisa_cuti;
		$perhitungan = ($sisa_cuti + $jumlah_cuti_before) - $jumlah_hari;
		
		$data = array(
			'tanggal_mulai' => $this->input->post('tanggal_mulai'),
			'tanggal_selesai' => $this->input->post('tanggal_selesai'),
			'keterangan' => $this->input->post('keterangan'),
			'jumlah_hari' => $jumlah_hari);

		$where = array(
			'id_cuti' => $id_cuti
		);
		$this->Mod_admin->update_cuti($where, $data, 'tbl_form_cuti');

		$data_user = array(
			'sisa_cuti' => $perhitungan);
		$where_user = array(
			'id_user' => $id_user
		);
		$this->Mod_admin->update_user($where_user, $data_user, 'tbl_user');

		$this->session->set_flashdata('notif', 'di update', 'Success');
		redirect('admin/form_cuti');
	}

	function delete_cuti($id_cuti)
	{
		$id_user = $this->session->userdata('id_user');
		$cuti_user = $this->db->get_where('tbl_form_cuti',array('id_cuti'=> $id_cuti))->row();
		$jumlah_cuti = $cuti_user->jumlah_hari;
		$user_cuti = $this->db->get_where('tbl_user',array('id_user'=> $id_user))->row();
		$sisa_cuti = $user_cuti->sisa_cuti;
		$hasil_cuti = $jumlah_cuti + $sisa_cuti;
		
		$where = array('id_cuti' => $id_cuti);
		$this->Mod_admin->hapus_cuti($where, 'tbl_form_cuti');

		$data_user = array(
			'sisa_cuti' => $hasil_cuti
		);
		$where_user = array('id_user' => $id_user);
		$this->Mod_admin->update_user($where_user, $data_user, 'tbl_user');
		$this->session->set_flashdata('notif', 'di hapus', 'Success');
		redirect('admin/form_cuti');
	}

	function reset_cuti()
	{
		$data = array(
			'sisa_cuti' => "12"
		);
		
		$this->Mod_admin->reset_cuti($data, 'tbl_user');
		$this->session->set_flashdata('notif', 'di reset', 'Success');
		redirect('admin/form_cuti');
	}

	public function claim()
	{
		$this->load->view('header');
		$id_user = $this->session->userdata('id_user');
		$data['claim'] = $this->Mod_admin->get_claim($id_user)->result();
		$data['claim_all'] = $this->Mod_admin->get_claim_all()->result();
		$this->load->view('admin/claim_kerja/index', $data);
		$this->load->view('footer');
	}

	public function tambah_claim()
	{
		$this->load->view('header');
		$data = array(
			'keterangan' => "",
			'nominal' => "",
			'id_project' => "",
			'project' => $this->Mod_admin->get_project()->result()
		);
		$this->load->view('admin/claim_kerja/tambah_claim', $data);
		$this->load->view('footer');
	}

	public function simpan_claim()
	{
		$this->form_validation->set_rules('nominal_claim','Nominal','trim|required');
		$this->form_validation->set_rules('keterangan','Keterangan','trim|required');
		$random_string = random_string('numeric',5);
		$file_claim = $_FILES['file_claim']['name'];
		$data = array(
			'keterangan' => $this->input->post('keterangan'),
			'nominal' => $this->input->post('nominal_claim'),
			'id_project' => $this->input->post('nama_paket'),
			'tanggal_pengajuan' => date("Y-m-d H:i:s"),
			'id_user' => $this->session->userdata('id_user'),
			'status' => "0",
			'file_rembes' => $random_string.$file_claim
		);
		if (empty($_FILES['file_claim']['name']))
		{
			$this->form_validation->set_rules('file_claim', 'File Invoice', 'required');
		}
		//Upload
		$config['upload_path']          = 'assets/upload/claim';
		$config['allowed_types']        = 'gif|jpg|jpeg|pdf|png';
		$config['max_size']             = 5000;
		$config['file_name'] 			= $random_string.$file_claim;
		$this->load->library('upload',$config);

		if($this->form_validation->run() == FALSE){
			$this->load->view('header');
			$data['project'] = $this->Mod_admin->get_project()->result();
			$this->load->view('admin/claim_kerja/tambah_claim', $data);
			$this->load->view('footer');
		}else{
			if($this->upload->do_upload('file_claim')){
				$this->session->set_flashdata('notif', 'disubmit', 'Success');
				$this->db->insert('tbl_form_reimburstment', $data);
				redirect('admin/claim');
			}else{
				$this->session->set_flashdata('notif', $this->upload->display_errors(), 'fail');
				redirect('admin/claim');
				// $error = array('error' => $this->upload->display_errors());

				// print_r($error);
				// exit;
			}
		}
				
	}

	function acc_claim($id_rembes)
	{
		$data = array(
			'status' => "1"
		);
		$where = array('id_rembes' => $id_rembes);
		$this->Mod_admin->update_claim($where, $data, 'tbl_form_reimburstment');
		// Kirim notif Email
		$this->load->config('email');
        $this->load->library('email');
		// Ambil email dari database
		$email_notif = $this->Mod_admin->get_rembes_email($id_rembes)->result();
		foreach($email_notif as $d){
				$nama = $d->nama;
				$email = $d->email;
				$keterangan = $d->keterangan;
				$nominal = $d->nominal;
				$tanggal_pengajuan = $d->tanggal_pengajuan;
			}
		function rupiah($angka){
			$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
			return $hasil_rupiah;
			};
		$nominal_convert = rupiah($nominal);
		//Kirim
        $from = "noreply@global-integrasi.co.id";
        $to = $email;
        $subject = "Approval Claim Karyawan Atas Nama ".$nama;
        $message = "Selamat claim kunjungan kerja anda dengan tanggal pengajuan ".$tanggal_pengajuan." dengan nominal sejumlah : ".$nominal_convert." telah disetujui.";

        $this->email->set_newline("\r\n");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);

        if ($this->email->send()) {
            // echo 'Your Email has successfully been sent.';
        } else {
            show_error($this->email->print_debugger());
        }
		$this->session->set_flashdata('notif', 'di setujui', 'Success');
		redirect('admin/claim');
	}

	function cancel_claim($id_rembes)
	{
		$data = array(
			'status' => "0"
		);
		$where = array('id_rembes' => $id_rembes);
		$this->Mod_admin->update_claim($where, $data, 'tbl_form_reimburstment');
		// Kirim notif Email
		$this->load->config('email');
        $this->load->library('email');
		// Ambil email dari database
		$email_notif = $this->Mod_admin->get_rembes_email($id_rembes)->result();
		foreach($email_notif as $d){
				$nama = $d->nama;
				$email = $d->email;
				$keterangan = $d->keterangan;
				$nominal = $d->nominal;
				$tanggal_pengajuan = $d->tanggal_pengajuan;
			}
		function rupiah($angka){
			$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
			return $hasil_rupiah;
			};
		$nominal_convert = rupiah($nominal);
		//Kirim
        $from = "noreply@global-integrasi.co.id";
        $to = $email;
        $subject = "Ammend Claim Karyawan Atas Nama ".$nama;
        $message = "Mohon maaf, claim kunjungan kerja anda dengan tanggal pengajuan ".$tanggal_pengajuan." dengan nominal sejumlah : ".$nominal_convert." telah dibatalkan.";

        $this->email->set_newline("\r\n");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);

        if ($this->email->send()) {
            // echo 'Your Email has successfully been sent.';
        } else {
            show_error($this->email->print_debugger());
        }
		$this->session->set_flashdata('notif', 'di batalkan', 'Success');
		redirect('admin/claim');
	}
	
	public function edit_claim($id_rembes)
	{
		$this->load->view('header');
		$data['project'] = $this->Mod_admin->get_project()->result();
		$data['claim'] = $this->Mod_admin->detail_claim($id_rembes, 'tbl_form_reimburstment')->row();
		$this->load->view('admin/claim_kerja/edit_claim', $data);
		$this->load->view('footer');
	}

	public function update_claim()
	{ 
		// Ambil data yang dikirim dari form
		$this->form_validation->set_rules('nominal_claim','Nominal','trim|required');
		$this->form_validation->set_rules('keterangan','Keterangan','trim|required');
		$where = array(
			'id_rembes' => $this->input->post('id_rembes')
		);
		$id_rembes = $this->input->post('id_rembes');
		$random_string = random_string('numeric',5);
		$file_claim = $_FILES['file_claim']['name'];
		if($this->form_validation->run() == FALSE){
			$data = array(
				'keterangan' => $this->input->post('keterangan'),
				'nominal' => $this->input->post('nominal_claim'),
				'id_project' => $this->input->post('nama_paket'),
				'file_rembes' => $random_string.$file_claim
			);
			$data['project'] = $this->Mod_admin->get_project()->result();
			$this->edit_claim($id_rembes);
			// $this->load->view('header');
			// $this->load->view('admin/claim_kerja/edit_claim/'.$id_rembes, $data);
			// $this->load->view('footer');
		}else{
		// Jika file tidak di upload, maka masukkan nominal sama keterangan
			if (empty($_FILES['file_claim']['name'])){
				$data = array(
					'keterangan' => $this->input->post('keterangan'),
					'nominal' => $this->input->post('nominal_claim'),
					'id_project' => $this->input->post('nama_paket'),
					'status' => "0"
				);
				$this->session->set_flashdata('notif', 'di update', 'Success');
				$this->Mod_admin->update_claim($where, $data, 'tbl_form_reimburstment');
				redirect('admin/claim');
			// Jika file diupload
			}else{
				$data = array(
					'keterangan' => $this->input->post('keterangan'),
					'nominal' => $this->input->post('nominal_claim'),
					'id_project' => $this->input->post('nama_paket'),
					'status' => "0",
					'file_rembes' => $random_string.$file_claim
				);
				//Upload
				$config['upload_path']          = 'assets/upload/claim';
				$config['allowed_types']        = 'gif|jpg|jpeg|pdf|png';
				$config['max_size']             = 5000;
				$config['file_name'] 			= $random_string.$file_claim;
				$this->load->library('upload',$config);
						if($this->upload->do_upload('file_claim')){
							
							$this->session->set_flashdata('notif', 'di update', 'Success');
							$this->Mod_admin->update_claim($where, $data, 'tbl_form_reimburstment');
							redirect('admin/claim');
						}else{
							$this->session->set_flashdata('notif', $this->upload->display_errors(), 'fail');
							$error = array('error' => $this->upload->display_errors());

							print_r($error);
							exit;
						}
			}
		}
		
	}

	function delete_claim($id_rembes)
	{
		$where = array('id_rembes' => $id_rembes);
		$this->Mod_admin->hapus_claim($where, 'tbl_form_reimburstment');
		redirect('admin/claim');
	}

	public function laporan_cuti()
	{

		$this->load->view('header');
		$this->load->view('admin/laporan/cuti');
		$this->load->view('footer');
	}

	public function laporan_cuti_pdf()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		// panggil library yang kita buat sebelumnya yang bernama pdfgenerator
		$this->load->library('pdfgenerator');

		// $this->data['title_pdf'] = 'Laporan Rekapitulasi Cuti'.$bulan.'-'.$tahun;

		$data = array(
			'title_pdf' => 'Laporan Rekapitulasi Cuti-'.$bulan.'-'.$tahun,
			'bulan' => $bulan,
			'tahun' => $tahun
		);
		// filename dari pdf ketika didownload
		$file_pdf = 'Laporan Rekapitulasi Cuti-'.$bulan.'-'.$tahun;
		// setting paper
		$paper = 'A4';
		//orientasi paper potrait / landscape
		$orientation = "landscape";
		$data['laporan'] = $this->Mod_admin->get_laporan_cuti($bulan,$tahun)->result();
		$html = $this->load->view('admin/laporan/cutipdf', $data, TRUE);

		// run dompdf
		$this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
		
	}

	public function laporan_reimburstment()
	{

		$this->load->view('header');
		$this->load->view('admin/laporan/reimburstment');
		$this->load->view('footer');
	}

	public function laporan_reimburstment_pdf()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		// panggil library yang kita buat sebelumnya yang bernama pdfgenerator
		$this->load->library('pdfgenerator');

		$data = array(
			'title_pdf' => 'Laporan Rekapitulasi Reimburstment-'.$bulan.'-'.$tahun,
			'bulan' => $bulan,
			'tahun' => $tahun
		);
		// filename dari pdf ketika didownload
		$file_pdf = 'Laporan Rekapitulasi Reimburstment-'.$bulan.'-'.$tahun;
		// setting paper
		$paper = 'A4';
		//orientasi paper potrait / landscape
		$orientation = "landscape";
		$data['laporan'] = $this->Mod_admin->get_laporan_reimburstment($bulan,$tahun)->result();
		$html = $this->load->view('admin/laporan/reimburstmentpdf', $data, TRUE);

		// run dompdf
		$this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
		
	}

	public function laporan_pdf()
	{

		// panggil library yang kita buat sebelumnya yang bernama pdfgenerator
		$this->load->library('pdfgenerator');

		// title dari pdf
		$this->data['title_pdf'] = 'Laporan Penjualan Toko Kita';

		// filename dari pdf ketika didownload
		$file_pdf = 'laporan_penjualan_toko_kita';
		// setting paper
		$paper = 'A4';
		//orientasi paper potrait / landscape
		$orientation = "landscape";
		$data['project'] = $this->Mod_admin->get_project()->result();
		$html = $this->load->view('admin/project/laporan_project', $data, TRUE);

		// run dompdf
		$this->pdf->generate($html, $file_pdf, $paper, $orientation);
	}
}