    <!-- BEGIN: Page Main-->
    <div id="main">
        <div class="row">
            <div id="breadcrumbs-wrapper" data-image="<?= base_url('') ?>assets/images/gallery/breadcrumb-bg.jpg">
                <!-- Search for small screen-->
                <div class="container">
                    <div class="row">
                        <div class="col s12 m6 l6">
                            <h5 class="breadcrumbs-title mt-0 mb-0"><span>Edit Data Pengguna</span></h5>
                        </div>
                        <div class="col s12 m6 l6 right-align-md">
                            <ol class="breadcrumbs mb-0">
                                <li class="breadcrumb-item"><a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Data Pengguna</a>
                                </li>
                                <li class="breadcrumb-item active">Edit Data Pengguna
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
                                    <form action="<?= base_url('user/update/' . $user['id']) ?>" method="post" autocomplete="off">
                                        <div class="card-content">
                                            <h4 class="card-title center-align">EDIT DATA PENGGUNA</h4>
                                            <div class="divider"></div><br>
                                            <div class="row">
                                                <div class="col s12 m8 offset-m2 l10 offset-l1">
                                                    <div class="row margin">
                                                        <div class="input-field col s12">
                                                            <i class="material-icons prefix">assignment_ind</i>
                                                            <input id="nik" type="number" name="nik" value="<?= $user['nik'] ?>">
                                                            <label for="nik" class="center-align">NIK</label>
                                                            <?php
                                                            echo form_error('nik', '<span class="helper-text red-text" >', '</span>');
                                                            echo form_error('check_nik', '<span class="helper-text red-text" >', '</span>');
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="row margin">
                                                        <div class="input-field col s12">
                                                            <i class="material-icons prefix">account_circle</i>
                                                            <input id="nama" type="text" name="nama" value="<?= $user['nama'] ?>">
                                                            <label for="nama" class="center-align">Nama Lengap</label>
                                                            <?php echo form_error('nama', '<span class="helper-text red-text" >', '</span>'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="row margin">
                                                        <div class="input-field col s12">
                                                            <i class="material-icons prefix">mail_outline</i>
                                                            <input id="email" type="email" name="email" value="<?= $user['email'] ?>">
                                                            <label for="email" class="center-align">Email</label>
                                                            <?php echo form_error('email', '<span class="helper-text red-text" >', '</span>'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="row margin">
                                                        <div class="input-field col s12">
                                                            <i class="material-icons prefix">lock_outline</i>
                                                            <input id="password" type="password" name="password">
                                                            <label for="password">Password</label>
                                                            <?php echo form_error('password', '<span class="helper-text red-text" >', '</span>'); ?>

                                                        </div>
                                                    </div>
                                                    <div class="row margin">
                                                        <div class="input-field col s12">
                                                            <i class="material-icons prefix">lock_outline</i>
                                                            <input id="pass_conf" type="password" name="pass_conf">
                                                            <label for="pass_conf">Konfirmasi Password</label>
                                                            <?php echo form_error('pass_conf', '<span class="helper-text red-text" >', '</span>'); ?>

                                                        </div>
                                                    </div>
                                                    <div class="row margin">
                                                        <div class="input-field col s12">
                                                            <i class="material-icons prefix">tag</i>
                                                            <div class="select-wrapper">
                                                                <select name="role" id="role">
                                                                    <option value="0" selected disabled>PILIH BAGIAN</option>
                                                                    <?php foreach ($role as $data) { ?>
                                                                        <option value="<?= $data->id ?>" <?= $user['role_id'] == $data->id ? "selected" : "" ?>><?= $data->nama ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <label for="role">Bagian</label>
                                                            <?php echo form_error('role', '<span class="helper-text red-text" >', '</span>'); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-action">
                                            <a href="<?= base_url('user') ?>" class="btn yellow darken-4 modal-trigger"><i class="material-icons left">undo</i>Kembali</a>
                                            <button type="submit" class="btn green darken-4 modal-trigger"><i class="material-icons right">save</i>Update</button>
                                        </div>
                                    </form>
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