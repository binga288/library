<div id="app" class="container">
    <br>
    <div class="col-4">
        <div class="mb-3">
            <label for="isbn" class="form-label">書籍ISBN</label>
            <input v-model="isbn" type="text" @input="getBookData($event)" class="form-control" id="isbn" name="isbn">
        </div>
        <!-- 掃描輸入 -->
        <button id="post" type="button" @click="scanSend" :disabled="!getSuccess" class="btn btn-primary">
            送出
        </button>

        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
            手動輸入
        </button>
    </div>

    <div v-if="getSuccess" id="ISBNdata" class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4 text-center">
                <img :src="href != undefined ? href : defaultImg" class="img-fluid rounded-start">
            </div>

            <div class="col-md-8 d-flex flex-column">
                <div class="card-body justify-content-center">
                    <h5 class="card-title">{{bookName}}</h5>
                    <p class="card-text des">{{description}}</p>
                </div>
            </div>
        </div>
    </div>
    <div v-if="failCheck" class="alert alert-danger" :class role="alert">{{failMes}}</div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">手動輸入書籍</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="ISBN" class="col-form-label">ISBN:</label>
                            <input type="text" v-model="isbn" class="form-control" id="ISBN">
                        </div>
                        <div class="mb-3">
                            <label for="book-name" class="col-form-label">書名:</label>
                            <input type="text" v-model="bookName" class="form-control" id="book-name">
                        </div>
                        <div class="mb-3">
                            <label for="acthor" class="col-form-label">作者:</label>
                            <input type="text" v-model="authors" class="form-control" id="acthor">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">關閉</button>
                    <button type="button" class="btn btn-primary">送出</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $app = new Vue({
        el: "#app",
        data: {
            isbn:"",
            getSuccess: false,
            href: "",
            bookName: "",
            description: "",
            authors: "",

            failCheck: false,
            failMes: "",

            //預設縮圖連結
            defaultImg: "../source/img/default.jpg"
        },
        mounted() {
            let dom = document.querySelector("#isbn");
            dom.focus();

            document.addEventListener('keypress', function() {
                if (event.code == "Enter") {
                    document.querySelector("#post").click();
                }
            });
        },
        methods: {
            async getBookData($event) {
                let isbn = $event.target.value;
                if (isbn.length != 13)
                    return;
                let api = "https://www.googleapis.com/books/v1/volumes?q=isbn:" + isbn;
                console.log(api)

                await fetch(api)
                    .then(res => res.json())
                    .then(res => {
                        if (res.totalItems == 0) {
                            this.apiFail("查詢失敗:無此書籍");
                            return;
                        }
                        this.failMes = "";
                        this.failCheck = false;
                        this.getSuccess = false;

                        const data = res.items[0];
                        this.getSuccess = true;
                        this.href = data.volumeInfo.imageLinks?.thumbnail;
                        this.bookName = data.volumeInfo.title;
                        this.description = data.volumeInfo.description;
                        this.authors = data.volumeInfo.authors;
                    })
                    .catch(res => {
                        console.log(res)
                        this.apiFail("查詢失敗:API連結錯誤");
                    })
            },
            apiFail(string) {
                this.failMes = string;
                this.failCheck = true;
                this.getSuccess = false;
            },
            sendPost() {
                let sendBody = {
                    ISBN: this.isbn * 1,
                    name: this.bookName,
                    writer: this.authors,
                    thumbnail: this.href
                };

                console.log(sendBody)
                fetch("/api/PostBookData.php", {
                    method: 'POST',
                    body: JSON.stringify(sendBody),
                    headers: {
                        'content-type': 'application/json'
                    },
                })
            },
            scanSend() {
                sendPost();
                let dom = document.querySelector("#isbn");
                dom.focus();
            }
        }
    })
</script>