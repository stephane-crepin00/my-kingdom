<template>
  <div>
  <p>{{ip.user.login}}</p>
  </div>
</template>

<script lang="ts">
import Vue from 'vue'

export default Vue.extend({
  async asyncData({ $axios }) {
    const ip = await $axios.$get('http://my-kingdom.com/?api')
    return { ip }
  }
})
</script>
