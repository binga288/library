<?php
require_once("../db.php");
$db = new DB();

if (isset($_POST["student_id"])) {
    $renter = $db->select("renter", ["student_id" => $_POST["student_id"]])->first();

    if (empty($renter)) {
        $renter = $db->insert("renter", ["student_id" => $_POST["student_id"]]);
    } else {
        $renter = $renter["id"];
    }

    $isbn = $db->select("isbn_list", ["isbn" => $_POST["isbn"]])->first();
    if (empty($isbn)) {
        echo "<script>alert('館內無此藏書');location.href = '';</script>";
    } else {
        $books = $db->select("book_list", ["isbn_id" => $isbn["id"], "type" => 1])->first();

        if (empty($books))
            echo "<script>alert('書籍皆被借走');location.href = '';</script>";

        $date = new DateTime();
        $date->modify("+30 day");
        $date_str = $date->format("Y/m/d");
        $rent_id = $db->insert("rent_record", ["renter_id" => $renter, "book_id" => $books["id"], "return_date_limit" => $date_str]);

        $db->update("book_list", ["last_rent_id" => $rent_id, "type" => 0], ["id" => $books["id"]]);
        echo "<script>alert('需歸還日期{$date_str}');location.href = '';</script>";
    }
}

$pre = ["link"=>"rent","name"=>"借書"];
?>
<?php require_once("../header.php") ?>
<div id="app" class="container">
    <div class="row mb-2">
        <h2>借書</h2>
    </div>
    <div class="col-4">
        <form method="post">
            <div class="mb-3">
                <label for="student_id" class="form-label">借書學號</label>
                <input type="text" class="form-control" id="student_id" v-on:input="Handler($event)" v-model="renter_id" name="student_id">
            </div>
            <div class="mb-3">
                <label for="isbn" class="form-label">書籍ISBN</label>
                <input type="text" class="form-control" id="isbn" name="isbn">
            </div>
            <button type="submit" class="btn btn-primary">送出</button>
        </form>
    </div>
</div>

<script>
    $app = new Vue({
        el: "#app",
        data: {
            renter_id: "",
        },
        mounted() {
            let dom = document.querySelector("#student_id");
            dom.focus();
        },
        methods: {
            Handler($event) {
                let len = $event.target.value.length;
                if (len == 6) {
                    let dom = document.querySelector("#isbn");
                    dom.focus();
                    focus = true;
                }
            }
        }
    })
</script>
<?php require_once("../footer.php") ?>