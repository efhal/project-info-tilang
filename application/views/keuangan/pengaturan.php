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

        <div class="modal fade" id="modal-tambah-layanan" tabindex="-1" role="dialog" aria-labelledby="myModal-label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalTitle">Layanan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <form>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-12 col-sm-4 col-form-label">Instansi</label>
                                    <div class="col-12 col-sm-12">
                                        <select name="" id="select2-instansi"></select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-12 col-sm-4 col-form-label">Nama Layanan</label>
                                    <div class="col-12 col-sm-12">
                                        <input type="email" class="form-control" id="inputEmail3" placeholder="Nama Layanan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-12 col-sm-4 col-form-label">Biaya</label>
                                    <div class="col-12 col-sm-12">
                                        <input type="number" class="form-control" id="inputPassword3" placeholder="Biaya">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12 mt-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card">
                                        <!--tips: add .text-center,.text-right to the .card to change card text alignment-->
                                        <div class="card-body">
                                            <div class="alert alert-primary" role="alert">
                                                <p class="card-text">Pengaturan berisi pengaturan profil instansi, pembaruan layanan, dan lain-lain.</p>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 col-lg-3 mt-3">
                                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                                            Profil
                                                        </a>
                                                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                                                            Layanan
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-9 ">
                                                    <div class="tab-content" id="v-pills-tabContent">
                                                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">Profil Admin</h5>
                                                                    <h6 class="card-subtitle mb-2 text-muted">Pengaturan Profil Admin</h6>
                                                                    <form>

                                                                        <div class="form-group">
                                                                            <label for="inputAddress">Nama Admin</label>
                                                                            <input type="text" class="form-control rounded-0 border-left-0 border-top-0 border-right-0" id="inputAddress" placeholder="" value="Admin Keuangan">
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md-6">
                                                                                <label for="inputEmail4">Email</label>
                                                                                <input type="email" class="form-control rounded-0 border-left-0 border-top-0 border-right-0" id="inputEmail4" value="<?= $data_session->email ?>">
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label for="inputPassword4">Password</label>
                                                                                <input type="password" class="form-control rounded-0 border-left-0 border-top-0 border-right-0" id="inputPassword4" value="************">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="inputAddress">Alamat</label>
                                                                            <input type="text" class="form-control rounded-0 border-left-0 border-top-0 border-right-0" id="inputAddress" value="Komplek Balaikota Yogyakarta, Jl. Kenari No.56, Muja Muju, Umbulharjo, Yogyakarta City, Special Region of Yogyakarta 55165">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="inputAddress">Telp</label>
                                                                            <input type="text" class="form-control rounded-0 border-left-0 border-top-0 border-right-0" id="inputAddress" value="(0274) 562682">
                                                                        </div>

                                                                        <div class="form-row">
                                                                            <div class="form-group col-md-6">
                                                                                <label for="inputCity">Provinsi</label>
                                                                                <input type="text" class="form-control rounded-0 border-left-0 border-top-0 border-right-0" id="inputCity" value="Yogyakarta">
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label for="inputState">Kab/Kota</label>
                                                                                <input type="text" class="form-control rounded-0 border-left-0 border-top-0 border-right-0" id="inputCity" value="Sleman">
                                                                            </div>
                                                                            <div class="form-group col-md-2">
                                                                                <label for="inputZip">Kode POS</label>
                                                                                <input type="text" class="form-control rounded-0 border-left-0 border-top-0 border-right-0" id="inputZip" value="55165">
                                                                            </div>
                                                                        </div>
                                                                        <button type="submit" class="btn btn-primary">Perbarui <i class="mdi mdi-pencil"></i></button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">Layanan Instansi</h5>
                                                                    <h6 class="card-subtitle mb-2 text-muted">Pengaturan Layanan Instansi</h6>
                                                                    <button class="btn btn-success" id="tambah-layanan"><i class="mdi mdi-plus"></i> Layanan</button>
                                                                    <table class="table dt-responsive nowrap w-100 text-dark" id="datatable">
                                                                        <thead>
                                                                            <tr>
                                                                                <th></th>
                                                                                <th>No</th>
                                                                                <th>Layanan</th>
                                                                                <th></th>
                                                                                <th>Biaya</th>
                                                                                <th></th>
                                                                                <th></th>
                                                                                <th>Aksi</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
    <script src="<?= base_url('assets/') ?>libs/select2/js/select2.min.js"></script>
    <script src="<?= base_url('assets/') ?>libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/') ?>libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets/') ?>libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url('assets/') ?>libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    <script>
        var tb_ = $('#datatable').DataTable({
            scrollY: 550,
            deferRender: true,
            scroller: true,
            "lengthMenu": [
                [50, 100, 500, -1],
                [50, 100, 500, "Semua"]
            ],
            "dom": '<"top"><"mt-3"><"mb-3">p',
            "searching": false,
            "processing": true,
            "serverSide": true,
            "ordering": true,
            "paging": false,
            "language": {
                "emptyTable": "<h4><i class='mdi mdi-cancel'></i> Data tidak ditemukan</h4><p class='text-white'>Silahkan datang di lain waktu</h1>"
            },
            "columnDefs": [{
                "targets": [0, 1, 7],
                "orderable": false
            }, {
                "targets": [0],
                "visible": false
            }, ],
            'ajax': {
                'url': '<?= site_url('kg/p/dtb/layanan') ?>',
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
    <script>
        $("#select2-instansi").select2({
            placeholder: "Instansi",
            ajax: {
                url: '<?= site_url('kg/p/s2/instansi') ?>',
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
        $("#tambah-layanan").click(function() {
            $("#modal-tambah-layanan").modal('show');
        })
    </script>
</body>

</html>