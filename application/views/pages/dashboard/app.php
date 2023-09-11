    <!-- BEGIN: Page Main-->
    <div id="main">
        <div class="row">
            <div id="breadcrumbs-wrapper" data-image="<?= base_url('') ?>assets/images/gallery/slider7.jpg">
                <!-- Search for small screen-->
                <div class="container">
                    <div class="row">
                        <div class="col s12 m6 l6">
                            <h5 class="breadcrumbs-title mt-0 mb-0"><span>Dashboard</span></h5>
                        </div>
                        <div class="col s12 m6 l6 right-align-md">
                            <ol class="breadcrumbs mb-0">
                                <li class="breadcrumb-item"><a href="index-2.html">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Dashboard
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