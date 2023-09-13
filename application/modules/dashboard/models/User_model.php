<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function saveData($data, $tabel)
    {
        $insert =  $this->db->insert($tabel, $data);
        return $insert;
    }

    public function getUser()
    {
        $sql = "SELECT * FROM aauth_users";
        $qry = $this->db->query($sql);
        return $qry->result_array();
    }

    // public function deleteData($id, $tabel)
    // {
    //     $this->db->where('id', $id);
    //     $this->db->delete($tabel);
    //     return  "Data " . $id . " Berhasil Didelete";
    // }
}
