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
                                    <form action="<?= base_url('cabang/update/' . $cabang['kode_pelayanan']) ?>" method="post" autocomplete="off">
                                        <div class="card-content">
                                            <h4 class="card-title center-align">EDIT DATA CABANG</h4>
                                            <div class="divider"></div><br>
                                            <div class="row">
                                                <div class="col s12 m8 offset-m2 l10 offset-l1">
                                                    <div class="row margin">
                                                        <div class="input-field col s12">
                                                            <i class="material-icons prefix">code</i>
                                                            <input type="text" name="kode" id="kode" maxlength="2" placeholder="Masukkan Kode Cabang ..." value="<?= $cabang['kode_pelayanan'] ?>" required disabled>
                                                            <label for="kode">Kode <small>(Tidak dapat di ubah)</small></label>
                                                        </div>
                                                    </div>
                                                    <div class="row margin">
                                                        <div class="input-field col s12">
                                                            <i class="material-icons prefix">location_city</i>
                                                            <input type="text" name="nama" id="nama" required placeholder="Masukkan Nama Cabang ..." value="<?= $cabang['nama_pelayanan'] ?>">
                                                            <label for="nama">Cabang *</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-action">
                                            <a href="<?= base_url('cabang') ?>" class="btn yellow darken-4 modal-trigger"><i class="material-icons left">undo</i>Kembali</a>
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