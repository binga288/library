<?php
include_once("../db.php");
$db = new DB();
$array = $db->select("rent_record")->all();
for ($i = 0; $i < count($array); $i++) {
    $array[$i]["title"] = $db->select("isbn_list", ["id" => $array[$i]["book_id"]])->first()["title"];
    $array[$i]["renter"] = $db->select("renter", ["id" => $array[$i]["renter_id"]])->first()["student_id"];
}

echo json_encode($array);
