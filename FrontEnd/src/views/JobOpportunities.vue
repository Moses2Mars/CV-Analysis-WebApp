<template>
  <!-- this page is for candidates only -->
  <div style="min-height: 60rem;">
    <div v-if="loading">
      <h1 style="margin-top: 50px;"> Loading... Please Wait... </h1>
    </div>
    <div v-else-if="running_jobs.length">
      <div v-for="job in running_jobs" :key="job.id">
        <JobCard :job="job" :is_candidate='true'></JobCard>
      </div>
    </div>
    <div v-else>
      <h1 style="margin-top: 50px;"> No Jobs Currently Running </h1>
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
      loading: false,
    }
  },
  methods: {
    async getAllRunningJobs() {
      this.loading = true;
      this.$http.get('get-running-jobs')
          .then( (response)=> {
            this.loading = false;
            this.running_jobs = response.data
          }).catch( (error)=> {
            this.loading = false;
            console.error(error)
          })
    }
  },
  async created() {
    await this.getAllRunningJobs()
  }
}
</script>

<style scoped>

</style>