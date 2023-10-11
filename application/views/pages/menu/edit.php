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
                                    <form action="<?= base_url('menu/update/' . $menu['id_menu']) ?>" method="post" autocomplete="off">
                                        <div class="card-content">
                                            <h4 class="card-title center-align">EDIT MENU</h4>
                                            <div class="divider"></div><br>
                                            <div class="row">
                                                <div class="col s12 m6 offset-m3 l o8ffset-l2">
                                                    <div class="row margin">
                                                        <div class="input-field col s12">
                                                            <i class="material-icons prefix">menu</i>
                                                            <input id="menu" type="text" name="menu" value="<?= $menu['menu'] ?>">
                                                            <label for="menu" class="center-align">Menu *</label>
                                                            <?php echo form_error('menu', '<span class="helper-text red-text" >', '</span>'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-action">
                                            <a href="<?= base_url('menu') ?>" class="btn yellow darken-4 modal-trigger"><i class="material-icons left">undo</i>Kembali</a>
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