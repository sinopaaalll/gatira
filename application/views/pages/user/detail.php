    <!-- BEGIN: Page Main-->
    <div id="main">
        <div class="row">
            <div id="breadcrumbs-wrapper" data-image="<?= base_url('') ?>assets/images/gallery/slider7.jpg">
                <!-- Search for small screen-->
                <div class="container">
                    <div class="row">
                        <div class="col s12 m6 l6">
                            <h5 class="breadcrumbs-title mt-0 mb-0"><span>Detail Data Pengguna</span></h5>
                        </div>
                        <div class="col s12 m6 l6 right-align-md">
                            <ol class="breadcrumbs mb-0">
                                <li class="breadcrumb-item"><a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Data Pengguna</a>
                                </li>
                                <li class="breadcrumb-item active">Detail Data Pengguna
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
                            <div class="col s12 offset-m3 m6 offset-l3 l6">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="row">
                                            <div class="col s12">
                                                <table class="hover ">
                                                    <tr>
                                                        <th class="blue darken-3 center-align" colspan="3">
                                                            <H6 class="white-text"> DATA PENGGUNA </H6>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="center-align" colspan="3">
                                                            <img src="<?= base_url('assets/images/user/' . $user['image']) ?>" alt="Profile" style="width:200px; border-radius:20px;box-shadow: 5px 5px 10px 10px;">
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th>NIK</th>
                                                        <td>:</td>
                                                        <td><?= $user['nik'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <td>:</td>
                                                        <td><?= $user['nama']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Email</th>
                                                        <td>:</td>
                                                        <td><?= $user['email']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Role</th>
                                                        <td>:</td>
                                                        <td><?= $user['role']; ?></td>
                                                    </tr>
                                                </table>
                                            </div>

                                        </div><br>
                                        <div class="row">
                                            <div class="col s12">

                                                <a href="<?= base_url('user') ?>" class="waves-effect waves-light btn darken-3"><i class="material-icons left">undo</i>Kembali</a>
                                            </div>
                                        </div>
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

    <script src="<?= base_url('') ?>assets/js/vendors.min.js"></script>
    <script src="<?= base_url('') ?>assets/vendors/data-tables/js/jquery.dataTables.min.js"></script>