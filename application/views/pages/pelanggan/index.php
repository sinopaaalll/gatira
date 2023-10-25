<section>
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col s12 offset-m1 m10 l6 offset-l3">
                    <br><br>
                    <div class="card z-depth-3 white">
                        <div class="card-content black-text">
                            <span>
                                <h5 class="blue-text text-darken-4"><b>Pembaruan Data Pelanggan</b></h5>
                                <h5 class="blue-text text-darken-4"><b>PDAM Purwakarta</b></h5>
                                <br><br>
                            </span>
                            <form method="post" action="<?= base_url('pelanggan'); ?>">
                                <div class="input-field">
                                    <i class="material-icons prefix">assignment_ind</i>
                                    <input id="no_pelanggan" placeholder="Contoh: 0101001015" type="text" maxlength="11" name="no_pelanggan" class="<?= form_error('no_pelanggan')  ? 'validate invalid' : ''; ?>" value="<?= set_value('no_pelanggan') ?>" autofocus>
                                    <label for="no_pelanggan">Cek Nomor Pelanggan</label>
                                    <?= form_error('no_pelanggan', '<span class="helper-text red-text">', '</span>'); ?>
                                </div>
                                <input type="hidden" id="pelayanan" name="pelayanan" value="">
                                <input type="hidden" id="wilayah" name="wilayah" value="">
                                <input type="hidden" id="jalan" name="jalan" value="">
                                <input type="hidden" id="no_urut" name="no_urut" value="">

                                <br>
                                <div class="row">
                                    <div class="col s12 offset-s1 m12 offset-m2 ">
                                        <?= $cap; ?>
                                    </div>
                                </div>


                                <br>
                                <button class="btn-large waves-effect waves-light blue darken-4 white-text right" type="submit" name="submit"><i class="material-icons right">arrow_forward</i>
                                    Lanjut
                                </button>

                            </form>
                            <br><br>

                        </div>
                    </div>
                </div>

            </div>
        </div><!-- container -->
    </div><!-- section -->
</section>

<section>
    <div class="section">
        <div class="row">
            <div class="col s12 center">
                <a href="<?= base_url('auth/login') ?>" class="btn-large waves-effect waves-light blue darken-4"><i class="material-icons right">login</i> Login</a>
            </div>
        </div>
    </div>
</section>


<section>
    <div class="section container">
        <div class="row">
            <div class="col s12 center">
                <a href="<?= base_url('home') ?>">
                    <img src="<?= base_url('assets') ?>/images/logo/logo_gatira.png" alt="Gatira" class="login-img" width="200px">
                </a>
            </div>
            <div class="col s12 center">
                <p class="white-text">Bagian Perencanaan Pengawasan dan Pengembangan</p>
            </div>
        </div>
    </div>
</section>



<script src="<?= base_url('') ?>assets/vendors/sweetalert/sweetalert.min.js"></script>
<script src="<?= base_url('') ?>assets/js/vendors.min.js"></script>

<script>
    // Event handler untuk input 'no_pelanggan'
    $(document).ready(function() {
        $('#no_pelanggan').on('input', function() {
            var noPelanggan = $('#no_pelanggan').val();
            var pelayanan = noPelanggan.substring(0, 2);
            var wilayah = noPelanggan.substring(0, 4);
            var jalan = noPelanggan.substring(0, 7);
            var no_urut = noPelanggan.substring(7, 10);

            $('#pelayanan').val(pelayanan);
            $('#wilayah').val(wilayah);
            $('#jalan').val(jalan);
            $('#no_urut').val(no_urut);
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