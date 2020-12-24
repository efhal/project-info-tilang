<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokumen_Model extends CI_Model
{
    public $tbl_ = 'dokumen';

    /**
     * get_where
     * Mendapatkan data dokumen berdasarkan kriteria tertentu
     * @param  array
     * @return object
     */
    public function get_where(array $params = array())
    {
        if (array_key_exists('limit', $params)) {
            $this->db->limit($params['limit']);
        }
        if (array_key_exists('offset', $params)) {
            $this->db->offset($params['offset']);
        }
        if (array_key_exists('where', $params)) {
            $this->db->where($params['where']);
        }
        if (array_key_exists('or_where', $params)) {
            $this->db->or_where($params['or_where']);
        }
        if (array_key_exists('like', $params)) {
            $this->db->like($params['like']);
        }
        if (array_key_exists('or_like', $params)) {
            $this->db->or_like($params['or_like']);
        }
        if (array_key_exists('order_by', $params)) {
            $this->db->order_by($params['order_by']);
        }
        $query = $this->db->select($params['select'])
            ->join('user', 'user.id = dokumen.user_id')
            ->join('instansi', 'instansi.id = dokumen.instansi_id')
            ->join('layanan', 'layanan.id = dokumen.layanan_id')
            ->join('biaya_admin', 'biaya_admin.instansi_id = instansi.id')
            ->get($this->tbl_);

        if ($query->num_rows() > 0) {
            return $query->result();
        }

        return false;
    }
    public function count()
    {
        return 5;
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
}
