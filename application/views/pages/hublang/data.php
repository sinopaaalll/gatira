    <!-- BEGIN: Page Main-->
    <div id="main">
      <div class="row">

        <div class="col s12">
          <div class="container">
            <div class="section section-data-tables">
              <!-- Page Length Options -->
              <div class="row">
                <div class="col s12">
                  <form action="<?= base_url('hublang/export') ?>" method="post">
                    <div class="card">
                      <div class="card-content">
                        <div class="row">
                          <div class="col s12">
                            <h4 class="card-title">Filter</h4>
                            <div class="row margin">
                              <div class="col s12 m6 l3">
                                <div class="input-group">
                                  <div class="select-wrapper">
                                    <select name="wilayah" id="wilayah" class="browser-default">
                                      <option value="" selected disabled>PILIH WILAYAH</option>
                                      <?php foreach ($wilayah as $key => $w) { ?>
                                        <option value="<?= $w->kode_wilayah ?>"><?= $w->nama_wilayah ?></option>
                                      <?php } ?>
                                    </select>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card-action">
                        <button type="button" id="refresh" class="btn btn waves-effect waves-light blue darken-4">Refresh Data</button>
                        <button type="submit" id="submit" class="btn btn waves-effect waves-light green darken-4">Export Excel</button>
                      </div>
                    </div>
                  </form>



                  <div class="card">
                    <div class="card-content">
                      <h4 class="card-title">Data Pelanggan</h4>
                      <div class="row">
                        <div class="col s12">
                          <div class="responsive-table">
                            <table id="page-length-option" class="striped">
                              <thead>
                                <tr>
                                  <th>No. Pelanggan</th>
                                  <th>Nama</th>
                                  <th>Alamat</th>
                                  <th>Kelurahan / Desa</th>
                                  <th>Kecamatan</th>
                                  <th>Telepon</th>
                                  <th>Email</th>
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
                                    <td><?= '+' . substr($row['telp'], 0, 2) . ' ' . substr($row['telp'], 2, 3) . '-' . substr($row['telp'], 5, 4) . '-' . substr($row['telp'], 9); ?></td>
                                    <td><?= $row['email'] ?></td>
                                    <td>
                                      <!-- <a href="<?= base_url('hublang/detail/') . $row['id']; ?>" class="btn-floating waves-effect waves-light btn-small blue darken-4"><i class="material-icons" title="lihat">visibility</i></a> -->
                                      <a href="<?= base_url('hublang/edit/') . $row['id']; ?>" class="btn-floating waves-effect waves-light btn-small yellow darken-4"><i class="material-icons" title="edit">edit</i></a>
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
        $('#wilayah').on('change', function() {
          var selectedWilayah = $(this).val();

          // Kirim permintaan Ajax untuk mendapatkan data pelanggan sesuai wilayah yang dipilih
          $.ajax({
            url: "<?= site_url('Hublang/getDataPelangganByWilayah'); ?>",
            type: 'POST',
            data: {
              id: selectedWilayah
            },
            async: true,
            dataType: 'json',
            success: function(response) {

              var table = $('#page-length-option').DataTable();
              table.clear().draw();

              // Iterasi melalui setiap baris respons dan tambahkan ke tabel
              response.forEach(function(row) {
                var newRow = '<tr>' +
                  '<td>' + row.no_pelanggan + '</td>' +
                  '<td>' + row.nama + '</td>' +
                  '<td>' + row.alamat_pelanggan + '</td>' +
                  '<td>' + row.kelurahan + '</td>' +
                  '<td>' + row.kecamatan + '</td>' +
                  '<td>' + '+' + row.telp.substr(0, 2) + ' ' + row.telp.substr(2, 3) + '-' + row.telp.substr(5, 4) + '-' + row.telp.substr(9) + '</td>' +
                  '<td>' + row.email + '</td>' +
                  '<td>' +
                  '<a href="<?= base_url('hublang/edit/') ?>' + row.id + '" class="btn-floating waves-effect waves-light btn-small yellow darken-4"><i class="material-icons" title="edit">edit</i></a>' +
                  '<a href="<?= base_url('hublang/destroy/') ?>' + row.id + '" class="btn-floating waves-effect waves-light btn-small red btn-hapus" title="hapus"><i class="material-icons">delete</i></a>' +
                  '</td>' +
                  '</tr>';

                table.row.add($(newRow)).draw(false);
              });
            },
            error: function(xhr, status, error) {
              // Tangani kesalahan jika terjadi
              console.error(error);
            }
          });
        });
      });

      $(document).ready(function() {
        $('#refresh').on("click", function() {
          location.reload()
        });
      });

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