<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Survei_kepuasan_model extends CI_Model {

    private const TABLE_POLI   = 'ms_poli';
    private const TABLE_SURVEI = 'tr_survei_kepuasan';

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

    /**
     * Simpan satu baris hasil survei.
     * @param array $data ['poli_id', 'jenis', 'rating']
     * @return int insert_id, 0 jika gagal
     */
    public function simpanSurvei(array $data): int
    {
        $row = [
            'poli_id'    => $data['poli_id'],
            'jenis'      => $data['jenis'],
            'rating'     => $data['rating'],
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $this->db->insert(self::TABLE_SURVEI, $row);

        return $this->db->insert_id();
    }
}