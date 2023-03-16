<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('login_model','poli_model','skp_model'));
	}

	public function index()
	{
		if ($this->session->userdata('username')) {
            $skp = $this->input->post();
            if (empty($skp)) {
                $tgl =  date("m/d/Y");
                $month =  date("m");
                $year =  date("Y");
                $id_poli = '1';	
            }else{
                $tgl =  date("m/d/Y", strtotime($skp['tgl']));
                $month =  date("m", strtotime($skp['tgl']));
                $year =  date("Y", strtotime($skp['tgl']));
                $id_poli = $skp['poli'];
            }
    
            $data['poli'] = $this->poli_model->getAllPoli();
            $data['tgl'] = $tgl;
            $data['id_poli'] = $id_poli;
            $data['skpDetail'] = $this->skp_model->getSkpMonthDetail($id_poli, $month, $year);
            $data['skp'] = $this->skp_model->getSkpMonth($id_poli, $month, $year);

			$this->load->view('skp_admin',$data);
		} else {
			$this->load->view('login');
		}
	}

	public function login()
	{
		date_default_timezone_set('Asia/Jakarta');
		$username = $this->input->post('username');
		$password = $this->input->post('password');


		$userdata = $this->login_model->getValidUser($username, md5($password));
		if ($userdata) {
			$this->session->set_userdata($userdata[0]);
			$login = array(
				"last_login" => date("Y-m-d H:i:s")
			);
			$this->login_model->updateLastLogin($username, $login);
			redirect('admin/skp');
		} else {
			redirect('login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		// $this->session->unset_userdata('username');
		// $_SESSION = [];
		redirect('login');
	}
}