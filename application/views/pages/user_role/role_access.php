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
                                        <h4 class="card-title">Role : <?= $role['nama']; ?></h4>
                                        <div class="row">
                                            <div class="col s12">
                                                <h5></h5>
                                                <table class="striped">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Akses Menu</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $i = 1;
                                                        foreach ($menu as $key => $row) : ?>
                                                            <tr>
                                                                <td><?= $i++; ?></td>
                                                                <td>
                                                                    <label>
                                                                        <input class="form-check-input" type="checkbox" <?= check_access($role['id'], $row->id_menu); ?> data-role="<?= $role['id']; ?>" data-menu="<?= $row->id_menu; ?>">
                                                                        <span><?= $row->menu ?></span>
                                                                    </label>
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
                                        <a href="<?= base_url('UserRole') ?>" class="btn yellow darken-4"><i class="material-icons left">undo</i>Kembali</a>
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

        $(document).ready(function() {
            // Menghentikan tautan dari navigasi langsung
            $('.form-check-input').on('click', function() {
                var roleId = $(this).data('role');
                var menuId = $(this).data('menu');

                $.ajax({
                    url: "<?= base_url('userrole/changeAccess') ?>",
                    method: "post",
                    data: {
                        roleId: roleId,
                        menuId: menuId
                    },
                    success: function() {
                        document.location.href = "<?= base_url('userrole/roleaccess/') ?>" + roleId;
                    }
                })
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