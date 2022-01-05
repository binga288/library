<div id="app" class="container">
    <br>
    <div class="col-4">
        <div class="mb-3">
            <label for="isbn" class="form-label">書籍ISBN</label>
            <input type="text" @input="getBookData($event)" class="form-control" id="isbn" name="isbn">
        </div>
        <button id="post" type="button" @click="sendPost" :disabled="!getSuccess" class="btn btn-primary">送出</button>
    </div>

    <div v-if="getSuccess" id="ISBNdata" class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4 text-center">
                <img :src="href" class="img-fluid rounded-start">
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
</div>
</div>

<script>
    $app = new Vue({
        el: "#app",
        data: {
            getSuccess: false,
            href: "",
            bookName: "",
            description: "",
            authors: "",

            failCheck: false,
            failMes: "",
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
                let api = "https://www.googleapis.com/books/v1/volumes?q=isbn:" + isbn;

                await fetch(api)
                    .then(res => res.json())
                    .then(res => {
                        if (res.totalItems == 0) {
                            apiFail("查詢失敗:無此書籍");
                            return;
                        }
                        this.failMes = "";
                        this.failCheck = false;
                        this.getSuccess = false;

                        const data = res.items[0];
                        this.getSuccess = true;
                        this.href = data.volumeInfo.imageLinks.thumbnail;
                        this.bookName = data.volumeInfo.title;
                        this.description = data.volumeInfo.description;
                        this.authors = data.volumeInfo.authors;
                    })
                    .catch(res => {
                        apiFail("查詢失敗:API連結錯誤");
                    })
            },
            apiFail(string) {
                this.failMes = string;
                this.failCheck = true;
                this.getSuccess = false;
            },
            sendPost() {
                let sendBody = {
                    ISBN: document.querySelector("#isbn").value * 1,
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
                let dom = document.querySelector("#isbn");
                dom.focus();
            }
        }
    })
</script>