<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Survei_kepuasan_model extends CI_Model {

    private const TABLE_POLI   = 'ms_poli';
    private const TABLE_ANTRIAN_FARMASI = 'antrian_farmasi';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Ambil semua poli yang aktif, urut berdasarkan urutan tampil.
     * @return array
     */
    public function getPoliAktif(): array
    {
        return $this->db
            ->select('id, nama_poli AS label, icon, color, prioritas_only')
            ->where('is_aktif', 1)
            ->order_by('urutan', 'ASC')
            ->get(self::TABLE_POLI)
            ->result_array();
    }

    public function getLastAntrian($tanggal, $jenis): array
    {
        return $this->db
            ->select('no_antrian')
            ->where('tanggal', $tanggal)
            ->where('prioritas', $jenis)
            ->limit(1)
            ->order_by('id', 'DESC')
            ->get(self::TABLE_ANTRIAN_FARMASI)
            ->result_array();
    }

    /**
     * Simpan satu baris hasil survei.
     * @param array $data ['poli_id', 'jenis', 'rating']
     * @return int insert_id, 0 jika gagal
     */
    public function simpanSurvei(array $data): int
    {
        $row = [
            'no_antrian' => $data['no_antrian'],
            'tanggal'   => date('Y-m-d'),
            'id_poli'    => $data['id_poli'],
            'prioritas'      => $data['prioritas'],
            'rating'     => $data['rating'],
            'panggil'   => 0,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $this->db->insert(self::TABLE_ANTRIAN_FARMASI, $row);

        return $this->db->insert_id();
    }
}