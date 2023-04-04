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
		if ($total_responden==0) {
			$realisasi = "";
		}else{
			$realisasi = (($total_puas_sangatpuas / $total_responden) * 100);
		}
		$data['realisasi'] = $realisasi;

		// echo "<pre/>";
		// print_r($data);
		$this->load->view('admin/skp_admin', $data);
	}

	public function kpi(){
		$data['kpi'] = $this->skp_model->getKpiByYear('2023');
		$this->load->view('admin/kpi',$data);
	}

	public function getTarget(){
		$target = $this->input->post();
		$bulan = $target['bulan'];
		$tahun = $target['tahun'];
		$targetDinas = $this->skp_model->getTargetDinas($bulan, $tahun);
		echo json_encode($targetDinas);
	}

	public function syncronKPI(){
		$target_dinas = $this->input->post('target_dinas');
		$tahun = $this->input->post('periode')['tahun'];
		$bulan = $this->input->post('periode')['bulan'];

		$data = array(
            $bulan => $target_dinas
        );
		$data_where = array(
            'jenis' => 'Target',
			'tahun' => $tahun
        );

		$update_target = $this->skp_model->updateSkpSummary($data, $data_where);
		if($update_target){
			$realisasi = $this->hitungRealisasi($bulan,$tahun);

			$data = array(
				$bulan => $realisasi
			);
			$data_where = array(
				'jenis' => 'Realisasi',
				'tahun' => $tahun
			);
	
			$update_realisasi = $this->skp_model->updateSkpSummary($data, $data_where);
			if($update_realisasi){
				$capaian = ($realisasi/$target_dinas)*100;
				$data = array(
					$bulan => $capaian
				);
				$data_where = array(
					'jenis' => 'Capaian',
					'tahun' => $tahun
				);
		
				$update_capaian = $this->skp_model->updateSkpSummary($data, $data_where);
				if($update_capaian){
					$success = "true";
					$messages = "Data Berhasil Di Update";
				}else{
					$success = "false";
					$messages = "Capaian Gagal Di Update";
				}
			}else{
				$success = "false";
				$messages = "Realisasi Gagal Di Update";
			}	
			
		}else{
			$success = "false";
			$messages = "Target Gagal Di Update";
		}
		$response = array(
			'success' => $success,
			'messages'   => $messages
		);
        echo json_encode($response);
		
	}

	public function hitungRealisasi($bulan,$tahun){
		if ($bulan == "jan") {
			$bln = "1";
		}elseif ($bulan == "feb") {
			$bln = "2";
		}elseif ($bulan == "mar") {
			$bln = "3";
		}elseif ($bulan == "apr") {
			$bln = "4";
		}elseif ($bulan == "mei") {
			$bln = "5";
		}elseif ($bulan == "jun") {
			$bln = "6";
		}elseif ($bulan == "jul") {
			$bln = "7";
		}elseif ($bulan == "agu") {
			$bln = "8";
		}elseif ($bulan == "sep") {
			$bln = "9";
		}elseif ($bulan == "okt") {
			$bln = "10";
		}elseif ($bulan == "nov") {
			$bln = "11";
		}elseif ($bulan == "des") {
			$bln = "12";
		}
		$skpTotal = $this->skp_model->totalSkpMonthById("",$bln, $tahun);
		$total_responden = $skpTotal[0][1] + $skpTotal[0][2] + $skpTotal[0][3] + $skpTotal[0][4];
		if ($total_responden==0) {
			$realisasi = "";
		}else{
			$total_puas_sangatpuas = $skpTotal[0][1] + $skpTotal[0][2];
			$realisasi = ($total_puas_sangatpuas/$total_responden)*100;
		}
		return $realisasi;
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