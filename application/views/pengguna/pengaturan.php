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
    <link href="<?= site_url() ?>assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= site_url() ?>assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
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
                        <div class="col-12 mt-3">

                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <div class="card-box text-center">
                                        <img src="<?= base_url() ?>/assets/images/users/user-4.jpg" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">

                                        <h4 class="mb-0 font-16">Pengguna</h4>
                                        <p class="text-muted"><?= $data_session->email ?></p>

                                        <button type="button" class="btn btn-success btn-xs waves-effect mb-2 waves-light">Follow</button>
                                        <button type="button" class="btn btn-danger btn-xs waves-effect mb-2 waves-light">Message</button>

                                        <div class="text-left mt-3 d-none">
                                            <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ml-2">Geneva
                                                    D. McKnight</span></p>

                                            <p class="text-muted mb-2 font-13"><strong>Mobile :</strong><span class="ml-2">(123)
                                                    123 1234</span></p>

                                            <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ml-2 ">user@email.domain</span></p>

                                            <p class="text-muted mb-1 font-13"><strong>Location :</strong> <span class="ml-2">USA</span></p>
                                        </div>

                                        <ul class="social-list list-inline mt-3 mb-0 d-none">
                                            <li class="list-inline-item">
                                                <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github"></i></a>
                                            </li>
                                        </ul>


                                    </div>
                                </div>
                                <div class="col-12 col-md-8">
                                    <div class="card">
                                        <!--tips: add .text-center,.text-right to the .card to change card text alignment-->
                                        <div class="card-body">
                                            <h5 class="card-title">Data Personal</h5>
                                            <h6 class="card-subtitle mb-2 text-muted"></h6>
                                            <table class="table table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td><label for="inputEmail4">NIK</label></td>
                                                        <td><input type="email" class="form-control" id="inputEmail4" value="3404071210820001"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="inputEmail4">Nama Lengkap</label></td>
                                                        <td><input type="email" class="form-control" id="inputEmail4" value="Murhadi"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="inputEmail4">Alamat</label></td>
                                                        <td><textarea class="form-control" name="" id="" cols="" rows="3">Jl. Canon B.02 Condongcatur Depok Sleman Yoyakarta 55281</textarea></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="inputEmail4">No Whatsapp</label></td>
                                                        <td><input type="email" class="form-control" id="inputEmail4" value="082314035467"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="inputEmail4">Email</label></td>
                                                        <td><input type="email" class="form-control" id="inputEmail4" value="murhadi@gmail.com"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="inputEmail4">Username</label></td>
                                                        <td><input type="email" class="form-control" id="inputEmail4" value="murhadi"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Password</td>
                                                        <td>**********</td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td><button class="btn btn-success">Update</button></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
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

</body>

</html>