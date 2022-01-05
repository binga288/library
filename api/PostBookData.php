<?php
include_once("../db.php");
$db = new DB();
$data = file_get_contents('php://input');
$data = json_decode($data);

$db->insert("isbn_list", [
    "ISBN" => $data->ISBN,
    "name" => $data->name,
    "writer" => $data->writer[0],
    "thumbnail_link" => $data->thumbnail
]);
