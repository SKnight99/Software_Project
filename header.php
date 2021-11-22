<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tag  -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='copyright' content=''>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Tag  -->
    <title><?php echo $pageTitle ?></title>
    <!-- Web Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="css/magnific-popup.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Fancybox -->
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <!-- Themify Icons  -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="css/niceselect.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Flex Slider CSS -->
    <link rel="stylesheet" href="css/flex-slider.min.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="css/owl-carousel.css">
    <!-- Slicknav  -->
    <link rel="stylesheet" href="css/slicknav.min.css">
    <!-- header -->
    <link rel="stylesheet" href="css/header.css">
    <!-- sidebar -->
    <link rel="stylesheet" href="css/sidebar.css">
    <!-- content -->
    <link rel="stylesheet" href="css/content.css">
    <!-- jQuery 3.6.0 -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


    <?php echo $additionalReferences ?>
</head>

<body class="js">
    <header id="header">
        <divx id="header__logo" class="flex-center">
            <a href="index" class="none-decoration" style="height: 100%;">
                <div style="display: flex; align-items: center; justify-content: center; width: 100%; height: 100%;">
                    <span id="logo-txt">PHP<em></em></span>
                </div>
            </a>
        </div>
    </header>
    <aside id="sidebar">
        <nav>
            <a href="employee.php" class="">
                <i class="fa fa-md fa-fw fa-cube txt-color-blue"></i>
                <span class="">Employee Management</span>
            </a>
            <a href="product/displayproduct.php" class="">
                <i class="fa fa-md fa-fw fa-cube txt-color-blue"></i>
                <span class="">Product Management</span>
            </a>
            <a href="sales.php" class="">
                <i class="fa fa-md fa-fw fa-cube txt-color-blue"></i>
                <span class="">Sales Management</span>
            </a>
            <a href="todoist" class="">
                <i class="fa fa-md fa-fw fa-list-ol txt-color-blue"></i>
                <span class="">Sale Reports</span>
            </a>
            <a href="Generate.php" class="">
                <i class="fa fa-md fa-fw fa-list-ol txt-color-blue"></i>
                <span class="">Generate Report</span>
            </a>
            <a href="predictSales.php" class="">
                <i class="fa fa-md fa-fw fa-list-ol txt-color-blue"></i>
                <span class="">Predict Sales</span>
            </a>
        </nav>
        <div id="sidebar-controller">
            <i class="fa fa-arrow-circle-left hit"></i>
        </div>
        <div id="copyright" class="hidden-xs">
            <i class="fa fa-gear fa-spin"></i>
            Copy Right - PHP<br> People Health Pharmacy © 2021
        </div>
    </aside>
    <?php
    $pageTitle = "PHP Sales Reporting System";
    include "library/library.php";
    ?>
