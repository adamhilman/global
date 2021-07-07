<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
    {
    parent::__construct();
    //load Helper for Form
    $this->load->helper('url', 'form'); 
    $this->load->library('form_validation');
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
		$this->load->view('admin/project/index');
        $this->load->view('footer');
	}

	public function detail_project()
	{
        $this->load->view('header');
		$this->load->view('admin/project/detail_project');
        $this->load->view('footer');
	}

	public function tambah_project()
	{
        $this->load->view('header');
		$this->load->view('admin/project/tambah_project');
        $this->load->view('footer');
	}

	public function upload_file_project() 
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
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (isset($_FILES['file_project']) && !empty($_FILES['file_project']['name'])) {
            if ($this->upload->do_upload('file_project')) {
                $image_data =   $this->upload->data('file_project');
				// this db insert
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
}