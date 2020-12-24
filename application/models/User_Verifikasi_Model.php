<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_Verifikasi_Model extends CI_Model
{
    public $tbl_ = 'user_verifikasi';

    /**
     * get_where
     * Mendapatkan data user_aktivasi berdasarkan kriteria tertentu
     * @param  mixed $params
     * @return void
     */
    public function get_where(array $params = array())
    {

        $query = $this->db->select($params['select'])
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
            return true;
        }
        return false;
    }
}
