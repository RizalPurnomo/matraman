<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Speaker extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('speaker_model'));
    }

    public function index()
    {
        $this->load->view('speaker_v2');
    }

    public function refreshAlarm()
    {
        date_default_timezone_set("Asia/Bangkok");
        $myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        $hari_ini = $myDays[date('w')];
        $jam_ini = date("H:i:s");

        $alarm = $this->speaker_model->getAlarm($hari_ini, $jam_ini);
        if (empty($alarm)) {
            $obj = array(
                'hari' => $hari_ini,
                'jam' => $jam_ini,
                'alarm' => '',
                'nama' => '',
                'status' => 'Waiting Alarm'
            );
        } else {
            $obj = array(
                'hari' => $hari_ini,
                'jam' => $jam_ini,
                'alarm' => $alarm[0]['audio'],
                'nama' => $alarm[0]['nama_event'],
                'status' => 'Detected Alarm'
            );
        }
        // if (empty($last_antrian)) {
        //     $obj = array(
        //         'id_antrian' => '-',
        //         'no_antrian' => '-',
        //         'tanggal' => '-',
        //         'poli' => '-',
        //         'prefix_dokter' => '-',
        //         'created_at' => '-',
        //         'status' => '-',
        //         'is_panggil' => '-',
        //         'id' => '-',
        //         'nama_poli' => '-',
        //         'alias' => '-',
        //         'file_panggilan' => '-',
        //         'pass' => '-',
        //         'lantai' => '-',
        //         'urut' => '-',
        //         'prefix_poli' => '-',
        //         'is_active' => '-'
        //     );
        //     // $obj = new stdClass();
        //     // $obj->id_antrian= 0;
        //     // $obj->no_antrian= 0;
        //     $response = $obj;
        //     // {"id_antrian"=>"1","no_antrian":"1","tanggal":"2024-10-14","poli":"4","prefix_dokter":"A","created_at":"2024-10-14 09:22:06","status":"next","is_panggil":"0","id":"4","nama_poli":"KI","alias":"ki","file_panggilan":"pelayanan-kesehatan-ibu","pass":"12345","lantai":"2","urut":null,"prefix_poli":"D","is_active":"1"}
        // } else {
        //     $response = $last_antrian[0];
        // }


        echo json_encode($obj);
    }
}
