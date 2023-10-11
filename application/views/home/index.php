<style>
    .header {
        text-align: left;
        background: linear-gradient(60deg, #543ab7 0, #00acc1 100%);
        color: #fff
    }

    .logo {
        width: 120px;
        fill: #fff;
        display: inline-block;
        vertical-align: middle
    }

    .logo2 {
        width: 70px;
        fill: #fff;
        display: inline-block;
        vertical-align: middle
    }

    .inner-header {
        height: 70vh;
        width: 100%;
        margin: 0;
        padding: 0
    }

    .inner-header2 {
        position: absolute;
        margin-bottom: 30px
    }

    .flex {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center
    }

    .waves {
        position: relative;
        width: 100%;
        height: 15vh;
        margin-bottom: -7px;
        min-height: 100px;
        max-height: 150px
    }

    .content {
        position: absolute;
        height: 20vh;
        text-align: center;
        background-color: #fff
    }

    .parallax>use {
        animation: move-forever 25s cubic-bezier(.55, .5, .45, .5) infinite
    }

    .parallax>use:nth-child(1) {
        animation-delay: -2s;
        animation-duration: 3s
    }

    .parallax>use:nth-child(2) {
        animation-delay: -3s;
        animation-duration: 5s
    }

    .parallax>use:nth-child(3) {
        animation-delay: -4s;
        animation-duration: 10s
    }

    .parallax>use:nth-child(4) {
        animation-delay: -5s;
        animation-duration: 20s
    }

    @keyframes move-forever {
        0% {
            transform: translate3d(-90px, 0, 0)
        }

        100% {
            transform: translate3d(85px, 0, 0)
        }
    }

    @media (max-width:500px) {
        .waves {
            height: 40px;
            min-height: 40px
        }

        .content {
            height: 30vh
        }

        h1 {
            font-size: 24px
        }
    }
</style>
<style>
    /* width */
    ::-webkit-scrollbar {
        width: 5px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px grey;
        border-radius: 10px;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: teal;
        border-radius: 5px;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #b30000;
    }
</style>


<section>
    <div class="header">
        <!--Content before waves-->
        <div class="inner-header flex">
            <!--Just the logo.. Don't mind this-->
            <div data-aos="zoom-out" data-aos-duration="2000">
                <div class="logo">
                    <img src="<?= base_url(); ?>assets/images/logo/ico.png" width="100px">
                </div>
                <h5 class="mont">PEMBARUAN DATA PELANGGAN</h5>
                <p>PDAM GAPURA TIRTA RAHAYU PURWAKARTA</p>
                <br><br>
                <a href="<?= base_url(); ?>pelanggan" class="waves-effect waves-light btn-large z-depth-3"><i class="material-icons right">launch</i>Formulir pembaruan data pelanggan</a>
            </div>

        </div>

        <!--Waves Container-->
        <div>
            <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                <defs>
                    <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                </defs>
                <g class="parallax">
                    <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
                    <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                    <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
                    <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
                </g>
            </svg>
        </div>
        <!--Waves end-->

    </div>
    <!--Header ends-->
</section>