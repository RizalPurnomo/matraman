<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Skp_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getSkpMonthById($id_poli, $month, $year)
    {
        if($id_poli==""){
            $where = "";
        }else{
            $where = "WHERE a.id_poli='$id_poli'";
        }
        $sql = "SELECT z.tanggal AS 'tgl',aaa.* FROM tanggal z
            LEFT JOIN (
                SELECT a.tanggal,aa.nama_poli AS 'poli1',
                    SUM(IF(a.id_status='1',1,0)) AS '1',
                    SUM(IF(a.id_status='2',1,0)) AS '2',
                    SUM(IF(a.id_status='3',1,0)) AS '3',
                    SUM(IF(a.id_status='4',1,0)) AS '4'
                FROM skp a
                INNER JOIN poli aa ON aa.id=a.id_poli
                $where
                GROUP BY a.tanggal
            ) AS aaa ON aaa.tanggal=z.tanggal
            WHERE (MONTH(z.tanggal)='$month' AND YEAR(z.tanggal)='$year')
            GROUP BY z.tanggal";
        $qry = $this->db->query($sql);
        return $qry->result_array();
    }

    public function getSkpMonth($month, $year)
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
                GROUP BY a.tanggal
            ) AS aaa ON aaa.tanggal=z.tanggal
            WHERE (MONTH(z.tanggal)='$month' AND YEAR(z.tanggal)='$year')
            GROUP BY z.tanggal";
        $qry = $this->db->query($sql);
        return $qry->result_array();
    }

    public function totalSkpMonthById($id_poli,$month, $year)
    {
        if($id_poli==""){
            $where = "";
        }else{
            $where = "AND a.id_poli='$id_poli'";
        }
        $sql = "SELECT a.tanggal,
                SUM(IF(a.id_status='1',1,0)) AS '1',
                SUM(IF(a.id_status='2',1,0)) AS '2',
                SUM(IF(a.id_status='3',1,0)) AS '3',
                SUM(IF(a.id_status='4',1,0)) AS '4'
            FROM skp a
            INNER JOIN poli aa ON aa.id=a.id_poli        
            WHERE (MONTH(tanggal)='$month' AND YEAR(tanggal)='$year') $where";
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

    public function getKpiByYear($year)
    {
        $sql = "SELECT * FROM skp_summary WHERE tahun='$year' ORDER BY id_skp_sum ASC";
        $qry = $this->db->query($sql);
        return $qry->result_array();
    }
    
}
