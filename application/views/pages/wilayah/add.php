    <!-- BEGIN: Page Main-->
    <div id="main">
        <div class="row">

            <div class="col s12">
                <div class="container">
                    <div class="section section-data-tables">
                        <!-- Page Length Options -->
                        <div class="row">
                            <div class="col s12">

                                <div class="card">
                                    <form action="<?= base_url('wilayah/create') ?>" method="post" autocomplete="off">
                                        <div class="card-content">
                                            <h4 class="card-title center-align">ADD DATA WILAYAH</h4>
                                            <div class="divider"></div><br>
                                            <div class="row">
                                                <div class="col s12 m8 offset-m2 l10 offset-l1">
                                                    <div class="row margin">
                                                        <div class="input-field col s12">
                                                            <i class="material-icons prefix">code</i>
                                                            <div class="select-wrapper">
                                                                <select name="cabang" id="cabang" class="browser-default">
                                                                    <option value="" selected disabled>Pilih Cabang</option>
                                                                    <?php foreach ($cabang as $key => $value) { ?>
                                                                        <option value="<?= $value->kode_pelayanan ?>"><?= $value->nama_pelayanan ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <label for="cabang">Cabang *</label>
                                                            <?php echo form_error('cabang', '<span class="helper-text red-text" >', '</span>'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="row margin">
                                                        <div class="input-field col s12">
                                                            <i class="material-icons prefix">code</i>
                                                            <input type="text" name="kode" id="kode" maxlength="2" placeholder="Masukkan Kode wilayah ..." value="" readonly>
                                                            <label for="kode">Kode *</label>
                                                            <?php echo form_error('kode', '<span class="helper-text red-text" >', '</span>'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="row margin">
                                                        <div class="input-field col s12">
                                                            <i class="material-icons prefix">location_city</i>
                                                            <input type="text" name="nama" id="nama" placeholder="Masukkan Nama wilayah ..." value="<?= set_value('nama') ?>">
                                                            <label for="nama">Wilayah *</label>
                                                            <?php echo form_error('nama', '<span class="helper-text red-text" >', '</span>'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-action">
                                            <a href="<?= base_url('wilayah') ?>" class="btn yellow darken-4"><i class="material-icons left">undo</i>Kembali</a>
                                            <button type="submit" class="btn green darken-4"><i class="material-icons right">save</i>Simpan</button>
                                        </div>
                                    </form>
                                </div>

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




    <script>
        $(document).ready(function() {
            $('#cabang').change(function() {
                var kode = $(this).val();
                $.ajax({
                    url: "<?php echo site_url('wilayah/generateKodeOtomatis'); ?>",
                    type: "POST",
                    data: {
                        kode: kode
                    },
                    async: true,
                    dataType: 'json',
                    success: function(data) {
                        $("#kode").val(data.kode_otomatis);
                    }
                });
                return false;
            });

        });
    </script>