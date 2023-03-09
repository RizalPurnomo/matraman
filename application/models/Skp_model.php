<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Skp_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getSkpMonth($id_poli, $month, $year)
    {
        $sql = "SELECT z.tanggal AS 'tgl',aaa.* FROM tanggal z
        LEFT JOIN (
            SELECT a.tanggal,aa.nama_poli AS 'poli1',
                SUM(IF(a.id_status='1',1,0)) AS '1',
                SUM(IF(a.id_status='2',1,0)) AS '2',
                SUM(IF(a.id_status='3',1,0)) AS '3',
                SUM(IF(a.id_status='4',1,0)) AS '4'
            FROM skp a
            INNER JOIN poli aa ON aa.id=a.id_poli
            WHERE a.id_poli='$id_poli'
            GROUP BY a.tanggal
        ) AS aaa ON aaa.tanggal=z.tanggal
        WHERE (MONTH(z.tanggal)='$month' AND YEAR(z.tanggal)='$year')
        GROUP BY z.tanggal";
        $qry = $this->db->query($sql);
        return $qry->result_array();
    }

    public function getSkpMonthDetail($id_poli, $month, $year)
    {
        $sql = "SELECT * FROM skp a
                INNER JOIN STATUS b ON a.id_status=b.id
                WHERE id_poli='$id_poli' AND (MONTH(tanggal)='$month' AND YEAR(tanggal)='$year')
                ORDER BY tanggal DESC";
        $qry = $this->db->query($sql);
        return $qry->result_array();
    }
}
