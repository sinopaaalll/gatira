<!--materialize js-->
<script src="<?= base_url('') ?>assets/vendors/sweetalert/sweetalert.min.js"></script>
<script src="<?= base_url('') ?>assets/js/vendors.min.js"></script>


<script>
    M.AutoInit();
</script>

<script>
    $(document).ready(function() {
        var cek = $('.form-checkbox').val();
        $('.form-checkbox').click(function() {
            if ($(this).is(':checked')) {
                $('.form-password').attr('type', 'text');
            } else {
                $('.form-password').attr('type', 'password');
            }
        });
    });
</script>

<script>
    var x = document.getElementById("map1");

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {
        x.innerHTML = position.coords.latitude + "," + position.coords.longitude;
    }

    function onMapClick(e) {
        popup
            .setLatLng(e.latlng)
            .setContent("koordinatnya adalah " + e.latlng
                .toString()
            ) //set isi konten yang ingin ditampilkan, kali ini kita akan menampilkan latitude dan longitude
            .openOn(mymap);

        document.getElementById('latlong').value = e.latlng //value pada form latitde, longitude akan berganti secara otomatis
    }
    mymap.on('click', onMapClick); //jalankan fungsi
</script>

<script>
    var map = L.map('map', {
        center: [-6.5542577, 107.4440257, 15],
        zoom: 15
    });

    var marker = L.marker([-6.5542577, 107.4440257, 15]).addTo(map);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);


    GEvent.addListener(map, 'click', function(overlay, point) {
        document.getElementById('latlongclicked').value = point.lat() + ', ' + point.lng()
        document.getElementById('latitude').value = point.lat()
        document.getElementById('longitude').value = point.lng()
    });
</script>

</body>

</html>