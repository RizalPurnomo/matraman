<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Skp_libur extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('poli_model', 'skp_model'));
    }

    public function index()
    {
        $arr_poli_sore = "(10, 2, 3, 21,5)";
        // print_r($arr_poli_sore);
        $data['poli'] = $this->poli_model->getPoliByIdArray($arr_poli_sore);
        $this->load->view('skp_pilih_poli_libur', $data);
    }

    public function pilihPoli($id)
    {
        $data['poli'] = $this->poli_model->getPoliById($id);
        $this->load->view('skp_voting_libur', $data);
        // print_r($data);
    }

    public function printAntrianFarmasi($id)
    {
        $is_umum = 0;
        $is_lansia = 0;
        $umum = array(1, 2, 3, 5, 6, 7, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24);
        $lansia = array(4, 8, 5, 15, 16, 2, 20, 18, 7, 14);

        if (in_array($id, $umum)) {
            $is_umum = 1;
        }

        if (in_array($id, $lansia)) {
            $is_lansia = 1;
        }

        $data['is_umum'] = $is_umum;
        $data['is_lansia'] = $is_lansia;

        $data['poli'] = $this->poli_model->getPoliById($id);
        $this->load->view('skp_antrian_print_libur', $data);
    }


    public function saveSkp()
    {
        $skp = $this->input->post('skp');
        $save = $this->poli_model->saveData($skp, 'skp');
        if ($save) {
            $success = true;
            $messages = "TERIMA KASIH";
        } else {
            $success = false;
            $messages = "Data gagal disimpan";
        }
        $response = array(
            'success' => $success,
            'messages'   => $messages
        );
        echo json_encode($response);
    }

    // public function adminSkp()
    // {
    // 	$skp = $this->input->post();
    // 	if (empty($skp)) {
    // 		$tgl =  date("m/d/Y");
    // 		$month =  date("m");
    // 		$year =  date("Y");
    // 		$id_poli = '1';	
    // 	}else{
    // 		$tgl =  date("m/d/Y", strtotime($skp['tgl']));
    // 		$month =  date("m", strtotime($skp['tgl']));
    // 		$year =  date("Y", strtotime($skp['tgl']));
    // 		$id_poli = $skp['poli'];
    // 	}

    // 	$data['poli'] = $this->poli_model->getAllPoli();
    // 	$data['tgl'] = $tgl;
    // 	$data['id_poli'] = $id_poli;
    // 	$data['skpDetail'] = $this->skp_model->getSkpMonthDetail($id_poli, $month, $year);
    // 	$data['skp'] = $this->skp_model->getSkpMonth($id_poli, $month, $year);
    // 	$this->load->view('skp_admin', $data);
    // }

    // public function filterSkp()
    // {
    // 	$skp = $this->input->post();
    // 	print_r($skp);
    // 	if (empty($skp)) {
    // 		echo "Kosong";
    // 	}else{
    // 		echo "Isi";
    // 	}

    // 	$data['poli'] = $this->poli_model->getAllPoli();
    // 	$month =  date("m", strtotime($skp['tgl']));
    // 	$year =  date("Y", strtotime($skp['tgl']));
    // 	$id_poli = $skp['poli'];
    // 	$data['tgl'] = date("m/d/Y", strtotime($skp['tgl']));
    // 	$data['id_poli'] = $id_poli;
    // 	$data['skpDetail'] = $this->skp_model->getSkpMonthDetail($id_poli, $month, $year);
    // 	$data['skp'] = $this->skp_model->getSkpMonth($id_poli, $month, $year);
    // 	$this->load->view('skp', $data);
    // }







    // public function saveTanggal()
    // {
    // 	$tgl    = "2022-01-01";
    // 	for ($i = 0; $i < 1000; $i++) {
    // 		$tgl    = date('Y-m-d', strtotime('+1 days', strtotime($tgl))); // penjumlahan tanggal sebanyak 7 hari
    // 		$arrTgl = array(
    // 			'tanggal' => $tgl
    // 		);
    // 		$this->poli_model->saveData($arrTgl, 'tanggal');
    // 	}
    // 	echo "Tanggal Berhasil Disimpan";
    // }
}
