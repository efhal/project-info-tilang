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
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3>Buat Dokumen Baru</h3>
                                        </div>
                                        <form method="POST">
                                            <div class="form-group row">
                                                <label for="nomor_dokumen" class="col-sm-12 col-form-label">Nomor Dokumen</label>
                                                <div class="col-sm-4">
                                                    <input type="number" class="form-control" id="nomor_dokumen" placeholder="Nomor Dokumen">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="layanan" class="col-sm-12 col-form-label">Layanan</label>
                                                <div class="col-sm-6">
                                                    <select class="form-control" id="layanan">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row d-none">
                                                <label for="pemilik" class="col-sm-2 col-form-label">Pemilik</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="text" name="pemilik" id="pemilik">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-10">
                                                    <button type="submit" id="cta_buat_dokumen" class="btn btn-primary">Buat Dokumen</button>
                                                </div>
                                            </div>
                                        </form>
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