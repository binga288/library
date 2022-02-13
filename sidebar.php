<div>
    <main>
        <div class="d-flex flex-column p-3 text-white bg-dark" style="width: 280px;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <span class="fs-4">資訊科圖書館</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <!-- <li class="nav-item">
                            <a href="/" class="nav-link text-white <?= $pre == "index" ? "active" : "" ?>" aria-current="page">
                                <svg class="bi me-2" width="16" height="16">
                                    <use xlink:href="#home" />
                                </svg>
                                首頁
                            </a>
                        </li> -->
                <li>
                    <a href="/admin/books.php" class="nav-link text-white <?= $pre["link"] == "books" ? "active" : "" ?>">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#book-shelf" />
                        </svg>
                        藏書一覽
                    </a>
                </li>
                <li>
                    <a href="/admin/record.php" class="nav-link text-white <?= $pre["link"] == "record" ? "active" : "" ?>">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#record" />
                        </svg>
                        借閱紀錄
                    </a>
                </li>
                <li>
                    <a href="/admin/rent.php" class="nav-link text-white <?= $pre["link"] == "rent" ? "active" : "" ?>">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#book-borrow" />
                        </svg>
                        借書
                    </a>
                </li>
                <li>
                    <a href="/admin/return.php" class="nav-link text-white <?= $pre["link"] == "return" ? "active" : "" ?>">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#book-return" />
                        </svg>
                        還書
                    </a>
                </li>
                <li class="text-center mt-4">
                    <a href="/admin/add.php" class="btn btn-outline-success w-50">
                        <svg class="bi" width="16" height="16">
                           <use xlink:href="#book-plus">
                        </svg>
                        新增藏書
                    </a>
                </li>
            </ul>
            <hr>
        </div>
    </main>
</div>