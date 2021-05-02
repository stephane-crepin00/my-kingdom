<template>
  <div>
    <header>
      <img src="~/assets/img/logo.svg"/>
    </header>
      <div id="content">
        <div>
          <img src="~/assets/img/explain1.svg"/>
        </div>
        <div id="form">
          <h1>Creation de compte</h1>
          <form @submit.prevent="checkForm">
            <p v-if="errors">
              <b>Please correct the following error(s):</b>
              <ul>
                <li v-for="error in errors" v-bind:key="error">{{ error }}</li>
              </ul>
            </p>
            <p>
              <label for="pseudo">Pseudo</label>
              <input type="text" pseudo="pseudo" v-model="pseudo"/>
            </p>
            <p>
              <label for="mdp">Mot de passe</label>
              <input type="text" mdp="mdp" v-model="mdp"/>
            </p>
            <p>
              <label for="mdpconf">Répéter le mot de passe</label>
              <input type="text" mdpconf="mdpconf" v-model="mdpconf"/>
            </p>
            <p>
              <input id="submit" type="submit" value="Connexion">
            </p>
          </form>
        </div>
      </div>
  </div>
</template>

<script lang="ts">
import Vue from 'vue'

export default Vue.extend({
  data: function() {
    return {
      pseudo: null,
      mdp: null,
      mdpconf: null,
      errors: null as string[] | null,
    }
  },

  methods: {
    checkForm: async function () {
      if (this.pseudo && this.mdp && this.mdpconf) {
        const res = {
          pseudo : this.pseudo,
          mdp:  this.mdp,
          mdpconf: this.mdpconf,
        }
        const ip = await this.$axios.$post('http://my-kingdom.com/?api1', res)
        // return { ip }
      }
      this.errors = [];
      if (!this.pseudo) {
        this.errors.push('pseudo required');
      }
      if (!this.mdp) {
        this.errors.push("mdp required");
      }
      if (!this.mdpconf) {
        this.errors.push("mdpconf required");
      }
    }
  }
})
</script>

<style lang="scss">
  @import "~/assets/scss/connexion.scss";
</style>
