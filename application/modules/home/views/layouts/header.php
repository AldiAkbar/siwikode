<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--font-family-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600&display=swap&subset=latin-ext" rel="stylesheet">
    <!-- icon -->
    <link rel="icon" href="<?= base_url() ?>asset/img/favicon/icon3.ico">
    <!-- font awesome -->
    <link href="<?= base_url() ?>asset/vendor/sbadmin2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="<?= base_url() ?>asset/vendor/sbadmin2/vendor/bootstrap/css/bootstrap.min.css">
    <!-- owl carousel -->
    <link rel="stylesheet" href="<?= base_url() ?>asset/vendor/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>asset/vendor/owl-carousel/owl.theme.default.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="<?= base_url() ?>asset/css/style.css">
    <title>SIWIKODE | <?= $title; ?></title>
</head>

<body id="home" data-spy="scroll" data-target=".fixed-top">
    <?php if ($title == 'Beranda') : ?>
        <div class="loader-container">
            <div class="loader"></div>
        </div>
    <?php endif; ?>