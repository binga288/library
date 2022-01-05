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
                <label for="isbn" class="form-label">書籍ISBN</label>
                <input type="text" v-on:change="getBookData($event)" class="form-control" id="isbn" name="isbn">
            </div>
            <button type="submit" class="btn btn-primary">送出</button>
        </form>
    </div>
</div>

<script>
    $app = new Vue({
        el: "#app",
        data: {

        },
        mounted() {
            let dom = document.querySelector("#isbn");
            dom.focus();
        },
        methods: {
            async getBookData($event){
                let isbn = $event.target.value;
                let api = "https://www.googleapis.com/books/v1/volumes?q=isbn:" + isbn;
                await fetch(api)
                    .then(res=>{
                        if(res.ok){
                            return res.json();
                        }
                    })
                    .then(res=>{
                        console.log(res.items[0])
                    })
            }
        }
    })
</script>