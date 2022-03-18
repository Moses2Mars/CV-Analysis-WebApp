<template>
  <div class="home">
    <HeroSection />
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
  },
}
</script>
