<?php
class user_session
{
    private $data;
    private $data_user;
    public function __construct()
    {
        $CI = &get_instance();
        $CI->load->library('session');
        $this->data = $CI->session->userdata('user');

        $data_user = [
            'select' => [
                '*'
            ],
            'where' => [
                'user_id' => $this->data->id
            ],
            'limit' => 1
        ];
        if ($this->data->akronim == 'sp') {

            $CI->load->model('User_Superadmin_Model');
            $this->User_Superadmin_Model->get_where($data_user);
        } elseif ($this->data->akronim == 'pg') {

            $CI->load->model('User_Pengguna_Model');
            $this->data_user = $CI->User_Pengguna_Model->get_where($data_user)[0];
        }
    }

    public function get()
    {
        return (object) array_merge((array) $this->data, (array) $this->data_user);
    }

    public function get_id()
    {
        return $this->data->id;
    }

    public function get_email()
    {
        return $this->data->email;
    }

    public function get_nama_lengkap()
    {
        return $this->data_user->nama_lengkap;
    }
}
