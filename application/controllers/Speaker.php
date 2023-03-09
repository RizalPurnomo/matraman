<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Speaker extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// $this->load->model(array('poli_model', 'skp_model'));
	}

	public function index()
	{
		// $data['poli'] = $this->poli_model->getAllPoli();
		$this->load->view('speaker');
	}
}