<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Antrian_farmasi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('antrian_model'));
		$this->load->library('Pdf');
	}

	public function index()
	{
		// $data['antrian'] = $this->poli_model->getAllPoli();
		// $this->load->view('antrian');
		$this->panggil();
	}

	

	public function panggil()
	{

		$d = $this->antrian_model->getLastAntrianUmumSdhPanggil(date("Y-m-d"));
		if (count($d) < 1) {
			$no_antrian_umum = "0";
		} else {
			$no_antrian_umum = $d[0]['no_antrian'];
		}
		$data['no_antrian_umum'] = $no_antrian_umum;
		$data['antrian_umum'] = $this->antrian_model->getAntrianUmum(date("Y-m-d"));


		$e = $this->antrian_model->getLastAntrianLansiaSdhPanggil(date("Y-m-d"));
		if (count($e) < 1) {
			$no_antrian_lansia = "0";
		} else {
			$no_antrian_lansia = "L" . $e[0]['no_antrian'];
		}
		$data['no_antrian_lansia'] = $no_antrian_lansia;
		$data['antrian_lansia'] = $this->antrian_model->getAntrianLansia(date("Y-m-d"));

		$this->load->view('panggil_antrian', $data);
	}

	public function cekPrioritas($kode_prioritas){
		if ($kode_prioritas==0) {
			return "L";
		}else{
			return "";
		}
	}

	//umum
	public function printAntrianUmum()
	{
		date_default_timezone_set('Asia/Jakarta');
		$antrian = "";
		$last_antrian = $this->antrian_model->getLastAntrianUmum(date("Y-m-d"));
		if (count($last_antrian) < 1) {
			$antrian = '1';
		} else {
			$antrian = $last_antrian[0]['no_antrian'] + 1;
		}
		

		$antrian = array(
			'no_antrian' => $antrian,
			'prioritas' => '1',
			'tanggal' => date("Y-m-d"),
			'panggil' => '0'
		);
		$this->antrian_model->saveData($antrian, 'antrian_farmasi');
		$antrian = $this->antrian_model->getLastAntrianUmum(date("Y-m-d"));
		$kd_prioritas = $antrian[0]['prioritas'] == '0' ? 'L' : '';
		$no_antrian = $kd_prioritas . $antrian[0]['no_antrian'];
		$data['antrian'] = $antrian;
		$data['no_antrian'] = $no_antrian;
		
		$this->load->view('antrian_print', $data);
	}

	public function printAntrianUmumCopy()
	{
		$antrian = $this->antrian_model->getLastAntrianUmum(date("Y-m-d"));
		$kd_prioritas = $antrian[0]['prioritas'] == '0' ? 'L' : '';
		$no_antrian = $kd_prioritas . $antrian[0]['no_antrian'];
		$data['antrian'] = $antrian;
		$data['no_antrian'] = $no_antrian;
		
		$this->load->view('antrian_print', $data);
	}

	public function update_antrian_umum()
	{
		$data = $this->input->post('antrian');
		$d = $this->antrian_model->getLastAntrianUmumBlmPanggil(date("Y-m-d"));
		if (count($d) < 1) {
			$response = array(
				'success' => false,
				'messages'   => "Blm ada data",
				'no'	=> ""
			);
		} else {
			$id = $d[0]['id'];
			$prioritas = $d[0]['prioritas'];
			$no_antrian = $d[0]['no_antrian'];
			

			$this->antrian_model->updateData($id, $data, 'antrian_farmasi');
			$response = array(
				'success' => true,
				'messages'   => "Berhasil",
				'no'=> $this->cekPrioritas($prioritas) . $no_antrian
			);
		}
		echo json_encode($response);
	}

	public function updateAntrianUmumManual($no_antrian)
	{
		$data = $this->input->post('antrian');
		$cek = $this->antrian_model->cekAntrianExist($no_antrian,date("Y-m-d"));
		if ($cek) {
			$d = $this->antrian_model->getAntrianByNoAntrian($no_antrian,date("Y-m-d"));
			$id = $d[0]['id'];
			$this->antrian_model->updateData($id, $data, 'antrian_farmasi');
			$response = array(
				'success' => true,
				'messages'   => "Berhasil",
				'no'=> $no_antrian
			);
		} else {
			$response = array(
				'success' => false,
				'messages'   => "Blm ada data",
				'no'	=> ""
			);
		}
		echo json_encode($response);
	}

	public function updatePendingUmum()
	{
		$data = $this->input->post('antrian');
		$d = $this->antrian_model->getLastAntrianUmumPending(date("Y-m-d"), "DESC");
		if (count($d) < 1) {
			$e = $this->antrian_model->getLastAntrianUmumBlmPanggil(date("Y-m-d"));
			if (count($e) > 0) {
				$id = $e[0]['id'];
				$no_antrian = $e[0]['no_antrian'];
			}
		} else {
			$id = (int)$d[0]['id'] + 1;
			$no_antrian = (int)$d[0]['no_antrian'] + 1;
		}
		$this->antrian_model->updateData($id, $data, 'antrian_farmasi');
		echo $no_antrian;
	}

	public function updateNextPendingUmum()
	{
		$data = $this->input->post('antrian');
		$d = $this->antrian_model->getLastAntrianUmumPending(date("Y-m-d"), "ASC");
		if (count($d) < 1) {
			$response = array(
				'success' => false,
				'messages'   => "Blm ada data",
				'no'	=> ""
			);
		} else {
			$id = $d[0]['id'];
			$no = $d[0]['no_antrian'];
			$this->antrian_model->updateData($id, $data, 'antrian_farmasi');
			$response = array(
				'success' => true,
				'messages'   => "Berhasil",
				'no'=> $no
			);
		}
		echo json_encode($response);
	}


	//lansia
	public function printAntrianLansia()
	{
		date_default_timezone_set('Asia/Jakarta');
		$antrian = "";
		$last_antrian = $this->antrian_model->getLastAntrianLansia(date("Y-m-d"));
		if (count($last_antrian) < 1) {
			$antrian = '1';
		} else {
			$antrian = $last_antrian[0]['no_antrian'] + 1;
		}
		

		$arrAntrian = array(
			'no_antrian' => $antrian,
			'prioritas' => '0',
			'tanggal' => date("Y-m-d"),
			'panggil' => '0'
		);
		$this->antrian_model->saveData($arrAntrian, 'antrian_farmasi');
		$antrian = $this->antrian_model->getLastAntrianLansia(date("Y-m-d"));
		$kd_prioritas = $antrian[0]['prioritas'] == '0'|| '' ? 'L' : '';
		$no_antrian = $kd_prioritas . $antrian[0]['no_antrian'];
		$data['antrian'] = $antrian;
		$data['no_antrian'] = $no_antrian;
		
		$this->load->view('antrian_print', $data);
	}

	public function printAntrianLansiaCopy()
	{
		$antrian = $this->antrian_model->getLastAntrianLansia(date("Y-m-d"));
		$kd_prioritas = $antrian[0]['prioritas'] == '0' ? 'L' : '';
		$no_antrian = $kd_prioritas . $antrian[0]['no_antrian'];
		$data['antrian'] = $antrian;
		$data['no_antrian'] = $no_antrian;
		
		$this->load->view('antrian_print', $data);
	}

	public function update_antrian_lansia()
	{
		$data = $this->input->post('antrian');
		$d = $this->antrian_model->getLastAntrianLansiaBlmPanggil(date("Y-m-d"));
		if (count($d) < 1) {
			$response = array(
				'success' => false,
				'messages'   => "Blm ada data",
				'no'	=> ""
			);
		} else {
			$id = $d[0]['id'];
			$prioritas = $d[0]['prioritas'];
			$no_antrian = $d[0]['no_antrian'];
			

			$this->antrian_model->updateData($id, $data, 'antrian_farmasi');
			$response = array(
				'success' => true,
				'messages'   => "Berhasil",
				'no'=> $this->cekPrioritas($prioritas) . $no_antrian
			);
		}
		echo json_encode($response);
	}

	public function updateAntrianLansiaManual($no_antrian)
	{
		$data = $this->input->post('antrian');
		$cek = $this->antrian_model->cekAntrianExist(substr($no_antrian,1),date("Y-m-d"));
		if ($cek) {
			$d = $this->antrian_model->getAntrianByNoAntrian(substr($no_antrian,1),date("Y-m-d"));
			$id = $d[0]['id'];
			$this->antrian_model->updateData($id, $data, 'antrian_farmasi');
			$response = array(
				'success' => true,
				'messages'   => "Berhasil",
				'no'=> $no_antrian
			);
		} else {
			$response = array(
				'success' => false,
				'messages'   => "Blm ada data",
				'no'	=> ""
			);
		}
		echo json_encode($response);
	}

	public function updatePendingLansia()
	{
		$data = $this->input->post('antrian');
		$d = $this->antrian_model->getLastAntrianLansiaPending(date("Y-m-d"), "DESC");
		if (count($d) < 1) {
			$e = $this->antrian_model->getLastAntrianLansiaBlmPanggil(date("Y-m-d"));
			if (count($e) > 0) {
				$id = $e[0]['id'];
				$no_antrian = $e[0]['no_antrian'];
			}
		} else {
			$id = (int)$d[0]['id'] + 1;
			$no_antrian = (int)$d[0]['no_antrian'] + 1;
		}
		$this->antrian_model->updateData($id, $data, 'antrian_farmasi');
		echo $no_antrian;
	}

	public function updateNextPendingLansia()
	{
		$data = $this->input->post('antrian');
		$d = $this->antrian_model->getLastAntrianLansiaPending(date("Y-m-d"), "ASC");
		if (count($d) < 1) {
			$response = array(
				'success' => false,
				'messages'   => "Blm ada data",
				'no'	=> ""
			);
		} else {
			$id = $d[0]['id'];
			$no = $d[0]['no_antrian'];
			$this->antrian_model->updateData($id, $data, 'antrian_farmasi');
			$response = array(
				'success' => true,
				'messages'   => "Berhasil",
				'no'=> $no
			);
		}
		echo json_encode($response);
	}




	public function refreshTable()
	{
		$antrianUmum = $this->antrian_model->getAntrianUmum(date("Y-m-d"));
		$antrianUmumPending = $this->antrian_model->getAntrianUmumPendingPanggil(date("Y-m-d"));
		$antrianLansia = $this->antrian_model->getAntrianLansia(date("Y-m-d"));
		$antrianLansiaPending = $this->antrian_model->getAntrianLansiaPendingPanggil(date("Y-m-d"));
		$response = array(
			'antrianUmum'  => $antrianUmum,
			'antrianUmumPending' => $antrianUmumPending,
			'antrianLansia'  => $antrianLansia,
			'antrianLansiaPending' => $antrianLansiaPending,
		);
		echo json_encode($response);
	}



	// public function printSilentPrint()
	// {
	// 	$tmpdir = sys_get_temp_dir();
	// 	$file = tempnam($tmpdir, 'ctk');
	// 	$handle = fopen($file, 'w');
	// 	$condensed = Chr(27) . Chr(33) . Chr(4);
	// 	$bold1 = Chr(27) . Chr(69);
	// 	$bold0 = Chr(27) . Chr(70);
	// 	$initialized = chr(27) . chr(64);
	// 	$condensed1 = chr(15);
	// 	$condensed0 = chr(18);
	// 	$Data = $initialized;
	// 	$Data .= $condensed1;
	// 	$Data .= "----------------------------\n";
	// 	$Data .= "         JNE TARUNA         \n";
	// 	$Data .= "----------------------------\n";
	// 	$Data .= "Selamat datang,\n";
	// 	$Data .= "--------------------------\n";
	// 	fwrite($handle, $Data);
	// 	fclose($handle);
	// 	copy($file, "//DESKTOP-8LE9TRF/EPSON L120 Series"); # Lakukan cetak
	// 	unlink($file);
	// }
}
