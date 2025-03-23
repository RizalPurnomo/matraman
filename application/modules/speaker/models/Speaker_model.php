<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Speaker_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getAlarm($hari, $jam)
    {
        // $sql = "SELECT * FROM speaker_detail a
        //     LEFT JOIN speaker b ON a.id_speaker=b.id_speaker
        //     WHERE a.hari='$hari' AND jam='$jam'
        //     ORDER BY hari DESC, jam ASC";
        $sql = "SELECT * FROM speaker_detail a
            LEFT JOIN speaker b ON a.`id_speaker`=b.`id_speaker`
            WHERE FIND_IN_SET('$hari',hari)>0 AND jam = '$jam'";
        $qry = $this->db->query($sql);
        return $qry->result_array();
    }
}
