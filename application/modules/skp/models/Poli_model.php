<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Poli_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllPoli()
    {
        $sql = "SELECT * FROM poli ORDER BY urut ASC";
        $qry = $this->db->query($sql);
        return $qry->result_array();
    }

    public function getAllPoliAktif()
    {
        $sql = "SELECT * FROM poli WHERE is_active='1' ORDER BY urut ASC";
        $qry = $this->db->query($sql);
        return $qry->result_array();
    }

    public function getPoliById($id)
    {
        $sql = "SELECT * FROM poli WHERE id='$id'";
        $qry = $this->db->query($sql);
        return $qry->result_array();
    }

    public function getPoliByIdArray($array)
    {
        $sql = "SELECT * FROM poli WHERE id IN $array";
        $qry = $this->db->query($sql);
        return $qry->result_array();
    }

    public function saveData($data, $tabel)
    {
        $save = $this->db->insert($tabel, $data);
        return $save;
    }
}
