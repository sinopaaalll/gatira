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
                                        <h4 class="card-title ">Form Updating Pelanggan</h4>
                                        <div class="row">
                                            <div class="col s12 m12 l12">
                                                <form method="post" action="<?= base_url('hublang/proses') ?>" autocomplete="off">
                                                    <ul class="stepper linier">

                                                        <li class="step active">
                                                            <div class="step-title waves-effect">Data Pelanggan</div>
                                                            <div class="step-content">
                                                                <!-- Your step content goes here (like inputs or so) -->
                                                                <div class="row margin">
                                                                    <div class="col s12 m6 l6">
                                                                        <div class="input-field">
                                                                            <i class="material-icons prefix">date_range</i>
                                                                            <input id="tgl_daftar" type="date" name="tgl_daftar" class="validate">
                                                                            <label for="tgl_daftar">Tanggal daftar <small>( Tidak wajib )</small> </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col s12 m6 l6">
                                                                        <div class="input-field">
                                                                            <i class="material-icons prefix">assignment_ind</i>
                                                                            <input type="hidden" id="pelayanan" name="pelayanan" value="<?= $this->session->userdata('pelayanan'); ?>">
                                                                            <input type="hidden" id="wilayah" name="wilayah" value="<?= $this->session->userdata('wilayah'); ?>">
                                                                            <input type="hidden" id="jalan" name="jalan" value="<?= $this->session->userdata('jalan'); ?>">
                                                                            <input id="no_pelanggan" type="hidden" maxlength="11" name="no_pelanggan" required value="<?= $this->session->userdata('no_pelanggan'); ?>" placeholder="Masukkan kembali nomor pelanggan" class="validate">
                                                                            <input type="text" value="<?= $this->session->userdata('no_pelanggan'); ?>" disabled>
                                                                            <label for="">Nomor pelanggan *</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row margin">
                                                                    <div class="col s12 m6 l6">
                                                                        <div class="input-field">
                                                                            <i class="material-icons prefix">assignment_ind</i>
                                                                            <input id="no_plat" type="number" name="no_plat" class="validate" value="" placeholder="Masukkan nomor plat" required autofocus>
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
                                                                                    <option value="0">PILIH KELURAHAN</option>
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
                                                                <div class="row margin">
                                                                    <div class="col s12 m4 l4">
                                                                        <div class="input-field">
                                                                            <i class="material-icons prefix">local_offer</i>
                                                                            <div class="select-wrapper">
                                                                                <select tabindex="-1" name="jenis_langganan" class="browser-default validate" required>
                                                                                    <option value="">PILIH JENIS</option>
                                                                                    <?php foreach ($jenis as $j) : ?>
                                                                                        <option value="<?= $j->id ?>" <?= set_value('jenis_langganan') == $j->id ? 'selected' : '' ?>> <?= $j->nama_jenis ?> </option>
                                                                                    <?php endforeach; ?>
                                                                                </select>
                                                                            </div>
                                                                            <label for="jenis_langganan">Jenis langganan </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col s12 m4 l4">
                                                                        <div class="input-field">
                                                                            <i class="material-icons prefix">people</i>
                                                                            <input id="jml_jiwa" type="number" name="jml_jiwa" placeholder="Masukkan jumlah jiwa" value="0">
                                                                            <label for="jml_jiwa">Jumlah Jiwa <small>( Tidak wajib )</small></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col s12 m4 l4">
                                                                        <div class="input-field">
                                                                            <i class="material-icons prefix">local_offer</i>
                                                                            <div class="select-wrapper">
                                                                                <select tabindex="-1" name="status" id="status" class="browser-default">
                                                                                    <option value="" disabled="" selected="">PILIH STATUS</option>
                                                                                    <option value="1">Aktif</option>
                                                                                    <option value="2">Segel</option>
                                                                                    <option value="3">Bongkar</option>
                                                                                </select>
                                                                            </div>
                                                                            <label for="status">Status <small>(Tidak wajib)</small></label>

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="step-actions">
                                                                    <!-- Here goes your actions buttons -->
                                                                    <!-- Here goes your actions buttons -->
                                                                    <button class="btn btn-light previous-step">
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
                                                            <div class="step-title waves-effect">Surat Permohonan Langganan</div>
                                                            <div class="step-content">
                                                                <!-- Your step content goes here (like inputs or so) -->
                                                                <div class="row margin">
                                                                    <div class="col s12 m6 l6">
                                                                        <div class="input-field">
                                                                            <i class="material-icons prefix">assignment_ind</i>
                                                                            <input id="no_spl" type="number" name="no_spl" placeholder="Masukkan nomor spl" class="validate" value="<?= set_value('no_spl') ?>" required>
                                                                            <label for="no_spl">Nomor SPL *</label>
                                                                        </div><br>
                                                                    </div>
                                                                    <div class="col s12 m6 l6">
                                                                        <div class="input-field">
                                                                            <i class="material-icons prefix">local_offer</i>
                                                                            <div class="select-wrapper">
                                                                                <select tabindex="-1" name="ket_spl" class="browser-default" required>
                                                                                    <option value="">PILIH KETERANGAN</option>
                                                                                    <?php foreach ($ket_spl as $k) { ?>
                                                                                        <option value="<?= $k->id ?>" <?= set_value('ket_spl') == $k->id ? 'selected' : '' ?>><?= $k->nama_status ?></option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                            </div>
                                                                            <label for="ket_spl">Keterangan SPL *</label>
                                                                        </div><br>
                                                                    </div>
                                                                </div>

                                                                <div class="step-actions">
                                                                    <!-- Here goes your actions buttons -->
                                                                    <button class="btn btn-light previous-step">
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
                                                            <div class="step-title waves-effect">Data Pasang</div>
                                                            <div class="step-content">
                                                                <!-- Your step content goes here (like inputs or so) -->
                                                                <div class="row margin">
                                                                    <div class="col s12 m6 l6">
                                                                        <div class="input-field">
                                                                            <i class="material-icons prefix">date_range</i>
                                                                            <input id="tgl_pasang" type="date" name="tgl_pasang" class="validate" value="<?= set_value('tgl_pasang') ?>" required>
                                                                            <label for="tgl_pasang">Tanggal Pasang*</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col s12 m6 l6">
                                                                        <div class="input-field">
                                                                            <i class="material-icons prefix">assignment_ind</i>
                                                                            <input id="no_meter" type="number" name="no_meter" placeholder="Masukkan nomor meter" class="validate " value="<?= set_value('no_meter') ?>" required>
                                                                            <label for="no_meter">Nomor Meter*</label>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <div class="row margin">
                                                                    <div class="col s12 m6 l6">
                                                                        <div class="input-field">
                                                                            <i class="material-icons prefix">date_range</i>
                                                                            <input id="tgl_bayar" type="date" name="tgl_bayar" class="validate" value="<?= set_value('tgl_bayar') ?>" required>
                                                                            <label for="tgl_bayar">Tanggal bayar *</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col s12 m6 l6">
                                                                        <div class="input-field">
                                                                            <i class="material-icons prefix">account_balance_wallet</i>
                                                                            <input id="biaya_pasang" type="number" name="biaya_pasang" placeholder="Masukkan biaya pasang" class="validate" value="<?= set_value('biaya_pasang') ?>">
                                                                            <label for="biaya_pasang">Biaya Pasang <small>( Tidak wajib )</small></label>
                                                                            <span id="biaya_pasang_text" class="right"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row margin">
                                                                    <div class="col s12 m12 l12 mt-1">
                                                                        <p>
                                                                            <label>
                                                                                <input type="checkbox" id="show" name="show" />
                                                                                <span>
                                                                                    *Jika alamat pasang sama dengan alamat pelanggan maka <span class="material-icons prefix">checked</span>
                                                                                </span>
                                                                            </label>
                                                                        </p>
                                                                    </div>
                                                                </div><br>
                                                                <!-- Input Alamat Pasang (Hidden) -->
                                                                <input type="hidden" id="alamat_pasang2" name="alamat_pasang2" value="" required>
                                                                <input type="hidden" id="kec_pasang2" name="kec_pasang2" value="" required>
                                                                <input type="hidden" id="kel_pasang2" name="kel_pasang2" value="" required>

                                                                <div class="row margin">
                                                                    <div class="col s12">
                                                                        <div class="input-field" id="alamat_pasang">
                                                                            <i class="material-icons prefix">map</i>
                                                                            <textarea id="alamat_pasang" name="alamat_pasang" class="materialize-textarea validate" placeholder="Masukkan alamat pasang" required></textarea>
                                                                            <label for="alamat_pasang" class="">Alamat Pasang *</label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row margin" id="kec_kel_pasang">
                                                                    <div class="col s12 m6 l6">
                                                                        <div class="input-field">
                                                                            <i class="material-icons prefix">location_on</i>
                                                                            <div class="select-wrapper">
                                                                                <select tabindex="-1" name="kec_pasang" id="districts1" class="browser-default" required>
                                                                                    <option value="">PILIH KECAMATAN</option>
                                                                                    <?php foreach ($districts2 as $row) : ?>
                                                                                        <option value="<?= $row['id_districts']; ?>"><?= $row['name_districts']; ?></option>
                                                                                    <?php endforeach; ?>
                                                                                </select>
                                                                            </div>
                                                                            <label for="kec_pasang">Kecamatan *</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col s12 m6 l6">
                                                                        <div class="input-field">
                                                                            <i class="material-icons prefix">location_on</i>
                                                                            <div class="select-wrapper">
                                                                                <select tabindex="-1" name="kel_pasang" id="villages1" class="browser-default" required>
                                                                                    <option value="">PILIH KELURAHAN</option>
                                                                                </select>
                                                                            </div>
                                                                            <label for="kel_pasang">Kelurahan *</label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="step-actions">
                                                                    <!-- Here goes your actions buttons -->
                                                                    <button class="btn btn-light previous-step">
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
                                                            <div class="step-title waves-effect">Informasi Lainnya</div>
                                                            <div class="step-content">
                                                                <!-- Your step content goes here (like inputs or so) -->
                                                                <div class="row margin">
                                                                    <div class="col s12 m4 l4">
                                                                        <div class="input-field">
                                                                            <i class="material-icons prefix">location_searching</i>
                                                                            <input type="number" name="luas_tanah" placeholder="Masukkan luas tanah">
                                                                            <label for="luas_tanah">Luas Tanah Pasang <small>( Tidak wajib )</small></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col s12 m4 l4">
                                                                        <div class="input-field">
                                                                            <i class="material-icons prefix">flash_on</i>
                                                                            <div class="select-wrapper">
                                                                                <select tabindex="-1" name="daya_listrik" class="browser-defalut">
                                                                                    <option value="0" disabled="" selected="">Daya Listrik</option>
                                                                                    <option value="450">450 W</option>
                                                                                    <option value="900">900 W</option>
                                                                                    <option value="1300">1300 W</option>
                                                                                    <option value="2200">2200 W</option>
                                                                                </select>
                                                                            </div>
                                                                            <label for="daya_listrik">Daya Listrik <small>( Tidak wajib)</small></label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="step-actions">
                                                                    <!-- Here goes your actions buttons -->
                                                                    <button class="btn btn-light previous-step">
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
                                                            <div class="step-title waves-effect">Submit</div>
                                                            <div class="step-content">
                                                                <!-- Your step content goes here (like inputs or so) -->
                                                                <p>Silahkan submit!</p>
                                                                <div class="step-actions">
                                                                    <!-- Here goes your actions buttons -->
                                                                    <button class="btn btn-light previous-step">
                                                                        <i class="material-icons left">arrow_back</i>
                                                                        Prev
                                                                    </button>
                                                                    <button class="waves-effect waves dark btn green darken-4" type="submit">
                                                                        Sumbit
                                                                        <i class="material-icons right">send</i>
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

                        var html = '<option value="">PILIH KELURAHAN </option>';
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
            // Sembunyikan input Alamat Pasang dan Kec/Kel Pasang saat halaman dimuat
            $('#alamat_pasang, #kec_kel_pasang').show();
            $('#alamat_pasang2, #kec_pasang2, #kel_pasang2').hide().prop('disabled', true);


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
                    $('#alamat_pasang, #districts1, #villages1').prop('disabled', true);

                    // Tampilkan input hidden
                    $('#alamat_pasang2, #kec_pasang2, #kel_pasang2').show().prop('disabled', false);
                } else {
                    // Jika checkbox tidak dicentang, kosongkan input hidden dan sembunyikan
                    $('#alamat_pasang2, #kec_pasang2, #kel_pasang2').val('').hide().prop('disabled', true);
                    $('#alamat_pasang, #districts1, #villages1').prop('disabled', false);
                    $('#alamat_pasang, #kec_kel_pasang').show();
                }
            });
        });

        $(document).ready(function() {
            // Pilih elemen dengan ID 'biaya_pasang'
            $('#biaya_pasang').on('input', function() {
                // Ambil nilai dari input biaya_pasang
                var biayaPasang = $(this).val();

                // Format nilai biayaPasang menjadi format Rupiah
                var formattedBiayaPasang = formatRupiah(biayaPasang);

                // Update label dengan nilai yang diformat
                $('#biaya_pasang_text').html('<b><i>' + formattedBiayaPasang + '</i></b>');
            });

            // Fungsi untuk mengubah angka menjadi format Rupiah
            function formatRupiah(angka) {
                var reverse = angka.toString().split('').reverse().join('');
                var ribuan = reverse.match(/\d{1,3}/g);
                var formatted = ribuan.join('.').split('').reverse().join('');
                return 'Rp. ' + formatted;
            }
        });
    </script>