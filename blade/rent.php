<?php
if (isset($_POST["student_id"])) {
    //$db->insert("rent_record", ["student_id" => $_POST["student_id"], "name" => $_POST["book_name"], "type" => 0]);
    header("Location: ?page=rent");
}
?>

<div id="app" class="container">
    <br>
    <div class="col-4">
        <form method="post">
            <div class="mb-3">
                <label for="student_id" class="form-label">學號</label>
                <input type="text" class="form-control" id="student_id" v-on:input="Handler($event)" v-model="renter_id" name="student_id">
            </div>
            <div class="mb-3">
                <label for="book_name" class="form-label">書籍ISBN</label>
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