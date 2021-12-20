<?php
if (isset($_POST["student_id"])) {
    $data = $db->select_once("rent_record", ["student_id" => $_POST["student_id"]]);
    $db->update("rent_record",["type"=>1],["id"=>$data["id"]]);
    header("Location: ?page=return");
}
?>

<div class="container">
    <br>
    <div class="col-4">
        <form method="post">
            <div class="mb-3">
                <label for="student_id" class="form-label">學號</label>
                <input type="text" class="form-control" id="student_id" name="student_id">
            </div>
            
            <button type="submit" class="btn btn-primary">送出</button>
        </form>
    </div>
</div>