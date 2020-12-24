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
                        <div class="col-12">
                            <!-- Portlet card -->
                            <div class="card mt-3">
                                <div class="card-body">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 col-md-8 offset-md-2 text-center">
                                                <span class="h6">
                                                    <b>Selamat datang <br /><span class="text-primary h2"><?= $data_session->nama_lengkap ?></span></b></span><br /><br /> <span class="h6 text-center">Silahkan pilih menu yang anda ingingkan. Atau temukan dokumen yang anda cari.<br />Pastikan Nomor Dokumen dengan Tempat Instansi Cocok
                                                </span>
                                            </div>
                                            <div class="col-12 col-md-6 offset-md-3">
                                                <small id="" class="form-text text-muted text-center">Masukan Nomor Dokumen yang telah diberikan oleh Petugas/Instansi</small>
                                                <div class="pt-3 pb-4">
                                                    <div class="form-group">
                                                        <input id="no_dokumen" name="no_dokumen" type="text" class="form-control font-weihgt-bold text-center text-dark form-control-lg border-primary rounded-0 border-left-0 border-top-0 border-right-0 " placeholder="Nomor Dokumen" value="1412123231">
                                                        <div class="mt-3 text-center">
                                                            <h5 id="show_typing" class="d-none">Cari untuk No Dokumen <b><span id="typing" class="text-primary"></span></b></h5>
                                                        </div>
                                                    </div>
                                                    <div class="form-group text-center">
                                                        <button type="button" id="cta_search" class="btn btn-lg btn-block waves-effect waves-light btn-primary mt-1"><i class="fa fa-search mr-1"></i> Cari Berkas</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-10 offset-md-1">
                                                <div class="row" id="hasil_cari">
                                                </div>
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