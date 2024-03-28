<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Antrian_poli_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getLastAntrianPerPoli($date, $id)
    {
        $sql = "SELECT * FROM antrian_poli a
            INNER JOIN poli b ON a.poli=b.id
            WHERE tanggal='$date' AND a.poli='$id' ORDER BY a.id_antrian DESC LIMIT 1";
        $qry = $this->db->query($sql);
        return $qry->result_array();
    }

    public function getLastAntrian($date, $lantai)
    {
        $sql = "SELECT * FROM antrian_poli a
            INNER JOIN poli b ON a.poli=b.id
            WHERE tanggal='$date' AND lantai='$lantai' ORDER BY a.id_antrian DESC LIMIT 1";
        $qry = $this->db->query($sql);
        return $qry->result_array();
    }

    public function getPoliById($id)
    {
        $sql = "SELECT * FROM poli WHERE id='$id'";
        $qry = $this->db->query($sql);
        return $qry->result_array();
    }

    public function saveData($data, $tabel)
    {
        $save = $this->db->insert($tabel, $data);
        return $save;
    }
}
