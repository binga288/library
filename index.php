<?php
include_once("db.php");

$DB = new DB();

$book_list = $DB->select("book_list");
?>

<?php include_once("header.php"); ?>

<?php
if (!isset($_GET["page"])) {
    header("Location: ?page=main");
}

include_once("blade/{$_GET["page"]}.php");
?>

<?php include_once("footer.php"); ?>