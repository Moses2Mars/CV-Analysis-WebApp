<template>
  <div class="main">
    <div v-if="loading">
      <h1> Loading... Please Wait... </h1>
      <LoadingComponent></LoadingComponent>
    </div>
    <div v-else-if="all_job_listings.length">
      <h5>Search For A Job</h5>
      <input type="text" placeholder="Search">
      <div class="main-grid">
        All Results
        <div class="left-section"> 
          <div v-for="job in all_job_listings" :key="job.id">
            <JobCard :job="job" @click.native="getJobApplicants(job)"></JobCard>
          </div>
        </div>
        <div class="right-section">
          <div v-if="job_applicants.length">
            <div v-for="applicant in job_applicants" :key="applicant.id">
              {{applicant.user_email}}
            </div>
          </div>
          <div v-else-if="loading">
            <LoadingComponent></LoadingComponent>         
          </div>
          <div v-else>
            No Applicants Have Applied So Far
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
export default {
  components: {
    JobCard,
    LoadingComponent,
  },
  data () {
    return {
      all_job_listings: [],
      job_applicants: [],
      loading: false,
    }
  },
  methods: {
    getAllJobListings() {
      this.loading = true
        this.$http.get(`get-job-listings/${this.companyId}`)
        .then((response)=> {
          this.all_job_listings = response.data
        })
      this.loading = false
    },
    getJobApplicants(job){
      this.loading = true
      //get info from job_applications database
      this.$http.get(`get-job-applicants/${job.uuid}`)
          .then( (response) => {
              this.job_applicants = response.data
          }).catch( (error)=> {
              console.error(error)
          })
      this.loading = false
    }
  },
  computed: {
    companyId() {
      return this.$store.getters['login_module/getUserID']
    }
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