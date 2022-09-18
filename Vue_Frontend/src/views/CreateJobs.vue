<template>
  <div class="container contact-form">
    <div class="contact-image">
        <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact"/>
    </div>
    <form @submit.prevent="createJob">
        <h3>Fill In The Following Form To Create A Job!</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="companyName" class="form-control text-center" placeholder="Company Name" v-model="companyName" :disabled="isLoggedIn"/>
                </div>
                <div class="form-group">
                    <input type="email" name="contactEmail" class="form-control text-center" placeholder="Company Contact / HR Email" v-model="contactEmail" required />
                </div>               
                <div class="form-group">
                  <b style="color:black;">Job Field: </b>
                  <select class="form-select" name='jobField' id='jobField' @change='setJobField($event)' required :key="dropdown_refresh"> &ShortDownArrow;
                    <option disabled selected value class="text-center"> -- select an option -- </option>
                    <option v-for="job_field in all_job_fields" :key="job_field.id" :value='job_field.field' class="text-center">
                      {{job_field.field}}
                    </option>
                  </select>
                </div>
                <div class="form-group">
                    <input type="text" name="jobPosition" class="form-control text-center" placeholder="Job Position" autocomplete="off"  v-model="jobPosition" required/>
                </div>
                <div class="form-group">
                    <b style="color:black;">Schedule Job Listing Release Date: </b>
                    <input type="date" id="releaseDate" v-model='releaseDate' class="text-center form-control" required autocomplete="off" >
                </div>
                <div class="form-group">
                    <b style="color:black;">Job Listing Expiry Date:</b> 
                    <input type="date" id="expiryDate" :min='releaseDate' v-model='expiryDate' class="text-center form-control" required autocomplete="off" >
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <textarea v-model="jobDescription" class="form-control text-area" minlength="50" placeholder="Job Description" required autocomplete="off"></textarea>
                </div>
            </div>
            <div class="form-group">
              <input type="submit" name="btnSubmit" class="btn btn-primary btn-lg" value="Create Job" v-if="!loading" />
              <LoadingComponent v-else></LoadingComponent>
            </div>
        </div>
    </form>
  </div>
</template>

<style scoped>
.text-area {
  text-align: left;
  overflow: auto;
  width: 100%; 
  height: 30em;
  max-height: 31em;
  min-height: 17rem; 
}
</style>

<script>
import LoadingComponent from '../components/LoadingComponent.vue'
export default {
  components: { LoadingComponent },
  data() {
    return {
      all_job_fields: [],
      jobPosition: '',
      jobField: null,
      releaseDate: undefined,
      expiryDate: undefined,
      jobDescription: '',
      loading: false,
      dropdown_refresh: 0,
    }
  },
  methods: {
    setAllJobFields(){
      this.all_job_fields = this.$store.getters['getAllJobFields']
    },
    setJobField(e) {
      this.jobField = e.target.value
    },
    async createJob() {
      if(!this.isLoggedIn)
        return this.$router.push('/login')

      let request = {
        companyId: this.userId,
        companyName: this.companyName,
        contactEmail: this.contactEmail,
        releaseDate: this.releaseDate,
        expiryDate: this.expiryDate,
        fieldRequired: this.jobField,
        positionRequired: this.jobPosition,
        jobDescription: this.jobDescription, 
      }
      
      await this.$http.post('create-job-listing', request)
          .then( ()=> {
            this.$vToastify.success('Job Created Successfully!')
            this.resetFields()
          }).catch( (error) => {
            this.$vToastify.error('Oops... Something Went Wrong!')
            console.error(error)
          })
    },
    resetFields() {
        this.contactEmail = ''
        this.jobPosition= ''
        this.jobField= null
        this.releaseDate= undefined
        this.expiryDate= undefined
        this.jobDescription = ''
        this.dropdown_refresh = this.dropdown_refresh++
    },
  },
  computed: {
    companyName() {
      return this.$store.getters['login_module/getName']
    },
    contactEmail() {
      return this.$store.getters['login_module/getEmail']
    },
    userId() {
      return this.$store.getters['login_module/getUserID']
    },
    isLoggedIn() {
      return this.$store.getters['login_module/getLoggedInStatus']
    },
  },
  mounted() {
    this.setAllJobFields()
  }
}
</script>

<style>

</style>