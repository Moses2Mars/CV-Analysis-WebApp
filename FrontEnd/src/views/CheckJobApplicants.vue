<template>
  <div style="min-height: 60rem;">
    <div v-for="job in this.all_job_listings" :key="job.id">
      <JobCard class="job-card" :job="job"></JobCard>
    </div>
  </div>
</template>

<script>
import JobCard from '@/components/JobCard.vue'
export default {
  components: {
    JobCard,
  },
  data () {
    return {
      all_job_listings: [],
    }
  },
  methods: {
    getAllJobListings() {
      this.$http.get(`get-job-listings/${this.companyId}`)
      .then((response)=> {
        console.log(response.data)
        this.all_job_listings = response.data
      })
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
.job-card {
  margin: auto; 
  margin-top: 30px;
}

</style>