<template>
  <div>        
    <header class="masthead text-center text-white">
        <div class="masthead-content">
            <div class="container px-5">
                <h1 class="masthead-heading mb-0">E-Recruitment</h1>
                <h2 class="masthead-subheading mb-0">Welcome To Our Senior Project</h2>
                <a class="btn btn-primary btn-xl rounded-pill mt-5" href="#scroll">Learn More</a>
            </div>
        </div>
        <div class="bg-circle-1 bg-circle"></div>
        <div class="bg-circle-2 bg-circle"></div>
        <div class="bg-circle-3 bg-circle"></div>
        <div class="bg-circle-4 bg-circle"></div>
    </header>
    <GoalSection/>
    <hr>
    <AfterSection/>
  </div>
</template>

<script>
import GoalSection from './GoalSection.vue'
import AfterSection from './AfterSection.vue'
export default {
  name: "HelloWorld",
  components: {
    GoalSection,
    AfterSection
  },
};
</script>
