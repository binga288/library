<?php
$origin = "http://{$_SERVER["HTTP_HOST"]}/";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pre["name"] ?></title>
    <link rel="stylesheet" href="<?= $origin ?>assets/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $origin ?>assets/dist/css/style.css">
    <link rel="stylesheet" href="<?= $origin ?>assets/dist/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="<?= $origin ?>assets/dist/css/sidebars.css">
</head>

<body class="bg-light">
<?php include_once("assets/dist/svg.php"); ?>
    <div class="d-flex">
        <?php include_once("sidebar.php"); ?>
        <div class="my-5 w-100">