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
                                        <h4 class="card-title">Data Cabang</h4>
                                        <div class="row">
                                            <div class="col s12">
                                                <table id="page-length-option" class="display">
                                                    <thead>
                                                        <tr>
                                                            <th>Kode</th>
                                                            <th>Cabang</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($cabang as $key => $row) : ?>
                                                            <tr>
                                                                <td><?= $row->kode_pelayanan ?></td>
                                                                <td><?= $row->nama_pelayanan ?></td>
                                                                <td>
                                                                    <a href="<?= base_url('cabang/edit/') . $row->kode_pelayanan; ?>" class="btn-floating waves-effect waves-light btn-small yellow darken-4"><i class="material-icons" title="edit">edit</i></a>
                                                                    <a href="<?= base_url('cabang/delete/') . $row->kode_pelayanan; ?>" class="btn-floating waves-effect waves-light btn-small red btn-hapus " title="hapus"><i class="material-icons">delete</i></a>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-action">
                                        <!-- Modal Trigger -->
                                        <!-- <a href="<?= base_url('user/create') ?>" class="btn blue darken-4"><i class="material-icons left">add</i>Tambah data</a> -->
                                        <a href="<?= base_url('cabang/create') ?>" class="btn blue darken-4"><i class="material-icons left">add</i>Tambah data</a>
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

        $(document).ready(function() {
            // Menghentikan tautan dari navigasi langsung
            $('.btn-hapus').on('click', function(event) {
                event.preventDefault();
                var href = $(this).attr('href');

                // Menampilkan dialog konfirmasi SweetAlert
                swal({
                    title: "Yakin, data akan dihapus?",
                    icon: 'warning',
                    buttons: {
                        cancel: true,
                        delete: 'Yes, Delete It'
                    }
                }).then((isConfirmed) => {
                    if (isConfirmed) {
                        // Jika pengguna mengkonfirmasi logout, arahkan ke URL logout
                        window.location.href = href;
                    }
                });
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