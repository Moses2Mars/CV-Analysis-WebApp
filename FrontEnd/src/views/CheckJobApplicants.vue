<template>
  <div class="main">
    <div v-if="loading">
      <h1> Loading... Please Wait... </h1>
      <LoadingComponent></LoadingComponent>
    </div>
    <div v-else-if="all_job_listings.length">
      <div class="main-grid">
        <div class="left-section">
          <input type="text" class="search-bar" placeholder="Search Jobs" v-model="search_string">
          <div class="job-card-section">
            <JobCard v-for="job in searchableJobs" :key="job.id" :job="job" @click.native="getJobCandidates(job)" :class="selected_job == job ? 'blue-bg' : ''"></JobCard>
          </div>
        </div>
        <div class="right-section">
          <div v-if="!show_candidate_info && job_candidates.length && !job_Candidate_loading" class="all-candidates">
            <CandidateCard v-for="candidate in job_candidates" :key="candidate.id" :candidate="candidate" @click.native="viewCandidateInfo(candidate)" />
          </div>
          <CandidateInfo :candidate="this.selected_candidate" @viewAllCandidates="viewAllCandidates" v-else-if="show_candidate_info" />
          <div v-if="job_Candidate_loading">
            <LoadingComponent></LoadingComponent>         
          </div>
          <div v-if="!job_candidates.length && !job_Candidate_loading">
            No Candidates Have Applied So Far
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
import LoadingComponent from '@/components/LoadingComponent.vue'
import CandidateCard from '@/components/cardComponents/CandidateCard.vue'
import CandidateInfo from '../components/CandidateInfo.vue'
export default {
  components: {
    JobCard,
    LoadingComponent,
    CandidateCard,
    CandidateInfo,
  },
  data () {
    return {
      all_job_listings: [],
      job_candidates: [],
      loading: false,
      job_Candidate_loading: false,
      search_string: '',
      selected_candidate: [],
      selected_job: [],
      show_candidate_info: false,
    }
  },
  methods: {
    async getAllJobListings() {
      this.loading = true
        await this.$http.get(`get-job-listings/${this.companyId}`)
        .then((response)=> {
          this.all_job_listings = response.data
        })
      this.loading = false
    },
    async getJobCandidates(job){
      this.viewAllCandidates()
      this.job_Candidate_loading = true
      this.selected_job = job
      //get info from job_applications database
      await this.$http.get(`get-job-applicants/${job.uuid}`)
          .then( (response) => {
              this.job_candidates = response.data
              this.job_candidates.sort((a,b) => (Number(a.percentage) < Number(b.percentage)) ? 1 : ((Number(b.percentage) < Number(a.percentage)) ? -1 : 0))
          }).catch( (error)=> {
              console.error(error)
          })
      this.job_Candidate_loading = false
    },
    viewCandidateInfo(candidate) {
      this.show_candidate_info = true
      this.selected_candidate = candidate
    },
    viewAllCandidates() {
      this.show_candidate_info = false
      this.selected_candidate = []
    }
  },
  computed: {
    companyId() {
      return this.$store.getters['login_module/getUserID']
    },
    searchableJobs() {
      return this.all_job_listings.filter(job => {
        return job.position_required.toLowerCase().includes(this.search_string.toLowerCase()) || job.field_required.toLowerCase().includes(this.search_string.toLowerCase())
      })
    },
  },
  mounted() {
    this.getAllJobListings();
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
.all-candidates {
  display: grid;
  grid-template-columns: repeat( auto-fill, minmax(250px, 1fr) );
  grid-template-rows: repeat( auto-fit, minmax(100px, 1fr) );
  gap: 1em;
  padding: 2em;
}
.blue-bg {
  background-color: rgb(72, 176, 255);
  color: rgb(255, 255, 255);
}
.blue-bg:hover {
  background-color: rgb(73, 176, 255);
}
.search-bar {
  width: 12em;
  font-size: 1.4em;
  border-radius: 8px;
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
.job-card-section {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 1em;
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
}

</style>