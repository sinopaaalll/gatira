    <!-- BEGIN: Page Main-->
    <div id="main">
        <div class="row">
            <div id="breadcrumbs-wrapper" data-image="<?= base_url('') ?>assets/images/gallery/slider7.jpg">
                <!-- Search for small screen-->
                <div class="container">
                    <div class="row">
                        <div class="col s12 m6 l6">
                            <h5 class="breadcrumbs-title mt-0 mb-0"><span>Detail Data Pelanggan</span></h5>
                        </div>
                        <div class="col s12 m6 l6 right-align-md">
                            <ol class="breadcrumbs mb-0">
                                <li class="breadcrumb-item"><a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Data Pelanggan</a>
                                </li>
                                <li class="breadcrumb-item active">Detail Data Pelanggan
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
                                        <div class="row">
                                            <div class="col s12">
                                                <table class="hover">
                                                    <tr>
                                                        <th class="blue darken-3 center-align" colspan="3">
                                                            <H6 class="white-text"> DATA PELANGGAN </H6>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th>Nomor Pelanggan</th>
                                                        <td>:</td>
                                                        <td><?= $pel['no_pelanggan'] . ' &nbsp; <span class="new badge blue darken-3" data-badge-caption=""> ' . $wilayah['nama_wilayah'] . " </span>";  ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tanggal Daftar</th>
                                                        <td>:</td>
                                                        <td><?= $pel['tgl_daftar']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Nomor Plat</th>
                                                        <td>:</td>
                                                        <td><?= $pel['no_plat']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Nama Pelanggan</th>
                                                        <td>:</td>
                                                        <td><?= $pel['nama']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Alamat Pelanggan</th>
                                                        <td>:</td>
                                                        <td><?= $pel['alamat_pelanggan']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Kelurahan / Desa</th>
                                                        <td>:</td>
                                                        <td><?= $pel['kelurahan']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Kecamatan</th>
                                                        <td>:</td>
                                                        <td><?= $pel['kecamatan']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Kabupaten / Kota</th>
                                                        <td>:</td>
                                                        <td><?= $pel['kabupaten']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Provinsi</th>
                                                        <td>:</td>
                                                        <td><?= $pel['provinsi']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Luas Tanah</th>
                                                        <td>:</td>
                                                        <td><?= $pel['luas_tanah']; ?> M<sup>2</sup></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Daya Listrik </th>
                                                        <td>:</td>
                                                        <td><?= $pel['daya_listrik']; ?> Watt</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Email</th>
                                                        <td>:</td>
                                                        <td><?= $pel['email'] == "" ? "-" : $pel['email']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Nomor Handphone</th>
                                                        <td>:</td>
                                                        <td>
                                                            <?= $pel['telp'] == "" ? "-" : $pel['telp']; ?> &nbsp; || &nbsp;
                                                            <a href="http://wa.me/+62<?= $pel['telp'] ?>" class="waves-effect waves-light btn darken-3 <?= $pel['telp'] == "" ? "disabled" : ""; ?>" target="_blank"><i class="material-icons right">local_phone</i>Hubungi</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Jenis Langganan</th>
                                                        <td>:</td>
                                                        <td><?= $pel['jenis']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Jumlah Jiwa</th>
                                                        <td>:</td>
                                                        <td><?= $pel['jml_jiwa']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Status</th>
                                                        <td>:</td>
                                                        <td><?= $pel['ket']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="blue darken-3 center-align" colspan="3">
                                                            <H6 class="white-text"> DATA SPL </H6>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th>Nomor SPL</th>
                                                        <td>:</td>
                                                        <td><?= $pel['no_spl']; ?></td>
                                                    </tr>

                                                    <tr>
                                                        <th>Keterangan SPL</th>
                                                        <td>:</td>
                                                        <td>
                                                            <?php if ($pel['status'] == 1) {
                                                                echo "Aktif";
                                                            } elseif ($pel['status'] == 2) {
                                                                echo "Segel";
                                                            } elseif ($pel['status'] == 3) {
                                                                echo "Bongkar";
                                                            } else {
                                                                echo "Tidak Aktif";
                                                            } ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="blue darken-3 center-align" colspan="3">
                                                            <H6 class="white-text"> DATA PASANG </H6>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th>Nomor Meter</th>
                                                        <td>:</td>
                                                        <td><?= $pel['no_meter']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Biaya Pasang</th>
                                                        <td>:</td>
                                                        <td>Rp. <?= number_format($pel['biaya_pasang'], 0, ',', '.'); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Alamat Pasang</th>
                                                        <td>:</td>
                                                        <td><?= $pel['alamat_pasang']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Kelurahan / Desa</th>
                                                        <td>:</td>
                                                        <td><?= $pel2['kelurahan']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Kecamatan</th>
                                                        <td>:</td>
                                                        <td><?= $pel2['kecamatan']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Lokasi</th>
                                                        <td>:</td>
                                                        <td>
                                                            <a href="#!" class="waves-effect waves-light btn darken-3 disabled"><i class="material-icons right">location_on</i>Lokasi</a>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>

                                        </div><br>
                                        <div class="row">
                                            <div class="col s12">

                                                <a href="<?= base_url('hublang/data') ?>" class="waves-effect waves-light btn darken-3"><i class="material-icons left">undo</i>Kembali</a>
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