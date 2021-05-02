<template>
  <div>
    <div id="map">
      <img src="~/assets/img/map.svg"/>
    </div>
    <div id="menu">
      <nuxt-link tag='img' :src="require('~/assets/img/profil.svg')" to="/profil"/>
      //liste troupe envoyé par back
      <button type="button" @click="goToOption">Options</button>
    </div>
  </div>
</template>

<script lang="ts">
import Vue from 'vue'

export default Vue.extend({
  methods: {
    goToOption() {
      this.$router.push('/options');
    },
  },

  async asyncData({ $axios }) {
    const general = await $axios.$get('http://my-kingdom.com/?api')
    return { general }
  }
})
</script>

<style lang="scss">
  @import "~/assets/scss/connexion.scss";
</style>
