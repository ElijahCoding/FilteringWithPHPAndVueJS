<template>
  <div class="filters">
    <div class="list-group" v-for="map, key in filters">
      <a
      href="#"
      class="list-group-item"
      v-for="filter, value in map"
      >
      {{filter}}
    </a>
    <hr>
    </div>

  </div>
</template>

<script>
  export default {
    props: [
      'endpoint'
    ],

    data() {
      return {
        filters: {}
      }
    },

    mounted () {
      axios.get(this.endpoint).then((response) => {
        this.filters = response.data.data
      })
    }
  }
</script>
