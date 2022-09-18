<template>
  <div class="main">
    <div v-if="loading">
      <h1> Loading... Please Wait... </h1>
      <LoadingComponent></LoadingComponent>
    </div>
    <div v-else-if="running_jobs.length">
      <div class="main-grid">
        <div class="left-section"> 
          <input type="text" id="search-bar" placeholder="Search Job" class="search-bar" v-model="search_string">
          <div class="job-card-section">
            <JobCard v-for="job in searchableJobs" :key="job.id" :job="job" :is_candidate="true" @click.native="setClickedJob(job)" :class="job_info == job ? 'blue-bg' : 'white-bg'"></JobCard>
          </div>
        </div>
        <div class="right-section">
          <JobInformation v-if="job_info && show_job_details" :job_info="job_info" @showJobDetails="toggleApplyToJob"></JobInformation>
          <ApplyToJob v-if="!show_job_details" :job_info="job_info" @showJobDetails="toggleApplyToJob" />
          <div v-if="!job_info" style="margin-top: 40px;">
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
import JobInformation from '@/components/cardComponents/JobInformation.vue'
import LoadingComponent from '@/components/LoadingComponent.vue'
import ApplyToJob from './ApplyToJob.vue'

export default {
  components: {
    JobCard,
    JobInformation,
    LoadingComponent,
    ApplyToJob,
  },
  data() {
    return {
      running_jobs: [],
      loading: false,
      job_info: undefined,
      job_applicants: [],
      search_string: '',
      show_job_details: true,
    }
  },
  methods: {
    async getAllRunningJobs() {
      this.loading = true;
      await this.$http.get('get-running-jobs')
          .then( (response)=> {
            this.running_jobs = response.data
          }).catch( (error)=> {
            console.error(error)
          })
      this.loading = false;
    },
    setClickedJob(job) {
      this.job_info = job
      this.show_job_details = true
    },
    toggleApplyToJob(bool) {
      this.show_job_details = bool
    }
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
.blue-bg {
  background-color: rgb(72, 176, 255);
  color: rgb(255, 255, 255);
}
.blue-bg:hover {
  background-color: rgb(73, 176, 255);
}
.white-bg {
  background-color: white;
  color: black;
}
.white-bg:hover {
  background-color: rgb(73, 176, 255);
}
.job-card-section {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 1em;
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
  align-items: center;
  flex-direction: column;
  gap: 1em;
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
  height: 600px;
  overflow: auto;
}

.right-section::-webkit-scrollbar-track
{
  box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	border-radius: 10px;
	background-color: #F5F5F5;
}

.right-section::-webkit-scrollbar
{
	width: 12px;
	background-color: #F5F5F5;
}

.right-section::-webkit-scrollbar-thumb
{
	border-radius: 10px;
  box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
	background-color: #555;
}
.search-bar {
  width: 12em;
  font-size: 1.4em;
  border-radius: 8px;
}
</style>