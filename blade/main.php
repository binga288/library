<?php

$book_list = $db->select("isbn_list")->all();
?>
<script>
    $("title").text("所有書籍")
</script>
<div class="container">
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ISBN</th>
                    <th scope="col">書名</th>
                    <th scope="col">作者</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($book_list as $book) { ?>
                    <tr>
                        <th scope="row">1</th>
                        <td>
                            <a href=""><?= $book["ISBN"] ?></a>
                        </td>
                        <td><?= $book["title"] ?></td>
                        <td><?= $book["writer"] ?></td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
</div>