<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Skp extends CI_Controller
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
        // redirect('login');
		redirect('admin/skp/skpglobal');
	}

    public function skpGlobal()
	{
		$skp = $this->input->post();
		if (empty($skp)) {
			$tgl =  date("m/d/Y");
			$month =  date("m");
			$year =  date("Y");
			$id_poli = '';	
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
		$data['skp'] = $this->skp_model->getSkpMonthById($id_poli,$month, $year);
		$skpTotal = $this->skp_model->totalSkpMonthById($id_poli,$month, $year);
		$total_responden = $skpTotal[0][1] + $skpTotal[0][2] + $skpTotal[0][3] + $skpTotal[0][4];
		$total_puas_sangatpuas = $skpTotal[0][1] + $skpTotal[0][2];
		$total_cukup_kurang = $skpTotal[0][3] + $skpTotal[0][4];
		$data['skpTotal'] = $skpTotal;
		$data['total_responden'] = $total_responden;
		$data['total_puas_sangatpuas'] = $total_puas_sangatpuas;
		$data['total_cukup_kurang'] = $total_cukup_kurang;
		$data['realisasi'] = (($total_puas_sangatpuas / $total_responden) * 100);

		// echo "<pre/>";
		// print_r($data);
		$this->load->view('admin/skp_admin', $data);
	}

	public function kpi(){
		$data['kpi'] = $this->skp_model->getKpiByYear('2023');
		$this->load->view('admin/kpi',$data);
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