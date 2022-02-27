<template>
  <div class="home">
    <!--   <div>
    <h1>The is an about page</h1>
    get laravel response from the button: (check console)
    <button @click="sendLaravelRequest"> click me!</button>
  </div> -->
    <HeroSection/>
  </div>
</template>

<script>
// @ is an alias to /src
import HeroSection from '@/components/HeroSection.vue'

export default {
  name: 'Home',
  components: {
    HeroSection
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
}
</script>
