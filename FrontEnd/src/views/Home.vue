<template>
  <div class="home">
    <MainSection />
    <ForEmployersSection/>
    <HireProfessionalsSection/>
    <ForJobSeekersSection/>
    <JobSeekersAfter id="help-section"/>
    <AboutUsSection id="about-us"/>  
  </div>
</template>

<script>
// @ is an alias to /src
import MainSection from '@/components/MainSection.vue'
import ForEmployersSection from '@/components/ForEmployersSection.vue'
import HireProfessionalsSection from '@/components/HireProfessionalsSection.vue'
import ForJobSeekersSection from '@/components/ForJobSeekersSection.vue'
import AboutUsSection from '@/components/AboutUsSection.vue'
import JobSeekersAfter from '@/components/JobSeekersAfter.vue'
export default {
  name: 'Home',
  components: {
    MainSection,
    ForEmployersSection,
    HireProfessionalsSection,
    ForJobSeekersSection,
    JobSeekersAfter,
    AboutUsSection,
  },
  mounted() {
      var section=this.$router.currentRoute.hash.replace("#", "");
      if (section)
          this.$nextTick(()=> window.document.getElementById(section).scrollIntoView());
  },
}
</script>
