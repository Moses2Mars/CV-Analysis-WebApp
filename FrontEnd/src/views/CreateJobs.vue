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
                    Company Name: 
                    <input type="text" name="companyName" class="form-control text-center" placeholder="Company Name" v-model="companyName" disabled/>
                </div>
                <div class="form-group">
                    <input type="email" name="contactEmail" class="form-control text-center" placeholder="Company Contact / HR Email" v-model="contactEmail" required />
                </div>               
                <div class="form-group">
                  Job Field:
                  <select class="form-select" name='jobField' id='jobField' @change='setJobField($event)' required> &ShortDownArrow;
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
                    <input type="number" name="minExperience" class="form-control text-center" min="0" max="12" step="0.5" autocomplete="off"  placeholder="Minimum Years Of Experience" v-model="minExperience" required/>
                </div>
                <div class="form-group">
                    <input type="number" name="applicantsNeeded" class="form-control text-center" min="1" autocomplete="off"  placeholder="Applicants Needed" v-model="applicantsNeeded" required/>
                </div>
                <div class="form-group">
                    Schedule Job Listing Release Date: 
                    <input type="date" id="releaseDate" v-model='releaseDate' class="text-center form-control" required autocomplete="off" >
                </div>
                <div class="form-group">
                  Job Listing Expiry Date: 
                    <input type="date" id="expiryDate" :min='releaseDate' v-model='expiryDate' class="text-center form-control" required autocomplete="off" >
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <textarea name="jobDescription" class="form-control text-area-size" v-model="jobDescription" minlength="50" placeholder="Job Description" required autocomplete="off" ></textarea>
                </div>
            </div>
            <div class="form-group">
              <input type="submit" name="btnSubmit" class="btn btn-primary btn-lg" value="Create Job" />
            </div>
        </div>
    </form>
  </div>
</template>

<style scoped>
.text-area-size {
  width: 100%; 
  height: 41em;
  min-height: 17rem; 
  max-height: 41em;
}
</style>

<script>
export default {
  data() {
    return {
      all_job_fields: [],
      jobPosition: '',
      jobField: null,
      releaseDate: undefined,
      expiryDate: undefined,
      minExperience: null,
      jobDescription: '',
      applicantsNeeded: null,
    }
  },
  methods: {
    setAllJobFields(){
      this.all_job_fields = this.$store.getters['getAllJobFields']
    },
    setJobField(e) {
      this.jobField = e.target.value
    },
    createJob() {
      let request = {
        companyId: this.userId,
        companyName: this.companyName,
        contactEmail: this.contactEmail,
        releaseDate: this.releaseDate,
        expiryDate: this.expiryDate,
        fieldRequired: this.jobField,
        positionRequired: this.jobPosition,
        applicantsNeeded: this.applicantsNeeded,
        requiredExperience: this.minExperience,
        jobDescription: this.jobDescription, 
      }
      
      this.$http.post('create-job-listing', request)
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
        this.minExperience= null
        this.jobDescription= ''
        this.applicantsNeeded= null
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
    }
  },
  mounted() {
    this.setAllJobFields()
  }
}
</script>

<style>

</style>