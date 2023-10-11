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
                                        <h4 class="card-title">Data Jalan</h4>

                                        <div class="row">
                                            <div class="col s12">
                                                <table id="page-length-option" class="striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Kode</th>
                                                            <th>Jalan</th>
                                                            <th>Wilayah</th>
                                                            <th>Cabang</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($jalan as $key => $row) : ?>
                                                            <tr>
                                                                <td><?= $row->kode_jalan ?></td>
                                                                <td><?= $row->nama_jalan ?></td>
                                                                <td><?= $row->wilayah ?></td>
                                                                <td><?= $row->cabang ?></td>
                                                                <td>
                                                                    <a href="<?= base_url('jalan/edit/') . $row->kode_jalan; ?>" class="btn-floating waves-effect waves-light btn-small yellow darken-4"><i class="material-icons" title="edit">edit</i></a>
                                                                    <a href="<?= base_url('jalan/delete/') . $row->kode_jalan; ?>" class="btn-floating waves-effect waves-light btn-small red btn-hapus " title="hapus"><i class="material-icons">delete</i></a>
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
                                        <a href="<?= base_url('jalan/create') ?>" class="btn blue darken-4"><i class="material-icons left">add</i>Tambah data</a>
                                        <!-- <button type="button" class="btn modal-trigger blue darken-4" data-target="modal-add"><i class="material-icons left">add</i>Tambah data</button> -->
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