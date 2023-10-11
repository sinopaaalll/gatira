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
                                        <p>
                                            <a href="https://materializecss.com/icons.html" target="_blank">Icons - Materialize</a>
                                            have included 740 Material Design Icons courtesy of Google.
                                        </p>
                                    </div>
                                </div>

                                <div class="card">
                                    <form action="<?= base_url('submenu/create') ?>" method="post" autocomplete="off">
                                        <div class="card-content">
                                            <h4 class="card-title center-align">TAMBAH SUBMENU</h4>
                                            <div class="divider"></div><br>
                                            <div class="row">
                                                <div class="col s12 m6 offset-m3 l8 offset-l2">
                                                    <div class="row margin">
                                                        <div class="input-field col s12">
                                                            <i class="material-icons prefix">menu</i>
                                                            <div class="select-wrapper">
                                                                <select name="menu" id="menu" class="browser-default">
                                                                    <option value="" selected disabled>PILIH MENU</option>
                                                                    <?php foreach ($menu as $key => $value) { ?>
                                                                        <option value="<?= $value->id_menu ?>"><?= $value->menu ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <label for="menu" class="center-align">Menu *</label>
                                                            <?php echo form_error('menu', '<span class="helper-text red-text" >', '</span>'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="row margin">
                                                        <div class="input-field col s12">
                                                            <i class="material-icons prefix">title</i>
                                                            <input id="title" type="text" name="title" placeholder="Contoh : Submenu Management" value="<?= set_value('title') ?>" autofocus>
                                                            <label for="title" class="center-align">Title *</label>
                                                            <?php echo form_error('title', '<span class="helper-text red-text" >', '</span>'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="row margin">
                                                        <div class="input-field col s12">
                                                            <i class="material-icons prefix">link</i>
                                                            <input id="url" type="text" name="url" placeholder="Contoh : submenu/index" value="<?= set_value('url') ?>">
                                                            <label for="url" class="center-align">Url *</label>
                                                            <?php echo form_error('url', '<span class="helper-text red-text" >', '</span>'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="row margin">
                                                        <div class="input-field col s12">
                                                            <i class="material-icons prefix">insert_emoticon</i>
                                                            <input id="icon" type="text" name="icon" placeholder="Contoh : insert_emoticon" value="<?= set_value('icon') ?>">
                                                            <label for="icon" class="center-align">Icon * </label>
                                                            <?php echo form_error('icon', '<span class="helper-text red-text" >', '</span>'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="row margin">
                                                        <div class="col s12">
                                                            <p>Status</p>
                                                            <p>
                                                                <label>
                                                                    <input class="validate" required="" name="is_active" value="1" type="radio" checked="">
                                                                    <span>Aktif</span>
                                                                </label>
                                                            </p>

                                                            <label>
                                                                <input class="validate" required="" name="is_active" value="0" type="radio">
                                                                <span>Tidak Aktif</span>
                                                            </label>
                                                            <div class="input-field">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-action">
                                            <a href="<?= base_url('menu') ?>" class="btn yellow darken-4 modal-trigger"><i class="material-icons left">undo</i>Kembali</a>
                                            <button type="submit" class="btn green darken-4 modal-trigger"><i class="material-icons right">save</i>Simpan</button>
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