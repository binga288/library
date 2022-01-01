<?php
    include_once("../db.php");
    $db = new DB();
    $array = $db->select("rent_record");

    echo json_encode($array);