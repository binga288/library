<?php
include_once("db.php");

$db = new DB();
?>

<?php include_once("header.php"); ?>

<?php
if (!isset($_GET["page"])) {
    header("Location: ?page=main");
}
$path = "blade/{$_GET["page"]}.php";

if (file_exists($path)) {
    include("blade/{$_GET["page"]}.php");
} else {
    header("Location: ?page=main");
}
?>

<?php include_once("footer.php"); ?>