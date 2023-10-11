<section>
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col s12 offset-m1 m10 l6 offset-l3">
                    <br><br><br>
                    <div class="card z-depth-3 white">
                        <div class="card-content black-text">
                            <span>
                                <h5 class="blue-text text-darken-4"><b>Formulir Data Pelanggan PDAM Purwakarta</b></h5>
                                <br>
                                <h6 class="blue-text text-darken-4"><b>Silahkan masukan data Anda.</b></h6>
                                <br>
                            </span>
                            <?= $this->session->flashdata('message'); ?>
                            <form method="post" action="<?= base_url('pelanggan/formulir'); ?>">
                                <input type="hidden" id="no_pel" name="no_pel" value="<?= $this->session->userdata('no_pel'); ?>">
                                <input type="hidden" id="pelayanan" name="pelayanan" value="<?= $this->session->userdata('pelayanan'); ?>">
                                <input type="hidden" id="wilayah" name="wilayah" value="<?= $this->session->userdata('wilayah'); ?>">
                                <input type="hidden" id="jalan" name="jalan" value="<?= $this->session->userdata('jalan'); ?>">
                                <div class="input-field">
                                    <i class="material-icons prefix">assignment_ind</i>
                                    <input type="text" placeholder="contoh : 0101007123" name="no_pelanggan" id="no_pelanggan" required class="<?= form_error('no_pelanggan')  ? 'validate invalid' : ''; ?> black-text" maxlength="12" minlength="9">
                                    <label for="no_pelanggan">Masukan Kembali Nomor Pelanggan</label>
                                </div>
                                <div class="input-field">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input type="text" placeholder="Nama Pelanggan" name="nama_pel" id="nama_pel" required class="valided black-text">
                                    <label for="nama_pel">Nama Pelanggan</label>
                                </div>
                                <div class="input-field">
                                    <i class="material-icons prefix">home</i>
                                    <input type="text" placeholder="Alamat" name="alamat_pel" id="alamat_pel" required class="valided black-text">
                                    <label for="alamat_pel">Alamat</label>
                                </div>
                                <div class="input-field">
                                    <select name="kec_pel" id="districts1" class="browser-default" required>
                                        <option value="">PILIH KECAMATAN</option>
                                        <?php foreach ($districts2 as $row) : ?>
                                            <option value="<?= $row['id_districts']; ?>"><?= $row['name_districts']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="input-field">
                                    <select class="browser-default" name="kel_pel" id="villages1" required>
                                        <option value="0">PILIH KELURAHAN</option>
                                    </select>
                                </div>
                                <div class="input-field">
                                    <input type="text" name="latlong_pel" id="latlongclicked" value="" required class="black-text">
                                </div>
                                <br>
                                <div class="input-field">
                                    <i class="material-icons prefix">contact_mail</i>
                                    <input type="email" placeholder="Email" name="email_pel" id="email_pel" required class="valided black-text">
                                    <label for="email_pel">Email</label>
                                </div>
                                <div class="input-field">
                                    <i class="material-icons prefix">contact_phone</i>
                                    <input type="text" placeholder="No HP" name="nohp_pel" id="nohp_pel" required class="valided black-text" maxlength="12" minlength="9">
                                    <label for="nohp_pel">No HP</label>
                                </div>

                                <br>
                                <div class="g-recaptcha" data-sitekey="6Lf-cFAoAAAAAFo3px07bd3sNS_UeLTyD_blTx8T" data-theme="light" data-type="image" data-callback=""></div>

                                <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?render=onload&hl=en" async defer></script>

                                <br><br>
                                <button class="btn-large waves-effect waves-light blue darken-4 white-text right" type="submit" name="submit"><i class="material-icons right">arrow_forward</i>
                                    Submit
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
    <div class="section container">
        <div class="row">
            <div class="col s12 center">

                <img src="<?= base_url(); ?>assets/images/logo/logo_gatira.png" width="200">
            </div>
            <div class="col s12 center">


                <p class="white-text">Bagian Perencanaan Pengawasan dan Pengembangan</p>
            </div>
        </div>
    </div>
</section>

<!-- <div id="map"></div> -->
<script src="<?= base_url('') ?>assets/vendors/sweetalert/sweetalert.min.js"></script>
<script src="<?= base_url('') ?>assets/js/vendors.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#districts1').change(function() {
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
</script>

<?php
if (form_error('no_pelanggan') == true) { ?>
    <script>
        $(document).ready(function() {
            swal("Oops!", "Nomor pelanggan tidak sama", "warning");
        });
    </script>
<?php }
