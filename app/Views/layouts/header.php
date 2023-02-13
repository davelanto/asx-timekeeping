<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ASX - Productivity Monitoring</title>
    <link rel="stylesheet" href="<?=base_url('scss/assets/css/style.css');?>">
    <link rel="stylesheet" href="<?=base_url('scss/assets/css/fontawesome.css');?>">
</head>
<body>
<div id="menu" class="menu">
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-light py-3 shadow">
        <div class="container">
            <a class="navbar-brand" href="#"></a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Logout</a>
                    </li>
            </div>
        </div>
    </nav>
</div>

<section id="sidebar" class="sidebar bg-primary">
    <div class="px-3">
    <div class="text-center mb-3 mb-md-0 me-md-auto">
        <img src="<?= base_url('images/logo.png'); ?>" class="w-75">
        <div class="text-light logo-title">ASX Productivity Monitoring</div>
    </div>
    <hr class="bg-light">
    <div class="timeDiv">10:18:39 PM</div>
    <div class="dateDiv">FEB 10</div>
    <div class="my-4 text-center">
        <img src="<?=base_url('images/qr.png');?>" class="w-50 mb-2" alt="">
        <div class="text-center fw-semibold text-light mb-2 qr-title">Scan your QR Code</div>
        <input type="text" class="form-control form-control text-center" id="qrInput" placeholder="AIC781">
        <div class="mt-2 d-grid">
            <button class="btn btn-danger">Confirm</button>
        </div>
    </div>

    <div class="text-white-50 credit-label">
        © ASX Management
    </div>
    </div>
</section>
4