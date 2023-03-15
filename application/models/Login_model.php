<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getValidUser($username, $password)
    {
        $sql = "SELECT * FROM user
 				where username='" . $username . "' and password='" . $password . "'";
        $qry = $this->db->query($sql);
        return $qry->result_array();
    }

    public function updateLastLogin($username, $data)
    {
        $this->db->where('username', $username);
        $this->db->update('user', $data);
        return  "Data " . $username . " Berhasil Diupdate";
    }


}
