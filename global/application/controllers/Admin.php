<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
	public function tambah_project()
	{
        $this->load->view('header');
		$this->load->view('admin/project/tambah_project');
        $this->load->view('footer');
	}
}
