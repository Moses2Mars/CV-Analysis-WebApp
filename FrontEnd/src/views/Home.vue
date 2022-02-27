<template>
  <div class="home">
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
  computed: {
    testData() {
      return this.$store.getters['login_module/getFirstName']
    }
  }
}
</script>
