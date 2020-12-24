<?php
class metode_pengiriman
{
    private $CI;
    private $data;
    private $metode_id;
    public function __construct($params)
    {
        $this->CI = &get_instance();
        if (array_key_exists('metode_pengiriman_id', $params)) {
            $this->metode_id = $params['metode_pengiriman_id'];
        }
    }
    public function get_biaya_gojek()
    {
        return 12000;
    }
    public function get_biaya_parcel()
    {
        return 14000;
    }
    public function get_biaya_wahana()
    {
        return 23000;
    }
    public function get_nama_metode()
    {
        $this->CI->load->model('Metode_Pengiriman_Model');
        $metode_pengiriman = $this->CI->Metode_Pengiriman_Model->get([
            'select' => [
                'metode_pengiriman.nama as nama_metode_pengiriman'
            ],
            'where' => [
                'id' => $this->metode_id
            ],
            'limit' => 1
        ])[0]->nama_metode_pengiriman;

        return $metode_pengiriman;
    }
    public function get_biaya()
    {
        switch ($this->metode_id) {
            case 1:
                return $this->get_biaya_gojek();
                break;
            case 2:
                return $this->get_biaya_parcel();
                break;
            case 3:
                return $this->get_biaya_wahana();
                break;
            default:
                return 0;
                break;
        }
    }
}
