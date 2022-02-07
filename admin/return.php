<?php
if (isset($_POST["student_id"])) {
    $student = $_POST["student_id"];
    $isbn = $_POST["isbn"];

    $sql = "SELECT `rent_record`.* FROM `rent_record` 
        join `renter` on `rent_record`.`renter_id` = `renter`.`id` 
        join `book_list` on `rent_record`.`book_id` = `book_list`.`id` 
        join `isbn_list` on `book_list`.`isbn_id` = `isbn_list`.`id` 
        WHERE `isbn_list`.`ISBN` = '{$isbn}' AND `renter`.`student_id` = '{$student}' AND `rent_record`.`type` = 0";

    $query = $db->query($sql)->first();
    if (is_null($query))
        echo "<script>alert('此學生尚未借書或無此書籍');location.href = '';</script>";
    else {
        $db->update("rent_record", ["type" => 1], ["id" => $query["id"]]);
        $db->update("book_list", ["type" => 1], ["id" => $query["book_id"]]);

        header("Location: ?page=return");
    }
}
$pre = "return";
?>
<?php require_once("../header.php") ?>

<div id="app" class="container">
    <div class="row mb-2">
        <h2>還書</h2>
    </div>
    <div class="col-4">
        <form method="post">
            <div class="mb-3">
                <label for="student_id" class="form-label">還書學號</label>
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