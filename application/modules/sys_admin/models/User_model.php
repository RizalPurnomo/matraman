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

    public function getUserById($id)
    {
        $sql = "SELECT * FROM aauth_users WHERE id='$id'";
        $qry = $this->db->query($sql);
        return $qry->row_array();
    }
}
