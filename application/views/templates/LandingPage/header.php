<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEO Meta Tags -->
    <meta name="description" content="Tivo is a HTML landing page template built with Bootstrap to help you crate engaging presentations for SaaS apps and convert visitors into users.">
    <meta name="author" content="Inovatik">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
    <meta property="og:site_name" content="" /> <!-- website name -->
    <meta property="og:site" content="" /> <!-- website link -->
    <meta property="og:title" content="" /> <!-- title shown in the actual shared post -->
    <meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
    <meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="" /> <!-- where do you want your post to link to -->
    <meta property="og:type" content="article" />

    <!-- Website Title -->
    <title><?= $judul ?></title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>t_2/css/bootstrap.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>t_2/css/fontawesome-all.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>t_2/css/swiper.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>t_2/css/magnific-popup.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>t_2/css/styles.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>style.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>t_1/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= base_url('assets/') ?>t_1/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= base_url('assets/') ?>t_1/css/demo.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css" />


    <!-- Favicon  -->
    <link rel="icon" href="images/favicon.png">

    <style>
        .accordion-button {
            margin-bottom: 10px;
        }

        .accordion-body {
            margin-top: 15px;
            padding: 25px;
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 25px -3px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
        }

        .circle-icon {
            height: 50px;
            width: 50px;
            border-radius: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #2b4eff;
            border: 5px solid #b2bfff;
            color: #fff;
            margin-left: -20px;
            margin-right: 10px;
            transform: scale(1.2);
        }

        .accordion-item {
            border: 0px !important;
        }

        .accordion-button:not(.collapsed) {
            border: 0px !important;
            color: #0c63e4;
            background-color: #ffffff;
            box-shadow: inset 0 0px 0 rgb(0 0 0 / 13%);
        }
    </style>

</head>

<body data-spy="scroll" data-target=".fixed-top">