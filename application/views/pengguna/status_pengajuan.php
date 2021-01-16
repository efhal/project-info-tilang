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
    <link href="<?= site_url() ?>assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <?php $this->load->view('parts/style') ?>

    <link href="<?= base_url('node_modules/') ?>iziToast/dist/js/izitoast.min.js" rel="stylesheet" type="text/css" />
    <!-- Datatable css -->

</head>

<body data-sidebar-icon="twotones" class="bg-white">

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
                    <div class="row mt-3 mt-md-4">
                        <div class="col-12">
                            <!-- Portlet card -->
                            <div class="col-12 col-md-12 col-lg-12 col-xl-10">
                                <div class="card-title">
                                    <h2 class="font-weight-bold">Status Pengajuan</h2>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        Pengajuan dokumen tilang Anda sudah terdaftar
                                        Mohon tunggu informasi berikutnya melalui email Anda
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-between">
                                    <div class="col-6 col-md-3 col-lg-3 col-xl-2">
                                        <a name="" id="" class="btn btn-lg btn-block btn-blue" href="<?= site_url('pg') ?>" role="button">Ke Beranda</a>
                                    </div>
                                    <div class="col-6 col-md-3 col-lg-3 col-xl-2">
                                        <a name="" id="" class="btn btn-lg btn-block btn-blue" href="<?= site_url('pg/riwayat_pengajuan') ?>" role="button">Detail</a>
                                    </div>
                                </div>
                            </div>
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
    <script src="<?= base_url('node_modules/') ?>iziToast/dist/js/izitoast.min.js" type="text/javascript"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#instansi").select2({
                placeholder: '- Pilih Instansi -',
                ajax: {
                    url: '<?= site_url('pg/p/s2/instansi') ?>',
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: data
                        };
                    },
                    cache: true
                },
            });
            $("#btn-kirim-ajuan").click(function() {
                $("#status-kirim-ajuan").removeClass('d-none');
            })
        })
    </script>

</body>

</html>