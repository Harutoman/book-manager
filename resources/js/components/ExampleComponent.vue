<template>
  <v-card class="mx-auto" max-width="1500px">
    <v-layout row wrap>
      <v-flex v-for="(book,index) in books" :key="index">
        <v-card class="grey lighten-3 pt-2 m-4" width="200px" height="90%">
          <v-img :src= "require('../../../image/' + book.id + '.png')" aspect-ratio="1.1" contain/>
          <v-divider class="mt-2 mb-2" :inset="inset"></v-divider>
          <div class="pl-2">タイトル</div>
          <div class="pl-2">{{ book.title }}</div>
          <v-divider class="mt-2 mb-2" :inset="inset"></v-divider>
          <div class="pl-2">作者名</div>
          <div class="pl-2 pb-2">{{ book.author }}</div>
        </v-card>
      </v-flex>
    </v-layout>
  </v-card>
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
