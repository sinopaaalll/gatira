    <!-- BEGIN: Page Main-->
    <div id="main">
      <div class="row">

        <div class="col s12">
          <div class="container">
            <div class="section section-data-tables">
              <!-- Page Length Options -->
              <div class="row">
                <div class="col s12">

                  <!-- <div class="card">
                    <div class="card-content">
                      <h4 class="card-title">Filter</h4>
                      <div class="row">
                        <div class="col s12 m12 l12">
                          <form action="<?= base_url('hublang/data') ?>" method="post">
                            <div class="row">
                              <div class="col s6 m4 l2">

                                <div class="input-field">
                                  <div class="select-wrapper">
                                    <select name="wilayah" id="" class="browser-default">
                                      <option value="0" selected disabled>PILIH WILAYAH</option>
                                      <?php foreach ($wilayah as $w) { ?>
                                        <option value="<?= $w->kode_wilayah ?>"><?= $w->nama_wilayah ?></option>
                                      <?php } ?>
                                    </select>
                                  </div>
                                </div>

                              </div>
                              <div class="col s6 m6 l6"><br>
                                <button class="waves-effect waves-light btn-small blue darken-4"><i class="material-icons left">sort</i>Filter</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div> -->


                  <div class="card">
                    <div class="card-content">
                      <h4 class="card-title">Data Pelanggan</h4>
                      <div class="row">
                        <div class="col s12">
                          <table id="page-length-option" class="striped">
                            <thead>
                              <tr>
                                <th>Nomor Pelanggan</th>
                                <th>Nama</th>
                                <th>Alamat Pasang</th>
                                <th>Kelurahan / Desa</th>
                                <th>Kecamatan</th>
                                <th>Status</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach ($pelanggan as $key => $row) { ?>
                                <tr>
                                  <td><?= $row['no_pelanggan']; ?></td>
                                  <td><?= $row['nama']; ?></td>
                                  <td><?= $row['alamat_pelanggan']; ?></td>
                                  <td><?= $row['kelurahan']; ?></td>
                                  <td><?= $row['kecamatan']; ?></td>
                                  <td><?= $row['ket'] ?></td>
                                  <td>
                                    <a href="<?= base_url('hublang/detail/') . $row['id']; ?>" class="btn-floating waves-effect waves-light btn-small blue darken-4"><i class="material-icons" title="lihat">visibility</i></a>
                                    <a href="<?= base_url('hublang/destroy/') . $row['id']; ?>" class="btn-floating waves-effect waves-light btn-small red btn-hapus" title="hapus"><i class="material-icons">delete</i></a>
                                  </td>

                                </tr>
                              <?php } ?>
                            </tbody>
                          </table>
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