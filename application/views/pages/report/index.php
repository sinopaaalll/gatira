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
                                    <div class="card-content">
                                        <h4 class="card-title">Report</h4>
                                        <form action="<?= base_url('report/export') ?>" method="post">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col s12 m12 l13">
                                                        <small>Silahkan pilih periode laporan yang sesuai</small>
                                                        <div class="row">
                                                            <div class="col s6 m3 l3">
                                                                <div class="input-field">
                                                                    <div class="select-wrapper">
                                                                        <select name="cabang" id="cabang" class="browser-default">
                                                                            <option value="0" selected disabled>PILIH CABANG</option>
                                                                            <?php foreach ($cabang as $w) { ?>
                                                                                <option value="<?= $w->kode_pelayanan ?>"><?= $w->nama_pelayanan ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col s6 m3 l3">
                                                                <div class="input-field">
                                                                    <div class="select-wrapper">
                                                                        <select name="wilayah" id="wilayah" class="browser-default">
                                                                            <option value="0" selected disabled>PILIH WILAYAH</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col s6 m3 l3">
                                                                <div class="input-field">
                                                                    <div class="select-wrapper">
                                                                        <select name="jalan" id="jalan" class="browser-default">
                                                                            <option value="0" selected disabled>PILIH JALAN</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col s6 m3 l3">
                                                                <div class="input-field">
                                                                    <div class="select-wrapper">
                                                                        <select name="jenis" id="jenis" class="browser-default">
                                                                            <option value="0" selected disabled>PILIH JENIS</option>
                                                                            <?php foreach ($jenis as $j) { ?>
                                                                                <option value="<?= $j->id ?>"><?= $j->nama_jenis ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-action">
                                                <button class="waves-effect waves-light btn-large green darken-4 right"><i class="material-icons left">
                                                        import_export</i>Export Excel</button>
                                            </div>
                                        </form>
                                    </div>
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#cabang').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: "<?php echo site_url('report/get_wilayah'); ?>",
                    method: "POST",
                    data: {
                        id: id
                    },
                    async: true,
                    dataType: 'json',
                    success: function(data) {

                        var html = '<option value="">PILIH WILAYAH </option>';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<option value=' + data[i].kode_wilayah + '>' + data[i].nama_wilayah + '</option>';
                        }
                        $('#wilayah').html(html);
                    }
                });
                return false;
            });

            $('#wilayah').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: "<?php echo site_url('report/get_jalan'); ?>",
                    method: "POST",
                    data: {
                        id: id
                    },
                    async: true,
                    dataType: 'json',
                    success: function(data) {

                        var html = '<option value="">PILIH JALAN </option>';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<option value=' + data[i].kode_jalan + '>' + data[i].nama_jalan + '</option>';
                        }
                        $('#jalan').html(html);
                    }
                });
                return false;
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