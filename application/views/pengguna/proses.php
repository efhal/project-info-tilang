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
    <!-- Plugins css -->
    <link href="<?= base_url() ?>assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/libs/dropify/css/dropify.min.css" rel="stylesheet" type="text/css" />
    <?php $this->load->view('parts/style') ?>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
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
                                    <h2 class="font-weight-bold">Formulir Permohonan</h2>
                                    <p class="font-weight-light">Lengkapi data berikut untuk melakukan proses
                                        pembayaran dan pengiriman dokumen tilang</p>
                                </div>
                                <div class="form-group">
                                    <label for="product-meta-description"><span class="h5 font-weight-bold">Alamat</span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-light" type="button" id="exampleAddon"><i class="mdi mdi-target"></i></button>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Cari lokasi..." id="cari-lokasi" aria-label="Example placeholder" aria-describedby="exampleAddon">
                                    </div>
                                    <div id="map" style="height: 40vh" class="mt-1"></div>
                                </div>
                                <form id="form-proses">
                                    <input type="hidden" name="latlng" id="latlng">
                                    <input type="hidden" name="alamat" id="alamat">
                                    <input type="hidden" name="id_dokumen" id="id_dokumen" value="<?= $this->input->get('i', true) ?>">
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
                                                <input type="radio" name="metode_pengiriman" id="pr" value="2"> <label for="pr"> J&T </label>
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
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-3 order-1 order-md-0">
                                            <a href="<?= site_url('pg/') ?>" class="btn btn-lg btn-block btn-danger mb-md-0">Batal</a>
                                        </div>
                                        <div class="col-12 col-md-3">
                                            <button id="btn-submit" class="btn btn-lg btn-primary btn-block mb-1 ">Kirim</button>
                                        </div>
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
                    // url: 'site_url('pg / p / up / bukti_dokumen ? i = ' . $data_dokumen->id_dokumen . ' & nm = ' . $data_dokumen->nomor_dokumen . ' & pre = ')' + prefix,
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

            $("#form-proses").on('submit', function(e) {
                e.preventDefault();
                window.location.href = "<?= site_url('pg/detail_pengajuan') ?>"
            })
        })
    </script>
    <script type="text/javascript">
        function initAutocomplete() {
            const map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: -6.200000,
                    lng: 106.816666
                },
                zoom: 5,
                mapTypeId: "roadmap",
            });
            // Create the search box and link it to the UI element.
            const input = document.getElementById("cari-lokasi");
            const searchBox = new google.maps.places.SearchBox(input);
            // Bias the SearchBox results towards current map's viewport.
            map.addListener("bounds_changed", () => {
                searchBox.setBounds(map.getBounds());
            });
            let markers = [];
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener("places_changed", () => {
                const places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }
                // Clear out the old markers.
                markers.forEach((marker) => {
                    marker.setMap(null);
                });
                markers = [];
                // For each place, get the icon, name and location.
                const bounds = new google.maps.LatLngBounds();
                places.forEach((place) => {
                    if (!place.geometry) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    const icon = {
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25),
                    };
                    // Create a marker for each place.
                    markers.push(
                        new google.maps.Marker({
                            map,
                            icon,
                            title: place.name,
                            position: place.geometry.location,
                        })
                    );
                    $("#alamat").val($("#cari-lokasi").val());
                    $("#latlng").val(place.geometry.location.toString());

                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDo9HRRCCPaSc56lFFDzT2V0xOYPI8OA9U&callback=initAutocomplete&libraries=places&v=weekly" defer></script>

</body>

</html>