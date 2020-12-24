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

                            <div class="text-center m-auto">
                                <div class="auth-logo">
                                    <a href="<?= site_url() ?>" class="logo logo-dark text-center">
                                        <span class="logo-lg">
                                            <img src="<?= base_url() ?>assets/images/logo-dark.png" alt="" height="22">
                                        </span>
                                    </a>

                                    <a href="<?= site_url() ?>" class="logo logo-light text-center">
                                        <span class="logo-lg">
                                            <img src="<?= base_url() ?>assets/images/logo-light.png" alt="" height="22">
                                        </span>
                                    </a>
                                </div>
                                <p class=" mb-4 mt-3">Masukan Kode verifikasi pengguna.
                                </p>
                                <!-- end card-body -->
                            </div>

                            <form id="form">
                                <input type="hidden" name="user_id" value="<?= $this->input->get('i',true) ?>">
                                <input type="hidden" name="token" value="<?= $this->input->get('t',true) ?>">
                                
                                <div class="form-group mb-3">
                                    <input class="form-control border-left-0  border-top-0 border-right-0" name="kode_verifikasi" type="text" id="kode_verifikasi" required="" value="DE2EF" placeholder="Masukan Kode Verifikasi">
                                </div>

                                <div class="form-group mb-1 text-center">
                                    <button class="btn btn-primary btn-lg btn-block" type="submit" id="submit-singup">
                                        <i id="spin-signup" class="fas fa-circle-notch fa-spin d-none"></i>
                                        Lanjutkan </button>
                                </div>

                                <div id="status_section" class="form-group mb-3 mt-3 d-none">
                                    <div class="alert border-0" role="alert" id="status_text">
                                    </div>
                                </div>
                            </form>

                            <div class="col-12 text-center">
                                <p class="text-primary">Belum menerima kode ? <a href="<?= site_url('login') ?>" class="text-primary ml-1"><b>Kirim Ulang</b></a></p>
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
                $("#spin-signup").removeClass("d-none");
                $.post({
                    url: "<?= site_url('a/aktivasi') ?>",
                    data: $("#form").serializeArray(),
                    success: function(res) {
                        res_obj = JSON.parse(res);
                        if (res_obj.hasOwnProperty('status')) {
                            $("#status_section").removeClass('d-none');
                            if (res_obj.status == 'error') {
                                $("#status_text").removeClass().addClass('alert-danger text-danger p-2').html(res_obj.text);
                                $("#spin-signup").addClass("d-none");   
                            }
                            if (res_obj.status == 'success') {
                                $("#status_text").removeClass().addClass('alert-success text-success p-2').html(res_obj.text);
                                setTimeout(function(){
                                    window.location.href = res_obj.link;
                                },3000);
                            }
                        }
                    }
                })
            })
        })
    </script>
</body>

</html>