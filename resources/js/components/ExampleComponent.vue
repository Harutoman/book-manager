<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <ul>
                            <li v-for="(book,index) in books" v-bind:key="index">{{ book.title }}</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                books: []
            }
        },
        mounted() {
          axios.get('/book/data').then(response => this.books= response.data)
        }
    }
</script>
