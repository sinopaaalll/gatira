    <!-- BEGIN: Page Main-->
    <div id="main">
        <div class="row">
            <div id="breadcrumbs-wrapper" data-image="<?= base_url('') ?>assets/images/gallery/breadcrumb-bg.jpg">
                <!-- Search for small screen-->
                <div class="container">
                    <div class="row">
                        <div class="col s12 m6 l6">
                            <h5 class="breadcrumbs-title mt-0 mb-0"><span>Data Pengguna</span></h5>
                        </div>
                        <div class="col s12 m6 l6 right-align-md">
                            <ol class="breadcrumbs mb-0">
                                <li class="breadcrumb-item"><a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Data Pengguna
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col s12">
                <div class="container">
                    <div class="section section-data-tables">
                        <!-- Page Length Options -->
                        <div class="row">
                            <div class="col s12">

                                <div class="card">
                                    <div class="card-content">
                                        <h4 class="card-title">Data Pengguna</h4>
                                        <div class="row">
                                            <div class="col s12">
                                                <table id="page-length-option" class="display">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>NIK</th>
                                                            <th>Nama</th>
                                                            <th>Role</th>
                                                            <th>Foto</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $i = 1;
                                                        foreach ($user as $key => $row) : ?>
                                                            <tr>
                                                                <td><?= $i++; ?></td>
                                                                <td><?= $row->nik ?></td>
                                                                <td><?= $row->nama ?></td>
                                                                <td><?= $row->role ?></td>
                                                                <td>
                                                                    <img src="<?= base_url('assets/images/user/') . $row->image  ?>" alt="Profile" style="width: 60px; border-radius: 10px ">
                                                                </td>
                                                                <td>
                                                                    <?php if ($row->is_active == 0) { ?>
                                                                        <a href="<?= base_url('user/aktivasi/') . $row->id; ?>" class="waves-effect waves-light btn-small green"><i class="material-icons left">check</i> Aktivasi</a>
                                                                    <?php } else { ?>
                                                                        <a href="<?= base_url('user/detail/') . $row->id; ?>" class="waves-effect waves-light btn-small blue darken-4"><i class="material-icons" title="lihat">visibility</i></a>
                                                                        <a href="<?= base_url('user/update/') . $row->id; ?>" class="waves-effect waves-light btn-small yellow darken-4" title="edit"><i class="material-icons">edit</i></a>
                                                                    <?php } ?>
                                                                    <a href="<?= base_url('user/delete/') . $row->id; ?>" class="waves-effect waves-light btn-small red btn-hapus " title="hapus"><i class="material-icons">delete</i></a>
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
                                        <a href="<?= base_url('user/create') ?>" class="btn blue darken-4"><i class="material-icons left">add</i>Tambah data</a>
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