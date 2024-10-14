<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Antrian_poli_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getLastAntrianPerPoliPrefix($date, $id, $prefix_dokter)
    {
        $sql = "SELECT * FROM antrian_poli a
            INNER JOIN poli b ON a.poli=b.id
            WHERE tanggal='$date' AND a.poli='$id' AND a.prefix_dokter='$prefix_dokter' ORDER BY a.id_antrian DESC LIMIT 1";
        $qry = $this->db->query($sql);
        return $qry->result_array();
    }

    public function getLastAntrianPerPoli($date, $id)
    {
        $sql = "SELECT * FROM antrian_poli a
            INNER JOIN poli b ON a.poli=b.id
            WHERE tanggal='$date' AND a.poli='$id' ORDER BY a.id_antrian DESC LIMIT 1";
        $qry = $this->db->query($sql);
        return $qry->result_array();
    }

    public function getLastAntrianBlmPanggil($date, $lantai)
    {
        $sql = "SELECT * FROM antrian_poli a
            INNER JOIN poli b ON a.poli=b.id
            WHERE tanggal='$date' AND lantai='$lantai' AND is_panggil='0' ORDER BY a.id_antrian ASC LIMIT 1";
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

    public function getLastAntrianPerLantai($date,$lantai){
        $sql = "SELECT b.poli,d.nama_poli,d.alias,d.prefix_poli,IFNULL(b.prefix_dokter,'A') AS prefix_dokter,d.file_panggilan,b.id_antrian,IFNULL(b.no_antrian,0) AS no_antrian FROM antrian_poli b 
                INNER JOIN (
                    SELECT MAX(id_antrian) AS max_id_antrian 
                    FROM antrian_poli 
                    WHERE tanggal='$date'
                    GROUP BY poli
                ) c ON c.max_id_antrian=b.id_antrian
                RIGHT JOIN poli d ON d.id=b.poli
                WHERE d.lantai='$lantai' AND d.is_active='1'";
        $qry = $this->db->query($sql);
        return $qry->result_array();
    }

    public function updateData($id, $data, $tabel)
    {
        $update = $this->db->update($tabel, $data, array('id_antrian' => $id));
        return $update;
    }

}

//     public function getLastAntrianPerLantai($date,$lantai){
//         $sql = "SELECT a.poli,c.nama_poli,c.prefix_poli,a.prefix_dokter,c.file_panggilan,a.id_antrian,a.no_antrian FROM antrian_poli a
//                 INNER JOIN poli c ON c.id=a.poli
//                 INNER JOIN (
//                     SELECT MAX(id_antrian) AS max_id_antrian 
//                     FROM antrian_poli 
//                     GROUP BY poli
//                 ) b ON a.id_antrian =b.max_id_antrian
//                 WHERE c.lantai='$lantai' AND c.is_active='1' AND a.tanggal='$date'";
//         $qry = $this->db->query($sql);
//         return $qry->result_array();
//     }
// }
