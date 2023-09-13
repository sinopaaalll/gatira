    <!-- BEGIN: Page Main-->
    <div id="main">
        <div class="row">
            <div id="breadcrumbs-wrapper" data-image="<?= base_url('') ?>assets/images/gallery/breadcrumb-bg.jpg">
                <!-- Search for small screen-->
                <div class="container">
                    <div class="row">
                        <div class="col s12 m6 l6">
                            <h5 class="breadcrumbs-title mt-0 mb-0"><span>Entry Data</span></h5>
                        </div>
                        <div class="col s12 m6 l6 right-align-md">
                            <ol class="breadcrumbs mb-0">
                                <li class="breadcrumb-item"><a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Entry Data
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col s12">
                <div class="container">
                    <div class="section section-data-tables">
                        <form action="<?= base_url('hublang/entry') ?>" method="POST">
                            <!-- Page Length Options -->
                            <div class="row">
                                <div class="col s12">

                                    <div class="card">
                                        <div class="card-content">
                                            <h4 class="card-title center-align">DATA PELANGGAN</h4>
                                            <div class="divider"></div><br>

                                            <div class="row">
                                                <div class="col s12 m8 offset-m2 l10 offset-l1">
                                                    <div class="input-field">
                                                        <i class="material-icons prefix">assignment_ind</i>
                                                        <input type="hidden" id="pelayanan" name="pelayanan" value="<?= $this->session->userdata('pelayanan') ?>" placeholder="Input Kembali Nomor Pelanggan">
                                                        <input type="hidden" id="wilayah" name="wilayah" value="<?= $this->session->userdata('wilayah') ?>">
                                                        <input type="hidden" id="jalan" name="jalan" value="<?= $this->session->userdata('jalan') ?>">
                                                        <input id="no_pelanggan" type="text" maxlength="10" name="no_pelanggan" required readonly value="<?= $this->session->userdata('no_pelanggan') ?>">
                                                        <label for="no_pelanggan" class="active">Nomor pelanggan *</label>
                                                        <?= form_error('no_pelanggan', '<span class="helper-text red-text">', '</span>'); ?>
                                                    </div><br>
                                                    <div class="input-field">
                                                        <i class="material-icons prefix">date_range</i>
                                                        <input id="tgl_daftar" type="date" name="tgl_daftar">
                                                        <label for="tgl_daftar">Tanggal daftar <small>(Tidak wajib di isi)</small> </label>
                                                    </div><br>
                                                    <div class="input-field">
                                                        <i class="material-icons prefix">assignment_ind</i>
                                                        <input id="no_plat" type="number" name="no_plat" class="<?= form_error('no_plat')  ? 'validate invalid' : ''; ?>" value="<?= set_value('no_plat') ?>" placeholder="Masukkan nomor plat">
                                                        <label for="no_plat">Nomor plat * </label>
                                                        <?= form_error('no_plat', '<span class="helper-text red-text">', '</span>'); ?>
                                                    </div><br>
                                                    <div class="input-field">
                                                        <i class="material-icons prefix">account_circle</i>
                                                        <input id="nama_pelanggan" type="text" name="nama_pelanggan" placeholder="Masukkan nama lengkap" class="<?= form_error('nama_pelanggan')  ? 'validate invalid' : ''; ?>" value="<?= set_value('nama_pelanggan') ?>">
                                                        <label for="nama_pelanggan">Nama pelanggan *</label>
                                                        <?= form_error('nama_pelanggan', '<span class="helper-text red-text">', '</span>'); ?>
                                                    </div><br>
                                                    <div class="input-field">
                                                        <i class="material-icons prefix">email</i>
                                                        <input id="email_pelanggan" type="email" name="email_pelanggan" placeholder="Masukkan email valid" class="<?= form_error('email_pelanggan')  ? 'validate invalid' : ''; ?>" value="<?= set_value('email_pelanggan') ?>">
                                                        <label for="email_pelanggan">Email pelanggan <small>( Tidak Wajib )</small></label>
                                                        <?= form_error('email_pelanggan', '<span class="helper-text red-text">', '</span>'); ?>
                                                    </div><br>
                                                    <div class="input-field">
                                                        <i class="material-icons prefix">local_phone</i>
                                                        <input id="telp_pelanggan" type="number" name="telp_pelanggan" placeholder="Masukkan nomor telepon valid" class="<?= form_error('telp_pelanggan')  ? 'validate invalid' : ''; ?>" value="<?= set_value('telp_pelanggan') ?>">
                                                        <label for="telp_pelanggan">Nomor hp pelanggan <small>( Tidak wajib )</small></label>
                                                        <?= form_error('telp_pelanggan', '<span class="helper-text red-text">', '</span>'); ?>
                                                    </div><br>

                                                    <div class="input-field">
                                                        <i class="material-icons prefix">map</i>
                                                        <textarea id="alamat_pelanggan" name="alamat_pelanggan" class="materialize-textarea" placeholder="Masukkan alamat" class="<?= form_error('alamat_pelanggan')  ? 'validate invalid' : ''; ?>"><?= set_value('alamat_pelanggan') ?></textarea>
                                                        <label for="alamat_pelanggan" class="">Alamat pelanggan *</label>
                                                        <?= form_error('alamat_pelanggan', '<span class="helper-text red-text">', '</span>'); ?>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col s12 m6 l6">
                                                            <div class="input-field">
                                                                <i class="material-icons prefix">location_on</i>
                                                                <div class="select-wrapper">
                                                                    <select tabindex="-1" name="prov_pelanggan" id="provinces" class="browser-default">
                                                                        <option value="0" disabled selected>Provinsi</option>
                                                                        <?php foreach ($provinces as $row) : ?>
                                                                            <option value="<?= $row->id_provinces; ?>"><?= $row->name_provinces; ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>
                                                                <label for="prov_pelanggan">Provinsi *</label>
                                                                <?= form_error('prov_pelanggan', '<span class="helper-text red-text">', '</span>'); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col s12 m6 l6">
                                                            <div class="input-field">
                                                                <i class="material-icons prefix">location_on</i>
                                                                <div class="select-wrapper">
                                                                    <select tabindex="-1" name="kota_pelanggan" id="regencies" class="browser-default">
                                                                        <option value="">Kabupaten / Kota</option>
                                                                    </select>
                                                                </div>
                                                                <label for="regencies">Kabupaten / Kota *</label>
                                                                <?= form_error('kota_pelanggan', '<span class="helper-text red-text">', '</span>'); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col s12 m6 l6">
                                                            <div class="input-field">
                                                                <i class="material-icons prefix">location_on</i>
                                                                <div class="select-wrapper">
                                                                    <select tabindex="-1" name="kec_pelanggan" id="districts" class="browser-default">
                                                                        <option value="">Kecamatan</option>
                                                                    </select>
                                                                </div>
                                                                <label for="kec_pelanggan">Kecamatan *</label>
                                                                <?= form_error('kec_pelanggan', '<span class="helper-text red-text">', '</span>'); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col s12 m6 l6">
                                                            <div class="input-field">
                                                                <i class="material-icons prefix">location_on</i>
                                                                <div class="select-wrapper">
                                                                    <select tabindex="-1" name="kel_pelanggan" id="villages" class="browser-default">
                                                                        <option value="">Kelurahan</option>
                                                                    </select>
                                                                </div>
                                                                <label for="kel_pelanggan">Kelurahan *</label>
                                                                <?= form_error('kel_pelanggan', '<span class="helper-text red-text">', '</span>'); ?>
                                                            </div>
                                                        </div>
                                                    </div><br>

                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-content">
                                            <h4 class="card-title center-align">INFORMASI LANGGANAN</h4>
                                            <div class="divider"></div><br>
                                            <div class="row">
                                                <div class="col s12 m8 offset-m2 l10 offset-l1">
                                                    <div class="input-field">
                                                        <i class="material-icons prefix">local_offer</i>
                                                        <div class="select-wrapper">
                                                            <select tabindex="-1" name="jenis_langganan" class="">
                                                                <option value="" disabled="" selected="">Jenis Langganan</option>
                                                                <?php foreach ($jenis as $j) : ?>
                                                                    <option value="<?= $j->id ?>" <?= set_value('jenis_langganan') == $j->id ? 'selected' : '' ?>> <?= $j->nama_jenis ?> </option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                        <label for="jenis_langganan">Jenis Langganan *</label>
                                                        <?= form_error('jenis_langganan', '<span class="helper-text red-text">', '</span>'); ?>
                                                    </div><br>
                                                    <div class="input-field">
                                                        <i class="material-icons prefix">people</i>
                                                        <input id="jml_jiwa" type="number" name="jml_jiwa" placeholder="Masukkan jumlah jiwa" value="0">
                                                        <label for="jml_jiwa">Jumlah Jiwa <small>( Tidak wajib )</small></label>
                                                    </div><br>
                                                    <div class="input-field">
                                                        <i class="material-icons prefix">local_offer</i>
                                                        <div class="select-wrapper">
                                                            <select tabindex="-1" name="status" class="">
                                                                <option value="" disabled="" selected="">Status</option>
                                                                <option value="1">Aktif</option>
                                                                <option value="2">Segel</option>
                                                                <option value="3">Bongkar</option>
                                                            </select>
                                                        </div>
                                                        <!-- <input id="ket_spl" type="text" name="ket_spl" > -->
                                                        <label for="status">Status </label>
                                                        <?= form_error('status', '<span class="helper-text red-text">', '</span>'); ?>
                                                    </div><br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-content">
                                            <h4 class="card-title center-align">DATA PASANG</h4>
                                            <div class="divider"></div><br>

                                            <div class="row">
                                                <div class="col s12 m8 offset-m2 l10 offset-l1">
                                                    <div class="input-field">
                                                        <i class="material-icons prefix">date_range</i>
                                                        <input id="tgl_pasang" type="date" name="tgl_pasang" class="<?= form_error('tgl_pasang')  ? 'validate invalid' : ''; ?>" value="<?= set_value('tgl_pasang') ?>">
                                                        <label for="tgl_pasang">Tanggal Pasang*</label>
                                                        <?= form_error('tgl_pasang', '<span class="helper-text red-text">', '</span>'); ?>
                                                    </div><br>
                                                    <div class="input-field">
                                                        <i class="material-icons prefix">assignment_ind</i>
                                                        <input id="no_meter" type="number" name="no_meter" placeholder="Masukkan nomor meter" class="<?= form_error('no_meter')  ? 'validate invalid' : ''; ?>" value="<?= set_value('no_meter') ?>">
                                                        <label for="no_meter">Nomor Meter*</label>
                                                        <?= form_error('no_meter', '<span class="helper-text red-text">', '</span>'); ?>
                                                    </div><br>
                                                    <div class="input-field">
                                                        <i class="material-icons prefix">account_balance_wallet</i>
                                                        <input id="biaya_pasang" type="number" name="biaya_pasang" placeholder="Masukkan biaya pasang" class="<?= form_error('biaya_pasang')  ? 'validate invalid' : ''; ?>" value="<?= set_value('biaya_pasang') ?>">
                                                        <label for="biaya_pasang">Biaya Pasang*</label>
                                                        <?= form_error('biaya_pasang', '<span class="helper-text red-text">', '</span>'); ?>
                                                    </div>
                                                    <div class="divider"></div>
                                                    <div class="row">
                                                        <div class="col s12 m12 l12  mt-1">
                                                            <p>
                                                                <label>
                                                                    <input type="checkbox" id="show" name="show" />
                                                                    <span>
                                                                        <small>* Alamat pasang sama dengan alamat pelanggan</small>
                                                                    </span>
                                                                </label>
                                                            </p>
                                                        </div>
                                                    </div><br>

                                                    <!-- Input Alamat Pasang (Hidden) -->
                                                    <input type="hidden" id="alamat_pasang2" name="alamat_pasang2" value="">
                                                    <input type="hidden" id="kec_pasang2" name="kec_pasang2" value="">
                                                    <input type="hidden" id="kel_pasang2" name="kel_pasang2" value="">

                                                    <div class="input-field" id="alamat_pasang">
                                                        <i class="material-icons prefix">map</i>
                                                        <textarea id="alamat_pasang" name="alamat_pasang" class="materialize-textarea" placeholder="Masukkan alamat pasang"></textarea>
                                                        <label for="alamat_pasang" class="">Alamat Pasang *</label>
                                                    </div>

                                                    <div class="row" id="kec_kel_pasang">
                                                        <div class="col s12 m6 l6">
                                                            <div class="input-field">
                                                                <i class="material-icons prefix">location_on</i>
                                                                <div class="select-wrapper">
                                                                    <select tabindex="-1" name="kec_pasang" id="districts1" class="browser-default">
                                                                        <option value="0" disabled selected>Kecamatan</option>
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
                                                                    <select tabindex="-1" name="kel_pasang" id="villages1" class="browser-default">
                                                                        <option value="0">Kelurahan</option>
                                                                    </select>
                                                                </div>
                                                                <label for="kel_pasang">Kelurahan *</label>
                                                            </div>
                                                        </div>
                                                    </div><br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-content">
                                            <h4 class="card-title center-align">SURAT PERMOHONAN LANGGANAN</h4>
                                            <div class="divider"></div><br>
                                            <div class="row">
                                                <div class="col s12 m8 offset-m2 l10 offset-l1">
                                                    <div class="input-field">
                                                        <i class="material-icons prefix">assignment_ind</i>
                                                        <input id="no_spl" type="number" name="no_spl" placeholder="Masukkan nomor spl" class="<?= form_error('no_spl')  ? 'validate invalid' : ''; ?>" value="<?= set_value('no_spl') ?>">
                                                        <label for="no_spl">Nomor SPL *</label>
                                                        <?= form_error('no_spl', '<span class="helper-text red-text">', '</span>'); ?>
                                                    </div><br>
                                                    <div class="input-field">
                                                        <i class="material-icons prefix">local_offer</i>
                                                        <div class="select-wrapper">
                                                            <select tabindex="-1" name="ket_spl" class="">
                                                                <option value="0" disabled="" selected="">Keterangan SPL</option>
                                                                <?php foreach ($ket_spl as $k) { ?>
                                                                    <option value="<?= $k->id ?>" <?= set_value('ket_spl') == $k->id ? 'selected' : '' ?>><?= $k->nama_status ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <!-- <input id="ket_spl" type="text" name="ket_spl" > -->
                                                        <label for="ket_spl">Keterangan SPL *</label>
                                                        <?= form_error('ket_spl', '<span class="helper-text red-text">', '</span>'); ?>
                                                    </div><br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-content">
                                            <h4 class="card-title center-align">INFORMASI LAINNYA</h4>
                                            <div class="divider"></div><br>
                                            <div class="row">
                                                <div class="col s12 m8 offset-m2 l10 offset-l1">
                                                    <!-- <div class="input-field">
                                                        <i class="material-icons prefix">date_range</i>
                                                        <input id="tgl_bayar" type="date" name="tgl_bayar">
                                                        <label for="tgl_bayar">Tanggal Bayar</label>
                                                    </div><br> -->
                                                    <div class="input-field">
                                                        <i class="material-icons prefix">account_balance_wallet</i>
                                                        <input id="no_rek" type="number" name="no_rek" placeholder="Masukkan nomor rekening" class="<?= form_error('no_rek')  ? 'validate invalid' : ''; ?>" value="<?= set_value('no_rek') ?>">
                                                        <label for="no_rek">Nomor Rekening Terdekat</label>
                                                        <?= form_error('no_rek', '<span class="helper-text red-text">', '</span>'); ?>
                                                    </div><br>
                                                    <div class="input-field">
                                                        <i class="material-icons prefix">location_searching</i>
                                                        <input type="number" name="luas_tanah" placeholder="Masukkan luas tanah">
                                                        <label for="luas_tanah">Luas Tanah Pasang</label>
                                                    </div><br>
                                                    <div class="input-field">
                                                        <i class="material-icons prefix">flash_on</i>
                                                        <div class="select-wrapper">
                                                            <select tabindex="-1" name="daya_listrik" class="">
                                                                <option value="0" disabled="" selected="">Daya Listrik</option>
                                                                <option value="450">450 W</option>
                                                                <option value="900">900 W</option>
                                                                <option value="1300">1300 W</option>
                                                                <option value="2200">2200 W</option>
                                                            </select>
                                                        </div>
                                                        <label for="daya_listrik">Daya Listrik</label>
                                                    </div><br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col s6 left-align">
                                            <a href="<?= base_url('hublang') ?>" class="btn-large waves-effect waves-light green"> KEMBALI
                                                <i class="material-icons left">undo</i>
                                            </a>
                                        </div>
                                        <div class="col s6 right-align">
                                            <button class="btn-large waves-effect waves-light blue" type="submit" name="action">SUBMIT
                                                <i class="material-icons right">send</i>
                                            </button> <br><br>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="content-overlay"></div>
            </div>

        </div>
    </div>
    <!-- END: Page Main-->

    <script src="<?= base_url('') ?>assets/vendors/sweetalert/sweetalert.min.js"></script>
    <script src="<?= base_url('') ?>assets/js/vendors.min.js"></script>

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

                        var html1 = '';
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

                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<option value=' + data[i].id_districts + '>' + data[i].name_districts + '</option>';
                        }
                        $('#districts').html(html);
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

                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<option value=' + data[i].id_villages + '>' + data[i].name_villages + '</option>';
                        }
                        $('#villages').html(html);
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

    <?php
    if ($this->session->flashdata('success')) { ?>
        <script>
            var successMessage = <?php echo json_encode($this->session->flashdata('success')); ?>;
            $(document).ready(function() {
                swal("Good Job!", successMessage, "success");
            });
        </script>
    <?php } else if ($this->session->flashdata('warning')) { ?>
        <script>
            var warningMessage = <?php echo json_encode($this->session->flashdata('warning')); ?>;
            $(document).ready(function() {

                swal("Oops!", warningMessage, "warning");
            });
        </script>
    <?php } ?>