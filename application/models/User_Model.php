<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_Model extends CI_Model
{
    public $tbl_ = 'user';

    /**
     * get_where
     * Mendapatkan data user berdasarkan kriteria tertentu
     * @param  mixed $params
     * @return void
     */
    public function get_where(array $params = array())
    {

        $query = $this->db->select($params['select'])
            ->join('user_role', 'user_role.id = user.user_role_id')
            ->where($params['where'])
            ->limit($params['limit'])
            ->get($this->tbl_);

        if ($query->num_rows() > 0) {
            return $query->result();
        }

        return false;
    }
    public function insert(array $params)
    {
        $this->db->insert($this->tbl_, $params['data']);
        if ($this->db->affected_rows()) {
            return $this->db->insert_id();
        }
        return false;
    }
}
