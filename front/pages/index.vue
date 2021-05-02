<template>
  <div>
    <header>
      <img src="~/assets/img/logo.svg"/>
      <button type="button" @click="goToConnexion()">S'identifier</button>
    </header>
    <div>
      <h1>Kingdom, le jeu claqué du cu</h1>
      <div id="info">
        <img src="~/assets/img/explain1.svg"/>
        <div>
          <h2>Une aventure incroyable du cu</h2>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Cursus cursus elit feugiat sit pellentesque.
            Parturient massa lectus mauris tincidunt aliquet nulla molestie.
            Ipsum nascetur sollicitudin ut faucibus.
            Habitasse neque eu turpis maecenas sem pretium imperdiet.
          </p>
        </div>
      </div>
      <div id="info">
        <div>
          <h2>Une carte grande comme le ciel</h2>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Cursus cursus elit feugiat sit pellentesque.
            Parturient massa lectus mauris tincidunt aliquet nulla molestie.
            Ipsum nascetur sollicitudin ut faucibus.
            Habitasse neque eu turpis maecenas sem pretium imperdiet.
          </p>
        </div>
        <img src="~/assets/img/explain2.svg"/>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import Vue from 'vue'

export default Vue.extend({
  methods: {
    goToConnexion() {
      this.$router.push('/connexion');
    }
  },

  // async asyncData({ $axios }) {
  //   const ip = await $axios.$get('http://my-kingdom.com/?api')
  //   return { ip }
  // }
})
</script>

<style lang="scss">
  @import "~/assets/scss/home.scss";
</style>
