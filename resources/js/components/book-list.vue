<template>
  <v-card class="mx-auto" max-width="1500px">
    <v-col cols="12" md="7">
      <v-text-field 
        class   = "pt-4 pl-5"
        v-model = "keyword" 
        label   = "タイトル・作者名・出版社を検索できます！"
        @input  = "filteredbooks"
      ></v-text-field>
    </v-col>

    <v-container fluid grid-list-xl>
      <v-layout row wrap justify-space-around>
        <v-flex v-for="book in displaybooks" :key="book.index">
          <v-card class="grey lighten-3 pt-2 m-4" width="200px" height="90%">
            <v-img :src= "require('../../../public/images/' + book.id + '.png')" aspect-ratio="1.1" contain/>

            <v-divider class="mt-2 mb-2" :inset="inset"></v-divider>
            <div class="pl-2">タイトル</div>
            <div class="pl-2">{{ book.title }}</div>

            <v-divider class="mt-2 mb-2" :inset="inset"></v-divider>
            <div class="pl-2">作者名</div>
            <div class="pl-2">{{ book.author }}</div>

            <v-divider class="mt-2 mb-2" :inset="inset"></v-divider>
            <div class="pl-2">出版社</div>
            <div class="pl-2 pb-2">{{ book.publisher }}</div>
          </v-card>
        </v-flex>
      </v-layout>
    </v-container>
    
    <!-- ページネーション部分 -->
    <v-content>
      <div class="text-center">
        <v-pagination
          v-model = "page"
          :length = "length"
          @input  = "pageChange"
        ></v-pagination>
      </div>     
    </v-content>
  </v-card>
</template>

<script>
  export default {
    name : 'App',
    data(){
      return {
        keyword      : '',
        inset        : "",
        page         : 1, 
        pageNumber   : [],
        books        : [],
        length       : 0,
        displaybooks : [],
        pageSize     : 50
      }
    },  
    methods: {
      filteredbooks: function() {
        var books = [];
        for(var i in this.books) {
          var book = this.books[i];
          if (book.title.indexOf(this.keyword)     !== -1 ||
              book.author.indexOf(this.keyword)    !== -1 ||
              book.publisher.indexOf(this.keyword) !== -1) {
            books.push(book);
          }
        }
        this.displaybooks = books.slice(0, this.pageSize);
        this.length       = Math.ceil(books.length / this.pageSize);
        this.searchbooks  = books;
      },
      pageChange: function(pageNumber) {
        if (typeof this.searchbooks == "undefined") {
          this.displaybooks = this.books.slice(this.pageSize * (pageNumber -1), this.pageSize * (pageNumber));
          this.length       = Math.ceil(this.books.length / this.pageSize);        
        } else {
          this.displaybooks = this.searchbooks.slice(this.pageSize * (pageNumber -1), this.pageSize * (pageNumber));
          this.length       = Math.ceil(this.searchbooks.length / this.pageSize);
        }

        window.scrollTo({
          top: 0,
          behavior: "smooth"
        });
      }
    },
    mounted() {
      axios.get('/book/data').then(response => {
        this.books = response.data
        this.books.sort(function(a,b){
          if(a.title < b.title) return -1;
          if(a.title > b.title) return 1;
          return 0;
        });

        this.displaybooks = this.books.slice(0, this.pageSize);
        this.length       = Math.ceil(this.books.length / this.pageSize);
      });
    },
  }
</script>
