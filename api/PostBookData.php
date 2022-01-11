<?php
include_once("../db.php");
$db = new DB();
$data = file_get_contents('php://input');
$data = json_decode($data);

$isbn = $db->select("isbn_list", ["ISBN" => $data->ISBN])->first();
if (empty($isbn)) {
    $isbn_id = $db->insert("isbn_list", [
        "ISBN" => $data->ISBN,
        "title" => $data->title,
        "writer" => $data->writer[0],
        "thumbnail" => $data->thumbnail
    ]);
}


try {
    $id = $db->insert("book_list", ["isbn_id" => $isbn_id]);
    header("Status: 200");
} catch (Throwable $th) {
    header("Status: 500");
}
