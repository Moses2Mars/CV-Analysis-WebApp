<template>
  <div class="main">
    <div v-if="loading">
      <h1> Loading... Please Wait... </h1>
      <LoadingComponent></LoadingComponent>
    </div>
    <div v-else-if="running_jobs.length">
      <label for="search-bar" style="margin-right: 10px; margin-top: 30px;">Search For A Job</label>
      <input type="text" id="search-bar" placeholder="Search" v-model="search_string">
      <div class="main-grid">
        All Results
        <div class="left-section"> 
          <div v-for="job in searchableJobs" :key="job.id">
            <JobCard :job="job" :is_candidate="true" @click.native="setClickedJob(job)"></JobCard>
          </div>
        </div>
        <div class="right-section">
          <JobInformation v-if="job_info" :job_info="job_info"></JobInformation>
          <div v-else style="margin-top: 40px;">
            <h2>Select A Job To See It's Details! </h2>
          </div>
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
      job_applicants: [],
      search_string: '',
    }
  },
  methods: {
    async getAllRunningJobs() {
      this.loading = true;
      this.$http.get('get-running-jobs')
          .then( (response)=> {
            this.running_jobs = response.data
          }).catch( (error)=> {
            console.error(error)
          })
      this.loading = false;
    },
    setClickedJob(job) {
      this.job_info = job
    },
  },
  computed: {
    searchableJobs() {
      return this.running_jobs.filter(job => {
        return job.position_required.toLowerCase().includes(this.search_string.toLowerCase()) || job.field_required.toLowerCase().includes(this.search_string.toLowerCase())
      })
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
  grid-template-columns: 1fr 2fr;
  grid-template-rows: 0.1fr 10fr;
  background-color: rgb(228, 228, 228);
  border-radius: 5px;
}
.left-section {
  grid-column: 1/2;
  grid-row: 2/3;
  display: flex;
  flex-direction: column;
  height: 600px;
  overflow: auto;
}
.left-section::-webkit-scrollbar-track
{
  box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	border-radius: 10px;
	background-color: #F5F5F5;
}

.left-section::-webkit-scrollbar
{
	width: 12px;
	background-color: #F5F5F5;
}

.left-section::-webkit-scrollbar-thumb
{
	border-radius: 10px;
  box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
	background-color: #555;
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