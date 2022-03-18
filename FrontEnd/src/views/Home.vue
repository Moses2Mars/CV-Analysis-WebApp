<template>
  <div class="home">
    <MainSection />
    <ForEmployersSection/>
    <HireProfessionalsSection/>
    <ForJobSeekersSection/>
  </div>
</template>

<script>
// @ is an alias to /src
import MainSection from '@/components/MainSection.vue'
import ForEmployersSection from '@/components/ForEmployersSection.vue'
import HireProfessionalsSection from '@/components/HireProfessionalsSection.vue'
import ForJobSeekersSection from '@/components/ForJobSeekersSection.vue'
export default {
  name: 'Home',
  components: {
    MainSection,
    ForEmployersSection,
    HireProfessionalsSection,
    ForJobSeekersSection
  },
  methods:{
  },
}
</script>
