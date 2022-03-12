<template>
  <div class="container register-background mt-5 pb-5">
    <form class="form-horizontal" role="form" @submit.prevent="registerUser">
      <br>
      <h1>Registration</h1>
      <div class="form-group m-3">
        <label for='address' class="col-sm-3 control-label" style="font-size: 1.6rem;">User Purpose: </label>
          <div class="col-sm-9 col-md-4 m-auto">
            <select class="form-select" name='purpose' id='purpose' @change='setPurpose($event)' required>
              <option disabled selected value class="text-center"> -- select an option -- </option>
              <option value='jobSeeker' class="text-center">Looking For A Job</option>
              <option value='recruiter' class="text-center">Looking To Recruit Candidates</option>
            </select>
          </div>
      </div>
      <div v-if="this.purpose">
      <div class="form-group m-3" v-if="this.purpose == 'jobSeeker'">
          <label for="firstName" class="col-sm-3 control-label" style="font-size: 1.6rem;">First Name</label>
          <div class="col-sm-9 col-md-4 m-auto">
              <input type="text" id="firstName" v-model='firstName' class="text-center form-control" autofocus autocomplete="off" >
          </div>
      </div>
      <div class="form-group m-3" v-if="this.purpose == 'jobSeeker'">
          <label class="col-sm-3 control-label" style="font-size: 1.6rem;">Last Name</label>
          <div class="col-sm-9 col-md-4 m-auto">
              <input type="text" id="lastName" v-model='lastName' class="text-center form-control m-auto" autofocus autocomplete="off" >
          </div>
      </div>
      <div class="form-group m-3" v-if="this.purpose == 'recruiter'">
              <label for="companyName" class="col-sm-3 control-label" style="font-size: 1.6rem;">Company Name</label>
          <div class="col-sm-9 col-md-4 m-auto">
              <input type="text" id="companyName" v-model="companyName" class="text-center form-control" autocomplete="off" >
          </div>
      </div>
      <div class="form-group m-3">
          <label for="email" class="col-sm-3 control-label" style="font-size: 1.6rem;">Email</label>
          <div class="col-sm-9 col-md-4 m-auto">
              <input type="email" id="email" v-model='email' class="text-center form-control" name= "email" autocomplete="off" >
          </div>
          {{warningMsg}}
      </div>
      <div class="form-group m-3" v-if="this.purpose == 'jobSeeker'">
          <label for="birthDate" class="col-sm-3 control-label" style="font-size: 1.6rem;">Date of Birth</label>
          <div class="col-sm-9 col-md-4 m-auto">
              <input type="date" id="birthDate" v-model='birthDate' min="1970-01-01" max="2012-12-31" class="text-center form-control" autocomplete="off" >
          </div>
      </div>
      <div class="form-group m-3">
        <label for='country' class="col-sm-3 control-label" style="font-size: 1.6rem;">Country: </label>
          <div class="col-sm-9 col-md-4 m-auto">
            <select class="form-select" name='country' id='country' @change='setCountry($event)' required>
              <option disabled selected value class="text-center"> -- select an option -- </option>
              <option v-for="country in all_countries" :key="country.id" :value="country.country" class="text-center">
                {{country.country}}
              </option>
            </select>
          </div>
      </div>
      <div class="form-group m-3" v-if="this.purpose == 'jobSeeker'">
          <label for="phoneNumber" class="col-sm-3 control-label" style="font-size: 1.6rem;">Phone number (optional)</label>
          <div class="col-sm-9 col-md-4 m-auto">
              <input type="phoneNumber" id="phoneNumber" v-model='phoneNumber' class="text-center form-control" autocomplete="off" >
          </div>
      </div>
      <div class="form-group m-3">
          <label for="Address" class="col-sm-3 control-label" style="font-size: 1.6rem;"><span v-if="this.purpose == 'recruiter'">Company</span> Address</label>
          <div class="col-sm-9 col-md-4 m-auto">
              <input type="text" id="Address" v-model="address" class="text-center form-control" autocomplete="off" >
          </div>
      </div>
      <div class="form-group m-3" v-if="this.purpose == 'jobSeeker'">
          <label for="field" class="col-sm-3 control-label" style="font-size: 1.6rem;">Field </label>
          <div class="col-sm-9 col-md-4 m-auto">
            <select class="form-select" name='field' id='field' @change='setJobField($event)' required>
              <option disabled selected value class="text-center"> -- select an option -- </option>
              <option v-for="job_field in all_job_fields" :key="job_field.id" :value='job_field.field' class="text-center">
                {{job_field.field}}
              </option>
            </select>
          </div>
          <!--      
          if we wanted to put an "other" option for job fields, we can use this     
          <input type="text" id="Field" placeholder="Please Fill In Your Main Job Field" v-model="jobField" class="text-center form-control" autocomplete="off" >
           -->
      </div>
      <div class="form-group m-3" v-if="this.purpose == 'jobSeeker'">
          <label for="Experience" class="col-sm-3 control-label" style="font-size: 1.6rem;"> Years Of Experience </label>
          <div class="col-sm-9 col-md-4 m-auto">
              <input type="number" id="Experience" step="0.5" v-model="yearsOfExperience" min="0" max="20" class="text-center form-control" autocomplete="off" >
          </div>
      </div>
      <div class="form-group m-3">
        <label for="password" class="col-sm-3 control-label" style="font-size: 1.6rem;">Password</label>
        <div class="col-sm-9 col-md-4 m-auto">
            <input type="password" id="password" v-model="password" class="text-center form-control" autocomplete="off" >
        </div>
      </div>
      <div class="form-group m-3">
          <label for="confirm-password" class="col-sm-3 control-label" style="font-size: 1.6rem;">Confirm Password</label>
          <div class="col-sm-9 col-md-4 m-auto mb-2">
              <input type="password" id="confirm-password" v-model="confirmPassword" class="text-center form-control" autocomplete="off" >
          </div>
      </div>
      <button type="submit" class="btn btn-secondary mb-4">Register</button>
      </div>
    </form>
  </div>
