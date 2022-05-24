<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		//load Helper for Form
		$this->load->helper('url', 'form');
		$this->load->library('form_validation');
		$this->load->model('Mod_admin');
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('admin/dashboard');
		$this->load->view('footer');
	}

	public function project()
	{
		$this->load->view('header');
		$data['project'] = $this->Mod_admin->get_project()->result();
		$this->load->view('admin/project/index', $data);
		$this->load->view('footer');
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
		$this->Mod_admin->insert_project($data);
		redirect(base_url() . 'admin/project');
	}

	public function upload_file_project($id_project)
	{
		$file = $_FILES['file_project']['name'];
		$token = $this->input->post('token_file');
		$this->load->library('image_lib');
		$config['upload_path'] = FCPATH . "/assets/upload/project/";
		$config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx|jpeg';
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = FALSE;
		$config['file_name'] = $token;
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
					'nama_file' => $file_project,
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
			$explode = explode('.', $nama_file);
			$extid = end($explode);
			if (file_exists($file = FCPATH . 'assets/upload/project/' . $token . '.' . $extid)) {
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
			$token = $hasil->token;
			$explode = explode('.', $nama_file);
			$extid = end($explode);
			if (file_exists($file = FCPATH . 'assets/upload/project/' . $token . '.' . $extid)) {
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

	public function claim()
	{
		$this->load->view('header');
		$this->load->view('admin/claim_kerja/index');
		$this->load->view('footer');
	}

	public function tambah_claim()
	{
		$this->load->view('header');
		$data['project'] = $this->Mod_admin->get_project()->result();
		$this->load->view('admin/claim_kerja/tambah_claim', $data);
		$this->load->view('footer');
	}

	public function simpan_claim()
	{
		$this->load->helper('string');
		$id_file = random_string('alnum', 16);

		// Ambil data yang dikirim dari form
		$nama_paket = $_POST['nama_paket'];
		$nominal_claim = $_POST['nominal_claim'];
		$keterangan = $_POST['keterangan'];
		$file_claim = $_FILES['file_claim']['name'];


		//Insert ke dalam table claim
		$data_claim = array(
			'id_project' => $nama_paket,
			'user_id' => '1'
		);
		$this->db->insert('tbl_claim', $data_claim);
		$last_id = $this->db->insert_id();

		//Masukkan ke dalam table detail claim
		$config['upload_path']          = 'assets/upload/claim';
		$config['allowed_types']        = 'gif|jpg|jpeg|pdf|png';
		$config['max_size']             = 5000;
		$config['encrypt_name'] 		= true;
		$this->load->library('upload',$config);
		$jumlah_file = count($_FILES['file_claim']['name']);
		for($i = 0; $i < $jumlah_file;$i++)
		{
            if(!empty($_FILES['file_claim']['name'][$i])){
 
				$_FILES['file']['name'] = $_FILES['file_claim']['name'][$i];
				$_FILES['file']['type'] = $_FILES['file_claim']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['file_claim']['tmp_name'][$i];
				$_FILES['file']['error'] = $_FILES['file_claim']['error'][$i];
				$_FILES['file']['size'] = $_FILES['file_claim']['size'][$i];
				
				if($this->upload->do_upload('file')){
					$uploadData = $this->upload->data();
					$data['file_claim'] = $uploadData['file_name'];
					$data['id_claim'] = $last_id;
					$data['keterangan'] = $keterangan[$i];
					$data['nominal'] = $nominal_claim[$i];
					$this->session->set_flashdata('notif_claim', 'disubmit', 'Success');
					$this->db->insert('tbl_detail_claim',$data);
				}else{
					$this->session->set_flashdata('notif_claim', $this->upload->display_errors(), 'fail');
					// $error = array('error' => $this->upload->display_errors());

					// print_r($error);
					// exit;
				}
			}
		}
		redirect('admin/claim');
	}

	public function laporan_pdf()
	{

		// panggil library yang kita buat sebelumnya yang bernama pdfgenerator
		$this->load->library('pdf');

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
