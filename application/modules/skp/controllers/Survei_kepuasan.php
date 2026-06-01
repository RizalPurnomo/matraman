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

        $payload = [
            'poli_id'      => $input['poli_id']      ?? null,
            'jenis'        => $input['jenis']         ?? null,   // 'prioritas' | 'umum'
            'rating'       => $input['rating']        ?? null,   // 1–4
        ];

        // Validasi dasar
        if (empty($payload['poli_id']) || empty($payload['jenis']) || empty($payload['rating'])) {
            echo json_encode(['success' => false, 'message' => 'Data tidak lengkap','data'=>$input]);
            return;
        }

        $id = $this->Survei_kepuasan_model->simpanSurvei($payload);

        echo json_encode([
            'success' => $id > 0,
            'message' => $id > 0 ? 'Survei berhasil disimpan' : 'Gagal menyimpan survei',
            'id'      => $id
        ]);
    }
}