</template>

<style scoped>
.register-background {
  background-color: rgb(255, 110, 110);
  color: black;
  border-radius: 40px;
}
</style>
<script>
export default {
  name: 'App',
  data() {
    return {
      warningMsg: '',
      firstName: '',
      lastName: '',
      email: '',
      password: '',
      confirmPassword: '',
      birthDate: undefined,
      address: '',
      purpose: '',
      phoneNumber: null,
      jobField: '',
      companyName: '',
      country: '',
      yearsOfExperience: null,
      all_countries: [],
      all_job_fields: [],
    }
  },
  methods: {
    setPurpose(e){
      this.purpose = e.target.value
    },
    setCountry(e){
      this.country = e.target.value
    },
    setJobField(e) {
      this.jobField = e.target.value
    },
    setAllCountries(){
      this.all_countries = this.$store.getters['getAllCountries']
    },
    setAllJobFields(){
      this.all_job_fields = this.$store.getters['getAllJobFields']
    },
    registerUser(){
      //checks if the email format is correct and if passwords match
      if(!this.validateEmail()) return;
      if(!this.validatePassword()) return;

      //set the values to be sent to the backend
      let request = this.setRequest()
      
      console.log('request', request)

      //if purpose is recruiter -> send info to companies table
      this.$http.post('/create-user', request)
        .then( ()=> {
          this.$vToastify.success("Registration Successfull!");
          //after finishing everything, push the user back to the login page.
          this.$router.push('/Login')
        }).catch((error)=>{
          this.$vToastify.error("Oops... Something Went Wrong!");
          console.error(error)
        })
      //else if purpose is jobSeeker -> send info to users table

      
    },
    validateEmail(){
      if (!this.email.toLowerCase().match(/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)) {
          this.warningMsg = 'Please enter a valid email address';
          return false
      }

      this.warningMsg = '';
      return true;
    },
    validatePassword(){
      if(this.password == this.confirmPassword)
        return true
    
      this.password = this.confirmPassword = ''
      this.$vToastify.error("Passwords Dont Match!");
      return false;  
    },
    setRequest(){
      //if jobSeeker, no need for companyName, field and yearsofexperience, birthDate
      if(this.purpose=='jobSeeker') 
        return {
          firstName: this.firstName,
          lastName: this.lastName,
          email: this.email,
          password: this.password,
          birthDate: this.birthDate,
          address: this.address,
          purpose: this.purpose,
          phoneNumber: this.phoneNumber,
          jobField: this.jobField,
          country: this.country,
          yearsOfExperience: this.yearsOfExperience,
        }
        
        return {
          email: this.email,
          password: this.password,
          address: this.address,
          purpose: this.purpose,
          phoneNumber: this.phoneNumber,
          companyName: this.companyName,
          country: this.country,
        }
    },
  },
  mounted () {
    this.setAllCountries()
    this.setAllJobFields()
  }
};
</script>