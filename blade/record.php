<?php
$array = $db->select("rent_record");
?>

<div id="app" class="container">
    <table class="table">
        <thead>
            <tr>
                <td>#</td>
                <td>學號</td>
                <td>借閱日期</td>
                <td>須歸還日期</td>
                <td v-on:click="recordSort = !recordSort">是否歸還</td>
                <td>書名</td>
            </tr>
        </thead>
        <tbody>
            <tr v-for="data in recordData">
                <td>{{data.id}}</td>
                <td>{{data.student_id}}</td>
                <td>{{data.return_date}}</td>
                <td>{{data.return_date_limit}}</td>
                <td>{{data.type == "1"?"歸還":"尚未歸還"}}</td>
                <td>{{data.name}}</td>
            </tr>
        </tbody>
    </table>
</div>

<script>
    $app = new Vue({
        el: "#app",
        data: {
            recordData: [],
            recordSort: false
        },
        computed: {
            _recordSort: function(){
                console.log(recordSort)
            },
        },
        created() {
            fetch("/library/api/GetAllRecord.php")
                .then(async res => {
                    const data = await res.json();
                    this.recordData = data;
                })
        },
        methods: {
            sortByType() {

            }
        },
    });
</script>