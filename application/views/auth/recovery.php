<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title><?=$title?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?=base_url()?>assets/images/favicon.ico">

    <!-- App css -->
    <link href="<?=base_url()?>/assets/css/bootstrap-purple.min.css" rel="stylesheet" type="text/css"
        id="bs-default-stylesheet" />
    <link href="<?=base_url()?>assets/css/app-purple.min.css" rel="stylesheet" type="text/css"
        id="app-default-stylesheet" />

    <link href="<?=base_url()?>assets/css/bootstrap-purple-dark.min.css" rel="stylesheet" type="text/css"
        id="bs-dark-stylesheet" disabled />
    <link href="<?=base_url()?>assets/css/app-purple-dark.min.css" rel="stylesheet" type="text/css"
        id="app-dark-stylesheet" disabled />

    <!-- icons -->
    <link href="<?=base_url()?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />

</head>

<body class="authentication-bg authentication-bg-pattern">

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div id="status_section" class="form-group mb-3 d-none">
                        <div class="alert text-white border-0" role="alert" id="status_text">
                            This is a <strong>danger</strong> alert—check it out!
                        </div>
                    </div> <!-- end card-body -->
                    <div class="card bg-pattern">

                        <div class="card-body p-4">

                            <div class="text-center m-auto">
                                <div class="auth-logo">
                                    <a href="<?=site_url()?>" class="logo logo-dark text-center">
                                        <span class="logo-lg">
                                            <img src="<?=base_url()?>assets/images/logo-dark.png" alt="" height="22">
                                        </span>
                                    </a>

                                    <a href="<?=site_url()?>" class="logo logo-light text-center">
                                        <span class="logo-lg">
                                            <img src="<?=base_url()?>assets/images/logo-light.png" alt="" height="22">
                                        </span>
                                    </a>
                                </div>
                                <p class="text-left mb-4 mt-3">Masukan email dan password untuk mengakses User Panel.
                                </p>
                            </div>

                            <form id="form" action="#">


                                <div class="form-group mb-3">
                                    <label for="emailaddress">Email</label>
                                    <input class="form-control" name="email" type="text" id="email" required=""
                                        placeholder="Masukan email">
                                </div>

                                <div class="form-group mb-1 text-center">
                                    <a href="<?=site_url('signup')?>" class="btn btn-success btn-block" type="submit">
                                        Kirim Email Reset Password </a>
                                </div>

                            </form>


                        </div>
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-white-50">Sudah punya akun ? <a href="<?=site_url('login')?>"
                                    class="text-white ml-1"><b>Masuk</b></a></p>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->


    <footer class="footer footer-alt">
        <?=tanggal_app()?> &copy; Theme by <a href="" class="text-white-50"><?=nama_aplikasi()?></a>
    </footer>

    <!-- Vendor js -->
    <script src="<?=base_url()?>assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="<?=base_url()?>assets/js/app.min.js"></script>
    <script>
    $(document).ready(function() {
        $("#form").on('submit', function(e) {
            $("#spinner-login").removeClass('d-none');
            e.preventDefault();
            $.post({
                url: '<?=site_url('a/login')?>',
                data: $(this).serializeArray(),
                success: function(res) {
                    obj_res = JSON.parse(res);
                    if (obj_res.hasOwnProperty('form_validation')) {
                        $("#status_section").removeClass('d-none');
                        $("#status_text").addClass('alert-danger bg-danger').removeClass(
                            'alert-success bg-success').html(obj_res
                            .form_validation);
                    }
                    if (obj_res.hasOwnProperty('status')) {
                        $("#status_section").removeClass('d-none');
                        if (obj_res.status == 'success') {
                            $("#status_text").removeClass('alert-danger bg-danger')
                                .addClass('alert-success bg-success').html(
                                    obj_res.text);
                        }
                        if (obj_res.status == 'failed') {
                            $("#status_text").addClass('alert-danger bg-danger')
                                .removeClass('alert-success bg-success').html(
                                    obj_res.text);
                        }
                    }
                    $("#spinner-login").addClass('d-none');
                }
            })
        })
    })
    </script>
</body>

</html>