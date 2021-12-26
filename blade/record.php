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
                <td>
                    <form method="get">
                        <button type="submit" name="test" value="123">text</button>
                    </form>
                </td>
                <td>書名</td>
            </tr>
        </thead>
        <tbody>
            <tr v-for="arr in array">
                <td>{arr.id}</td>
            </tr>
        </tbody>
    </table>
</div>

<script>
    $app = new Vue({
        el: "#app",
        data: {
            array: []
        },
        created: () => {
            fetch("/library_system/api/GetAllRecord.php")
                .then(res => res.json())
                .then((res) => {
                    this.$set();
                })
        },
        mounted: () => {
            console.log(this.array)
        },
        methods: {

        }
    });
    (function() {

    })();
</script>