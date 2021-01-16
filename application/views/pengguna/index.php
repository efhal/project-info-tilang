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
                            <div class="col-12 col-md-6">
                                <div class="card-title">
                                    <h2 class="font-weight-bold">Formulir Pengajuan</h2>
                                    <p class="font-weight-light">Lengkapi data berikut untuk pengajuan dokumen
                                        tilang Anda</p>
                                </div>
                                <form class="mt-3">
                                    <div class="form-row mb-3">
                                        <div class="col-12 col-md-12">
                                            <label for="exampleInputEmail1" class="text-dark">Instansi</label>
                                            <select class="custom-select custom-select-lg text-dark" id="instansi">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-12 col-md-12 mb-3">
                                            <label for="exampleInputPassword1" class="text-dark">Nomor Tilang</label>
                                            <input type="number" class="form-control form-control" placeholder="Nomor Dokumen">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-12 col-md-12 mb-3">
                                            <label for="exampleInputPassword1" class="text-dark">Upload surat tilang</label>
                                            <div class="col-12 col-md-12 border-top border-right border-left border-bottom" style="height: 30vh;">
                                                <div style="width: 60%;height: 60%;z-index:100;position:absolute;top:20%;bottom:20%;left:20%;right:40%;border:grey dashed 2px;border-radius:5px;" class="m-auto">
                                                    <h4 class="position-relative text-center text-white font-weight-bold" style="top:50%;">Foto Bukti Pengurusan</h4>
                                                </div>
                                                <div id="kamera"></div>
                                            </div>
                                            <div class="col-12 col-md-12 mt-3 pl-0">
                                                <button class="btn btn-primary" id="flipCamera"><i class="mdi mdi-camera-front"></i></button>
                                                <button class="btn btn-primary" id="snapButton"><i class="mdi mdi-camera-party-mode"></i> Ambil Gambar</button>
                                            </div>

                                            <span class="badge badge-warning mt-3" id="badge-status"></span>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-12 col-md-12 mb-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                                                <label class="custom-control-label" for="customCheck">dengan ini menyetujui syarat & ketentuan dalam
                                                    proses pengajuan tilang melalui layanan eTilang.id</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row mt-4 mt-md-3">
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <button type="button" id="btn-kirim-ajuan" class="btn btn-lg btn-blue btn-block">Kirim</button>
                                        </div>
                                    </div>
                                    <div class="alert alert-success mt-3 d-none" id="status-kirim-ajuan" role="alert">
                                        Dokumen berhasil diajukan, klik <a href="<?= site_url('pg/status_pengajuan') ?>">lanjutkan</a>.
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