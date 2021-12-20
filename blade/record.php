<?php
$array = $db->select("rent_record");
?>

<div class="container">
    <table class="table">
        <thead>
            <tr>
                <td>#</td>
                <td>學號</td>
                <td>借閱日期</td>
                <td>須歸還日期</td>
                <td><a href="&test=123">是否歸還 ↓↑</a></td>
                <td>書名</td>
            </tr>
        </thead>
        <?php foreach ($array as $arr) { ?>
            <tr>
                <td><?= $arr["id"] ?></td>
                <td><?= $arr["student_id"] ?></td>
                <td><?= $arr["rent_date"] ?></td>
                <td><?= $arr["return_date_limit"] ?></td>
                <td><?= $arr["type"] == 0 ? "尚未歸還" : "歸還" ?></td>
                <td><?= $arr["name"] ?></td>
            </tr>
        <?php } ?>
    </table>
</div>