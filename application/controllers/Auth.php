<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Auth
 * Melakukan semua proses autentikasi user
 */
class Auth extends CI_Controller
{
    /**
     * index
     * @desc Mennampilkan halaman login
     * @return void
     */
    public function view_index()
    {

        $data = [
            'title' => 'Login',
        ];

        $this->load->view('auth/login', $data);
    }
    /**
     * view_daftar
     * @desc Menampilkan halaman registrasi
     * @return void
     */
    public function view_daftar()
    {
        $data = [
            'title' => 'Daftar',
        ];

        $this->load->view('auth/signup', $data);
    }
    /**
     * view_daftar
     * @desc Menampilkan halaman konfirmasi
     * @return void
     */
    public function view_verifikasi()
    {
        $data = [
            'title' => 'Verifikasi Pengguna',
        ];

        $this->load->view('auth/verifikasi', $data);
    }
    /**
     * view_recovery
     * @desc Lupa password
     * @return void
     */
    public function view_recovery()
    {
        $data = [
            'title' => 'Recovery',
        ];

        $this->load->view('auth/recovery', $data);
    }
    /**
     * proses_login
     * Melakukan proses autentikasi pengguna berdasarkan username,password atau social media
     * @return void
     */
    public function proses_login()
    {
        try {

            $this->load->model('User_Model');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('email', 'Email', 'required', [
                'required' => '%s tidak boleh kosong',
            ]);

            $this->form_validation->set_rules('password', 'Password', 'required', [
                'required' => '%s tidak boleh kosong',
            ]);

            if ($this->form_validation->run() === false) {
                echo json_encode([
                    'status' => 'validasi_error',
                    'text' => validation_errors(),
                ]);
                die();
            } else {

                $data_user = $this->User_Model->get_where([
                    'select' => [
                        'user.id',
                        'akronim',
                        'email',
                        'password'
                    ],
                    'where' => [
                        'email' => $this->input->post('email', true),
                    ],
                    'limit' => 1,
                ])[0];

                if ($data_user) {
                    if (password_verify($this->input->post('password', true), $data_user->password)) {
                        $this->session->set_userdata('user', $data_user);
                        echo json_encode([
                            'status' => 'success',
                            'text' => 'Login berhasil',
                            'link' => site_url($data_user->akronim)
                        ]);
                    } else {
                        echo json_encode([
                            'status' => 'failed',
                            'text' => 'Username atau password salah',
                        ]);
                    }
                } else {
                    echo json_encode([
                        'status' => 'failed',
                        'text' => 'Login gagal',
                    ]);
                }
                die();
            }
        } catch (Exception $e) {

            echo $e->getMessage();
            die();
        }
    }
    /**
     * proses_registrasi
     *
     * @return void
     */
    public function proses_signup()
    {
        /**
         * Load User Model
         * 
         */
        $this->load->model('User_Model');
        $this->load->model('User_Verifikasi_Model');

        $email = $this->input->post('email', true);
        $password = $this->input->post('password', true);

        try {
            /**
             * Validasi formulir
             * 
             */
            $this->form_validation->set_rules('email', '<b><u>Email</u></b>', 'required|valid_email|is_unique[user.email]', array(
                'required' => "%s tidak boleh kosong",
                'valid_email' => "%s tidak valid",
                'is_unique' => "%s <b>{$email}</b> Ini sudah terdaftar",
            ));
            $this->form_validation->set_rules('password', '<b><u>Password</u></b>', 'required|min_length[6]', array(
                'required' => "%s tidak boleh kosong",
                'min_length' => "%s Minimal 6 karakter",
            ));
            $this->form_validation->set_rules('re_password', '<b><u>Ulangi Password</u></b>', 'required|matches[password]', array(
                'required' => "%s tidak boleh kosong",
                'matches' => "<u>Password</u> tidak cocok"
            ));

            if ($this->form_validation->run() === false) {
                echo json_encode([
                    'status' => 'validasi_error',
                    'text'  => validation_errors()
                ]);
                die();
            }
            /**
             * Insert User
             *  */
            $this->db->trans_start();
            if ($id_user = $this->User_Model->insert([
                'data' => [
                    'email' => $email,
                    'password' => password_hash($password, PASSWORD_DEFAULT, ['cost' => 10]),
                    'user_role_id' => 4, // User Pengguna
                ]
            ])) {
                /**
                 * Insert user aktivasi
                 */
                $token = password_hash($id_user . $email, PASSWORD_DEFAULT, ['cost' => 10]);
                $this->User_Verifikasi_Model->insert([
                    'data' => [
                        'user_id' => $id_user,
                        'token' => $token,
                        'kode_verifikasi' => 'DE2EFC'
                    ]
                ]);
            }
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                echo json_encode([
                    'status' => 'form_error',
                    'text'  => 'Pendaftaran Gagal, Mohon coba beberapa saat'
                ]);
                die();
            } else {
                $this->db->trans_commit();
                echo json_encode([
                    'status' => 'form_success',
                    'text'  => 'Silahkan buka email <b>' . $email . '</b> untuk verifikasi',
                    'link'  => site_url('verifikasi?') . 'i=' . $id_user . '&t=' . $token
                ]);
                die();
            }
        } catch (Exception $e) {
            /**
             * Catch Error
             */
            echo $e->getMessage();
            die();
        }
    }

    public function proses_logout()
    {
        $this->session->unset_userdata('user');
        redirect('login');
    }

    public function proses_aktivasi()
    {
        $this->load->model('User_Verifikasi_Model');
        $this->load->model('User_Aktivasi_Model');

        $user_id = $this->input->post('user_id');
        $kode_verifikasi = $this->input->post('kode_verifikasi');
        $token = $this->input->post('token');
        /**
         * Jika user sudah aktif
         * 
         */
        if ($this->User_Aktivasi_Model->get_where([
            'select' => ['user_id'],
            'where' => [
                'user_id' => $user_id,
                'user_status_aktivasi_id' => 1,
            ],
            'limit' => 1,
        ])) {
            echo json_encode([
                'status' => 'success',
                'text' => 'Pengguna sudah terdaftar',
                'link' => site_url('login'),
            ]);
            die();
        }


        $this->form_validation->set_rules('user_id', 'ID Pengguna', 'required', [
            'required'  => '%s tidak valid',
        ]);
        $this->form_validation->set_rules('kode_verifikasi', 'Kode Verifikasi', 'required', [
            'required'  => '%s tidak valid'
        ]);

        if ($this->form_validation->run() === false) {
            echo json_encode([
                'status' => 'error',
                'text' => validation_errors()
            ]);
            die();
        }
        $data_verifikasi = $this->User_Verifikasi_Model->get_where([
            'select' => ['user_id'],
            'where' => [
                'kode_verifikasi' => $kode_verifikasi,
                'token' => $token,
                'user_id' => $user_id,
            ],
            'limit' => 1,
        ]);

        /**
         * JIka data verifikasi bernlai true,
         * status aktivasi pengguna menjadu aktif
         */
        if ($data_verifikasi) {
            $this->User_Aktivasi_Model->replace([
                'data' => [
                    'user_id' => $user_id,
                    'user_status_aktivasi_id' => '1'
                ]
            ]);
            echo json_encode([
                'status' => 'success',
                'text' => 'Aktivasi berhasil, silahkan Login',
                'link' => site_url('login'),
            ]);
            die();
        } else {
            echo json_encode([
                'status' => 'error',
                'text' => 'Informasi tidak valid'
            ]);
        }
    }
}
