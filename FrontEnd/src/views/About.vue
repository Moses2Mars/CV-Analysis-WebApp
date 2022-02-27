<template>
  <div>
    <h1>The is an about page</h1>
    get laravel response from the button: (check console)
    <button @click="sendLaravelRequest"> click me!</button>
  </div>
</template>

<script>
export default {
  data () {
    return {

    }
  },
  methods: {
    sendLaravelRequest () {
      this.$http.get('/getLaravelTestController').then((response)=>{
        console.log(response.data)
      })
    }

  }
}
</script>