<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Group_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getGroups()
    {
        $sql = "SELECT * FROM aauth_groups";
        $qry = $this->db->query($sql);
        return $qry->result_array();
    }

    public function getGroupById($id)
    {
        $sql = "SELECT * FROM aauth_groups
            WHERE id='$id'";
        $qry = $this->db->query($sql);
        return $qry->row_array();
    }

    public function getAllMenuByGroup($id)
    {
        $sql = "SELECT a.id, a.name, a.definition,a.parent_id,
                CASE 
                    WHEN (SELECT b.group_id 
                        FROM aauth_perm_to_group b 
                        WHERE a.id = b.perm_id AND b.group_id = '$id') IS NULL 
                    THEN 0 
                    ELSE 1 
                END AS is_selected
            FROM aauth_perms a
            ORDER BY a.parent_id ASC,a.id ASC";
        $qry = $this->db->query($sql);
        return $qry->result_array();

        // $this->db->order_by('parent_id', 'ASC');
        // $this->db->order_by('id', 'ASC');
        // return $this->db->get('aauth_perms')->result_array(); // Ambil data sebagai array
    }

    public function updateGroup($id_group, $group, $arrAdd, $arrDelete)
    {
        $this->db->trans_begin();

        $this->db->update('aauth_groups', $group, array('id' => $id_group));

        // $status = false;
        if (count((array)$arrAdd) > 0) {
            foreach ($arrAdd as $perms) {
                $detail_cuti = array(
                    "group_id" => $id_group,
                    "perm_id" => $perms
                );
                $this->db->insert('aauth_perm_to_group', $detail_cuti);
            }
        }

        if (count((array)$arrDelete) > 0) {
            foreach ($arrDelete as $perms) {
                $this->db->delete('aauth_perm_to_group', array('group_id' => $id_group, 'perm_id' => $perms));
            }
        }


        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return "Gagal";
        } else {
            $this->db->trans_commit();
            return "Berhasil simpan ";
        }
    }

    public function getAllGroupByUser($id)
    {
        $sql = "SELECT a.id,a.name,a.definition,
                CASE
                    WHEN (SELECT b.group_id
                        FROM aauth_user_to_group b
                        WHERE a.id=b.group_id AND b.user_id='$id') IS NULL
                    THEN 0
                    ELSE 1
                END AS is_selected	
            FROM aauth_groups a";
        $qry = $this->db->query($sql);
        return $qry->result_array();

        // $this->db->order_by('parent_id', 'ASC');
        // $this->db->order_by('id', 'ASC');
        // return $this->db->get('aauth_perms')->result_array(); // Ambil data sebagai array
    }

    public function updateUserToGroup($id_user, $arrAdd, $arrDelete)
    {
        $this->db->trans_begin();

        // $this->db->update('aauth_groups', $group, array('id' => $id_group));

        // $status = false;
        if (count((array)$arrAdd) > 0) {
            foreach ($arrAdd as $group) {
                $detail_cuti = array(
                    "user_id" => $id_user,
                    "group_id" => $group
                );
                $this->db->insert('aauth_user_to_group', $detail_cuti);
            }
        }

        if (count((array)$arrDelete) > 0) {
            foreach ($arrDelete as $group) {
                $this->db->delete('aauth_user_to_group', array('user_id' => $id_user, 'group_id' => $group));
            }
        }


        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return "Gagal";
        } else {
            $this->db->trans_commit();
            return "Berhasil simpan ";
        }
    }
}
