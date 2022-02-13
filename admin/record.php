<?php
require("../db.php");
$db = new DB();

$sql = "SELECT *,`rent_record`.`type` as `rent_type` FROM `rent_record` 
INNER JOIN `renter` ON `renter`.`id` = `rent_record`.`renter_id`
INNER JOIN `book_list` ON `book_list`.`id` = `rent_record`.`book_id`
INNER JOIN `isbn_list` ON `isbn_list`.`id` = `book_list`.`isbn_id`
";

$where = [];
if (isset($_GET["id"]) || isset($_GET["date"])) {
    $sql .= " WHERE";

    if ($_GET["id"])
        $where[] = "`student_id` LIKE '%{$_GET["id"]}%'";
    if ($_GET["date"])
        $where[] = "`return_date_limit` = '{$_GET["date"]}'";
}
$sql .= join(" AND ", $where);
$array = $db->query($sql)->all();

$pre = ["link"=>"record","name"=>"借閱紀錄"];
?>
<?php require_once("../header.php") ?>

<div id="app" class="container">
    <div class="row mb-2">
        <h2>借閱紀錄</h2>
    </div>
    <form method="GET" class="my-3">
        <input type="hidden" name="page" value="record">
        <div class="row mb-3">
            <div class="col-4">
                <label for="renter_id" class="form-label">學號</label>
                <input type="text" name="id" class="form-control" id="renter_id" value="<?= isset($_GET["id"]) ? $_GET["id"] : "" ?>">
            </div>
            <div class="col-4">
                <label for="return_date" class="form-label">日期</label>
                <input type="date" class="form-control" id="return_date" value="<?= isset($_GET["date"]) ? $_GET["date"] : "" ?>" name="date">
            </div>
            <!-- <div class="col-2 d-flex">
                <div class="">
                    </div>
                </div> -->
        </div>
        <button type="submit" class=" btn btn-primary">查詢</button>
    </form>

    <div class="row bg-white p-3">
        <table class="table">
            <thead>
                <tr>
                    <td>學號</td>
                    <td>借閱日期</td>
                    <td>須歸還日期</td>
                    <td v-on:click="recordSort = !recordSort">是否歸還</td>
                    <td>書名</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($array as $data) { ?>
                    <tr>
                        <td><?= $data["student_id"] ?></td>
                        <td><?= $data["rent_date"] ?></td>
                        <td><?= $data["return_date_limit"] ?></td>
                        <td><?= $data["rent_type"] == "1" ? "歸還" : "尚未歸還" ?></td>
                        <td><?= $data["title"] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once("../footer.php") ?>