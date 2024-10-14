<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Antrian_v2 extends MY_Controller
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
        $lantai = 4;
        $data['last_antrian'] = $this->getLastAntrian(date("Y-m-d"), $lantai);
        $data['poli'] = $this->antrian_poli_model->getLastAntrianPerLantai(date("Y-m-d"),$lantai);
        $data['lantai'] = $lantai;
        $this->load->view('dashboard', $data);
    }

    public function getLastAntrian($date,$lantai)
    {
        $lastAntrian = $this->antrian_poli_model->getLastAntrian($date, $lantai);
        if (count($lastAntrian) > 0) {
            $response = array(
                'id_antrian'        => $lastAntrian[0]['id_antrian'], 
                'no_antrian'        => $lastAntrian[0]['no_antrian'],
                'nama_poli'         => $lastAntrian[0]['nama_poli'],
                'prefix_poli'       => $lastAntrian[0]['prefix_poli'] ,
                'prefix_dokter'     => $lastAntrian[0]['prefix_dokter'],
                'file_panggilan'    => $lastAntrian[0]['file_panggilan'],
                'status'            => $lastAntrian[0]['status']
            );
        } else {
            $response = array(
                'id_antrian'        => 0,
                'no_antrian'        => 0,
                'nama_poli'         => '-',
                'prefix_poli'       => '-',
                'prefix_dokter'     => '-' ,
                'file_panggilan'    => '-',
                'status'            => '-'
            );
        }
        return $response;
    }

    public function getLastAntrianPerPoliPrefix($date, $id, $prefix_dokter)
    {
        $lastAntrian = $this->antrian_poli_model->getLastAntrianPerPoliPrefix($date, $id, $prefix_dokter);
        if (count($lastAntrian) > 0) {
            $response = array(
                'id_antrian'        => $lastAntrian[0]['id_antrian'],
                'no_antrian'        => $lastAntrian[0]['no_antrian'],
                'prefix_dokter'     => $lastAntrian[0]['prefix_dokter'],
                'nama_poli'         => $lastAntrian[0]['nama_poli'],
                'file_panggilan'    => $lastAntrian[0]['file_panggilan'],
                'status'    => $lastAntrian[0]['status']
            );
        } else {
            $response = array(
                'id_antrian'        => 0,
                'no_antrian'        => 0,
                'prefix_dokter'     => '',
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
                'prefix_dokter'     => $lastAntrian[0]['prefix_dokter'],
                'nama_poli'         => $lastAntrian[0]['nama_poli'],
                'file_panggilan'    => $lastAntrian[0]['file_panggilan'],
                'status'    => $lastAntrian[0]['status']
            );
        } else {
            $response = array(
                'id_antrian'        => 0,
                'no_antrian'        => 0,
                'prefix_dokter'     => '',
                'nama_poli'         => '-',
                'file_panggilan'    => '-',
                'status'            => '-'
            );
        }
        return $response;
    }

    public function nextAntrian()
    {
        $status = $this->input->post();

        $arr_no_antrian = explode('-',$status['no_antrian']);
        $prefix_dokter = substr($arr_no_antrian[0],-1);
        $prefix_poli = substr($arr_no_antrian[0],0,-1);
        $no_antrian = $arr_no_antrian[1];
        $no_antrian_new = (int)$no_antrian + 1;
        
        $data = array(
            'no_antrian' => $no_antrian_new,
            'tanggal' => date("Y-m-d"),
            'poli' => $status['id_poli'],
            'prefix_dokter' => $prefix_dokter,
            'status' => $status['status'],
            'is_panggil' => 0
        );
        
        $reply = $this->antrian_poli_model->saveData($data, 'antrian_poli');
        if ($reply) {
            $response = array(
                'success' => true,
                'messages'   => "Berhasil",
                'no_antrian_new' => $prefix_poli . $prefix_dokter . '-' . $no_antrian_new,
                'data' => $data
            );
        }

        echo json_encode($response);
    }

    public function replyAntrian()
    {
        $status = $this->input->post();

        $arr_no_antrian = explode('-',$status['no_antrian']);
        $prefix_dokter = substr($arr_no_antrian[0],-1);
        $prefix_poli = substr($arr_no_antrian[0],0,-1);
        $no_antrian = $arr_no_antrian[1];
        
        $data = array(
            'no_antrian' => (int)$no_antrian,
            'tanggal' => date("Y-m-d"),
            'poli' => $status['id_poli'],
            'prefix_dokter' => $prefix_dokter,
            'status' => $status['status']
        );
        
        $reply = $this->antrian_poli_model->saveData($data, 'antrian_poli');
        if ($reply) {
            $response = array(
                'success' => true,
                'messages'   => "Berhasil",
                'data' => $data
            );
        }

        echo json_encode($response);
    }

    public function manualAntrian()
    {
        $arr_status = $this->input->post();

        $arr_no_antrian = explode('-',$arr_status['no_antrian']);
        $prefix_dokter = substr($arr_no_antrian[0],-1);
        $prefix_poli = substr($arr_no_antrian[0],0,-1);
        $no_antrian = $arr_no_antrian[1];

        $data = array(
            'no_antrian' => $no_antrian,
            'tanggal' => date("Y-m-d"),
            'poli' => $arr_status['id_poli'],
            'prefix_dokter' => strtoupper($prefix_dokter),
            'status' => $arr_status['status']
        );
        $reply = $this->antrian_poli_model->saveData($data, 'antrian_poli');
        if ($reply) {
            $response = array(
                'success' => true,
                'messages'   => "Berhasil",
                'no_antrian_new' => $arr_status['no_antrian'],
                'data' => $data
            );
        }

        echo json_encode($response);
    }


    public function getDataAntrian($id_poli,$prefix_dokter){
        $lastAntrian    = $this->getLastAntrianPerPoliPrefix(date("Y-m-d"), $id_poli,$prefix_dokter);
        $poli           = $this->antrian_poli_model->getPoliById($id_poli);
        
        $prefix_poli         = $poli[0]['prefix_poli'];
        $data['no_antrian']     = $prefix_poli . $prefix_dokter .'-' . $lastAntrian['no_antrian'];
        $data['nama_poli']      = $poli[0]['nama_poli'];
        $data['file_panggilan'] = $poli[0]['file_panggilan'];
        $data['id_poli']        = $id_poli;
        $data['prefix_poli']  = $prefix_poli;
        $data['prefix_dokter']  = $prefix_dokter;

        $this->load->view('antrian', $data);
    }

    public function setPanggil($id_antrian)
    {
        $data = array(
            'is_panggil' => '1'
        );
        
        $update = $this->antrian_poli_model->updateData($id_antrian, $data, 'antrian_poli');
        if ($update) {
            $response = array(
                'success' => true,
                'messages'   => "Berhasil",
                'data' => $data
            );
        }

        echo json_encode($response);
    }

    //LANTAI 4
    public function lansia($prefix_dokter="A")
    {
        $id_poli = 8;
        $this->getDataAntrian($id_poli, $prefix_dokter);
    }

    public function catin($prefix_dokter="A")
    {
        $id_poli = 17;
        $this->getDataAntrian($id_poli, $prefix_dokter);
    }

    public function kb($prefix_dokter="A")
    {
        $id_poli = 3;
        $this->getDataAntrian($id_poli, $prefix_dokter);
    }

    public function dewasa1($prefix_dokter="A")
    {
        $id_poli = 25;
        $this->getDataAntrian($id_poli, $prefix_dokter);
    }

    public function dewasa2($prefix_dokter="A")
    {
        $id_poli = 26;
        $this->getDataAntrian($id_poli, $prefix_dokter);
    }

    public function dewasa3($prefix_dokter="A")
    {
        $id_poli = 27;
        $this->getDataAntrian($id_poli, $prefix_dokter);
    }


    //LANTAI 2
    public function imunisasi($prefix_dokter="A")
    {
        $id_poli = 10;
        $this->getDataAntrian($id_poli, $prefix_dokter);
    }

    public function ruangbersalin($prefix_dokter="A")
    {
        $id_poli = 21;
        $this->getDataAntrian($id_poli, $prefix_dokter);
    }
   
    public function ki($prefix_dokter="A")
    {
        $id_poli = 4;
        $this->getDataAntrian($id_poli, $prefix_dokter);
    }
   
    public function anak1($prefix_dokter="A")
    {
        $id_poli = 29;
        $this->getDataAntrian($id_poli, $prefix_dokter);
    }
   
    public function anak2($prefix_dokter="A")
    {
        $id_poli = 30;
        $this->getDataAntrian($id_poli, $prefix_dokter);
    }



    public function refreshTable($lantai)
    {
        // $status = $this->input->get('status');
        $last_antrian = $this->antrian_poli_model->getLastAntrianBlmPanggil(date("Y-m-d"), $lantai);
        if (empty($last_antrian)) {
            $obj = array(
                'id_antrian'=>'-',
                'no_antrian'=>'-',
                'tanggal'=>'-',
                'poli'=>'-',
                'prefix_dokter'=>'-',
                'created_at'=>'-',
                'status'=>'-',
                'is_panggil'=>'-',
                'id'=>'-',
                'nama_poli'=>'-',
                'alias'=>'-',
                'file_panggilan'=>'-',
                'pass'=>'-',
                'lantai'=>'-',
                'urut'=>'-',
                'prefix_poli'=>'-',
                'is_active'=>'-'
            );
            // $obj = new stdClass();
            // $obj->id_antrian= 0;
            // $obj->no_antrian= 0;
            $response = $obj;
            // {"id_antrian"=>"1","no_antrian":"1","tanggal":"2024-10-14","poli":"4","prefix_dokter":"A","created_at":"2024-10-14 09:22:06","status":"next","is_panggil":"0","id":"4","nama_poli":"KI","alias":"ki","file_panggilan":"pelayanan-kesehatan-ibu","pass":"12345","lantai":"2","urut":null,"prefix_poli":"D","is_active":"1"}
        }else{
            $response = $last_antrian[0];
        }

        echo json_encode($response);
    }

    public function lantai2(){
        $lantai = 2;
        $data['last_antrian'] = $this->getLastAntrian(date("Y-m-d"), $lantai);
        $data['poli'] = $this->antrian_poli_model->getLastAntrianPerLantai(date("Y-m-d"),$lantai);
        $data['lantai'] = $lantai;
        $this->load->view('antrian_view', $data);
    }

    public function lantai4(){
        $lantai = 4;
        $data['last_antrian'] = $this->getLastAntrian(date("Y-m-d"), $lantai);
        $data['poli'] = $this->antrian_poli_model->getLastAntrianPerLantai(date("Y-m-d"),$lantai);
        $data['lantai'] = $lantai;
        $this->load->view('antrian_view', $data);
        // echo "<pre/>";
        // print_r($data['last_antrian']);
    }
   
}
