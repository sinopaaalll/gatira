    <!-- BEGIN: Page Main-->
    <div id="main">
        <div class="row">

            <div class="col s12">
                <div class="container">
                    <div class="section section-data-tables">
                        <!-- Page Length Options -->
                        <div class="row">
                            <div class="col s12 offset-m2 m8 offset-l3 l6">


                                <form action="<?= base_url('hublang') ?>" method="post" autocomplete="off">
                                    <div class="card">
                                        <div class="card-content">
                                            <!-- <h4 class="card-title">Data Pelanggan</h4> -->
                                            <div class="row">
                                                <div class="col s12 m12 l12">

                                                    <div class="row">
                                                        <div class="col s12 m12 l12">
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
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-action">
                                            <div class="row">
                                                <div class="col s12 offset-s7 m12 offset-m8 l12 offset-l8">
                                                    <button class="btn waves-effect waves-light blue" type="submit" name="action">LANJUT
                                                        <i class="material-icons right">arrow_forward</i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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