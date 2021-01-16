<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.ico">

    <!-- App css -->
    <link href="<?= base_url() ?>/assets/css/bootstrap-purple.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="<?= base_url() ?>assets/css/app-purple.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="<?= base_url() ?>assets/css/bootstrap-purple-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
    <link href="<?= base_url() ?>assets/css/app-purple-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" disabled />

    <!-- icons -->
    <link href="<?= base_url() ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />

</head>

<body class="bg-white">
    <div class="mt-2 mt-md-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">

                        <div class="card-body">
                            <?php if ($error_login_required = $this->session->flashdata('login_required')) { ?>
                                <div class="alert alert-danger" role="alert">
                                    Akses tidak diijinkan, Anda harus login terlebih dahulu.
                                </div>
                            <?php } ?>
                            <div class="text-center m-auto">
                                <div class="auth-logo">
                                    <a href="<?= site_url() ?>" class="logo logo-dark text-center">
                                        <span class="logo-lg">
                                            <img src="<?= base_url() ?>assets/images/logo-dark.png" alt="" height="50">
                                        </span>
                                    </a>

                                    <a href="<?= site_url() ?>" class="logo logo-light text-center">
                                        <span class="logo-lg">
                                            <img src="<?= base_url() ?>assets/images/logo-light.png" alt="" height="50">
                                        </span>
                                    </a>
                                </div>
                                <p class=" mb-4 mt-3">Masukan email dan password untuk mengakses eTilang.id
                                </p>
                                <!-- end card-body -->
                            </div>

                            <form id="form">
                                <div class="form-group mb-3">
                                    <label for="emailaddress">Email</label>
                                    <input class="form-control border-left-0  border-top-0 border-right-0" name="email" value="efalardan2020@gmail.com" type="text" id="email" required="" placeholder="Masukan email">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" name="password" id="password" value="01051994" class="form-control border-left-0  border-top-0 border-right-0" placeholder="Masukan password">
                                        <div class="input-group-append" data-password="false">
                                            <div class="my-auto pl-1">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-1 text-center">
                                    <button class="btn btn-blue btn-lg btn-block" type="submit" id="submit-singup">
                                        <i id="spin-login" class="fas fa-circle-notch fa-spin d-none"></i>
                                        Login </button>
                                </div>

                                <div id="status_section" class="form-group mb-3 mt-3 d-none">
                                    <div class="alert border-0" role="alert" id="status_text">
                                    </div>
                                </div>

                                <small class="d-block mt-1 mb-1 text-center">- Atau -</small>
                                <div class="form-group mb-1">
                                    <button class="btn btn-outline-blue btn-block" type="submit"> Masuk/Daftar Dengan
                                        Facebook <i class="mdi mdi-facebook"></i></button>
                                </div>
                                <div class="form-group mb-1">
                                    <button class="btn btn-outline-danger btn-block" type="submit"> Masuk/Daftar
                                        Dengan
                                        Google <i class="mdi mdi-google"></i></button>
                                </div>
                            </form>

                            <div class="col-12 text-center">
                                <p class="text-primary">Belum punya akun ? <a href="<?= site_url('signup') ?>" class="text-primary ml-1"><b>Daftar</b></a></p>
                                <p class="mt-2"><?= tanggal_app() ?> &copy; Theme by <a href="" class="text-primary"><?= nama_aplikasi() ?></a></p>
                            </div> <!-- end col -->

                        </div>
                    </div>
                    <!-- end card -->

                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <!-- Vendor js -->
    <script src="<?= base_url() ?>assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="<?= base_url() ?>assets/js/app.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#submit-singup").click(function(e) {
                e.preventDefault();
                $("#spin-login").removeClass("d-none");
                $.post({
                    url: "<?= site_url('a/login') ?>",
                    data: $("#form").serializeArray(),
                    success: function(res) {
                        res_obj = JSON.parse(res);
                        if (res_obj.hasOwnProperty('status')) {
                            $("#status_section").removeClass('d-none');
                            if (res_obj.status == 'validasi_error') {
                                $("#status_text").removeClass().addClass('alert-danger text-danger p-2').html(res_obj.text);
                                $("#spin-login").addClass("d-none");
                            }
                            if (res_obj.status == 'failed') {
                                $("#status_text").removeClass().addClass('alert-danger text-danger p-2').html(res_obj.text);
                                $("#spin-login").addClass("d-none");
                            }
                            if (res_obj.status == 'success') {
                                $("#status_text").removeClass().addClass('alert-success text-success p-2').html(res_obj.text);
                                window.location.href = res_obj.link;
                            }
                        }
                    }
                })
            })
        })
    </script>
</body>

</html>