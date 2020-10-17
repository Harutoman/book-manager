<template>
  <header>
    <v-app-bar app white>
      <v-app-bar-nav-icon @click="drawer = true"></v-app-bar-nav-icon>
      <v-toolbar-title>書籍管理サイト</v-toolbar-title>
    </v-app-bar>

    <v-navigation-drawer v-model="drawer" fixed temporary>
      <v-list nav dense>
        <v-list-item-group>
          <a href="/import">asasasa</a>
        <v-list-tile href="/sasa">略</v-list-tile>
        </v-list-item-group>
      </v-list>
    </v-navigation-drawer>
  </header>
</template>
 
<script>
import constants from '../common/constants' // 今回追加

export default {
  data () {
    return {
      drawer: false,
      menuItems: constants.menuItems // 今回追加
    }
  }
}
</script>