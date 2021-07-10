<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
        $data = array(
			'nama_paket' => $this->input->post('nama_paket'),
			'sub_pekerjaan' => $this->input->post('sub_pekerjaan'),
			'lokasi_pekerjaan' => $this->input->post('lokasi_pekerjaan'),
			'nama_ppk' => $this->input->post('nama_ppk'),
			'alamat_ppk' => $this->input->post('alamat_ppk'),
			'nomor_kontrak' => $this->input->post('nomor_kontrak'),
			'nilai_kontrak' => $this->input->post('nilai_kontrak'),
			'selesai_kontrak' => $this->input->post('selesai_kontrak'),
			'serah_terima' => $this->input->post('serah_terima'),
			);
			$this->Mod_admin->insert_project($data);
			redirect(base_url().'admin/project');
	}

	public function upload_file_project($id_project) 
    {
		$file = $_FILES['file_project']['name'];
		$token = $this->input->post('token_file');
        $explode = explode('.', $file);
        $extid = end($explode);
        $this->load->library('image_lib');
        $config['upload_path'] = FCPATH . "/assets/upload/project/";
        $config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx|jpeg';
        $config['overwrite'] = TRUE;
        $config['remove_spaces'] = FALSE;
        $config['file_name'] = $token.$file;
		$config['max_size'] = 10000;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (isset($_FILES['file_project']) && !empty($_FILES['file_project']['name'])) {
            if ($this->upload->do_upload('file_project')) {
                $image_data =   $this->upload->data('file_project');
				// this db insert
				$file_project = $token.$file;
				$data = array(
					'nama_file' => $file_project,
					'id_project' => $id_project
					);
				$this->Mod_admin->insert_file_project($data);
				echo $file_project;
				exit;
            } else {
                print_r($this->upload->display_errors());
				exit;
            }
        } 
    }

	public function hapus_file_project(){
		// Ambil Token
		$token=$this->input->post('token');
		$project_file=$this->db->get_where('project_file', array('token'=>$token));

		if($project_file->num_rows()>0){
			$hasil=$project_file->row();
			$nama_file=$hasil->nama_file;
			if(file_exists($file=FCPATH.'assets/upload/project/'.$nama_file)){
				unlink($file);
			}
			$this->db->delete('project_file', array('token'=>$token));
		}

		echo "{}";
	}

	public function claim()
	{
        $this->load->view('header');
		$this->load->view('admin/claim_kerja/index');
        $this->load->view('footer');
	}

	public function laporan_pdf(){

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
		$html = $this->load->view('laporan_project', $data, TRUE);	    
        
        // run dompdf
        $this->pdf->generate($html, $file_pdf,$paper,$orientation);
    
    }
}