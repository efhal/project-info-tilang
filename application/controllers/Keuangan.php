<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Carbon\Carbon;

class Keuangan extends CI_Controller
{
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
        $params = [
            'title' => 'Info Dokumen',
            'page_title' => 'Info Dokumen',
            'data_session' => $this->data_session
        ];
        $this->load->view('keuangan/index', $params);
    }
    public function view_transaksi()
    {
        $params = [
            'title' => 'Transaksi',
            'page_title' => 'Info Dokumen',
            'data_session' => $this->data_session
        ];
        $this->load->view('keuangan/index', $params);
    }
    public function view_laporan()
    {
        $params = [
            'title' => 'Laporan',
            'page_title' => 'Info Dokumen',
            'data_session' => $this->data_session
        ];
        $this->load->view('keuangan/laporan', $params);
    }
    public function view_pengaturan()
    {
        $params = [
            'title' => 'Pengaturan',
            'page_title' => 'Info Dokumen',
            'data_session' => $this->data_session
        ];
        $this->load->view('keuangan/pengaturan', $params);
    }
    public function proses_select2_instansi()
    {
        $json = [];
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
    public function proses_dtb_transaksi()
    {
        $this->load->model('Dokumen_Proses_Model');
        $data_col = array(
            2 => 'dokumen_proses.diinsert_pada',
            3 => 'layanan.nama',
            4 => 'dokumen_proses.biaya_dokumen',
            5 => 'dokumen_proses.metode_pengiriman_id',
            6 => 'dokumen_proses.biaya_pengiriman',
            7 => 'dokumen_proses.biaya_admin',
            8 => 'dokumen_proses.biaya_total',
        );
        $order_column = $_POST['order'][0]['column'];
        $order_dir = $_POST['order'][0]['dir'];

        @$draw = $_POST['draw'];
        @$length = $_POST['length'];
        @$start = $_POST['start'];
        @$search = $_POST['search'];
        @$metode_pengiriman = $_POST['metode_pengiriman'];
        @$instansi = $_POST['instansi'];
        @$tanggal_transaksi = $_POST['tanggal_transaksi'];

        $output = array();
        $output['draw'] = $draw;
        $output['data'] = array();


        $params_dokumen_proses = [
            'select' => [
                'dokumen_proses.id as id_dokumen',
                'dokumen_proses.diinsert_pada as tgl_proses_dokumen',
                'dokumen_proses.biaya_dokumen as biaya_layanan',
                'dokumen_proses.biaya_pengiriman as biaya_pengiriman',
                'dokumen_proses.biaya_admin as biaya_admin',
                'dokumen_proses.biaya_total as biaya_total',
                'dokumen.nomor as nomor_dokumen',
                'instansi.nama as nama_instansi',
                'layanan.nama as nama_layanan',
                'metode_pengiriman.nama as nama_metode_pengiriman',
                'metode_pengiriman.icon as icon_metode_pengiriman',
            ],
            'order_by' => 'dokumen_proses.diinsert_pada asc',
            'where' => []
        ];
        if ($metode_pengiriman != '') {
            $params_dokumen_proses['where']['dokumen_proses.metode_pengiriman_id'] = $metode_pengiriman;
        }
        if ($instansi != '') {
            $params_dokumen_proses['where']['dokumen.instansi_id'] = $instansi;
        }
        if ($tanggal_transaksi != '') {
            $params_dokumen_proses['where']['date(dokumen_proses.diinsert_pada)'] = Carbon::parse($tanggal_transaksi)->format('Y-m-d');
        }

        if ($search != '') {
            $params_dokumen_proses['like'] = [
                'layanan.nama' => $search
            ];
            $params_dokumen_proses['or_like'] = [
                'instansi.nama' => $search,
                'metode_pengiriman.nama' => $search,
                'metode_pembayaran.nama' => $search,
                'dokumen_proses.biaya_dokumen' => $search,
                'dokumen_proses.biaya_pengiriman' => $search,
                'dokumen_proses.biaya_admin' => $search,
                'dokumen_proses.biaya_total' => $search,
            ];
        }

        if ($length != -1) {
            $params_dokumen_proses['limit'] = $length;
            $params_dokumen_proses['offset'] = $start;
        }
        $output['recordsTotal'] = $output['recordsFiltered'] = $this->Dokumen_Proses_Model->count($params_dokumen_proses);
        $output['jumlah_row'] = $output['recordsTotal'];
        if ($order_column != 0) {
            $params_dokumen_proses['order_by'] = $data_col[$order_column] . ' ' . $order_dir;
        }
        $data_dokumen_proses = $this->Dokumen_Proses_Model->get_where($params_dokumen_proses);
        $nomor_urut = $start + 1;
        if ($data_dokumen_proses) {

            foreach ($data_dokumen_proses as $row) {
                $output['data'][] = array(
                    '',
                    $nomor_urut . '.',
                    Carbon::parse($row->tgl_proses_dokumen)->locale('id')->isoFormat('LL') .
                        '<br/>' . '<span class="font-weight-bold">' . $row->nomor_dokumen . '</span>',
                    $row->nama_instansi . '<br/>' . '<span class="font-weight-bold">' . $row->nama_layanan . '</span>',
                    'Rp ' . number_format($row->biaya_total, 2, '.', '.'),
                    '<a target="__BLANK__" href="' . base_url('assets/images/dummy/bukti_transfer.jpg') . '"><img class="rounded avatar-sm" src="' . base_url('assets/images/dummy/bukti_transfer.jpg') . '"> </a>',
                    '<button class="btn btn-success btn-kofirm" data-id=' . $row->id_dokumen . '>Konfirmasi <i class="mdi mdi-check"></i></button> ' . '<button class="btn btn-danger btn-batal" data-id=' . $row->id_dokumen . '> <i class="mdi mdi-close"></i></button>',
                );
                $nomor_urut++;
            }
        } else {
        }
        echo json_encode($output);
    }
    public function proses_dtb_laporan()
    {
        $this->load->model('Dokumen_Proses_Model');
        $data_col = array(
            2 => 'dokumen_proses.diinsert_pada',
            3 => 'layanan.nama',
            4 => 'dokumen_proses.biaya_dokumen',
            5 => 'dokumen_proses.metode_pengiriman_id',
            6 => 'dokumen_proses.biaya_pengiriman',
            7 => 'dokumen_proses.biaya_admin',
            8 => 'dokumen_proses.biaya_total',
        );
        $order_column = $_POST['order'][0]['column'];
        $order_dir = $_POST['order'][0]['dir'];

        @$draw = $_POST['draw'];
        @$length = $_POST['length'];
        @$start = $_POST['start'];
        @$search = $_POST['search'];
        @$metode_pengiriman = $_POST['metode_pengiriman'];
        @$instansi = $_POST['instansi'];
        @$tanggal_transaksi = $_POST['tanggal_transaksi'];

        $output = array();
        $output['draw'] = $draw;
        $output['data'] = array();


        $params_dokumen_proses = [
            'select' => [
                'dokumen_proses.id as id_dokumen',
                'dokumen_proses.diinsert_pada as tgl_proses_dokumen',
                'dokumen_proses.biaya_dokumen as biaya_layanan',
                'dokumen_proses.biaya_pengiriman as biaya_pengiriman',
                'dokumen_proses.biaya_admin as biaya_admin',
                'dokumen_proses.biaya_total as biaya_total',
                'dokumen.nomor as nomor_dokumen',
                'instansi.nama as nama_instansi',
                'layanan.nama as nama_layanan',
                'metode_pengiriman.nama as nama_metode_pengiriman',
                'metode_pengiriman.icon as icon_metode_pengiriman',
            ],
            'order_by' => 'dokumen_proses.diinsert_pada asc',
            'where' => []
        ];
        if ($metode_pengiriman != '') {
            $params_dokumen_proses['where']['dokumen_proses.metode_pengiriman_id'] = $metode_pengiriman;
        }
        if ($instansi != '') {
            $params_dokumen_proses['where']['dokumen.instansi_id'] = $instansi;
        }
        if ($tanggal_transaksi != '') {
            $params_dokumen_proses['where']['date(dokumen_proses.diinsert_pada)'] = Carbon::parse($tanggal_transaksi)->format('Y-m-d');
        }

        if ($search != '') {
            $params_dokumen_proses['like'] = [
                'layanan.nama' => $search
            ];
            $params_dokumen_proses['or_like'] = [
                'instansi.nama' => $search,
                'metode_pengiriman.nama' => $search,
                'metode_pembayaran.nama' => $search,
                'dokumen_proses.biaya_dokumen' => $search,
                'dokumen_proses.biaya_pengiriman' => $search,
                'dokumen_proses.biaya_admin' => $search,
                'dokumen_proses.biaya_total' => $search,
            ];
        }

        if ($length != -1) {
            $params_dokumen_proses['limit'] = $length;
            $params_dokumen_proses['offset'] = $start;
        }
        $output['recordsTotal'] = $output['recordsFiltered'] = $this->Dokumen_Proses_Model->count($params_dokumen_proses);
        $output['jumlah_row'] = $output['recordsTotal'];
        if ($order_column != 0) {
            $params_dokumen_proses['order_by'] = $data_col[$order_column] . ' ' . $order_dir;
        }
        $data_dokumen_proses = $this->Dokumen_Proses_Model->get_where($params_dokumen_proses);
        $nomor_urut = $start + 1;
        if ($data_dokumen_proses) {

            foreach ($data_dokumen_proses as $row) {
                $output['data'][] = array(
                    '',
                    $nomor_urut . '.',
                    Carbon::parse($row->tgl_proses_dokumen)->locale('id')->isoFormat('LL') .
                        '<br/>' . '<span class="font-weight-bold">' . $row->nomor_dokumen . '</span>',
                    $row->nama_instansi . '<br/>' . '<span class="font-weight-bold">' . $row->nama_layanan . '</span>',
                    number_format($row->biaya_layanan, 2, '.', '.'),
                    "<img class='img-fluid' style='width:1.5rem'; src=" . base_url('assets/images/metode_pengiriman/' . $row->icon_metode_pengiriman) . ">",
                    'Rp ' . number_format($row->biaya_pengiriman, 2, '.', '.'),
                    'Rp ' . number_format($row->biaya_admin, 2, '.', '.'),
                    'Rp ' . number_format($row->biaya_total, 2, '.', '.'),
                );
                $nomor_urut++;
            }
        } else {
        }
        echo json_encode($output);
    }
    public function proses_dtb_layanan()
    {
        $this->load->model('Layanan_Model');
        $data_col = array(
            2 => 'layanan.diinsert_pada',
            3 => 'layanan.nama',
        );
        $order_column = $_POST['order'][0]['column'];
        $order_dir = $_POST['order'][0]['dir'];

        @$draw = $_POST['draw'];
        @$length = $_POST['length'];
        @$start = $_POST['start'];
        @$search = $_POST['search'];

        $output = array();
        $output['draw'] = $draw;
        $output['data'] = array();


        $params_layanan = [
            'select' => [
                '*',
                'layanan.id as id_layanan',
                'layanan.nama as nama_layanan',
                'layanan.biaya as biaya_layanan',
                'layanan.diinsert_pada as layanan_diinsert_pada',
                'layanan.instansi_id as id_instansi',
            ],
            'order_by' => 'layanan.diinsert_pada asc',
            'where' => [
                'layanan.instansi_id' => 1
            ]
        ];
        if ($search != '') {
            $params_layanan['like'] = [];
            $params_layanan['or_like'] = [];
        }

        if ($length != -1) {
            $params_layanan['limit'] = $length;
            $params_layanan['offset'] = $start;
        }
        $output['recordsTotal'] = $output['recordsFiltered'] = $this->Layanan_Model->count($params_layanan);
        $output['jumlah_row'] = $output['recordsTotal'];
        if ($order_column != 0) {
            $params_layanan['order_by'] = $data_col[$order_column] . ' ' . $order_dir;
        }
        $data_dokumen_proses = $this->Layanan_Model->get_where($params_layanan);
        $nomor_urut = $start + 1;
        if ($data_dokumen_proses) {

            foreach ($data_dokumen_proses as $row) {
                $output['data'][] = array(
                    '',
                    $nomor_urut . '.',
                    '<b>' . $row->nama . '</b><br/>' .
                        '<p>' . $row->nama_layanan . '</p>' .
                        '<small><i>' . Carbon::parse($row->layanan_diinsert_pada)->locale('id')->isoFormat('LL') . '</small>',
                    '',
                    number_format($row->biaya_layanan, 2, '.', '.'),
                    '',
                    '',
                    '<button class="btn btn-success"><i class="mdi mdi-pencil"></i></button>&nbsp;<button class="btn btn-danger"><i class="mdi mdi-delete"></i></button>',

                );
                $nomor_urut++;
            }
        } else {
        }
        echo json_encode($output);
    }
    public function proses_konfirmasi()
    {
    }
}
