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
    <?php $this->load->view('parts/style') ?>
    <!-- Datatable css -->
    <style>
        body {
            min-height: 100vh !important;
            padding-bottom: unset !important;
        }

        .content-page {
            min-height: 100vh !important;
        }
    </style>

</head>

<body data-sidebar-icon="twotones bg-white">

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

        <div class="content-page bg-white">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row mt-3 mt-md-4">
                        <div class="col-12">
                            <!-- Portlet card -->
                            <div class="col-12 col-md-6" style="height:100vh;">
                                <div class="card-title">
                                    <h2 class="font-weight-bold">Formulir Permohonan</h2>
                                    <p class="font-weight-light">Lengkapi data berikut untuk melakukan permohonan dokumen</p>
                                </div>
                                <form class="mt-3">
                                    <div class="form-row mb-3">
                                        <div class="col-12 col-md-12">
                                            <label for="exampleInputEmail1" class="text-dark">Instansi</label>
                                            <input type="email" class="form-control form-control-lg font-weight-bold text-dark border-left-0 border-top-0 border-right-0 rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-12 col-md-12">
                                            <label for="exampleInputPassword1" class="text-dark">Nomor Dokumen</label>
                                            <input type="number" class="form-control form-control-lg font-weight-bold text-dark border-left-0 border-top-0 border-right-0 rounded-0" id="exampleInputPassword1">
                                        </div>
                                    </div>
                                    <div class="form-row mt-4 mt-md-3">
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block">Kirim ajuan</button>
                                        </div>
                                    </div>
                                </form>
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

    <script type="text/javascript">
        $(document).ready(function() {
            let val = $("#no_dokumen").val();
            $("#no_dokumen").on('keyup', function(e) {
                val = $(this).val();
                $("#typing").text(val);
                if (val.length) {
                    $("#show_typing").removeClass('d-none');
                } else {
                    $("#show_typing").addClass('d-none');
                }
            })
            // Cari dokumen
            $("#cta_search").click(function() {
                if (val.length > 0) {
                    $.post("<?= site_url('pg/p/cari') ?>", {
                        nomor: val
                    }, function(data) {
                        $("#hasil_cari").html(data);
                        $("#show_typing").addClass('d-none');
                    });
                } else {

                }
            })
        })
    </script>

</body>

</html>