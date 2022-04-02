<template>
  <div class="main">
    <div v-if="loading">
      <h1> Loading... Please Wait... </h1>
      <LoadingComponent></LoadingComponent>
    </div>
    <div v-else-if="all_job_listings.length">
      <label for="search-bar" style="margin-right: 10px; margin-top: 30px;">Search For A Job</label>
      <input type="text" id="search-bar" placeholder="Search" v-model="search_string">
      <div class="main-grid">
        All Results
        <div class="left-section"> 
          <div v-for="job in searchableJobs" :key="job.id">
            <JobCard :job="job" @click.native="getJobCandidates(job)"></JobCard>
          </div>
        </div>
        <div class="right-section">
          <div v-if="job_candidates.length">
            <p class="mt-2" style="font-size: 90%"> Click a Candidate To Download Their CV!</p>
            <div v-for="candidate in job_candidates" :key="candidate.id">
              <CandidateCard :candidate="candidate"> </CandidateCard>
            </div>
          </div>
          <div v-else-if="other_loading">
            <LoadingComponent></LoadingComponent>         
          </div>
          <div v-else>
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
export default {
  components: {
    JobCard,
    LoadingComponent,
    CandidateCard,
  },
  data () {
    return {
      all_job_listings: [],
      job_candidates: [],
      loading: false,
      other_loading: false,
      search_string: '',
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
      this.other_loading = true
      //get info from job_applications database
      await this.$http.get(`get-job-applicants/${job.uuid}`)
          .then( (response) => {
              this.job_candidates = response.data
              this.job_candidates.sort((a,b) => (Number(a.percentage) < Number(b.percentage)) ? 1 : ((Number(b.percentage) < Number(a.percentage)) ? -1 : 0))
          }).catch( (error)=> {
              console.error(error)
          })
      this.other_loading = false
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