<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lantai2 extends MY_Controller
{
    // public $status = "";
    public $status;
    public function setStatus($status_baru)
    {
        $this->status = $status_baru;
    }

    public function getStatus()
    {
        return $this->status;
    }


    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('antrian_poli_model'));
    }

    public function index()
    {
        $data['last_antrian'] = $this->getLastAntrian(date("Y-m-d"), '1');
        $data['no_antrian_ki'] = $this->getLastAntrianPerPoli(date("Y-m-d"), "4")['no_antrian'];
        $data['no_antrian_imunisasi'] = $this->getLastAntrianPerPoli(date("Y-m-d"), "10")['no_antrian'];
        $data['no_antrian_ka1'] = $this->getLastAntrianPerPoli(date("Y-m-d"), "29")['no_antrian'];
        $data['no_antrian_ka2'] = $this->getLastAntrianPerPoli(date("Y-m-d"), "30")['no_antrian'];
        $data['no_antrian_rb'] = $this->getLastAntrianPerPoli(date("Y-m-d"), "21")['no_antrian'];
        // echo "<pre/>";
        // print_r($data);
        $this->load->view('antrian_view_lantai2', $data);
    }

    public function getLastAntrian($date)
    {
        $lastAntrian = $this->antrian_poli_model->getLastAntrian($date, '1');
        if (count($lastAntrian) > 0) {
            $response = array(
                'id_antrian'        => $lastAntrian[0]['id_antrian'],
                'no_antrian'        => $lastAntrian[0]['no_antrian'],
                'nama_poli'         => $lastAntrian[0]['nama_poli'],
                'file_panggilan'    => $lastAntrian[0]['file_panggilan'],
                'status'    => $lastAntrian[0]['status']
            );
        } else {
            $response = array(
                'id_antrian'        => 0,
                'no_antrian'        => 0,
                'nama_poli'         => '-',
                'file_panggilan'    => '-',
                'status'            => '-'
            );
        }
        return $response;
    }

    public function getLastAntrianPerPoli($date, $id)
    {
        $lastAntrian = $this->antrian_poli_model->getLastAntrianPerPoli($date, $id);
        if (count($lastAntrian) > 0) {
            $response = array(
                'id_antrian'        => $lastAntrian[0]['id_antrian'],
                'no_antrian'        => $lastAntrian[0]['no_antrian'],
                'nama_poli'         => $lastAntrian[0]['nama_poli'],
                'file_panggilan'    => $lastAntrian[0]['file_panggilan'],
                'status'    => $lastAntrian[0]['status']
            );
        } else {
            $response = array(
                'id_antrian'        => 0,
                'no_antrian'        => 0,
                'nama_poli'         => '-',
                'file_panggilan'    => '-',
                'status'            => '-'
            );
        }
        return $response;
    }

    public function ki()
    {
        $id             = 4;
        $lastAntrian    = $this->getLastAntrianPerPoli(date("Y-m-d"), $id);
        $poli           = $this->antrian_poli_model->getPoliById($id);

        $data['no_antrian']     = $lastAntrian['no_antrian'];
        $data['nama_poli']      = $poli[0]['nama_poli'];
        $data['file_panggilan'] = $poli[0]['file_panggilan'];
        $data['id_poli']        = $id;
        // print_r($lastAntrian);
        $this->load->view('antrian_lantai2', $data);
    }

    public function imunisasi()
    {
        $id             = 10;
        $lastAntrian    = $this->getLastAntrianPerPoli(date("Y-m-d"), $id);
        $poli           = $this->antrian_poli_model->getPoliById($id);

        $data['no_antrian']     = $lastAntrian['no_antrian'];
        $data['nama_poli']      = $poli[0]['nama_poli'];
        $data['file_panggilan'] = $poli[0]['file_panggilan'];
        $data['id_poli']        = $id;
        // print_r($lastAntrian);
        $this->load->view('antrian_lantai2', $data);
    }


    public function ka1()
    {
        $id             = 29;
        $lastAntrian    = $this->getLastAntrianPerPoli(date("Y-m-d"), $id);
        $poli           = $this->antrian_poli_model->getPoliById($id);

        $data['no_antrian']     = $lastAntrian['no_antrian'];
        $data['nama_poli']      = $poli[0]['nama_poli'];
        $data['file_panggilan'] = $poli[0]['file_panggilan'];
        $data['id_poli']        = $id;
        // print_r($lastAntrian);
        $this->load->view('antrian_lantai2', $data);
    }

    public function ka2()
    {
        $id             = 30;
        $lastAntrian    = $this->getLastAntrianPerPoli(date("Y-m-d"), $id);
        $poli           = $this->antrian_poli_model->getPoliById($id);

        $data['no_antrian']     = $lastAntrian['no_antrian'];
        $data['nama_poli']      = $poli[0]['nama_poli'];
        $data['file_panggilan'] = $poli[0]['file_panggilan'];
        $data['id_poli']        = $id;
        // print_r($lastAntrian);
        $this->load->view('antrian_lantai2', $data);
    }

    public function rb()
    {
        $id             = 21;
        $lastAntrian    = $this->getLastAntrianPerPoli(date("Y-m-d"), $id);
        $poli           = $this->antrian_poli_model->getPoliById($id);

        $data['no_antrian']     = $lastAntrian['no_antrian'];
        $data['nama_poli']      = $poli[0]['nama_poli'];
        $data['file_panggilan'] = $poli[0]['file_panggilan'];
        $data['id_poli']        = $id;
        // print_r($lastAntrian);
        $this->load->view('antrian_lantai2', $data);
    }





    public function save_antrian($id)
    {
        $data = $this->input->post('status');
        $lastAntrian = $this->getLastAntrianPerPoli(date("Y-m-d"), $id);
        $no_antrian = $lastAntrian['no_antrian'];
        $data = array(
            'no_antrian' => (int)$no_antrian + 1,
            'tanggal' => date("Y-m-d"),
            'poli' => $id,
            'status' => 'next'
        );

        $save = $this->antrian_poli_model->saveData($data, 'antrian_poli');
        if ($save) {
            $response = array(
                'success' => true,
                'messages'   => "Berhasil",
                'data' => $data
                // 'last' => $lastAntrian,
                // 'no' => $no_antrian
            );
        }

        echo json_encode($response);
    }

    public function reply()
    {
        // $id = '16';
        $status = $this->input->post();
        // $lastAntrian = $this->getLastAntrian(date("Y-m-d"), $id);
        $no_antrian = $status['no_antrian'];
        $id_poli = $status['id_poli'];
        $data = array(
            'no_antrian' => (int)$no_antrian,
            'tanggal' => date("Y-m-d"),
            'poli' => $id_poli,
            'status' => $status['status']
        );
        $reply = $this->antrian_poli_model->saveData($data, 'antrian_poli');
        if ($reply) {
            $response = array(
                'success' => true,
                'messages'   => "Berhasil",
                'data' => $data
                // 'last' => $lastAntrian,
                // 'no' => $no_antrian
            );
        }

        echo json_encode($response);
    }

    public function manual()
    {
        // $id = '16';
        $arr_status = $this->input->post();
        // $lastAntrian = $this->getLastAntrian(date("Y-m-d"), $id);
        $status = $arr_status['status'];
        $id_poli = $arr_status['id_poli'];
        $no_antrian = $arr_status['no_antrian'];

        $data = array(
            'no_antrian' => $no_antrian,
            'tanggal' => date("Y-m-d"),
            'poli' => $id_poli,
            'status' => $status
        );
        $reply = $this->antrian_poli_model->saveData($data, 'antrian_poli');
        if ($reply) {
            $response = array(
                'success' => true,
                'messages'   => "Berhasil",
                'data' => $data
                // 'last' => $lastAntrian,
                // 'no' => $no_antrian
            );
        }

        echo json_encode($response);
    }


    public function refreshTableLantai2()
    {
        // $status = $this->input->get('status');
        $last_antrian = $this->antrian_poli_model->getLastAntrian(date("Y-m-d"), '2');
        $response = $last_antrian[0];

        echo json_encode($response);
    }
}
