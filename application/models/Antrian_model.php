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

	public function getLastAntrian($date)
	{
		$sql = "SELECT * FROM antrian_farmasi WHERE tanggal='$date' ORDER BY id DESC LIMIT 1 ";
		$qry = $this->db->query($sql);
		return $qry->result_array();
	}

	public function getLastAntrianSdhPanggil($date)
	{
		$sql = "SELECT * FROM antrian_farmasi WHERE tanggal='$date' AND panggil='1' ORDER BY id DESC LIMIT 1 ";
		$qry = $this->db->query($sql);
		return $qry->result_array();
	}

	public function getLastAntrianBlmPanggil($date)
	{
		$sql = "SELECT * FROM antrian_farmasi WHERE tanggal='$date' AND panggil='0' ORDER BY id ASC LIMIT 1 ";
		$qry = $this->db->query($sql);
		return $qry->result_array();
	}

	public function getLastAntrianPending($date, $sort)
	{
		$sql = "SELECT * FROM antrian_farmasi WHERE tanggal='$date' AND panggil='2' ORDER BY id $sort LIMIT 1 ";
		$qry = $this->db->query($sql);
		return $qry->result_array();
	}

	public function getAntrian($date)
	{
		$sql = "SELECT * FROM antrian_farmasi WHERE tanggal='$date' AND panggil='0' ORDER BY id ASC";
		$qry = $this->db->query($sql);
		return $qry->result_array();
	}

	public function getAntrianSdhPanggil($date)
	{
		$sql = "SELECT * FROM antrian_farmasi WHERE tanggal='$date' AND panggil='1' ORDER BY id DESC";
		$qry = $this->db->query($sql);
		return $qry->result_array();
	}

	public function getAntrianPendingPanggil($date)
	{
		$sql = "SELECT * FROM antrian_farmasi WHERE tanggal='$date' AND panggil='2' ORDER BY id ASC";
		$qry = $this->db->query($sql);
		return $qry->result_array();
	}

	public function updateData($id, $data, $tabel)
	{
		$this->db->where('id', $id);
		$this->db->update($tabel, $data);
		return  "Data " . $id . " Berhasil Diupdate";
	}
}
