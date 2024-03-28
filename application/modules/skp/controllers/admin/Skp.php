<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Skp extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('poli_model', 'skp_model'));
		$this->load->library('Aauth');
		if (!$this->aauth->is_loggedin()) {
			redirect('login');
		}

		// parent::__construct();
		// if (empty($this->session->userdata('username'))) {
		// 	redirect('login');
		// }
	}

	public function index()
	{
		// $data['poli'] = $this->poli_model->getAllPoli();
		// $this->load->view('speaker');
		// redirect('login');
		redirect('skp/admin/skp/skpglobal');
	}

	public function skpGlobal()
	{
		$skp = $this->input->post();
		// print_r($skp);
		// echo $skp['submit'];
		// exit;
		if (empty($skp)) {
			$tgl =  date("M Y");
			$month =  date("m");
			$year =  date("Y");
			$id_poli = '';
			$this->viewSkp($tgl, $month, $year, $id_poli);
		} else {
			$tgl =  date("M Y", strtotime($skp['tgl']));
			$month =  date("m", strtotime($skp['tgl']));
			$year =  date("Y", strtotime($skp['tgl']));
			$id_poli = $skp['poli'];
			if ($skp['submit'] == "filter") {
				$this->viewSkp($tgl, $month, $year, $id_poli);
			} else {
				$this->printSkp($tgl, $month, $year, $id_poli);
			}
		}
	}

	public function viewSkp($tgl, $month, $year, $id_poli)
	{
		$data['poli'] = $this->poli_model->getAllPoli();
		if ($id_poli == "") {
			$data['nama_poli'] = "All";
		} else {
			$data['nama_poli'] = $this->poli_model->getPoliById($id_poli)[0]['nama_poli'];
		}
		$data['tgl'] = $tgl;
		$data['id_poli'] = $id_poli;
		$data['skpDetail'] = $this->skp_model->getSkpMonthDetail($id_poli, $month, $year);
		$data['skp'] = $this->skp_model->getSkpMonthById($id_poli, $month, $year);
		$skpTotal = $this->skp_model->totalSkpMonthById($id_poli, $month, $year);
		$total_responden = $skpTotal[0][1] + $skpTotal[0][2] + $skpTotal[0][3] + $skpTotal[0][4];
		$total_puas_sangatpuas = $skpTotal[0][1] + $skpTotal[0][2];
		$total_cukup_kurang = $skpTotal[0][3] + $skpTotal[0][4];
		$data['skpTotal'] = $skpTotal;
		$data['total_responden'] = $total_responden;
		$data['total_puas_sangatpuas'] = $total_puas_sangatpuas;
		$data['total_cukup_kurang'] = $total_cukup_kurang;
		if ($total_responden == 0) {
			$realisasi = "";
		} else {
			$realisasi = (($total_puas_sangatpuas / $total_responden) * 100);
		}
		$data['realisasi'] = $realisasi;

		// echo "<pre/>";
		// print_r($data);
		$this->load->view('skp/admin/skp_admin', $data);
	}

	public function printSkp($tgl, $month, $year, $id_poli)
	{
		$data['poli'] = $this->poli_model->getAllPoli();
		if ($id_poli == "") {
			$data['nama_poli'] = "All";
		} else {
			$data['nama_poli'] = $this->poli_model->getPoliById($id_poli)[0]['nama_poli'];
		}
		$data['tgl'] = $tgl;
		$data['id_poli'] = $id_poli;
		$data['skpDetail'] = $this->skp_model->getSkpMonthDetail($id_poli, $month, $year);
		$data['skp'] = $this->skp_model->getSkpMonthById($id_poli, $month, $year);
		$skpTotal = $this->skp_model->totalSkpMonthById($id_poli, $month, $year);
		$total_responden = $skpTotal[0][1] + $skpTotal[0][2] + $skpTotal[0][3] + $skpTotal[0][4];
		$total_puas_sangatpuas = $skpTotal[0][1] + $skpTotal[0][2];
		$total_cukup_kurang = $skpTotal[0][3] + $skpTotal[0][4];
		$data['skpTotal'] = $skpTotal;
		$data['total_responden'] = $total_responden;
		$data['total_puas_sangatpuas'] = $total_puas_sangatpuas;
		$data['total_cukup_kurang'] = $total_cukup_kurang;
		if ($total_responden == 0) {
			$realisasi = "";
		} else {
			$realisasi = (($total_puas_sangatpuas / $total_responden) * 100);
		}
		$data['realisasi'] = $realisasi;
		$this->load->view('skp/admin/skp_print', $data);
	}

	public function kpi()
	{
		$year = date('Y');
		$data['kpi'] = $this->skp_model->getKpiByYear($year);
		$this->load->view('admin/kpi', $data);
	}

	public function getTarget()
	{
		$target = $this->input->post();
		$bulan = $target['bulan'];
		$tahun = $target['tahun'];
		$targetDinas = $this->skp_model->getTargetDinas($bulan, $tahun);
		echo json_encode($targetDinas);
	}

	public function syncronKPI()
	{
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
		if ($update_target) {
			$realisasi = $this->hitungRealisasi($bulan, $tahun);

			$data = array(
				$bulan => $realisasi
			);
			$data_where = array(
				'jenis' => 'Realisasi',
				'tahun' => $tahun
			);

			$update_realisasi = $this->skp_model->updateSkpSummary($data, $data_where);
			if ($update_realisasi) {
				$capaian = ($realisasi / $target_dinas) * 100;
				$data = array(
					$bulan => $capaian
				);
				$data_where = array(
					'jenis' => 'Capaian',
					'tahun' => $tahun
				);

				$update_capaian = $this->skp_model->updateSkpSummary($data, $data_where);
				if ($update_capaian) {
					$success = "true";
					$messages = "Data Berhasil Di Update";
				} else {
					$success = "false";
					$messages = "Capaian Gagal Di Update";
				}
			} else {
				$success = "false";
				$messages = "Realisasi Gagal Di Update";
			}
		} else {
			$success = "false";
			$messages = "Target Gagal Di Update";
		}
		$response = array(
			'success' => $success,
			'messages'   => $messages
		);
		echo json_encode($response);
	}

	public function exportExcel()
	{
		$tahun = $this->input->post('tahun');
		$dataKPI = $this->skp_model->getKpiByYear($tahun);
		// echo "<pre/>";
		// print_r($dataKPI);
		// exit;
		if (count($dataKPI) < 1) {
			echo "Data Tidak Ditemukan";
		} else {
			$this->load->library("excel");
			$object = new PHPExcel();

			$object->setActiveSheetIndex(0);
			$sheet = $object->getActiveSheet();
			$sheet->setCellValue('M1', "CM-68/STMK-BSDK/04-16");
			$sheet->setCellValue('M2', "Rev  :  00");
			$sheet->setCellValue('A3', "LAPORAN PENCAPAIAN KEY PERFORMANCE INDICATOR (KPI)");
			$sheet->setCellValue('A4', "DINAS KESEHATAN PROVINSI DKI JAKARTA");
			$sheet->setCellValue('A5', "TAHUN " . $tahun);
			$sheet->setCellValue('A6', "PUSKESMAS KECAMATAN MATRAMAN");
			$sheet->setCellValue('A7', "KOTA ADMINISTRASI JAKARTA TIMUR");

			//header tabel
			$sheet->setCellValue('A9', "NO");
			$sheet->setCellValue('B9', "INDIKATOR");
			$sheet->setCellValue('C9', "CARA MENGHITUNG");
			$sheet->setCellValue('D9', "BULAN");
			$sheet->setCellValue('E9', "PENCAPAIAN");
			$sheet->setCellValue('E10', "JAN");
			$sheet->setCellValue('F10', "FEB");
			$sheet->setCellValue('G10', "MAR");
			$sheet->setCellValue('H10', "APR");
			$sheet->setCellValue('I10', "MEI");
			$sheet->setCellValue('J10', "JUN");
			$sheet->setCellValue('K10', "JUL");
			$sheet->setCellValue('L10', "AUG");
			$sheet->setCellValue('M10', "SEP");
			$sheet->setCellValue('N10', "OKT");
			$sheet->setCellValue('O10', "NOV");
			$sheet->setCellValue('P10', "DES");

			//body tabel
			$sheet->setCellValue('A12', "1");
			$sheet->setCellValue('B12', "Tingkat Kepuasan Masyarakat");
			$sheet->setCellValue('C12', "Jumlah masyarakat yang menyatakan sangat puas dan puas dibagi jumlah masyarakat yang menggunakan sarana kesehatan milik Pemda DKI Jakarta x 100%");
			$sheet->setCellValue('D12', "Target (T)");
			$sheet->setCellValue('D13', "Realisasi (r)");
			$sheet->setCellValue('D14', "Capaian : r/t x 100%");

			//data kpi
			for ($i = 0; $i < count($dataKPI); $i++) {
				$sheet->setCellValue('E' . ($i + 12), $dataKPI[$i]['jan']);
				$sheet->setCellValue('F' . ($i + 12), $dataKPI[$i]['feb']);
				$sheet->setCellValue('G' . ($i + 12), $dataKPI[$i]['mar']);
				$sheet->setCellValue('H' . ($i + 12), $dataKPI[$i]['apr']);
				$sheet->setCellValue('I' . ($i + 12), $dataKPI[$i]['mei']);
				$sheet->setCellValue('J' . ($i + 12), $dataKPI[$i]['jun']);
				$sheet->setCellValue('K' . ($i + 12), $dataKPI[$i]['jul']);
				$sheet->setCellValue('L' . ($i + 12), $dataKPI[$i]['agu']);
				$sheet->setCellValue('M' . ($i + 12), $dataKPI[$i]['sep']);
				$sheet->setCellValue('N' . ($i + 12), $dataKPI[$i]['okt']);
				$sheet->setCellValue('O' . ($i + 12), $dataKPI[$i]['nov']);
				$sheet->setCellValue('P' . ($i + 12), $dataKPI[$i]['des']);
			}

			//tanda tangan
			$sheet->setCellValue('B18', "Mengetahui");
			$sheet->setCellValue('B19', "Kepala Puskesmas Matraman");
			$sheet->setCellValue('B23', "dr. Rita Anggraini, MKM");
			$sheet->setCellValue('B24', "NIP. 197306302006042019");

			$sheet->setCellValue('E19', "PJ Mutu");
			$sheet->setCellValue('E23', "dr. Putu Datika Puspitasari");
			$sheet->setCellValue('E24', "NIP. 198412152010012031");

			$sheet->setCellValue('L18', "Jakarta, 31 Januari 2022");
			$sheet->setCellValue('L19', "Petugas Pelaporan");
			$sheet->setCellValue('L23', "Ria Yoppa Putri Sari");
			$sheet->setCellValue('L24', "NIP 1020184119851223201510066");


			//set Wrap
			$sheet->getStyle('B4:P24')->getAlignment()->setWrapText(true);

			//marge cell
			$sheet->mergeCells('A3:P3');
			$sheet->mergeCells('A4:P4');
			$sheet->mergeCells('A5:P5');
			$sheet->mergeCells('A6:P6');
			$sheet->mergeCells('A7:P7');

			$sheet->mergeCells('A9:A10');
			$sheet->mergeCells('B9:B10');
			$sheet->mergeCells('C9:C10');
			$sheet->mergeCells('D9:D10');
			$sheet->mergeCells('E9:P9');

			$sheet->mergeCells('A12:A14');
			$sheet->mergeCells('B12:B14');
			$sheet->mergeCells('C12:C14');

			$sheet->mergeCells('B18:C18');
			$sheet->mergeCells('B19:C19');
			$sheet->mergeCells('B23:C23');
			$sheet->mergeCells('B24:C24');

			$sheet->mergeCells('E19:I19');
			$sheet->mergeCells('E23:I23');
			$sheet->mergeCells('E24:I24');

			$sheet->mergeCells('L18:P18');
			$sheet->mergeCells('L19:P19');
			$sheet->mergeCells('L23:P23');
			$sheet->mergeCells('L24:P24');


			//center
			$sheet->getStyle('A3:P24')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$sheet->getStyle('A3:P24')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

			//set width
			$sheet->getColumnDimension('A')->setWidth(3);
			$sheet->getColumnDimension('B')->setWidth(12);
			$sheet->getColumnDimension('C')->setWidth(35);
			$sheet->getColumnDimension('D')->setWidth(11);
			$sheet->getColumnDimension('E')->setWidth(6);
			$sheet->getColumnDimension('F')->setWidth(6);
			$sheet->getColumnDimension('G')->setWidth(6);
			$sheet->getColumnDimension('H')->setWidth(6);
			$sheet->getColumnDimension('I')->setWidth(6);
			$sheet->getColumnDimension('J')->setWidth(6);
			$sheet->getColumnDimension('K')->setWidth(6);
			$sheet->getColumnDimension('L')->setWidth(6);
			$sheet->getColumnDimension('M')->setWidth(6);
			$sheet->getColumnDimension('N')->setWidth(6);
			$sheet->getColumnDimension('O')->setWidth(6);
			$sheet->getColumnDimension('P')->setWidth(6);

			//set height
			$sheet->getRowDimension('11')->setRowHeight(5);
			$sheet->getRowDimension('15')->setRowHeight(5);
			$sheet->getRowDimension('12')->setRowHeight(50);
			$sheet->getRowDimension('13')->setRowHeight(50);
			$sheet->getRowDimension('14')->setRowHeight(50);

			//set oriented and paper size
			$sheet->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
			$sheet->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);

			//set margin
			$sheet->getPageMargins()->setTop(0.5);
			$sheet->getPageMargins()->setRight(0.5);
			$sheet->getPageMargins()->setLeft(0.5);
			$sheet->getPageMargins()->setBottom(0.5);

			//set border
			$sheet->getStyle("A9:P15")->applyFromArray(
				array(
					'borders' => array(
						'allborders' => array(
							'style' => PHPExcel_Style_Border::BORDER_THIN,
							'color' => array('rgb' => '000000'),        // BLACK
						)
					)
				)
			);


			$writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
			$filename = 'Laporan KPI 2023' .  '.xls'; // set filename for excel file to be exported
			header('Content-Type: application/vnd.ms-excel');

			header("Content-Disposition: attachment;filename=$filename");

			$writer->save('php://output');
		}
	}

	public function hitungRealisasi($bulan, $tahun)
	{
		if ($bulan == "jan") {
			$bln = "1";
		} elseif ($bulan == "feb") {
			$bln = "2";
		} elseif ($bulan == "mar") {
			$bln = "3";
		} elseif ($bulan == "apr") {
			$bln = "4";
		} elseif ($bulan == "mei") {
			$bln = "5";
		} elseif ($bulan == "jun") {
			$bln = "6";
		} elseif ($bulan == "jul") {
			$bln = "7";
		} elseif ($bulan == "agu") {
			$bln = "8";
		} elseif ($bulan == "sep") {
			$bln = "9";
		} elseif ($bulan == "okt") {
			$bln = "10";
		} elseif ($bulan == "nov") {
			$bln = "11";
		} elseif ($bulan == "des") {
			$bln = "12";
		}
		$skpTotal = $this->skp_model->totalSkpMonthById("", $bln, $tahun);
		$total_responden = $skpTotal[0][1] + $skpTotal[0][2] + $skpTotal[0][3] + $skpTotal[0][4];
		if ($total_responden == 0) {
			$realisasi = "";
		} else {
			$total_puas_sangatpuas = $skpTotal[0][1] + $skpTotal[0][2];
			$realisasi = ($total_puas_sangatpuas / $total_responden) * 100;
		}
		return $realisasi;
	}

	public function getDataChart()
	{
		$arr1 = array();
		$arr2 = array();
		$arr3 = array();
		$arr4 = array();
		$arrTgl = array();
		$skp = $this->skp_model->getSkpMonthById($this->input->get('id_poli'), $this->input->get('month'), $this->input->get('year'));
		for ($i = 0; $i < count($skp); $i++) {
			array_push($arr1, $skp[$i]['1']);
			array_push($arr2, $skp[$i]['2']);
			array_push($arr3, $skp[$i]['3']);
			array_push($arr4, $skp[$i]['4']);
			array_push($arrTgl, substr($skp[$i]['tgl'], -2));
		}



		$response = array(
			'data' => array(
				'tanggal' => $arrTgl,
				'arr1' => $arr1,
				'arr2' => $arr2,
				'arr3' => $arr3,
				'arr4' => $arr4
			)
		);
		echo json_encode($response);
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
