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
        $sql = "SELECT * FROM poli";
        $qry = $this->db->query($sql);
        return $qry->result_array();
    }

    public function getPoliById($id){
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
