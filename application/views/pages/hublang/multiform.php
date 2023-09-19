    <!-- BEGIN: Page Main-->
    <div id="main">
        <div class="row">

            <div class="col s12">
                <div class="container">
                    <div class="section section-data-tables">
                        <!-- Page Length Options -->
                        <div class="row">
                            <div class="col s12">


                                <!-- <form action="<?= base_url('hublang') ?>" method="post"> -->
                                <div class="card">
                                    <div class="card-content">
                                        <!-- <h4 class="card-title">Data Pelanggan</h4> -->
                                        <div class="row">
                                            <div class="col s12 m12 l12">
                                                <form method="post" action="<?= base_url('hublang/multiform') ?>" autocomplete="off">
                                                    <ul class="stepper linier">
                                                        <li class="step active">
                                                            <div class="step-title waves-effect">Data Pelanggan</div>
                                                            <div class="step-content">
                                                                <!-- Your step content goes here (like inputs or so) -->
                                                                <div class="row margin">
                                                                    <div class="col s12 m6 l6">
                                                                        <div class="input-field">
                                                                            <i class="material-icons prefix">assignment_ind</i>
                                                                            <input type="hidden" id="pelayanan" name="pelayanan" value="">
                                                                            <input type="hidden" id="wilayah" name="wilayah" value="">
                                                                            <input type="hidden" id="jalan" name="jalan" value="">
                                                                            <input id="no_pelanggan" type="text" maxlength="11" name="no_pelanggan" required value="" placeholder="Masukkan kembali nomor pelanggan" class="validate" autofocus>
                                                                            <label for="no_pelanggan">Nomor pelanggan *</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col s12 m6 l6">
                                                                        <div class="input-field">
                                                                            <i class="material-icons prefix">date_range</i>
                                                                            <input id="tgl_daftar" type="date" name="tgl_daftar" class="validate">
                                                                            <label for="tgl_daftar">Tanggal daftar <small>(Tidak wajib di isi)</small> </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row margin">
                                                                    <div class="col s12 m6 l6">
                                                                        <div class="input-field">
                                                                            <i class="material-icons prefix">assignment_ind</i>
                                                                            <input id="no_plat" type="number" name="no_plat" class="validate" value="" placeholder="Masukkan nomor plat" required>
                                                                            <label for="no_plat">Nomor plat * </label>
                                                                            <?= form_error('no_plat', '<span class="helper-text red-text">', '</span>'); ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col s12 m6 l6">
                                                                        <div class="input-field">
                                                                            <i class="material-icons prefix">account_circle</i>
                                                                            <input id="nama_pelanggan" type="text" name="nama_pelanggan" placeholder="Masukkan nama lengkap" class="validate" value="" required>
                                                                            <label for="nama_pelanggan">Nama pelanggan *</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row margin">
                                                                    <div class="col s12 m6 l6">
                                                                        <div class="input-field">
                                                                            <i class="material-icons prefix">email</i>
                                                                            <input id="email_pelanggan" type="email" name="email_pelanggan" placeholder="Masukkan email valid" class="validate" value="<?= set_value('email_pelanggan') ?>">
                                                                            <label for="email_pelanggan">Email pelanggan <small>( Tidak Wajib )</small></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col s12 m6 l6">
                                                                        <div class="input-field">
                                                                            <i class="material-icons prefix">local_phone</i>
                                                                            <input id="telp_pelanggan" type="number" name="telp_pelanggan" placeholder="Masukkan nomor telepon valid" class="validate" value="<?= set_value('telp_pelanggan') ?>">
                                                                            <label for="telp_pelanggan">Nomor hp pelanggan <small>( Tidak wajib )</small></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row margin">
                                                                    <div class="col s12">
                                                                        <div class="input-field">
                                                                            <i class="material-icons prefix">map</i>
                                                                            <textarea id="alamat_pelanggan" name="alamat_pelanggan" class="materialize-textarea validate" placeholder="Masukkan alamat lengkap" required></textarea>
                                                                            <label for="alamat_pelanggan" class="">Alamat pelanggan *</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row margin">
                                                                    <div class="col s12 m6 l6">
                                                                        <div class="input-field">
                                                                            <i class="material-icons prefix">location_on</i>
                                                                            <div class="select-wrapper">
                                                                                <select name="prov_pelanggan" id="provinces" class="browser-default" required>
                                                                                    <option value="0">PILIH PROVINSI</option>
                                                                                    <?php foreach ($provinces as $row) : ?>
                                                                                        <option value="<?= $row->id_provinces; ?>"><?= $row->name_provinces; ?></option>
                                                                                    <?php endforeach; ?>
                                                                                </select>
                                                                            </div>
                                                                            <label for="prov_pelanggan">Provinsi *</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col s12 m6 l6">
                                                                        <div class="input-field">
                                                                            <i class="material-icons prefix">location_on</i>
                                                                            <div class="select-wrapper">
                                                                                <select name="kota_pelanggan" id="regencies" class="browser-default" required>
                                                                                    <option value="0">PILIH KABUPATEN / KOTA</option>
                                                                                </select>
                                                                            </div>
                                                                            <label for="kota_pelanggan">Kabupaten / kota *</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row margin">
                                                                    <div class="col s12 m6 l6">
                                                                        <div class="input-field">
                                                                            <i class="material-icons prefix">location_on</i>
                                                                            <div class="select-wrapper">
                                                                                <select name="kec_pelanggan" id="districts" class="browser-default" required>
                                                                                    <option value="0">PILIH KECAMATAN</option>
                                                                                </select>
                                                                            </div>
                                                                            <label for="kec_pelanggan">Kecamatan *</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col s12 m6 l6">
                                                                        <div class="input-field">
                                                                            <i class="material-icons prefix">location_on</i>
                                                                            <div class="select-wrapper">
                                                                                <select name="kel_pelanggan" id="villages" class="browser-default" required>
                                                                                    <option value="0">PILIH KAB / KOTA</option>
                                                                                </select>
                                                                            </div>
                                                                            <label for="kel_pelanggan">Kelurahan *</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="step-actions">
                                                                    <!-- Here goes your actions buttons -->
                                                                    <button class="btn btn-light previous-step" disabled="">
                                                                        <i class="material-icons left">arrow_back</i>
                                                                        Prev
                                                                    </button>
                                                                    <button class="waves-effect waves dark btn btn-primary next-step" type="submit">
                                                                        Next
                                                                        <i class="material-icons right">arrow_forward</i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="step">
                                                            <div class="step-title waves-effect">Informasi Langganan</div>
                                                            <div class="step-content">
                                                                <!-- Your step content goes here (like inputs or so) -->

                                                                <div class="step-actions">
                                                                    <!-- Here goes your actions buttons -->
                                                                    <!-- Here goes your actions buttons -->
                                                                    <button class="btn btn-light previous-step">
                                                                        <i class="material-icons left">arrow_back</i>
                                                                        Prev
                                                                    </button>
                                                                    <button class="waves-effect waves dark btn btn-primary next-step" type="submit">
                                                                        Submit
                                                                        <i class="material-icons right">arrow_forward</i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </form>


                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- </form> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-overlay"></div>
            </div>

        </div>
    </div>
    <!-- END: Page Main-->

    <script src="<?= base_url('') ?>assets/vendors/sweetalert/sweetalert.min.js"></script>
    <script src="<?= base_url('') ?>assets/js/vendors.min.js"></script>
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="<?= base_url('') ?>assets/vendors/materialize-stepper/materialize-stepper.min.js"></script>

    <script>
        var stepper = document.querySelector('.stepper');
        linearStepperInstace = new MStepper(stepper, {
            firstActive: 0,
            showFeedbackPreloader: !0,
            autoFormCreation: !0,
            stepTitleNavigation: !0,
            feedbackPreloader: '<div class="spinner-layer spinner-blue-only">...</div>',
        });
        linearStepperInstace.resetStepper();

        function validationFunction(e, r) {
            return someValidationPlugin(e), !0;
        }

        function defaultValidationFunction(e, r) {
            for (
                var t = r.querySelectorAll("input, textarea, select"), n = 0; n < t.length; n++
            )
                if (!t[n].checkValidity()) return !1;
            return !0;
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#provinces').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: "<?= site_url('Hublang/get_regencies'); ?>",
                    method: "POST",
                    data: {
                        id: id
                    },
                    async: true,
                    dataType: 'json',
                    success: function(data) {

                        var html1 = '<option value="">PILIH KABUPATEN / KOTA </option>';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html1 += '<option value=' + data[i].id_regencies + '>' + data[i].name_regencies + '</option>';
                        }
                        // console.log(html1);
                        $('#regencies').html(html1);
                    }
                });
                return false;
            });
        });

        $(document).ready(function() {
            $('#regencies').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: "<?php echo site_url('Hublang/get_districts'); ?>",
                    method: "POST",
                    data: {
                        id: id
                    },
                    async: true,
                    dataType: 'json',
                    success: function(data) {

                        var html1 = '<option value="">PILIH KECAMATAN </option>';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html1 += '<option value=' + data[i].id_districts + '>' + data[i].name_districts + '</option>';
                        }
                        $('#districts').html(html1);
                    }
                });
                return false;
            });
        });

        $(document).ready(function() {
            $('#districts').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: "<?php echo site_url('Hublang/get_villages'); ?>",
                    method: "POST",
                    data: {
                        id: id
                    },
                    async: true,
                    dataType: 'json',
                    success: function(data) {

                        var html1 = '<option value="">PILIH KELURAHAN </option>';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html1 += '<option value=' + data[i].id_villages + '>' + data[i].name_villages + '</option>';
                        }
                        $('#villages').html(html1);
                    }
                });
                return false;
            });
        });


        $(document).ready(function() {
            $('#districts1').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: "<?php echo site_url('Hublang/get_villages'); ?>",
                    method: "POST",
                    data: {
                        id: id
                    },
                    async: true,
                    dataType: 'json',
                    success: function(data) {

                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<option value=' + data[i].id_villages + '>' + data[i].name_villages + '</option>';
                        }
                        $('#villages1').html(html);
                    }
                });
                return false;
            });
        });

        $(document).ready(function() {
            $('#pelayanan').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: "<?php echo site_url('Hublang/get_wilayah'); ?>",
                    method: "POST",
                    data: {
                        id: id
                    },
                    async: true,
                    dataType: 'json',
                    success: function(data) {

                        var html = '<option disabled selected > Kode Wilayah </option>';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<option value=' + data[i].kode_wilayah + '>' + data[i].kode_wilayah + ' - ' + data[i].nama_wilayah + '</option>';
                        }
                        $('#wilayah').html(html);
                    }
                });
                return false;
            });
        });

        $(document).ready(function() {
            $('#wilayah').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: "<?php echo site_url('Hublang/get_jalan'); ?>",
                    method: "POST",
                    data: {
                        id: id
                    },
                    async: true,
                    dataType: 'json',
                    success: function(data) {

                        var kd_ply = $('#pelayanan').val();
                        var kd_wly = $('#wilayah').val();
                        var kd_jln = $('#jalan').val();

                        var lgn = kd_ply + '.' + kd_wly + '.' + kd_jln + '.';

                        var html = '<option disabled selected > Kode Jalan </option>';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<option value=' + data[i].kode_jalan + '>' + data[i].kode_jalan + ' - ' + data[i].nama_jalan + '</option>';
                        }
                        $('#jalan').html(html);
                        // $('#langganan').html(lgn);
                    }
                });
                return false;
            });
        });

        // $(document).ready(function() {
        //     $('#jalan').change(function() {

        //         var kd_ply = $('#pelayanan').val();
        //         var kd_wly = $('#wilayah').val();
        //         var kd_jln = $('#jalan').val();

        //         var lgn = kd_ply + '.' + kd_wly + '.' + kd_jln + '.';

        //         $('#langganan').html(lgn);
        //     });

        // });

        $(document).ready(function() {
            // Sembunyikan input Alamat Pasang dan Kec/Kel Pasang saat halaman dimuat
            $('#alamat_pasang, #kec_kel_pasang').show();
            $('#alamat_pasang2, #kec_pasang2, #kel_pasang2').hide();


            // Event handler saat checkbox di-klik
            $('#show').change(function() {
                if ($(this).is(':checked')) {
                    // Jika checkbox dicentang, ambil nilai dari Alamat Pelanggan, Kecamatan, dan Kelurahan Pelanggan
                    var alamatPelanggan = $('#alamat_pelanggan').val();
                    var kecPelanggan = $('#districts').val();
                    var kelPelanggan = $('#villages').val();

                    // Isi input hidden dengan nilai dari Alamat Pelanggan, Kecamatan, dan Kelurahan Pelanggan
                    $('#alamat_pasang2').val(alamatPelanggan);
                    $('#kec_pasang2').val(kecPelanggan);
                    $('#kel_pasang2').val(kelPelanggan);

                    $('#alamat_pasang, #kec_kel_pasang').hide();

                    // Tampilkan input hidden
                    $('#alamat_pasang2, #kec_pasang2, #kel_pasang2').show();
                } else {
                    // Jika checkbox tidak dicentang, kosongkan input hidden dan sembunyikan
                    $('#alamat_pasang2, #kec_pasang2, #kel_pasang2').val('').hide();
                    $('#alamat_pasang, #kec_kel_pasang').show();
                }
            });
        });
    </script>