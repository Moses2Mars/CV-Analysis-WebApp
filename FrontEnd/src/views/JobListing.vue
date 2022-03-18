<template>
  <div style="min-height: 30rem;"> 
      <JobInformation :data_info="data_info"></JobInformation>
      <InfoForCompany v-if="this.userType=='recruiter'" :data_info="data_info"></InfoForCompany>
  </div>
</template>

<script>
import InfoForCompany from '@/components/InfoForCompany.vue'
import JobInformation from '@/components/JobInformation.vue'
export default {
    components: {
        InfoForCompany,
        JobInformation,
    },
    data() {
        return {    
            job_uuid: this.$route.params.uuid,
            data_info: undefined,
        }
    },
    methods: {
        getJobDetails() {
            if(this.userType=='recruiter'){
                //get info from job_applications database
                this.$http.get(`get-job-applicants/${this.job_uuid}`)
                    .then( (response) => {
                        this.data_info = response.data
                    }).catch( (error)=> {
                        console.error(error)
                    })
            }else {
                //get info from job_listings page
                this.$http.get(`get-job/${this.job_uuid}`)
                    .then( (response) => {
                        this.data_info = response.data
                    }).catch( (error)=> {
                        console.error(error)
                    })
            }
        }
    },
    computed: {
        userType() {
            return this.$store.getters['login_module/getPurpose']
        },
    },
    mounted() {
        this.getJobDetails()
    }
}
</script>

<style>

</style>