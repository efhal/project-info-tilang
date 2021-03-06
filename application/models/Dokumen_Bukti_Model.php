<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokumen_Bukti_Model extends CI_Model
{
    public $tbl_ = 'dokumen_bukti';

    /**
     * get_where
     * Mendapatkan data dokumen berdasarkan kriteria tertentu
     * @param  array
     * @return object
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
    public function replace(array $params)
    {

        $this->db->replace($this->tbl_, $params['data']);
        if ($this->db->affected_rows()) {
            return true;
        }
        return false;
    }
    public function delete($params)
    {
        $this->db->delete($this->tbl_, $params['where']);
        if ($this->db->affected_rows()) {
            return true;
        }
        return false;
    }
}
