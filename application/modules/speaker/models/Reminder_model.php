<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reminder_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getReminder()
    {
        $sql = "SELECT * FROM speaker";
        $qry = $this->db->query($sql);
        return $qry->result_array();
    }

    public function getSpeakerById($id_speaker)
    {
        $sql = "SELECT * FROM speaker a
                INNER JOIN speaker_detail b ON a.id_speaker=b.id_speaker
                WHERE a.id_speaker='$id_speaker'";
        $qry = $this->db->query($sql);
        return $qry->result_array();
    }

    public function getSpeakerDetailByIdDetail($id_speaker_detail)
    {
        $sql = "SELECT * FROM speaker_detail
                WHERE id_speaker_detail='$id_speaker_detail'";
        $qry = $this->db->query($sql);
        return $qry->row_array();
    }

    public function updateSpeakerDetail($data, $id)
    {
        $this->db->trans_begin();
        $this->db->update('speaker_detail', $data, array('id_speaker_detail' => $id));

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }
}
