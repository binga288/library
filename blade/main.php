<?php

$book_list = $DB->select("book_list");
?>
<div class="container-fluid">
    <div class="row">

        <div class="col-1">

        </div>
        <div class="col-8">
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
                            <td><?= $book["name"] ?></td>
                            <td><?= $book["writer"] ?></td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>