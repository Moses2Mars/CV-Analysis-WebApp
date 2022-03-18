<template>
  <div class="main">
    <div v-if="loading">
      <h1> Loading... Please Wait... </h1>
      <LoadingComponent></LoadingComponent>
    </div>
    <div v-else-if="running_jobs.length">
      <h5>Search For A Job</h5>
      <input type="text" placeholder="Search">
      <div class="main-grid">
        All Results
        <div class="left-section"> 
          <div v-for="job in running_jobs" :key="job.id">
            <JobCard :job="job" :is_candidate="true" @click.native="setClickedJob(job)"></JobCard>
          </div>
        </div>
        <div class="right-section">
          <JobInformation :job_info="job_info"></JobInformation>
        </div>
      </div>
    </div>
    <div v-else>
      <h1> No Jobs Currently Running </h1>
    </div>
  </div>
</template>

<script>
import JobCard from '@/components/cardComponents/JobCard.vue'
import JobInformation from '@/components/JobInformation.vue'
import LoadingComponent from '@/components/LoadingComponent.vue'
export default {
  components: {
    JobCard,
    JobInformation,
    LoadingComponent
  },
  data() {
    return {
      running_jobs: [],
      loading: false,
      job_info: undefined,
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
    },
    setClickedJob(job) {
      this.job_info = job
    }
  },
  async created() {
    await this.getAllRunningJobs()
  }
}
</script>

<style scoped>
.main {
  min-height: 30rem; 
}
h1 {
  margin-top: 50px;
}
.main-grid {
  margin: 20px;
  padding: 20px;
  display: grid;
  grid-template-columns: 1fr 4fr;
  grid-template-rows: 0.1fr 10fr;
  background-color: rgb(228, 228, 228);
  border-radius: 5px;
}
.left-section {
  grid-column: 1/2;
  grid-row: 2/3;
  display: flex;
  flex-direction: column;
}
.right-section {
  grid-column: 2/3;
  grid-row: 2/3;
  display: flex;
  flex-direction: column;
  margin: 30px;
  background-color: rgb(255, 255, 255);
  border-radius: 3px;
}
</style>