<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link href="<?= site_url() ?>assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="<?= site_url() ?>assets/images/favicon.ico">
    <?php $this->load->view('parts/style') ?>
    <!-- Datatable css -->
    <style>
        .datatable_paginate {
            margin-top: 20px;
        }
    </style>
</head>

<body data-sidebar-icon="twotones">

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <?php $this->load->view('parts/top_bar_keuangan') ?>
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
                        <div class="col-12">
                            <!-- Portlet card -->
                            <div class="card mt-3">
                                <div class="card-body">
                                    <div class="card-body text-center">
                                        <div class="card-title">
                                            <h3>Status Bayar Dokumen 17776671</h3>
                                            <h2 class="text-success">Pembayaran telah diterima <i class="mdi mdi-check"></i></h2>
                                        </div>
                                        <div class="row container d-flex justify-content-center">
                                            <div class="col-12 col-lg-4 col-xl-3">
                                                <button class="btn btn-primary btn-lg btn-block"><a class="text-light" href="<?= site_url('pg/index') ?>">Cari Dokumen</a> <i class="mdi mdi-magnify"></i></button>
                                            </div>
                                            <div class="col-12 col-lg-4 col-xl-3 mt-1 mt-lg-0 mt-xl-0">
                                                <button class="btn btn-primary btn-lg btn-block"><a class="text-light" href="<?= site_url('pg/riwayat') ?>">Riwayat Transaksi</a> <i class="mdi mdi-file-document"></i></button>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- end card-body-->

                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col-->
                    </div>
                    <!-- end row -->

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
    <script src="<?= base_url('assets/') ?>libs/select2/js/select2.min.js"></script>
</body>
<script>
    $("#layanan").select2({
        'placeholder': "Pilih layanan dokumen",
        ajax: {
            url: '<?= site_url('it/p/s2/layanan') ?>',
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });
    $("#cta_buat_dokumen").click(function(e) {
        e.preventDefault();
        window.location.href = "<?= site_url('it/dokumen') ?>"
    })
</script>

</html>