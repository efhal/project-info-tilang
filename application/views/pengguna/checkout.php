<?php

use Carbon\Carbon;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $title ?> | <?= NAMA_APLIKASI ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= site_url() ?>assets/images/favicon.ico">
    <!-- Plugins css -->
    <link href="<?= base_url() ?>assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/libs/dropify/css/dropify.min.css" rel="stylesheet" type="text/css" />
    <?php $this->load->view('parts/style') ?>
    <!-- Datatable css -->

</head>

<body data-sidebar-icon="twotones">

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <?php $this->load->view('parts/top_bar') ?>
        <!-- Topbar End-->


        <!-- ========== Left Sidebar Start ========== -->
        <?php $this->load->view('parts/left_side') ?>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="row mt-3">
                                <div class="col-12">


                                    <div class="row d-none">
                                        <div class="col-12 col-md-4">
                                            <div class="card">

                                                <div class="card-body d-none">
                                                    <h5 class="card-title">Detail Dokumen</h5>
                                                    <small class="d-block mb-2"><i>Berikut adalah detail dokumen pengurusan dokumen</i></small>
                                                    <small><b>No Dokumen</b></small>
                                                    <span class="d-block font-weight-bold h5 ml-2"><?= $data_dokumen->nomor_dokumen ?></span>
                                                    <small><b>Instansi</b></small>
                                                    <span class="d-block font-weight-bold h5 ml-2"><?= $data_dokumen->nama_instansi ?></span>
                                                    <small><b>Layanan</b></small>
                                                    <span class="d-block font-weight-bold h5 ml-2"><?= $data_dokumen->nama_layanan ?></span>
                                                    <small><b>Pemilik</b></small>
                                                    <span class="d-block font-weight-bold h5 ml-2"><?= $data_dokumen->pemilik_dokumen ?></span>
                                                    <small><b>Tanggal</b></small>
                                                    <span class="d-block font-weight-bold h5 ml-2"><?= Carbon::parse($data_dokumen->tanggal_dokumen)->locale('id')->isoFormat('LL'); ?></span>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <div class="card">
                                                <div class="row">

                                                    <div class="col-12 col-md-6">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Detail Transaksi</h5>
                                                            <small class="d-block mb-2"><i>Berikut adalah detail transaksi pengurusan dokumen</i></small>
                                                            <small><b>Penerima</b></small>
                                                            <span class="d-block text-muted ml-3"><?= $data_session->nama_lengkap ?></span>
                                                            <small><b>Pemilik</b></small>
                                                            <span class="d-block text-muted ml-3"><?= $data_dokumen->pemilik_dokumen ?></span>
                                                            <small><b>Alamat</b></small>
                                                            <span class="d-block text-muted ml-3"><?= $data_dokumen_proses->alamat ?></span>
                                                            <small><b>Metode Pengiriman</b></small>
                                                            <span class="d-block text-muted ml-3"><?= $data_dokumen_proses->nama_metode_pengiriman ?></span>
                                                            <small><b>Metode Pembayaran</b></small>
                                                            <span class="d-block text-muted ml-3"><?= $data_dokumen_proses->nama_metode_pembayaran ?> <?= $data_dokumen_proses->nomor_rekening ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="card-body">
                                                            <img style="width:100%;height: auto;" src="<?= site_url() ?>upload\bukti_pengurusan_51_3_1412123231.jpg">
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-0">
                                        <div class="col-12 col-md-8">
                                            <div class="card">

                                                <div class="card-body">
                                                    <small class="d-block"><i>Berikut adalah ringkasan biaya pengiriman dokumen</i></small>
                                                    <br />
                                                    <div class="table-responsive">
                                                        <table class="table table-centered table-nowrap mb-0">
                                                            <tbody>
                                                                <tr>
                                                                    <td>Biaya <b>Pembuatan Akta</b>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        Rp 34.000,00 </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Biaya <b>Pengiriman <span id="metode-kirim"></span></b>
                                                                    </td>
                                                                    <td class="text-right"><span id="biaya-kirim">-</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Biaya <b>Admin</b>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        Rp 22.000,00 </td>
                                                                </tr>
                                                                <tr class="text-right">
                                                                    <td>
                                                                        <h5 class="m-0 ">Total:</h5>
                                                                    </td>
                                                                    <td class="text-right font-weight-semibold">Rp <span class="h2" id="biaya-total">56.000,00</span>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="card-title">
                                                                <h3>Informasi</h3>
                                                            </div>
                                                            <p class="card-text">Silahkan transfer uang sebesar Rp 56.000,00 ke rekening <span class="font-weight-bold">8195188829</span> atas nama Bayhaqi</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-4">
                                            <div class="card">

                                                <div class="card-body">
                                                    <input type="file" id="bukti-transfer" data-plugins="dropify" data-max-file-size="1M" data-default-file="" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-md-3 ml-md-3 p-4 p-md-0">
                                            <i>*) Sebelum Menekan konfirmasi pembayaran, pastikan anda sudah melakukan pembayaran dan mengupload bukti transfer</i>
                                        </div>
                                        <div class="col-12 col-md-4 mb-3 mb-md-3 ml-md-3 pl-2 pr-2 p-md-0">
                                            <button id="cta_konfirmasi_pembayaran" class="btn btn-success btn-lg btn-block">Konfirmasi Pembarayan</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 mt-md-3">

                            <div class="card bg-primary text-white d-none">
                                <!--tips: add .text-center,.text-right to the .card to change card text alignment-->
                                <div class="card-body">
                                    <h5 class="card-title text-white">Bantuan</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. At illum cum, nisi non reprehenderit soluta delectus tenetur animi sit dolores accusantium a inventore explicabo sapiente ducimus libero quod doloremque aperiam?</p>
                                    <a class="btn btn-lg btn-block btn-success" target="__BLANK__" href="https://api.whatsapp.com/send?phone=6282313045392&text=Selamat%20Siang%2C%20saya%20kesulitan%20...%20%2C%20gimana%20solusinya%20%3F">Bantuan <i class="mdi mdi-whatsapp"></i></a>
                                </div>
                            </div>


                        </div>
                    </div> <!-- end row -->

                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <?php $this->load->view('parts/footer') ?>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->
    <?php $this->load->view('parts/script') ?>
    <script src="<?= base_url() ?>/assets/libs/dropify/js/dropify.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            let dr_bukti_transfer = $("#bukti-transfer").dropify({
                messages: {
                    default: 'Upload Bukti transfer',
                    replace: 'Ganti',
                    remove: 'Hapus',
                    error: 'error'
                }
            });

            function upload_file(fd, prefix) {
                $.ajax({
                    url: '<?= site_url('pg/p/up/bukti_dokumen?i=' . $data_dokumen->id_dokumen . '&nm=' . $data_dokumen->nomor_dokumen . '&pre=') ?>' + prefix,
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        res_obj = JSON.parse(response);
                        if (res_obj.hasOwnProperty('status')) {
                            alert(res_obj.prefix);
                            if (res_obj.status == 'success') {
                                alert(res_obj.text)
                            }
                        }
                    },
                });
            }

            function clear_file(prefix) {
                $.ajax({
                    url: '<?= site_url('pg/p/del/bukti_dokumen') ?>',
                    type: 'post',
                    data: {
                        'file_name': 'bukti_pengurusan_51_3_1412123231.jpg',
                        'prefix': prefix
                    },
                    success: function(response) {
                        res_obj = JSON.parse(response);
                        if (res_obj.hasOwnProperty('status')) {
                            alert(res_obj.prefix);
                            if (res_obj.status == 'success') {
                                alert(res_obj.text)
                            }
                        }
                    },
                });
            }

            dr_bukti_transfer.on('change', function(e, element) {
                e.preventDefault();
                let prefix = 'bukti_transfer';
                let fd = new FormData();
                let files = $("#bukti-transfer")[0].files[0];
                fd.append('file', files);
                upload_file(fd, prefix);
            });
            $("#cta_konfirmasi_pembayaran").click(function(e) {
                e.preventDefault();
                window.location.href = "<?= site_url('pg/checkout_status') ?>";
            })


        })
    </script>
</body>

</html>