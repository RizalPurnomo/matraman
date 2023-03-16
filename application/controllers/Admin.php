<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('poli_model', 'skp_model'));
        if (empty($this->session->userdata('username'))) {
            redirect('login');
        }
	}

	public function index()
	{
		// $data['poli'] = $this->poli_model->getAllPoli();
		// $this->load->view('speaker');
        redirect('login');
	}

    public function skp()
	{
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
		$this->load->view('skp_admin', $data);
	}



    public function saveTanggal()
	{
		$tgl    = "2022-01-01";
		for ($i = 0; $i < 1000; $i++) {
			$tgl    = date('Y-m-d', strtotime('+1 days', strtotime($tgl))); // penjumlahan tanggal sebanyak 7 hari
			$arrTgl = array(
				'tanggal' => $tgl
			);
			$this->poli_model->saveData($arrTgl, 'tanggal');
		}
		echo "Tanggal Berhasil Disimpan";
	}
}