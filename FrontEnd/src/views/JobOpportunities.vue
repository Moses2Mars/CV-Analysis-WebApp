<template>
  <!-- this page is for candidates only -->
  <div style="min-height: 60rem;">
    <div v-for="job in running_jobs" :key="job.id">
      <JobCard :job="job" :is_candidate='true'></JobCard>
    </div>
  </div>
</template>

<script>
import JobCard from '@/components/JobCard.vue'
export default {
  components: {
    JobCard,
  },
  data() {
    return {
      running_jobs: [],
    }
  },
  methods: {
    getAllRunningJobs() {
      this.$http.get('get-running-jobs')
          .then( (response)=> {
            this.running_jobs = response.data
          }).catch( (error)=> {
            console.error(error)
          })
    }
  },
  mounted() {
    this.getAllRunningJobs()
  }
}
</script>

<style scoped>

</style>