<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Carbon\Carbon;

class Pengguna extends CI_Controller
{
    private $data_session;

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->has_userdata('user')) {
            $this->session->set_flashdata('login_required', 'Anda harus login terlebih dahulu');
            redirect('login');
            die();
        }
        $this->load->library('user_session');
        $this->load->library('encryption');
        $this->data_session = $this->user_session->get();
    }

    public function view_index()
    {

        $this->load->model('Dokumen_Model');
        $this->load->model('Dokumen_Proses_Model');
        $this->load->model('Dokumen_Bukti_Model');

        $params = [
            'title' => 'Info Tilang',
            'page_title' => 'Info Dokumen',
            'data_session' => $this->data_session
        ];
        $this->load->view('pengguna/index', $params);
    }


    /**
     * view_checkout
     * Menampilkan halaman checkout
     * dengan kondisi:
     *  # bukti dokumen masih diproses
     *      maka belum ada pesan transfer
     *  # bukti dokumen ditolak
     *      maka user di minta kembali untuk mengubah bukti dokumen
     *  # bukti dokumen diterima
     *      maka user diminta untuk transfer uang sebanyak ....
     * @return void
     */
    public function view_checkout()
    {
        $this->load->model('Dokumen_Model');
        $this->load->model('Dokumen_Proses_Model');
        $this->load->model('Dokumen_Bukti_Model');

        $dokumen_id = $this->input->get('i', true);
        $user_id = $this->data_session->id;

        $params = [
            'data_session' => $this->data_session,
            'data_dokumen' => $this->Dokumen_Model->get_where([
                'select' => [
                    'dokumen.id as id_dokumen',
                    'dokumen.nama as nama_dokumen',
                    'dokumen.nomor as nomor_dokumen',
                    'dokumen.pemilik as pemilik_dokumen',
                    'dokumen.diinsert_pada as tanggal_dokumen',
                    'instansi.nama as nama_instansi',
                    'layanan.nama as nama_layanan',
                ],
                'where' => [
                    'dokumen.id' => $dokumen_id,
                ],
                'limit' => 1
            ])[0],
            'data_dokumen_proses' => $this->Dokumen_Proses_Model->get_where([
                'select' => [
                    'dokumen_proses.alamat as alamat',
                    'metode_pengiriman.nama as nama_metode_pengiriman',
                    'metode_pembayaran.nama as nama_metode_pembayaran',
                    'metode_pembayaran.nomor_rekening as nomor_rekening',
                ],
                'where' => [
                    'dokumen_proses.id' => $dokumen_id . $user_id,
                ],
                'limit' => 1
            ])[0],
            'title' => 'Info Dokumen',
            'page_title' => '',
            'data_session' => $this->data_session
        ];
        $this->load->view('pengguna/checkout', $params);
    }
    public function view_checkout_status()
    {
        $params = [
            'title' => 'Status',
            'page_title' => 'Info Dokumen',
            'data_session' => $this->data_session
        ];
        $this->load->view('pengguna/checkout_status', $params);
    }
    public function view_proses()
    {


        $this->load->model('Dokumen_Model');
        $this->load->model('Dokumen_Proses_Model');
        $this->load->model('Dokumen_Bukti_Model');

        $dokumen_id = $this->input->get('i', true);
        $user_id = $this->data_session->id;

        $params = [
            'title' => 'Proses Dokumen',
            'page_title' => 'Info Dokumen',
            'data_session' => $this->data_session,
            'data_dokumen' => $this->Dokumen_Model->get_where([
                'select' => [
                    'dokumen.id as id_dokumen',
                    'dokumen.nama as nama_dokumen',
                    'dokumen.nomor as nomor_dokumen',
                    'dokumen.pemilik as pemilik_dokumen',
                    'dokumen.diinsert_pada as tanggal_dokumen',
                    'instansi.nama as nama_instansi',
                    'layanan.nama as nama_layanan',
                    'layanan.biaya as biaya_layanan',
                    'biaya_admin.biaya as biaya_admin',
                ],
                'where' => [
                    'dokumen.id' => $dokumen_id,
                ],
                'limit' => 1
            ])[0],
            'data_dokumen_proses' => $this->Dokumen_Proses_Model->get_where([
                'select' => [
                    '*',
                ],
                'where' => [
                    'dokumen_proses.id' => $dokumen_id . $user_id,
                ],
                'limit' => 1
            ])[0],
            'data_dokumen_bukti' => $this->Dokumen_Bukti_Model->get_where([
                'select' => [
                    '*',
                ],
                'where' => [
                    'dokumen_bukti.dokumen_id' => $dokumen_id,
                    'dokumen_bukti.user_id' => $user_id,
                ],
                'limit' => 2
            ]),
            'bukti_pengurusan' => 'default.png',
            'bukti_transfer' => 'default.png',
        ];


        if ($params['data_dokumen_bukti']) {
            foreach ($params['data_dokumen_bukti'] as $bkt) {
                $params[$bkt->tipe] = $bkt->foto_url;
            }
        }

        $this->load->view('pengguna/proses', $params);
    }
    public function view_pengaturan()
    {
        $params = [
            'title' => 'Info Dokumen',
            'page_title' => 'Info Dokumen',
            'data_session' => $this->data_session
        ];
        $this->load->view('pengguna/pengaturan', $params);
    }

    public function proses_get_metode_pengiriman()
    {
        $metode_pengiriman_id = $this->input->post('metode_pengiriman_id');

        $params_metode_pengiriman = [
            'metode_pengiriman_id' => $metode_pengiriman_id
        ];

        $this->load->library('metode_pengiriman', $params_metode_pengiriman);
        $result = [
            'biaya' => number_format($this->metode_pengiriman->get_biaya(), 2, '.', '.'),
            'metode' => $this->metode_pengiriman->get_nama_metode(),
            'html' => "<div class='alert bg-primary text-white'>Metode Pengiriman <b>" .
                $this->metode_pengiriman->get_nama_metode() . "</b> Rp <b>" .
                number_format($this->metode_pengiriman->get_biaya(), 2, '.', '.') . "</b></div>",
        ];
        echo json_encode($result);
    }
    public function view_riwayat()
    {
        $this->load->model('Dokumen_Model');

        $dokumen_id = $this->input->get('i', true);
        $instansi_id = $this->input->get('in', true);
        $dokumen_nomor = $this->input->get('nm', true);

        $params = [
            'title' => 'Proses Dokumen',
            'page_title' => 'Info Dokumen',
            'data_session' => $this->data_session,
            'data_dokumen' => $this->Dokumen_Model->get_where([
                'select' => [
                    'dokumen.id as id_dokumen',
                    'dokumen.nama as nama_dokumen',
                    'dokumen.nomor as nomor_dokumen',
                    'dokumen.pemilik as pemilik_dokumen',
                    'dokumen.diinsert_pada as tanggal_dokumen',
                    'instansi.nama as nama_instansi',
                    'layanan.nama as nama_layanan',
                ],
                'where' => [
                    'dokumen.id' => $dokumen_id,
                    'dokumen.instansi_id' => $instansi_id,
                    'dokumen.nomor' => $dokumen_nomor,
                ],
                'limit' => 1
            ])[0],
        ];

        $this->load->view('pengguna/riwayat', $params);
    }
    /**
     * Untuk Mencari Dokumen Berdasarkan Nomor Dokumen
     *
     * Pencarian Dokumen Menerima parameter seperti nomor dokumen
     *
     * @return json
     * @throws conditon
     **/
    public function proses_cari()
    {
        $this->load->model('Dokumen_Model');
        $this->load->model('Dokumen_Proses_Model');

        $nomor = $this->input->post('nomor');
        $data_dokumen = $this->Dokumen_Model->get_where([
            'select' => [
                'dokumen.id as dokumen_id',
                'dokumen.instansi_id as dokumen_instansi_id',
                'instansi.nama as instansi_nama',
                'dokumen.nama',
                'dokumen.nomor as dokumen_nomor',
                'dokumen.pemilik',
                'dokumen.keterangan',
                'dokumen.diinsert_pada as dokumen_diinsert_pada',
            ],
            'where' => [
                'nomor' => $nomor,
            ],
            'or_where' => [],
            'limit' => 1
        ]);

        $dokumen_card = '<div class="col-lg-12">
                <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                Dokumen yang anda cari tidak ditemukan !
            </div>
        </div>';
        if ($data_dokumen) {
            $dokumen_card = '';
            foreach ($data_dokumen as $dok) {
                $dokumen_card .= '<div class="col-12">
                    <div class="card">
                    <h5 class="card-header">' . $dok->instansi_nama . '</h5>
                    <div class="card-body">
                    <small><i>' . Carbon::parse($dok->dokumen_diinsert_pada)->locale('id')->isoFormat('LL') . '</i></small>
                    <h5 class="card-title"><b>' . $dok->nama .  '</b> (' . $dok->dokumen_nomor . ')' . '</h5>
                    <p class="card-text">' . $dok->keterangan . '</p>';


                $dokumen_card .= '<br/><a href="' . site_url('pg/proses?i=' . $dok->dokumen_id) . '" class="btn btn-primary waves-effect waves-light mt-2">Proses</a>';

                $dokumen_card .= '</div>
                    </div> <!-- end card-box-->
                </div> <!-- end col -->';
            }
        }
        echo $dokumen_card;
    }
    public function proses_insert_proses_dokumen()
    {

        $id_user = $this->data_session->id;
        $id_dokumen = $this->input->post('id_dokumen', true);
        $lat_lng = $this->input->post('latlng', true);
        $alamat = $this->input->post('alamat', true);
        $metode_pengiriman = $this->input->post('metode_pengiriman', true);
        $metode_pembayaran = $this->input->post('metode_pembayaran', true);

        $this->form_validation->set_rules('id_dokumen', 'Id dokumen', 'required', [
            'required' => '%s tidak valid'
        ]);
        $this->form_validation->set_rules('latlng', 'latlng', 'required', [
            'required' => 'Alamat tidak dikenali'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
            'required' => '%s belum diisi'
        ]);
        $this->form_validation->set_rules('metode_pengiriman', 'Metode Pengiriman', 'required', [
            'required' => '%s belum diisi'
        ]);
        $this->form_validation->set_rules('metode_pembayaran', 'Metode Pembayaran', 'required', [
            'required' => '%s belum diisi'
        ]);

        if ($this->form_validation->run() === false) {
            echo json_encode([
                'status' => 'error_validation',
                'html' => '<div class="alert alert-danger">' . validation_errors() . '</div>'
            ]);
            die();
        }

        $this->load->model('Dokumen_Proses_Model');
        $this->Dokumen_Proses_Model->replace([
            'data' => [
                'id' => $id_dokumen . $id_user,
                'dokumen_id' => $id_dokumen,
                'user_id' => $id_user,
                'lat_lng' => $lat_lng,
                'alamat' => $alamat,
                'metode_pengiriman_id' => $metode_pengiriman,
                'metode_pembayaran_id' => $metode_pembayaran,
                'biaya_dokumen' => 1,
                'biaya_pengiriman' => 1,
                'biaya_admin' => 1,
                'biaya_total' => 11
            ]
        ]);

        echo json_encode([
            'status' => 'success',
            'html' => '<div class="alert alert-success">Data berhasil disimpan. <a href="' . site_url('pg/checkout?i=' . $id_dokumen) . '">Lanjutkan</a> </div>',
        ]);
    }
    public function proses_upload_bukti_dokumen()
    {

        $this->load->model('Dokumen_Bukti_Model');

        $id_dokumen = $this->input->get('i');
        $nomor_dokumen = $this->input->get('nm');
        $prefix = $this->input->get('pre');

        if ($prefix == 'bukti_pengurusan') {
            $prefix_numerik = 1;
        } else {
            $prefix_numerik = 2;
        }

        $config['upload_path']          = './upload/';
        $config['allowed_types']        = 'jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $config['overwrite']            = true;
        $config['file_name']            = $prefix . '_' . $this->data_session->id . '_' . $id_dokumen . '_' . $nomor_dokumen;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            echo json_encode([
                'status' => 'error',
                'prefix' => $prefix,
                'text' => $this->upload->display_errors(),
            ]);
        } else {
            $this->Dokumen_Bukti_Model->replace([
                'data' => [
                    'id' => $id_dokumen . $this->data_session->id . $prefix_numerik,
                    'dokumen_id' => $id_dokumen,
                    'user_id' => $this->data_session->id,
                    'foto_url' => $this->upload->data()['file_name'],
                    'tipe' => $prefix,
                ]
            ]);
            echo json_encode([
                'status' => 'success',
                'prefix' => $prefix,
                'text' => "Upload file berhasil",
                'data' => $this->upload->data()['file_name']
            ]);
        }
    }
    public function proses_delete_bukti_dokumen()
    {

        $this->load->model('Dokumen_Bukti_Model');

        $prefix = $this->input->post('prefix', true);
        $nama_file = $this->input->post('file_name', true);

        unlink('./upload/' . $nama_file);
        $this->Dokumen_Bukti_Model->delete([
            'where' => [
                'foto_url' => $nama_file
            ]
        ]);

        echo json_encode([
            'status' => 'success',
            'prefix' => $prefix,
            'text' => "Delete data berhasil",
        ]);
    }
    public function proses_dtb_riwayat()
    {
        $this->load->model('Dokumen_Model');
        $data_col = array(
            2 => 'dokumen.diinsert_pada',
            3 => 'layanan.nama',
            4 => 'layanan.biaya',
            5 => 'layanan.biaya',
            6 => '',
            7 => '',
        );
        $order_column = $_POST['order'][0]['column'];
        $order_dir = $_POST['order'][0]['dir'];

        @$draw = $_POST['draw'];
        @$length = $_POST['length'];
        @$start = $_POST['start'];
        @$search = $_POST['search'];
        @$instansi = $_POST['instansi'];
        @$tanggal_transaksi = $_POST['tanggal_transaksi'];

        $output = array();
        $output['draw'] = $draw;
        $output['data'] = array();


        $params_dokumen_proses = [
            'select' => [
                'dokumen.nomor as nomor_dokumen',
                'dokumen.pemilik as pemilik_dokumen',
                'dokumen.diinsert_pada as tgl_insert_dokumen',
                'instansi.nama as nama_instansi',
                'layanan.nama as nama_layanan',
                'layanan.biaya as biaya_layanan',
            ],
            'order_by' => 'dokumen.diinsert_pada asc',
            'where' => []
        ];
        if ($instansi != '') {
            $params_dokumen_proses['where']['dokumen.instansi_id'] = $instansi;
        }
        if ($tanggal_transaksi != '') {
            $params_dokumen_proses['where']['date(dokumen.diinsert_pada)'] = Carbon::parse($tanggal_transaksi)->format('Y-m-d');
        }

        if ($search != '') {
            $params_dokumen_proses['like'] = [
                'dokumen.nomor' => $search,
            ];
            $params_dokumen_proses['or_like'] = [
                'dokumen.pemilik' => $search
            ];
        }

        if ($length != -1) {
            $params_dokumen_proses['limit'] = $length;
            $params_dokumen_proses['offset'] = $start;
        }
        $output['recordsTotal'] = $output['recordsFiltered'] = $this->Dokumen_Model->count($params_dokumen_proses);
        $output['jumlah_row'] = $output['recordsTotal'];
        if ($order_column != 0) {
            $params_dokumen_proses['order_by'] = $data_col[$order_column] . ' ' . $order_dir;
        }
        $data_dokumen = $this->Dokumen_Model->get_where($params_dokumen_proses);
        $nomor_urut = $start + 1;
        if ($data_dokumen) {

            $status_pembayaran = [
                1 => '<span class="badge badge-success">Selesai</span>',
                2 => '<span class="badge badge-warning">Diproses</span>',
            ];
            foreach ($data_dokumen as $row) {
                $rand_status = rand(1, 2);
                $output['data'][] = array(
                    '',
                    $nomor_urut . '.',
                    '<b>' . $row->nomor_dokumen . '</b>' . '<br/>' . Carbon::parse($row->tgl_insert_dokumen)->locale('id')->isoFormat('LL'),
                    '<b>' . $row->nama_instansi . '</b>' . '<br/>' . $row->nama_layanan,
                    'Rp ' . number_format($row->biaya_layanan, 2, '.', '.'),
                    'Rp ' . number_format(10000, 2, '.', '.'),
                    $status_pembayaran[$rand_status],
                );
                $nomor_urut++;
            }
        } else {
        }
        echo json_encode($output);
    }
    public function proses_select2_layanan()
    {
        $this->load->model('Layanan_Model');
        $data_logistik = $this->Layanan_Model->get_where([
            'select' => [
                'layanan.id',
                'layanan.nama as text'
            ],
            'where' => [
                // 'instansi_id' => 
            ],
            'like' => [
                'layanan.nama' => $this->input->get('q', true)
            ],
            'limit' => 10
        ]);
        echo json_encode(array_merge([['id' => '-1', 'text' => '- Pilih Layanan -']], $data_logistik));
    }
    public function proses_select2_instansi()
    {
        $this->load->model('Instansi_Model');
        $data_instansi = $this->Instansi_Model->get_where([
            'select' => [
                'instansi.id',
                'instansi.nama as text'
            ],
            'like' => [
                'instansi.nama' => $this->input->get('q', true)
            ],
            'limit' => 10
        ]);
        echo json_encode(array_merge([['id' => '-1', 'text' => '- Pilih Instansi -']], $data_instansi));
    }
}
