    <!-- BEGIN: Footer-->
    <footer class="page-footer footer footer-static footer-light navbar-border navbar-shadow">
      <div class="footer-copyright">
        <div class="container"><span>&copy; 2020 <a href="http://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank">PIXINVENT</a> All rights reserved.</span><span class="right hide-on-small-only">Design and Developed by <a href="https://pixinvent.com/">PIXINVENT</a></span></div>
      </div>
    </footer>

    
    <script src="<?= base_url('') ?>assets/vendors/sweetalert/sweetalert.min.js"></script>

    <!-- END: Footer-->
    <!-- BEGIN VENDOR JS-->
    <script src="<?= base_url('') ?>assets/js/vendors.min.js"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="<?= base_url('') ?>assets/vendors/data-tables/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('') ?>assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url('') ?>assets/vendors/data-tables/js/dataTables.select.min.js"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN THEME  JS-->
    <script src="<?= base_url('') ?>assets/js/plugins.min.js"></script>
    <script src="<?= base_url('') ?>assets/js/search.min.js"></script>
    <script src="<?= base_url('') ?>assets/js/custom/custom-script.min.js"></script>
    <script src="<?= base_url('') ?>assets/js/scripts/customizer.min.js"></script>
    <!-- END THEME  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="<?= base_url('') ?>assets/js/scripts/data-tables.min.js"></script>
    <!-- END PAGE LEVEL JS-->

    <script>
        $(document).ready(function() {
            // Menghentikan tautan dari navigasi langsung
            $('.logout-link').on('click', function(event) {
                event.preventDefault();
                var href = $(this).attr('href');

                // Menampilkan dialog konfirmasi SweetAlert
                swal({
                    title: "Anda yakin ingin logout",
                    icon: 'warning',
                    buttons: {
                        cancel: true,
                        confirm: 'Ya, Logout'
                    }
                }).then((willLogout) => {
                    if (willLogout) {
                        // Jika pengguna mengkonfirmasi logout, arahkan ke URL logout
                        window.location.href = href;
                    }
                });
            });
        });
    </script>





    </body>

    <!-- Mirrored from pixinvent.com/materialize-material-design-admin-template/html/ltr/vertical-dark-menu-template/table-data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 May 2020 08:25:06 GMT -->

    </html>