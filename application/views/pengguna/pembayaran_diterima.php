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
                            <div class="col-12 col-md-12">
                                <div class="card-title">
                                    <h2 class="font-weight-bold">Status Pembayaran</h2>
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
                            <div class="col-12 col-md-12 mt-3 mt-md-5">
                                <div class="alert alert-success" role="alert">
                                    <p class="card-text">Pemabayaran anda telah diterima. silahkan menunggu di rumah dokumen anda akan sampai beberapa saat lagi</p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mt-3 mt-md-5">
                                <div class="row d-flex justify-content-between">
                                    <div class="col-6 col-md-3 col-lg-3 col-xl-3">
                                        <a name="" id="" class="btn btn-lg btn-block btn-blue" href="<?= site_url('pg') ?>" role="button">Ke Beranda</a>
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