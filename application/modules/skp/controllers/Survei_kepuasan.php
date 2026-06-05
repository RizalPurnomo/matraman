<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Survei_kepuasan extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Survei_kepuasan_model');
    }

    /** GET — halaman utama survei */
    public function index()
    {
        $this->load->view('survei_kepuasan');
    }
    public function old()
    {
        $this->load->view('survei_kepuasan copy');
    }

    /** GET — ambil daftar poli aktif */
    public function getPoliList()
    {
        $data = $this->Survei_kepuasan_model->getPoliAktif();

        echo json_encode([
            'success' => true,
            'data'    => $data,
        ]);
    }

    /** POST — simpan hasil survei */
    public function simpan()
    {
        $input = $this->input->post();
        $prioritas = $input['prioritas'] === 'prioritas' ? '1' : '0'; //1 untuk prioritas, 0 untuk umum

        $last_antrian = $this->Survei_kepuasan_model->getLastAntrian(date("Y-m-d"),$prioritas);
        if (count($last_antrian) < 1) {
            $antrian = '1';
        } else {
            $antrian = $last_antrian[0]['no_antrian'] + 1;
        }

        $payload = [
            'id_poli'      => $input['id_poli']      ?? null,
            'prioritas'    => $prioritas,
            'rating'       => $input['rating']        ?? null,   // 1–4
            'no_antrian'   => $antrian
        ];

        // // Validasi dasar
        // if (empty($payload['id_poli']) || empty($payload['prioritas']) || empty($payload['rating'])) {
        //     echo json_encode(['success' => false, 'message' => 'Data tidak lengkap','data'=>$payload]);
        //     return;
        // }        

        $id = $this->Survei_kepuasan_model->simpanSurvei($payload);

        echo json_encode([
            'success' => $id > 0,
            'message' => $id > 0 ? 'Survei berhasil disimpan' : 'Gagal menyimpan survei',
            'id'      => $id,
            'no_antrian' => $payload['no_antrian'],
            'input' => $payload
        ]);
    }
}