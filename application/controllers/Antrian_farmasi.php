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
		$this->load->view('antrian');
	}

	public function printSilentPrint()
	{
		$tmpdir = sys_get_temp_dir();
		$file = tempnam($tmpdir, 'ctk');
		$handle = fopen($file, 'w');
		$condensed = Chr(27) . Chr(33) . Chr(4);
		$bold1 = Chr(27) . Chr(69);
		$bold0 = Chr(27) . Chr(70);
		$initialized = chr(27) . chr(64);
		$condensed1 = chr(15);
		$condensed0 = chr(18);
		$Data = $initialized;
		$Data .= $condensed1;
		$Data .= "----------------------------\n";
		$Data .= "         JNE TARUNA         \n";
		$Data .= "----------------------------\n";
		$Data .= "Selamat datang,\n";
		$Data .= "--------------------------\n";
		fwrite($handle, $Data);
		fclose($handle);
		copy($file, "//DESKTOP-8LE9TRF/EPSON L120 Series"); # Lakukan cetak
		unlink($file);
	}

	public function printAntrian()
	{
		date_default_timezone_set('Asia/Jakarta');

		$antrian = "";
		$last_antrian = $this->antrian_model->getLastAntrian(date("Y-m-d"));
		if (count($last_antrian) < 1) {
			$antrian = '1';
		} else {
			$antrian = $last_antrian[0]['no_antrian'] + 1;
		}
		// echo $antrian;

		$antrian = array(
			'no_antrian' => $antrian,
			'tanggal' => date("Y-m-d"),
			'panggil' => '0'
		);
		$this->antrian_model->saveData($antrian, 'antrian_farmasi');
		$data['antrian'] = $this->antrian_model->getLastAntrian(date("Y-m-d"));
		$this->load->view('antrian_print', $data);
	}

	public function printAntrianCopy()
	{
		$data['antrian'] = $this->antrian_model->getLastAntrian(date("Y-m-d"));
		$this->load->view('antrian_print', $data);
	}

	public function panggil()
	{

		$d = $this->antrian_model->getLastAntrianSdhPanggil(date("Y-m-d"));
		if (count($d) < 1) {
			$no_antrian = "0";
		} else {
			$no_antrian = $d[0]['no_antrian'];
		}
		$data['no_antrian'] = $no_antrian;
		$data['antrian'] = $this->antrian_model->getAntrian(date("Y-m-d"));
		$this->load->view('panggil_antrian', $data);
	}

	public function update_antrian()
	{
		$data = $this->input->post('antrian');
		$d = $this->antrian_model->getLastAntrianBlmPanggil(date("Y-m-d"));
		if (count($d) < 1) {
			echo "Blm ada data";
		} else {
			$id = $d[0]['id'];
			$this->antrian_model->updateData($id, $data, 'antrian_farmasi');
			echo "Berhasil";
		}
	}

	public function update_pending()
	{
		$data = $this->input->post('antrian');
		$d = $this->antrian_model->getLastAntrianPending(date("Y-m-d"), "DESC");
		if (count($d) < 1) {
			$e = $this->antrian_model->getLastAntrianBlmPanggil(date("Y-m-d"));
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

	public function update_pending2()
	{
		$data = $this->input->post('antrian');
		$d = $this->antrian_model->getLastAntrianPending(date("Y-m-d"), "ASC");
		if (count($d) < 1) {
			echo "Blm ada data";
		} else {
			$id = $d[0]['id'];
			$this->antrian_model->updateData($id, $data, 'antrian_farmasi');
			echo "Berhasil";
		}
	}

	public function refreshTable()
	{
		$antrian = $this->antrian_model->getAntrian(date("Y-m-d"));
		$antrianSdhPanggil = $this->antrian_model->getAntrianSdhPanggil(date("Y-m-d"));
		$antrianPending = $this->antrian_model->getAntrianPendingPanggil(date("Y-m-d"));
		$response = array(
			'antrian'  => $antrian,
			'antrianSdhPanggil' => $antrianSdhPanggil,
			'antrianPending' => $antrianPending,
		);
		echo json_encode($response);
	}
}
