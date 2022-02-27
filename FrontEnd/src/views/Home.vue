<template>
  <div class="home">
    <!--   <div>
    <h1>The is an about page</h1>
    get laravel response from the button: (check console)
    <button @click="sendLaravelRequest"> click me!</button>
  </div> -->
    {{testData}}
    <HelloWorld msg="Welcome To Our Senior Project Website!"/>
  </div>
</template>

<script>
// @ is an alias to /src
import HelloWorld from '@/components/HelloWorld.vue'

export default {
  name: 'Home',
  components: {
    HelloWorld
  },
  methods:{
    sendLaravelRequest () {
      this.$http.get('/getLaravelTestController').then((response)=>{
        console.log(response.data)
      }).catch((error)=>{
        console.error(error)
      })
    }
  },
  computed: {
    testData() {
      return this.$store.getters['login_module/getFirstName']
    }
  }
}
</script>
