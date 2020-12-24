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
                        <div class="col-12">
                            <!-- Portlet card -->
                            <div class="card mt-3">
                                <div class="card-body">
                                    <div class="card-body">

                                        <div id="form-searach" method="POST">
                                            <div class="form-row">
                                                <div class="form-group col-12 col-lg-3 col-xl-2">
                                                    <input type="text" class="form-control" id="cari_dokumen" placeholder="Cari">
                                                </div>
                                                <div class="form-group col-12 col-lg-3 col-xl-2">
                                                    <input type="date" class="form-control" id="tgl" placeholder="">
                                                </div>
                                                <div class="form-group col-12 col-lg-3 col-xl-2">
                                                    <select id="layanan"></select>
                                                </div>
                                                <div class="form-group col-12 col-lg-3 col-xl-1">
                                                    <button id="cta-search" class="btn btn-primary btn-block d-md-inline">Cari</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" m-sm-0 mt-md-2">
                                            <table class="table dt-responsive nowrap w-100 text-dark" id="datatable">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>No</th>
                                                        <th>Tgl Transaksi</th>
                                                        <th>Layanan</th>
                                                        <th>Biaya Dokumen</th>
                                                        <th>Biaya Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
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
    <script src="<?= base_url('assets/') ?>libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/') ?>libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets/') ?>libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url('assets/') ?>libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets/') ?>libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url('assets/') ?>libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets/') ?>libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url('assets/') ?>libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?= base_url('assets/') ?>libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url('assets/') ?>libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?= base_url('assets/') ?>libs/datatables.net-select/js/dataTables.select.min.js"></script>
    <script src="<?= base_url('assets/') ?>libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?= base_url('assets/') ?>libs/pdfmake/build/vfs_fonts.js"></script>

    <script type="text/javascript">
        $("#layanan").select2({
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
            },
        });
        var tb_ = $('#datatable').DataTable({
            buttons: [{
                    extend: "copy",
                    className: "btn-light"
                },
                {
                    extend: "excel",
                    className: "btn-light"
                },
                {
                    extend: "print",
                    className: "btn-light"
                },
                {
                    extend: "pdf",
                    className: "btn-light"
                },
            ],

            scrollY: 550,
            deferRender: true,
            scroller: true,
            "lengthMenu": [
                [50, 100, 500, -1],
                [50, 100, 500, "Semua"]
            ],
            "dom": '<"top">Bfrt<"mt-3">l<"mb-3">p',
            "searching": false,
            "processing": true,
            "serverSide": true,
            "ordering": true,
            "paging": true,
            "language": {
                "emptyTable": "<h4><i class='mdi mdi-cancel'></i> Data tidak ditemukan</h4><p class='text-white'>Silahkan datang di lain waktu</h1>"
            },
            "columnDefs": [{
                "targets": [0, 1, 5],
                "orderable": false
            }, {
                "targets": [0],
                "visible": false
            }, ],
            'ajax': {
                'url': '<?= site_url('it/p/dtb/transaksi') ?>',
                'type': "POST",
                'data': function(data) {
                    data.search = $("#cari_dokumen").val();
                    data.instansi = $("#instansi").val();
                    data.tanggal_transaksi = $("#tgl").val();
                }
            },
        });
        $("#cta-search").on('click', function(e) {
            e.preventDefault();
            tb_.draw();
            $("#datatable").show();
        })
    </script>

</body>

</html>