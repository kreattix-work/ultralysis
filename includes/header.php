<?php define('BASEURL', 'http://localhost/ultralysis/') ?>
<?php define('ASSETS_URL', 'http://localhost/ultralysis/assets/') ?>
<?php define('BASEPATH', $_SERVER['DOCUMENT_ROOT'].'/ultralysis/') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include(BASEPATH.'includes/head.php') ?>
</head>

<body>
    <header class="page-header">
        <div class="header-heading-block">
            <a href="javascript:void(0);" class="header-logo">
                <img src="<?= ASSETS_URL.'images/logo.png' ?>" alt="header-logo">
            </a>
            <button class="sider-toggler btn-icon-sm btn btn-outline-light" onclick="toggleSider()">
                <span class="ultralysis-icon">left</span>
            </button>
        </div>
        <div class="header-content-block"></div>
    </header>

    <?php include(BASEPATH.'includes/sider.php') ?>

    <div class="page-body">