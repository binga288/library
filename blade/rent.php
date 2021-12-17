<?php
if (isset($_POST["student_id"])) {
    $db->insert("rent_record", ["student_id" => $_POST["student_id"], "name" => $_POST["book_name"], "type" => 0]);
    header("Location: ?page=rent");
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
            <div class="mb-3">
                <label for="book_name" class="form-label">書名</label>
                <input type="text" class="form-control" id="book_name" name="book_name">
            </div>
            <button type="submit" class="btn btn-primary">送出</button>
        </form>
    </div>
</div>