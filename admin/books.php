<?php
require_once("../db.php");
$db = new DB();
$book_list = $db->select("isbn_list")->all();
$pre = "books";
?>

<?php require_once("../header.php") ?>
<div class="container">
    <div class="row mb-2">
        <h2>藏書一覽</h2>
    </div>
    <div class="row bg-white p-3">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ISBN</th>
                    <th scope="col">書名</th>
                    <th scope="col">作者</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($book_list as $book) { ?>
                    <tr>
                        <td>
                            <?= $book["ISBN"] ?>
                        </td>
                        <td><?= $book["title"] ?></td>
                        <td><?= $book["writer"] ?></td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
</div>
<?php require_once("../footer.php") ?>