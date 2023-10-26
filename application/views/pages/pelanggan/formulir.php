<section>
    <div class="section">
        <div class="container">
            <div class="row margin">
                <div class="col s12 offset-m1 m10 l6 offset-l3">
                    <br><br><br>
                    <div class="card z-depth-3 white">
                        <div class="card-content black-text">
                            <span>
                                <h5 class="blue-text text-darken-4"><b>Formulir Data Pelanggan PDAM Purwakarta</b></h5>
                                <br>
                                <h6 class="blue-text text-darken-4"><b>Silahkan masukan data anda.</b></h6>
                                <br>
                            </span>
                            <?= $this->session->flashdata('message'); ?>
                            <form method="post" action="<?= base_url('pelanggan/formulir'); ?>" autocomplete="off" id="formulir">

                                <input type="hidden" id="no_pel" name="no_pel" value="<?= $this->session->userdata('no_pelanggan'); ?>">
                                <input type="hidden" id="pelayanan" name="pelayanan" value="<?= $this->session->userdata('pelayanan'); ?>">
                                <input type="hidden" id="wilayah" name="wilayah" value="<?= $this->session->userdata('wilayah'); ?>">
                                <input type="hidden" id="jalan" name="jalan" value="<?= $this->session->userdata('jalan'); ?>">

                                <div class="row margin">
                                    <div class="col s12">
                                        <div class="input-field">
                                            <i class="material-icons prefix">assignment_ind</i>
                                            <input type="number" autofocus placeholder="contoh : 0101007123" name="no_pelanggan" id="no_pelanggan" required class="<?= form_error('no_pelanggan')  ? 'invalid' : ''; ?> black-text" value="">
                                            <label for="no_pelanggan">Masukan Kembali Nomor Pelanggan</label>
                                            <?= form_error('no_pelanggan', '<span class="helper-text red-text">', '</span>'); ?>
                                        </div>
                                    </div>
                                    <div class="col s12">
                                        <div class="input-field">
                                            <i class="material-icons prefix">account_circle</i>
                                            <input type="text" placeholder="Nama Pelanggan" name="nama" id="nama" required class="<?= form_error('nama')  ? 'invalid' : ''; ?> black-text" value="<?= set_value('nama') ?>">
                                            <label for="nama">Nama Pelanggan</label>
                                            <?= form_error('nama', '<span class="helper-text red-text">', '</span>'); ?>
                                        </div>
                                    </div>
                                    <div class="col s12">
                                        <div class="input-field">
                                            <i class="material-icons prefix">home</i>
                                            <input type="text" placeholder="Alamat lengkap" name="alamat_pel" id="alamat_pel" required class="<?= form_error('alamat_pel')  ? 'invalid' : ''; ?> black-text" value="<?= set_value('alamat_pel') ?>">
                                            <label for="alamat_pel">Alamat lengkap</label>
                                            <?= form_error('alamat_pel', '<span class="helper-text red-text">', '</span>'); ?>
                                        </div>
                                    </div>
                                    <div class="col s12">
                                        <div class="input-field">
                                            <select name="kec_pel" id="districts1" class="browser-default" required>
                                                <option value="">PILIH KECAMATAN</option>
                                                <?php foreach ($districts2 as $row) : ?>
                                                    <option value="<?= $row['id_districts']; ?>"><?= $row['name_districts']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col s12">
                                        <div class="input-field">
                                            <select class="browser-default" name="kel_pel" id="villages1" required>
                                                <option value="0">PILIH KELURAHAN</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col s12">
                                        <div class="input-field">
                                            <i class="material-icons prefix">contact_mail</i>
                                            <input type="email" placeholder="Email" name="email" id="email" required class="<?= form_error('email')  ? 'invalid' : ''; ?> black-text" value="<?= set_value('email') ?>">
                                            <label for="email">Email</label>
                                            <?= form_error('email', '<span class="helper-text red-text">', '</span>'); ?>
                                        </div>
                                    </div>
                                    <div class="col s12">
                                        <div class="input-field">
                                            <i class="material-icons prefix">contact_phone</i>
                                            <input type="text" name="telp" id="phone-code" required class="<?= form_error('telp')  ? 'invalid' : ''; ?> black-text" value="<?= set_value('telp') ?>">
                                            <label for="telp">No HP</label>
                                            <?= form_error('telp', '<span class="helper-text red-text">', '</span>'); ?>
                                        </div>
                                    </div>
                                </div>

                                <br>

                                <!-- <div class="row">
                                    <div class="col s12 offset-s1 m12 offset-m2 ">
                                        <div class="g-recaptcha" data-sitekey="6Lf-cFAoAAAAAFo3px07bd3sNS_UeLTyD_blTx8T" data-theme="light" data-type="image" data-callback=""></div>

                                        <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?render=onload&hl=en" async defer></script>
                                    </div>
                                </div> -->

                                <br><br>
                                <button class="btn-large waves-effect waves-light blue darken-4 white-text right btn-submit" type="submit" name="submit"><i class="material-icons right">arrow_forward</i>
                                    Submit
                                </button>
                                <a href="<?= base_url('pelanggan') ?>" class="btn-large waves-effect waves-light blue darken-4 white-text left"><i class="material-icons left">arrow_back</i>
                                    Back
                                </a>

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
<script src="<?= base_url('') ?>assets/vendors/formatter/jquery.formatter.min.js"></script>


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

    $('#phone-code').formatter({
        'pattern': '+62 {{999}}-{{9999}}-{{9999}}',
        'persistent': true
    });
</script>