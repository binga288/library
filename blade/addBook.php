<div id="app" class="container">
    <div class="row">
        <div v-if="failCheck" class="alert alert-danger" :class role="alert">{{failMes}}</div>
    </div>

    <div class="row mt-4">
        <div class="col-4">
            <div class="mb-3">
                <label for="isbn" class="form-label">書籍ISBN</label>
                <input id="isbn" class="form-control" v-model="isbn" type="text" @input="getBookData($event)">
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">標題</label>
                <input class="form-control" id="title" v-model="title" type="text">
            </div>
            <div class="mb-3">
                <label for="authors" class="form-label">作者</label>
                <input class="form-control" id="authors" v-model="authors" type="text">
            </div>
            <!-- 掃描輸入 -->
            <button id="post" type="button" @click="addBook" :disabled="!getSuccess" class="btn btn-primary">
                送出
            </button>
        </div>

        <div class="col-3 d-flex flex-row-reverse">
            <img :src="href != undefined ? href : defaultImg" class="thumbnail rounded-start">
        </div>
    </div>
</div>

<script>
    $app = new Vue({
        el: "#app",
        data: {
            isbn: "",
            getSuccess: false,
            title: "",
            authors: "",
            href: null,

            failCheck: false,
            failMes: "",

            //預設縮圖連結
            defaultImg: "source/img/default.jpg"
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
                        this.apiSuccess();

                        const data = res.items[0];
                        console.log(data);
                        this.href = data.volumeInfo.imageLinks?.thumbnail;
                        this.title = data.volumeInfo.title;
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
            apiSuccess() {
                this.failMes = "";
                this.failCheck = false;
                this.getSuccess = true;
            },
            sendPost() {
                let sendBody = {
                    ISBN: this.isbn,
                    title: this.title,
                    writer: this.authors,
                    thumbnail: this.href,
                };

                console.log(sendBody)
                fetch("api/PostBookData.php", {
                    method: 'POST',
                    body: JSON.stringify(sendBody),
                    headers: {
                        'content-type': 'application/json'
                    },
                })
            },
            reset() {
                this.isbn = "";
                this.getSuccess = false;
                this.href = null;
                this.title = "";
                this.authors = "";
            },
            addBook() {
                this.sendPost();
                let dom = document.querySelector("#isbn");
                dom.focus();
                this.reset();
            }
        }
    })
</script>