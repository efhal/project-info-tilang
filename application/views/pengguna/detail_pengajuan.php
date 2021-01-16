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
    <link href="<?= site_url() ?>assets/libs/dropify/css/dropify.min.css" rel="stylesheet" type="text/css" />
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
                            <div class="col-12 col-md-12">
                                <div class="card-title">
                                    <h2 class="font-weight-bold">Detail Pengajuan</h2>
                                    <p class="font-weight-light">Berikut adalah detail penajuan dokumen</p>
                                </div>
                                <div class="table-responsive ">
                                    <table class="table text-nowrap table-light text-dark">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>#Nomor dokumen</th>
                                                <th>Instansi</th>
                                                <th>Metode Pengiriman</th>
                                                <th>Metode Pembayaran</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>141232101</td>
                                                <td>Dinas Kejaksaan Negri Yogyakarta</td>
                                                <td>Go-Jek</td>
                                                <td>Transfer Bank (BRI)</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <div class="card-title">
                                    <p class="font-weight-light">Berikut adalah rincian biaya dokumen</p>
                                </div>
                                <div class="table-responsive ">
                                    <table class="table text-nowrap table-light text-dark">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Biaya dokumen</th>
                                                <th>Biaya admin</th>
                                                <th>Biaya logistik (pengiriman)</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Rp 15.0000</td>
                                                <td>Rp 10.000</td>
                                                <td>Rp 23.000</td>
                                                <td>Rp 58.0000</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 mt-3">
                                <div class="alert alert-success" role="alert">
                                    <p class="card-text">Silahkan transfer uang sebesar Rp 58.000,00 ke rekening <br /><span class="font-weight-bold">Bank BRI <input type="text" id="myInput" class="form-control col-3 d-inline border-0" value="024501002290304"> <button class="btn btn-light" id="button-copy"><i class="mdi mdi-content-copy"></i></button>
                                            <br />a.n. PT. MELAYANI CAKRAWALA N
                                        </span></p>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="card">

                                    <div class="card-body">
                                        <input type="file" id="bukti-transfer" data-plugins="dropify" data-max-file-size="1M" data-default-file="" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 mt-3">
                                <a name="" id="" class="btn btn-lg btn-blue" href="<?= site_url('pg/pembayaran_diterima') ?>" role="button">Konfirmasi pembayaran</a>
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
    <script src="<?= base_url('assets/') ?>libs/dropify/js/dropify.min.js"></script>

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

            $("#button-copy").click(function() {
                var copyText = document.getElementById("myInput");

                /* Select the text field */
                copyText.select();
                copyText.setSelectionRange(0, 99999); /* For mobile devices */

                /* Copy the text inside the text field */
                document.execCommand("copy");

                /* Alert the copied text */
                $("#button-copy").html('<i class="mdi mdi-check"></i> Dicopy');
            })
        })
    </script>

</body>

</html>