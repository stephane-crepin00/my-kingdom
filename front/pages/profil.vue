<template>
  <div>
    <p>profil</p>
  </div>
</template>

<script lang="ts">
import Vue from 'vue'

export default Vue.extend({
  methods: {
    goToProfil() {
      this.$router.push('/profil');
    },
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
