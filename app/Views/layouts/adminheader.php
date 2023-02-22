<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ASX - Productivity Monitoring</title>
    <link rel="stylesheet" href="<?=base_url('scss/assets/css/style.css');?>">
    <link rel="stylesheet" href="<?=base_url('scss/assets/css/fontawesome.css');?>">
    <script src="<?=base_url('/js/jquery/dist/jquery.js');?>"></script>
</head>
<body>
<section id="adminmenu" class="adminmenu">
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-primary navbar-dark shadow-lg">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="<?=base_url('images/logo.png');?>" width="50" height="50" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?=$active == 'dashboard' ? 'active' : '';?>" aria-current="page" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-inline-block" aria-current="page" target="_blank" href="/">Timekeeping <i class="fa-solid fa-arrow-up-right-from-square fa-sm"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?=$active == 'employee' ? 'active' : '';?>" aria-current="page" href="<?=base_url('/employee')?>">Employees</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?=$active == 'setting' ? 'active' : '';?>" aria-current="page" href="<?=base_url('/setting')?>">Settings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?=$active == 'report' ? 'active' : '';?>" aria-current="page" href="#">Reports</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</section>

