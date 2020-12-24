<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= site_url() ?>assets/images/favicon.ico">
    <?php $this->load->view('parts/style') ?>
    <!-- Datatable css -->
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

                    <div class="row mt-3">
                        <div class="col-md-12 col-xl-4">
                            <div class="card-box">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="avatar-sm bg-soft-info rounded">
                                            <i class="fe-loader avatar-title font-22 text-info"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-right">
                                            <h3 class="text-dark my-1"><span data-plugin="counterup">55</span></h3>
                                            <p class="text-muted mb-1 text-truncate">Proses</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6 class="text-uppercase"> <span class="float-right"></span></h6>
                                </div>
                            </div> <!-- end card-box-->
                        </div> <!-- end col -->

                        <div class="col-md-12 col-xl-4">
                            <div class="card-box">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="avatar-sm bg-soft-primary rounded">
                                            <i class="fe-check-circle avatar-title font-22 text-primary"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-right">
                                            <h3 class="text-dark my-1"><span data-plugin="counterup">32</span></h3>
                                            <p class="text-muted mb-1 text-truncate">Selesai</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6 class="text-uppercase"> <span class="float-right"></span></h6>
                                </div>
                            </div> <!-- end card-box-->
                        </div> <!-- end col -->



                        <div class="col-md-12 col-xl-4">
                            <div class="card-box">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="avatar-sm bg-soft-danger rounded">
                                            <i class="fe-x avatar-title font-22 text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-right">
                                            <h3 class="text-dark my-1"><span data-plugin="counterup">100</span></h3>
                                            <p class="text-muted mb-1 text-truncate">Dibatalkan</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6 class="text-uppercase"><span class="float-right"></span></h6>
                                </div>
                            </div> <!-- end card-box-->
                        </div> <!-- end col -->
                        <div class="col-md-12 col-xl-4 mb-1 mb-md-0">
                            <div class="row">
                                <div class="col-12">
                                    <button class="btn btn-block btn-lg btn-primary"><a class='text-light' href="<?= site_url('it/tambah_dokumen') ?>"><i class='mdi mdi-file-document'></i> Buat Dokumen Baru</a></button>
                                </div>
                            </div>
                        </div> <!-- end col -->
                        <div class="col-md-12 col-xl-4 mb-1 mb-md-0">
                            <div class="row">
                                <div class="col-12">
                                    <button class="btn btn-block btn-lg btn-primary"><a class='text-light' href="<?= site_url('it/pengaturan') ?>"><i class='mdi mdi-clipboard-account'></i> Profil</a></button>
                                </div>
                            </div>
                        </div> <!-- end col -->
                        <div class="col-md-12 col-xl-4 mb-1 mb-md-0">
                            <div class="row">
                                <div class="col-12">
                                    <button class="btn btn-block btn-lg btn-primary"><a class='text-light' href="<?= site_url('it/pengaturan') ?>"><i class='mdi mdi-account-settings'></i> Pengaturan</a></button>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div>

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
</body>

</html>