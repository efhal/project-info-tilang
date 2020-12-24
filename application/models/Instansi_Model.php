<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Instansi_Model extends CI_Model
{
    public $tbl_ = 'instansi';

    public function get($params)
    {
        if (!array_key_exists('select', $params)) $params['select'] = ["*"];
        if (!array_key_exists('where', $params)) $params['where'] = [];
        if (!array_key_exists('limit', $params)) $params['limit'] = 1;

        $query = $this->db->select($params['select'])
            ->where($params['where'])
            ->limit($params['limit'])
            ->get($this->tbl_);

        if ($query->num_rows() > 0) {
            return $query->result();
        }

        return false;
    }
    /**
     * get_where
     * Mendapatkan data instansi berdasarkan kriteria tertentu
     * @param  array
     * @return object
     */
    public function get_where(array $params = array())
    {

        if (array_key_exists('like', $params)) {
            $this->db->like($params['like']);
        }

        if (array_key_exists('or_like', $params)) {
            $this->db->or_like($params['or_like']);
        }
        if (array_key_exists('where', $params)) {
            $this->db->where($params['where']);
        }
        if (array_key_exists('limit', $params)) {
            $this->db->limit($params['limit']);
        }
        $query = $this->db->select($params['select'])
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
