<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="<?= base_url(); ?>assets/js/materialize.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/materialize.js"></script>
<!--JavaScript at end of body for optimized loading-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="<?= base_url(); ?>assets/js/init.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"> </script>
<script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
<script src="<?= base_url(); ?>assets/js/chart.js"></script>
<script>
    // Hide Sections
    $('.section').hide();
    setTimeout(function() {
        $(document).ready(function() {
            // Show sections
            $('.section').fadeIn();

            // Hide preloader
            $('.loader').fadeOut();

            // Init side nav
            $('.button-collapse').sideNav();

            // Init Modal
            $('.modal').modal();

            // Init Select
            $('select').material_select();

            // Counter
            $('.count').each(function() {
                $(this).prop('Counter', 0).animate({
                    Counter: $(this).text()
                }, {
                    duration: 1000,
                    easing: 'swing',
                    step: function(now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            });

            // Comments - Approve & Deny
            $('.approve').click(function(e) {
                Materialize.toast('Comment Approved', 3000);
                e.preventDefault();
            });
            $('.deny').click(function(e) {
                Materialize.toast('Comment Denied', 3000);
                e.preventDefault();
            });

            // Quick Todos
            $('#todo-form').submit(function(e) {
                // console.log($('#todo').val());
                const output =
                    `<li class="collection-item">
              <div>${$('#todo').val()} 
                <a href="#" class="secondary-content delete">
                 <i class="material-icons">close</i>
                </a>
              </div>
            </li>`;
                $('.todos').append(output);

                Materialize.toast('Todo Added', 3000);
                e.preventDefault();
            });

            // Delete Todos
            $('.todos').on('click', '.delete', function(e) {
                $(this).parent().parent().remove();

                Materialize.toast('Todo Removed', 3000);
                e.preventDefault();
            });

            CKEDITOR.replace('body');
        });
    }, 1000);
</script>

<script>
    M.AutoInit();
</script>


<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({})
</script>

<script>
    window.setTimeout("waktu()", 1000);

    function waktu() {
        var waktu = new Date();
        setTimeout("waktu()", 1000);
        document.getElementById("jam").innerHTML = waktu.getHours();
        document.getElementById("menit").innerHTML = waktu.getMinutes();
        document.getElementById("detik").innerHTML = waktu.getSeconds();
    }
</script>




</body>

</html>