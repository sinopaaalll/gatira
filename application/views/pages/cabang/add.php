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
                                    <form action="<?= base_url('cabang/create') ?>" method="post" autocomplete="off">
                                        <div class="card-content">
                                            <h4 class="card-title center-align">ADD DATA CABANG</h4>
                                            <div class="divider"></div><br>
                                            <div class="row">
                                                <div class="col s12 m8 offset-m2 l10 offset-l1">
                                                    <div class="row margin">
                                                        <div class="input-field col s12">
                                                            <i class="material-icons prefix">code</i>
                                                            <input type="text" name="kode" id="kode" maxlength="2" placeholder="Masukkan Kode Cabang ..." value="" readonly>
                                                            <label for="kode">Kode *</label>
                                                            <?php echo form_error('kode', '<span class="helper-text red-text" >', '</span>'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="row margin">
                                                        <div class="input-field col s12">
                                                            <i class="material-icons prefix">location_city</i>
                                                            <input type="text" name="nama" id="nama" placeholder="Masukkan Nama Cabang ..." value="<?= set_value('nama') ?>">
                                                            <label for="nama">Cabang *</label>
                                                            <?php echo form_error('nama', '<span class="helper-text red-text" >', '</span>'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-action">
                                            <a href="<?= base_url('cabang') ?>" class="btn yellow darken-4 modal-trigger"><i class="material-icons left">undo</i>Kembali</a>
                                            <button type="submit" class="btn green darken-4 modal-trigger"><i class="material-icons right">save</i>Simpan</button>
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
            // Menggunakan AJAX untuk mengambil kode otomatis dari server
            $.ajax({
                url: "<?php echo site_url('cabang/generateKodeOtomatis'); ?>",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    // Mengisi nilai input "kode" dengan kode otomatis yang diambil
                    $("#kode").val(data.kode_otomatis);
                }
            });
        });
    </script>