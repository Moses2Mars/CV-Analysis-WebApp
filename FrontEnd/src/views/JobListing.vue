<template>
  <div style="min-height: 60rem;"> 
      <InfoForCompany v-if="this.userType=='recruiter'" :data_info="data_info"></InfoForCompany>
      <InfoForUser v-else :data_info="data_info"></InfoForUser>
  </div>
</template>

<script>
import InfoForCompany from '@/components/InfoForCompany.vue'
import InfoForUser from '@/components/InfoForUser.vue'
export default {
    components: {
        InfoForCompany,
        InfoForUser,
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