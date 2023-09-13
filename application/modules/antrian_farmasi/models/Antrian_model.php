<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Antrian_model extends CI_Model
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


    //-----------

    public function saveData($data, $tabel)
    {
        $this->db->insert($tabel, $data);
    }



    //UMUM
    public function getLastAntrianUmum($date)
    {
        $sql = "SELECT * FROM antrian_farmasi WHERE tanggal='$date' AND prioritas='1' ORDER BY id DESC LIMIT 1 ";
        $qry = $this->db->query($sql);
        return $qry->result_array();
    }

    public function getLastAntrianUmumSdhPanggil($date)
    {
        $sql = "SELECT * FROM antrian_farmasi WHERE tanggal='$date' AND prioritas='1' AND panggil='1' ORDER BY id DESC LIMIT 1 ";
        $qry = $this->db->query($sql);
        return $qry->result_array();
    }

    public function getLastAntrianUmumBlmPanggil($date)
    {
        $sql = "SELECT * FROM antrian_farmasi WHERE tanggal='$date' AND prioritas='1' AND panggil='0' ORDER BY prioritas,id ASC LIMIT 1 ";
        $qry = $this->db->query($sql);
        return $qry->result_array();
    }

    public function getLastAntrianUmumPending($date, $sort)
    {
        $sql = "SELECT * FROM antrian_farmasi WHERE tanggal='$date' AND prioritas='1' AND panggil='2' ORDER BY prioritas,id $sort LIMIT 1 ";
        $qry = $this->db->query($sql);
        return $qry->result_array();
    }

    public function getAntrianUmum($date)
    {
        $sql = "SELECT * FROM antrian_farmasi WHERE tanggal='$date' AND prioritas='1' AND panggil='0' ORDER BY prioritas,id ASC";
        $qry = $this->db->query($sql);
        return $qry->result_array();
    }

    public function getAntrianUmumPendingPanggil($date)
    {
        $sql = "SELECT * FROM antrian_farmasi WHERE tanggal='$date' AND prioritas='1' AND panggil='2' ORDER BY prioritas,id ASC";
        $qry = $this->db->query($sql);
        return $qry->result_array();
    }



    //LANSIA
    public function getLastAntrianLansia($date)
    {
        $sql = "SELECT * FROM antrian_farmasi WHERE tanggal='$date' AND prioritas='0' ORDER BY id DESC LIMIT 1 ";
        $qry = $this->db->query($sql);
        return $qry->result_array();
    }

    public function getLastAntrianLansiaSdhPanggil($date)
    {
        $sql = "SELECT * FROM antrian_farmasi WHERE tanggal='$date' AND prioritas='0' AND panggil='1' ORDER BY id DESC LIMIT 1 ";
        $qry = $this->db->query($sql);
        return $qry->result_array();
    }

    public function getLastAntrianLansiaBlmPanggil($date)
    {
        $sql = "SELECT * FROM antrian_farmasi WHERE tanggal='$date' AND prioritas='0' AND panggil='0' ORDER BY prioritas,id ASC LIMIT 1 ";
        $qry = $this->db->query($sql);
        return $qry->result_array();
    }

    public function getLastAntrianLansiaPending($date, $sort)
    {
        $sql = "SELECT * FROM antrian_farmasi WHERE tanggal='$date' AND prioritas='0' AND panggil='2' ORDER BY prioritas,id $sort LIMIT 1 ";
        $qry = $this->db->query($sql);
        return $qry->result_array();
    }

    public function getAntrianLansia($date)
    {
        $sql = "SELECT * FROM antrian_farmasi WHERE tanggal='$date' AND prioritas='0' AND panggil='0' ORDER BY prioritas,id ASC";
        $qry = $this->db->query($sql);
        return $qry->result_array();
    }

    public function getAntrianLansiaPendingPanggil($date)
    {
        $sql = "SELECT * FROM antrian_farmasi WHERE tanggal='$date' AND prioritas='0' AND panggil='2' ORDER BY prioritas,id ASC";
        $qry = $this->db->query($sql);
        return $qry->result_array();
    }



    public function getAntrianByNoAntrian($no, $date)
    {
        $sql = "SELECT * FROM antrian_farmasi WHERE tanggal='$date' AND no_antrian='$no'";
        $qry = $this->db->query($sql);
        return $qry->result_array();
    }

    public function updateData($id, $data, $tabel)
    {
        $this->db->where('id', $id);
        $this->db->update($tabel, $data);
        return  "Data " . $id . " Berhasil Diupdate";
    }

    public function cekAntrianExist($no, $date)
    {
        $sql = "SELECT * FROM antrian_farmasi WHERE tanggal='$date' AND no_antrian='$no'";
        $qry = $this->db->query($sql);
        $cek = $qry->num_rows();
        if ($cek > 0) {
            return true;
        } else {
            return false;
        }
    }
}
