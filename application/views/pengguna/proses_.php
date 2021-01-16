<?php

use Carbon\Carbon;
?>
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
    <!-- Plugins css -->
    <link href="<?= base_url() ?>assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/libs/dropify/css/dropify.min.css" rel="stylesheet" type="text/css" />
    <?php $this->load->view('parts/style') ?>
    <!-- Datatable css -->
    <style type="text/css">
        /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */

        /* Optional: Makes the sample page fill the window. */
        .custom-map-control-button {
            appearance: button;
            background-color: #fff;
            border: 0;
            border-radius: 2px;
            box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
            cursor: pointer;
            margin: 10px;
            padding: 0 0.5em;
            height: 40px;
            font: 400 18px Roboto, Arial, sans-serif;
            overflow: hidden;
        }

        .custom-map-control-button:hover {
            background: #ebebeb;
        }
    </style>

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
                    <div class="row mt-3 mt-md-2">
                        <div class="col-12 col-md-12">
                        </div>
                        <div class="col-12 col-md-7">
                            <div class="row mt-3 mt-md-3">
                                <div class="col-12">
                                    <div class="card">
                                        <!--tips: add .text-center,.text-right to the .card to change card text alignment-->
                                        <div class="card-body">
                                            <div class="form-group">
                                                <div id="map" style="height: 40vh" class="mt-1"></div>
                                            </div>
                                            <!-- Formulir Proses Dokumen -->
                                            <form id="form-proses">
                                                <input type="hidden" name="id_dokumen" id="id_dokumen" value="<?= $this->input->get('i', true) ?>">
                                                <input type="hidden" name="latlng" id="latlng">
                                                <div class="form-group">
                                                    <label for="product-meta-description"><span class="h5 font-weight-bold">Alamat Penerima</span></label>
                                                    <small class="d-block"><i>Silahkan pin lokasi pada map yang tersedia</i></small>
                                                    <br />
                                                    <textarea class="form-control" id="alamat" name="alamat" rows="1"></textarea>
                                                </div>
                                                <hr />
                                                <div class="form-group">
                                                    <label for="product-meta-description"><span class="h5 font-weight-bold">Upload bukti pengurusan</span></label>
                                                    <small class="d-block"><i>Silahkan upload bukti pengurusan file pada area dibawah ini</i></small>
                                                    <br />
                                                    <div class="row">
                                                        <div class="col-12 col-md-4">
                                                            <input type="file" id="bukti-pengurusan" data-allowed-file-extensions="jpg jpeg png" data-default-file="<?= base_url('upload/' . $bukti_pengurusan) ?>" data-plugins="dropify" data-max-file-size="1M" />
                                                        </div>
                                                    </div>
                                                    <span class="badge badge-warning mt-3" id="badge-status"></span>
                                                </div>
                                                <hr />
                                                <div class="form-group mt-2">
                                                    <label for="product-meta-description"><span class="h5 font-weight-bold">Metode Pengiriman</span></label>
                                                    <small class="d-block"><i>Pilih salah satu metode pengiriman dokumen dibawah ini</i></small>
                                                    <br />
                                                    <div class="col-sm-6">
                                                        <div class="radio mb-2">
                                                            <input type="radio" name="metode_pengiriman" id="gs" value="1"> <label for="gs"> Go Send </label>
                                                        </div>
                                                        <div class="radio mb-2">
                                                            <input type="radio" name="metode_pengiriman" id="pr" value="2"> <label for="pr"> Parcel </label>
                                                        </div>
                                                        <div class="radio mb-2">
                                                            <input type="radio" name="metode_pengiriman" id="wh" value="3"> <label for="wh"> Wahana </label>
                                                        </div>
                                                    </div>
                                                    <div id="mp">

                                                    </div>
                                                </div>
                                                <hr />
                                                <div class="form-group mt-4">
                                                    <label for="product-meta-description"><span class="h5 font-weight-bold">Metode Pembayaran</span></label>
                                                    <small class="d-block"><i>Pilih salah satu metode pembayaran dokumen dibawah ini</i></small>
                                                    <br />
                                                    <div class="col-sm-6">
                                                        <div class="radio mb-2">
                                                            <input type="radio" name="metode_pembayaran" id="tb" value="1"> <label for="tb"> Transfer Bank </label>
                                                        </div>
                                                        <div class="radio mb-2">
                                                            <input type="radio" name="metode_pembayaran" id="va" value="2"> <label for="va"> Virtual Account </label>
                                                        </div>
                                                    </div>
                                                    <hr />
                                                    <div id="status_form"></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-md-3 order-1 order-md-0">
                                                        <a href="<?= site_url('pg/') ?>" class="btn btn-lg btn-block btn-danger mb-md-0">Batal</a>
                                                    </div>
                                                    <div class="col-12 col-md-3">
                                                        <button type="submit" class="btn btn-lg btn-primary btn-block mb-1 ">Proses</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- /Formulir Proses Dokumen -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-5 mt-md-3">
                            <div class="card d-none">
                                <!--tips: add .text-center,.text-right to the .card to change card text alignment-->
                                <div class="card-body">
                                    <h5 class="card-title">Detail Dokumen</h5>
                                    <small class="d-block mb-2"><i>Berikut adalah detail dokumen pengurusan dokumen</i></small>
                                    <hr />
                                    <small><b>No Dokumen</b></small>
                                    <span class="d-block font-weight-bold h5 ml-2"><?= $data_dokumen->nomor_dokumen ?></span>
                                    <small><b>Instansi</b></small>
                                    <span class="d-block font-weight-bold h5 ml-2"><?= $data_dokumen->nama_instansi ?></span>
                                    <small><b>Layanan</b></small>
                                    <span class="d-block font-weight-bold h5 ml-2"><?= $data_dokumen->nama_layanan ?></span>
                                    <small><b>Pemilik</b></small>
                                    <span class="d-block font-weight-bold h5 ml-2"><?= $data_dokumen->pemilik_dokumen ?></span>
                                    <small><b>Tanggal</b></small>
                                    <span class="d-block font-weight-bold h5 ml-2"><?= Carbon::parse($data_dokumen->tanggal_dokumen)->locale('id')->isoFormat('LL'); ?></span>
                                </div>
                            </div>
                            <div class="card bg-primary text-white">
                                <!--tips: add .text-center,.text-right to the .card to change card text alignment-->
                                <div class="card-body">
                                    <h5 class="card-title text-white">Bantuan</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. At illum cum, nisi non reprehenderit soluta delectus tenetur animi sit dolores accusantium a inventore explicabo sapiente ducimus libero quod doloremque aperiam?</p>
                                    <a class="btn btn-lg btn-block btn-success" target="__BLANK__" href="https://api.whatsapp.com/send?phone=6282313045392&text=Selamat%20Siang%2C%20saya%20kesulitan%20...%20%2C%20gimana%20solusinya%20%3F">Bantuan <i class="mdi mdi-whatsapp"></i></a>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <small class="d-block"><i>Berikut adalah ringkasan biaya pengiriman dokumen</i></small>
                                    <br />
                                    <div class="table-responsive table-sm">
                                        <table class="table table-centered table-nowrap mb-0">
                                            <tbody>
                                                <tr>
                                                    <td>Biaya <b><?= $data_dokumen->nama_layanan ?></b>
                                                    </td>
                                                    <td class="text-right">
                                                        Rp <?= number_format($data_dokumen->biaya_layanan, 2, '.', '.') ?> </td>
                                                </tr>
                                                <tr>
                                                    <td>Biaya <b>Pengiriman <span id="metode-kirim"></span></b>
                                                    </td>
                                                    <td class="text-right"><span id="biaya-kirim">-</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Biaya <b>Admin</b>
                                                    </td>
                                                    <td class="text-right">
                                                        Rp <?= number_format($data_dokumen->biaya_admin, 2, '.', '.') ?> </td>
                                                </tr>
                                                <tr class="text-right">
                                                    <td>
                                                        <h5 class="m-0">Total:</h5>
                                                    </td>
                                                    <td class="text-right font-weight-semibold">Rp <span class="h2" id="biaya-total">56.000,00</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div> <!-- end row -->

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
    <script src="<?= base_url() ?>/assets/libs/dropify/js/dropify.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            let dr_bukti_pengurusan = $("#bukti-pengurusan").dropify({
                messages: {
                    default: 'Bukti pengurusan dokumen',
                    replace: 'Ganti',
                    remove: 'Hapus',
                    error: 'error'
                }
            });

            function upload_file(fd, prefix) {
                $.ajax({
                    url: '<?= site_url('pg/p/up/bukti_dokumen?i=' . $data_dokumen->id_dokumen . '&nm=' . $data_dokumen->nomor_dokumen . '&pre=') ?>' + prefix,
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        res_obj = JSON.parse(response);
                        if (res_obj.hasOwnProperty('status')) {
                            if (res_obj.status == 'success') {
                                $("#badge-status").text('Diproses');
                            }
                        }
                    },
                });
            }

            function clear_file(prefix) {
                $.ajax({
                    url: '<?= site_url('pg/p/del/bukti_dokumen') ?>',
                    type: 'post',
                    data: {
                        'file_name': 'bukti_pengurusan_51_3_1412123231.jpg',
                        'prefix': prefix
                    },
                    success: function(response) {
                        res_obj = JSON.parse(response);
                        if (res_obj.hasOwnProperty('status')) {
                            alert(res_obj.prefix);
                            if (res_obj.status == 'success') {
                                alert(res_obj.text)
                            }
                        }
                    },
                });
            }
            dr_bukti_pengurusan.on('change', function(e, element) {
                e.preventDefault();
                let prefix = 'bukti_pengurusan';
                let fd = new FormData();
                let files = $("#bukti-pengurusan")[0].files[0];
                fd.append('file', files);
                upload_file(fd, prefix);
            });


            dr_bukti_pengurusan.on('dropify.beforeClear', function(event, element) {
                let prefix = 'bukti_pengurusan';
                clear_file(prefix)
            });

            $("input[name='metode_pengiriman']").on('change', function() {
                let metode_pengiriman_id = $(this).val();
                $.post("<?= site_url('pg/p/g/metode_pengiriman') ?>", {
                        'metode_pengiriman_id': metode_pengiriman_id
                    },
                    function(data, textStatus, jqXHR) {
                        $("#mp").html(data.html);
                        $("#biaya-kirim").text("Rp " + data.biaya);
                    }, "json"
                );
            })

            $("#form-proses").on('submit', function(e) {
                e.preventDefault();
                data_dokumen = $(this).serialize();
                $.post("<?= site_url('pg/p/i/proses_dokumen') ?>", data_dokumen,
                    function(data, textStatus, jqXHR) {
                        $("#status_form").html(data.html)
                    }, "json"
                );
            })




        })
    </script>
    <script type="text/javascript">
        let map, infoWindow;

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: -6.200000,
                    lng: 106.816666
                },
                zoom: 6,
            });
            const geocoder = new google.maps.Geocoder();
            infoWindow = new google.maps.InfoWindow();
            const locationButton = document.createElement("button");
            locationButton.textContent = "Dapatkan lokasi anda";
            locationButton.classList.add("custom-map-control-button");
            map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
            locationButton.addEventListener("click", () => {

                // Try HTML5 geolocation.
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                        (position) => {
                            const pos = {
                                lat: position.coords.latitude,
                                lng: position.coords.longitude,
                            };
                            geocoder.geocode({
                                location: pos
                            }, (results, status) => {
                                if (status === "OK") {
                                    if (results[0]) {
                                        map.setZoom(11);
                                        const marker = new google.maps.Marker({
                                            position: pos,
                                            map: map,
                                        });
                                        $("#latlng").val(pos.lat + ',' + pos.lng);
                                        $("#alamat").text(results[0].formatted_address);
                                        //        		        infowindow.setContent(results[0].formatted_address);
                                        //        		        infowindow.open(map, marker);
                                    } else {
                                        window.alert("No results found");
                                    }
                                } else {
                                    window.alert("Geocoder failed due to: " + status);
                                }
                            });


                            infoWindow.setPosition(pos);
                            infoWindow.setContent("Lokasi anda.");
                            infoWindow.open(map);
                            map.setZoom(10);
                            map.setCenter(pos);
                        },
                        () => {
                            handleLocationError(true, infoWindow, map.getCenter());
                        }
                    );
                } else {
                    // Browser doesn't support Geolocation
                    handleLocationError(false, infoWindow, map.getCenter());
                }
            });
        }

        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(
                browserHasGeolocation ?
                "Error: The Geolocation service failed." :
                "Error: Your browser doesn't support geolocation."
            );
            infoWindow.open(map);
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDo9HRRCCPaSc56lFFDzT2V0xOYPI8OA9U&callback=initMap&libraries=&v=weekly" defer></script>

</body>

</html>