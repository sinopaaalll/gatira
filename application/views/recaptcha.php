<html>

<head>
    <title>reCAPTCHA Example</title>
</head>

<body>
    <form action="<?= base_url('test/recaptcha') ?>" method="post">
        <div class="g-recaptcha" data-sitekey="6Lf-cFAoAAAAAFo3px07bd3sNS_UeLTyD_blTx8T" data-theme="light" data-type="image" data-callback=""></div>
        <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?render=onload&hl=en" async defer></script>
        <br />
        <input type="submit" value="submit" />
    </form>
</body>

</html>