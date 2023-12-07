    <!-- BEGIN: Page Main-->
    <div id="main">
        <div class="row">

            <div class="col s12">
                <div class="container">
                    <div class="section section-data-tables">
                        <!-- Page Length Options -->
                        <div class="row">
                            <div class="col s12">

                                <form action="<?= base_url('hublang/edit/') . $pel['id']  ?>" method="post">
                                    <div class="card">
                                        <div class="card-content">
                                            <h4 class="card-title center">Edit Data Pelanggan</h4>
                                            <div class="row margin">
                                                <div class="col s12 m6 offset-m3 l6 offset-l3">
                                                    <div class="input-field">
                                                        <i class="material-icons prefix">assignment</i>
                                                        <input type="hidden" name="kode_pelayanan" id="kode_pelayanan" value="<?= $pel['kode_pelayanan'] ?>">
                                                        <input type="hidden" name="kode_wilayah" id="kode_wilayah" value="<?= $pel['kode_wilayah'] ?>">
                                                        <input type="hidden" name="kode_jalan" id="kode_jalan" value="<?= $pel['kode_jalan'] ?>">
                                                        <input id="no_pelanggan" type="text" name="no_pelanggan" class="validate" value="<?= $pel['no_pelanggan'] ?>" required>
                                                        <label for="no_pelanggan">No. Pelanggan *</label>
                                                        <?= form_error('no_pelanggan', '<span class="helper-text red-text">', '</span>') ?>
                                                    </div>
                                                </div>
                                                <div class="col s12 m6 offset-m3 l6 offset-l3">
                                                    <div class="input-field">
                                                        <i class="material-icons prefix">account_circle</i>
                                                        <input id="nama" type="text" name="nama" class="validate" value="<?= $pel['nama'] ?>" required readonly>
                                                        <label for="nama">Nama Pelanggan *</label>
                                                        <?= form_error('nama', '<span class="helper-text red-text">', '</span>') ?>
                                                    </div>
                                                </div>
                                                <div class="col s12 m6 offset-m3 l6 offset-l3">
                                                    <div class="input-field">
                                                        <i class="material-icons prefix">home</i>
                                                        <input id="alamat_pelanggan" type="text" name="alamat_pelanggan" class="validate" value="<?= $pel['alamat_pelanggan'] ?>" required>
                                                        <label for="alamat_pelanggan">Alamat Pelanggan *</label>
                                                        <?= form_error('alamat_pelanggan', '<span class="helper-text red-text">', '</span>') ?>
                                                    </div>
                                                </div>
                                                <div class="col s12 m6 offset-m3 l6 offset-l3">
                                                    <div class="input-field">
                                                        <i class="material-icons prefix">location_on</i>
                                                        <div class="select-wrapper">
                                                            <select name="kec_pelanggan" id="districts" class="browser-default" required>
                                                                <option value="0" selected disabled>PILIH KECAMATAN</option>
                                                                <?php foreach ($districts as $row) : ?>
                                                                    <option <?= $row->id_districts == $pel['kec_pelanggan'] ? "selected" : "" ?> value="<?= $row->id_districts; ?>"><?= $row->name_districts; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                        <label for="districts">Kecamatan *</label>
                                                        <?= form_error('kec_pelanggan', '<span class="helper-text red-text">', '</span>') ?>
                                                    </div>
                                                </div>
                                                <div class="col s12 m6 offset-m3 l6 offset-l3">
                                                    <div class="input-field">
                                                        <i class="material-icons prefix">location_on</i>
                                                        <div class="select-wrapper">
                                                            <select name="kel_pelanggan" id="villages" class="browser-default" required>
                                                                <option value="0" selected disabled>PILIH KELURAHAN / DESA</option>
                                                            </select>
                                                        </div>
                                                        <label for="villages">Kelurahan / Desa *</label>
                                                        <?= form_error('kel_pelanggan', '<span class="helper-text red-text">', '</span>') ?>
                                                    </div>
                                                </div>
                                                <div class="col s12 m6 offset-m3 l6 offset-l3">
                                                    <div class="input-field">
                                                        <i class="material-icons prefix">contact_mail</i>
                                                        <input id="email" type="email" name="email" class="validate" value="<?= $pel['email'] ?>" required>
                                                        <label for="email">Alamat Pelanggan *</label>
                                                        <?= form_error('email', '<span class="helper-text red-text">', '</span>') ?>
                                                    </div>
                                                </div>
                                                <div class="col s12 m6 offset-m3 l6 offset-l3">
                                                    <div class="input-field">
                                                        <i class="material-icons prefix">contact_phone</i>
                                                        <input id="phone-code" type="text" name="telp" class="validate" value="<?= $pel['telp'] ?>" required>
                                                        <label for="phone-code">Alamat Pelanggan *</label>
                                                        <?= form_error('telp', '<span class="helper-text red-text">', '</span>') ?>
                                                    </div>
                                                </div>
                                                <div class="col s12 m6 offset-m3 l6 offset-l3"><br><br>
                                                    <button type="submit" class="btn-large waves-effect waves-light blue darken-4 white-text right btn-submit"><i class="material-icons right">arrow_forward</i>Update</button>
                                                    <a href="<?= base_url('hublang/data') ?>" class="btn-large waves-effect waves-light blue darken-4 white-text left"><i class="material-icons left">arrow_back</i>
                                                        Back
                                                    </a>
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

            <script src="<?= base_url('') ?>assets/js/vendors.min.js"></script>
            <script src="<?= base_url('') ?>assets/vendors/formatter/jquery.formatter.min.js"></script>


            <script type="text/javascript">
                $(document).ready(function() {
                    $('#districts').change(function() {
                        var id = $(this).val();
                        $.ajax({
                            url: "<?php echo site_url('pelanggan/get_villages1'); ?>",
                            method: "POST",
                            data: {
                                id: id
                            },
                            async: true,
                            dataType: 'json',
                            success: function(data) {

                                var html = '<option value="">PILIH KELURAHAN / DESA</option>';
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

                // value untuk mendapat id_villages jika
                $(document).ready(function() {
                    // Mendapatkan nilai dari elemen #districts saat halaman dimuat
                    var selectedDistrictId = $('#districts').val();

                    // Melakukan pengiriman AJAX saat halaman dimuat
                    $.ajax({
                        url: "<?php echo site_url('pelanggan/get_villages1'); ?>",
                        method: "POST",
                        data: {
                            id: selectedDistrictId
                        },
                        async: true,
                        dataType: 'json',
                        success: function(data) {
                            var html = '<option value="">PILIH KELURAHAN / DESA</option>';
                            var i;
                            for (i = 0; i < data.length; i++) {
                                html += '<option value=' + data[i].id_villages + '>' + data[i].name_villages + '</option>';
                            }
                            $('#villages').html(html);

                            // Menerapkan nilai terpilih pada elemen #villages berdasarkan id_districts yang dipilih
                            var selectedVillageId = <?php echo $pel['kel_pelanggan']; ?>;
                            $('#villages').val(selectedVillageId);
                        }
                    });
                });

                $(document).ready(function() {
                    $('#no_pelanggan').on('input', function() {
                        var noPelanggan = $('#no_pelanggan').val();
                        var pelayanan = noPelanggan.substring(0, 2);
                        var wilayah = noPelanggan.substring(0, 4);
                        var jalan = noPelanggan.substring(0, 7);
                        var no_urut = noPelanggan.substring(7, 10);

                        $('#kode_pelayanan').val(pelayanan);
                        $('#kode_wilayah').val(wilayah);
                        $('#kode_jalan').val(jalan);
                    });
                });


                $('#phone-code').formatter({
                    'pattern': '+62 {{999}}-{{9999}}-{{9999}}',
                    'persistent': true
                });
            </script>