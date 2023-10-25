    <!-- BEGIN: Page Main-->
    <div id="main">
        <div class="row">
            <div class="col s12">
                <div class="container">
                    <div class="section">
                        <!-- Page Length Options -->
                        <div class="row">
                            <div class="col s12 m4 l4">
                                <div class="card blue darken-2 white-text">
                                    <div class="card-content center-align">
                                        <i class="material-icons medium mb-4">access_time</i>
                                        <p>Updating Data Hari Ini</p>
                                        <h5 class="white-text"><?= $today->jumlah ?> Orang</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m4 l4">
                                <div class="card blue darken-2 white-text">
                                    <div class="card-content center-align">
                                        <i class="material-icons medium mb-4">access_time</i>
                                        <p>Updating Data Tujuh Hari Terakhir</p>
                                        <h5 class="white-text"><?= $weeks->jumlah ?> Orang</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m4 l4">
                                <div class="card blue darken-2 white-text">
                                    <div class="card-content center-align">
                                        <i class="material-icons medium mb-4">access_time</i>
                                        <p>Updating Data Satu Bulan Terakhir</p>
                                        <h5 class="white-text"><?= $month->jumlah ?> Orang</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12 m12 l8">
                                <!--Line Chart-->
                                <div id="chartjs-bar-chart" class="card">
                                    <div class="card-content">
                                        <h4 class="card-title">
                                            Updating Pelanggan Berdasarkan Wilayah
                                            <select name="cabang" id="cabang" class="browser-default">
                                                <?php foreach ($cabang as $key => $value) { ?>
                                                    <option value="<?= $value->kode_pelayanan ?>"><?= $value->nama_pelayanan ?></option>
                                                <?php } ?>
                                            </select>
                                        </h4>

                                        <!-- content -->
                                        <div class="sample-chart-wrapper"><canvas id="wilayah-chart" height="400"></canvas></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m12 l4">
                                <!--Line Chart-->
                                <div id="chartjs-pie-chart" class="card">
                                    <div class="card-content">
                                        <h4 class="card-title">Updating Pelanggan Berdasarkan Jenis</h4>

                                        <!-- content -->
                                        <div class="sample-chart-wrapper"><canvas id="jenis-chart" height="400"></canvas></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12 m8">
                                <!--Line Chart-->
                                <div id="chartjs-bar-chart" class="card">
                                    <div class="card-content">
                                        <h4 class="card-title">Updating Pelanggan Berdasarkan Kelurahan</h4>

                                        <!-- content -->
                                        <div class="sample-chart-wrapper"><canvas id="kel-chart" height="400"></canvas></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m12 l4">
                                <!--Line Chart-->
                                <div id="chartjs-pie-chart" class="card">
                                    <div class="card-content">
                                        <h4 class="card-title">Updating Pelanggan Berdasarkan Cabang</h4>

                                        <!-- content -->
                                        <div class="sample-chart-wrapper"><canvas id="cabang-chart" height="400"></canvas></div>
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
    <script src="<?= base_url('') ?>assets/vendors/chartjs/chart.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#cabang').change(function() {
                var id = $(this).val();

                $.ajax({
                    url: "<?= site_url('dashboard/get_cabang'); ?>",
                    method: "POST",
                    data: {
                        id: id
                    },
                    async: true,
                    dataType: 'json',
                    success: function(data) {
                        // Update labels_data dan datasets_data dengan data dari respons AJAX
                        var labels_data = data.labels_data;
                        var datasets_data = data.datasets_data;

                        // Membuat atau memperbarui data grafik
                        var newData = {
                            labels: labels_data,
                            datasets: [{
                                label: "Pelanggan",
                                backgroundColor: "#03a9f4",
                                hoverBackgroundColor: "#00acc1",
                                borderColor: "transparent",
                                data: datasets_data
                            }]
                        };

                        // Memperbarui grafik dengan data yang baru
                        lineChart.data = newData;
                        lineChart.update();
                    }
                });
            });

            var labels_data = <?= json_encode(array_column($data_wilayah, 'wilayah')) ?>;
            var datasets_data = <?= json_encode(array_column($data_wilayah, 'jumlah')) ?>;
            // Data contoh untuk Line Chart
            var data = {
                labels: labels_data,
                datasets: [{
                    label: "Pelanggan",
                    backgroundColor: "#03a9f4",
                    hoverBackgroundColor: "#00acc1",
                    borderColor: "transparent",
                    data: datasets_data
                }]
            };

            // Konfigurasi Chart
            var options = {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            drawBorder: false,
                            color: '#f2f2f2',
                        },
                        ticks: {
                            beginAtZero: true,
                            stepSize: 1
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            display: true
                        },
                        gridLines: {
                            display: true
                        }
                    }]
                },
                title: {
                    display: !0,
                    text: "Data Pelanggan"
                },
            };

            // Inisialisasi Chart
            var ctx = document.getElementById("wilayah-chart").getContext("2d");
            var lineChart = new Chart(ctx, {
                type: 'bar',
                data: data,
                options: options
            });
        });

        $(document).ready(function() {

            var labels_data = <?= json_encode(array_column($data_jenis, 'jenis')) ?>;
            var datasets_data = <?= json_encode(array_column($data_jenis, 'jumlah')) ?>;

            // Data contoh untuk pie Chart
            var data = {
                labels: labels_data,
                datasets: [{
                    label: "Pelanggan",
                    backgroundColor: [
                        "#03a9f4",
                        "#00bcd4",
                        "#ffc107",
                        "#e91e63",
                        "#4caf50",
                        "#9c27b0",
                        "#ff5722",
                        "#8bc34a",
                        "#2196f3",
                        "#ff9800",
                        "#673ab7",
                        "#cddc39",
                        "#009688",
                        "#ffeb3b",
                        "#f44336",
                        "#795548",
                        "#607d8b",
                        "#3f51b5",
                        "#ff4081",
                    ],
                    data: datasets_data
                }]
            };


            // Konfigurasi Chart
            var options = {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: true,
                    position: 'bottom'
                },
                title: {
                    display: true,
                    text: "Data Pelanggan"
                },
            };

            // Inisialisasi Chart
            var ctx = document.getElementById("jenis-chart").getContext("2d");
            var lineChart = new Chart(ctx, {
                type: 'pie',
                data: data,
                options: options
            });
        });

        $(document).ready(function() {
            var labels_data = <?= json_encode(array_column($data_kel, 'kel')) ?>;
            var datasets_data = <?= json_encode(array_column($data_kel, 'jumlah')) ?>;
            // Data contoh untuk Line Chart
            var data = {
                labels: labels_data,
                datasets: [{
                    label: "Pelanggan",
                    backgroundColor: "#00bcd4",
                    hoverBackgroundColor: "#00acc1",
                    borderColor: "transparent",
                    data: datasets_data
                }]
            };

            // Konfigurasi Chart
            var options = {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            drawBorder: false,
                            color: '#f2f2f2',
                        },
                        ticks: {
                            beginAtZero: true,
                            stepSize: 1
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            display: true
                        },
                        gridLines: {
                            display: true
                        }
                    }]
                },
                title: {
                    display: !0,
                    text: "Data Pelanggan"
                },
            };

            // Inisialisasi Chart
            var ctx = document.getElementById("kel-chart").getContext("2d");
            var lineChart = new Chart(ctx, {
                type: 'bar',
                data: data,
                options: options
            });
        });

        $(document).ready(function() {
            var labels_data = <?= json_encode(array_column($data_cabang, 'cabang')) ?>;
            var datasets_data = <?= json_encode(array_column($data_cabang, 'jumlah')) ?>;
            // Data contoh untuk pie Chart
            var data = {
                labels: labels_data,
                datasets: [{
                    label: "Pelanggan",
                    backgroundColor: [
                        "#00bcd4",
                        "#ffc107",
                        "#e91e63",
                        "#4caf50",
                        "#9c27b0",
                        "#ff5722",
                    ],
                    data: datasets_data
                }]
            };

            // Konfigurasi Chart
            var options = {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: true,
                    position: 'bottom'
                },
                title: {
                    display: true,
                    text: "Data Pelanggan"
                },
            };

            // Inisialisasi Chart
            var ctx = document.getElementById("cabang-chart").getContext("2d");
            var lineChart = new Chart(ctx, {
                type: 'pie',
                data: data,
                options: options
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