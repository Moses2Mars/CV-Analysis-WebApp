<template>
  <div class="container register-background">
    <form class="form-horizontal" role="form" @submit.prevent="registerUser">
      <br>
      <h1>Registration</h1>
      <div class="form-group m-3">
        <label for='address' class="col-sm-3 control-label" style="font-size: 1.6rem;">Purpose Of Using This Site: </label>
          <div class="col-sm-9 col-md-4 m-auto">
            <select class="form-control" name='purpose' id='purpose' @change='setPurpose($event)' required>
              <option disabled selected value class="text-center"> -- select an option -- </option>
              <option value='jobSeeker' class="text-center">Looking For A Job</option>
              <option value='recruiter' class="text-center">Looking To Recruit Candidates</option>
            </select>
          </div>
      </div>
      <div class="form-group m-3" v-if="this.purpose == 'jobSeeker'">
          <label for="firstName" class="col-sm-3 control-label" style="font-size: 1.6rem;">First Name</label>
          <div class="col-sm-9 col-md-4 m-auto">
              <input type="text" id="firstName" v-model='firstName' class="text-center form-control" autofocus>
          </div>
      </div>
      <div class="form-group m-3" v-if="this.purpose == 'jobSeeker'">
          <label class="col-sm-3 control-label" style="font-size: 1.6rem;">Last Name</label>
          <div class="col-sm-9 col-md-4 m-auto">
              <input type="text" id="lastName" v-model='lastName' class="text-center form-control m-auto" autofocus>
          </div>
      </div>
      <div class="form-group m-3" v-if="this.purpose == 'recruiter'">
              <label for="companyName" class="col-sm-3 control-label" style="font-size: 1.6rem;">Company Name (optional) </label>
          <div class="col-sm-9 col-md-4 m-auto">
              <input type="text" id="companyName" v-model="companyName" class="text-center form-control">
          </div>
      </div>
      <div class="form-group m-3">
          <label for="email" class="col-sm-3 control-label" style="font-size: 1.6rem;">Email</label>
          <div class="col-sm-9 col-md-4 m-auto">
              <input type="email" id="email" v-model='email' class="text-center form-control" name= "email">
          </div>
          {{warningMsg}}
      </div>
      <div class="form-group m-3" v-if="this.purpose == 'jobSeeker'">
          <label for="birthDate" class="col-sm-3 control-label" style="font-size: 1.6rem;">Date of Birth</label>
          <div class="col-sm-9 col-md-4 m-auto">
              <input type="date" id="birthDate" v-model='dob' min="1970-01-01" max="2012-12-31" class="text-center form-control">
          </div>
      </div>
      <div class="form-group m-3">
        <label for='country' class="col-sm-3 control-label" style="font-size: 1.6rem;">Country: </label>
          <div class="col-sm-9 col-md-4 m-auto">
            <select class="form-control" name='country' id='country' @change='setCountry($event)' required>
              <option disabled selected value class="text-center"> -- select an option -- </option>
              <option value='jobSeeker' class="text-center">List of Countries Will Be Here</option>
            </select>
          </div>
      </div>
      <div class="form-group m-3">
          <label for="phoneNumber" class="col-sm-3 control-label" style="font-size: 1.6rem;">Phone number (optional)</label>
          <div class="col-sm-9 col-md-4 m-auto">
              <input type="phoneNumber" id="phoneNumber" v-model='phoneNumber' class="text-center form-control">
          </div>
      </div>
      <div class="form-group m-3" v-if="this.purpose == 'jobSeeker'">
          <label for="Field" class="col-sm-3 control-label" style="font-size: 1.6rem;">Field </label>
          <div class="col-sm-9 col-md-4 m-auto">
              <input type="text" id="Field" placeholder="Please Fill In Your Main Job Field" v-model="jobField" class="text-center form-control">
          </div>
      </div>
      <div class="form-group m-3" v-if="this.purpose == 'jobSeeker'">
          <label for="Experience" class="col-sm-3 control-label" style="font-size: 1.6rem;"> Years Of Experience </label>
          <div class="col-sm-9 col-md-4 m-auto">
              <input type="number" id="Experience" v-model="yearsOfExperience" class="text-center form-control">
          </div>
      </div>
      <div class="form-group m-3">
          <label for="Address" class="col-sm-3 control-label" v-if="this.purpose == 'recruiter'" style="font-size: 1.6rem;">Company Address</label>
          <label for="Address" class="col-sm-3 control-label" style="font-size: 1.6rem;" v-else>Address</label>
          <div class="col-sm-9 col-md-4 m-auto">
              <input type="text" id="Address" v-model="address" class="text-center form-control">
          </div>
      </div>
      <div class="form-group m-3">
        <label for="password" class="col-sm-3 control-label" style="font-size: 1.6rem;">Password</label>
        <div class="col-sm-9 col-md-4 m-auto">
            <input type="password" id="password" v-model="password" class="text-center form-control">
        </div>
      </div>
      <div class="form-group m-3">
          <label for="confirm-password" class="col-sm-3 control-label" style="font-size: 1.6rem;">Confirm Password</label>
          <div class="col-sm-9 col-md-4 m-auto mb-2">
              <input type="password" id="confirm-password" v-model="confirmPassword" class="text-center form-control">
          </div>
      </div>
      <button type="submit" class="btn btn-primary btn-block mb-4">Register</button>
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
      dob: undefined,
      address: '',
      purpose: '',
      phoneNumber: null,
      jobField: '',
      companyName: '',
      country: '',
      yearsOfExperience: null,
    };
  },
  methods: {
    setPurpose(e){
      this.purpose = e.target.value
    },
    setCountry(e){
      this.country = e.target.value
    },
    registerUser(){
      //checks if the email format is correct
      if(!this.validateEmail()) return;

      if(this.password != this.confirmPassword) return;
      
      //send these values to the backend and insert them to the database
      let request = {}
      
      //if jobSeeker, no need for companyName, field and yearsofexperience, dob
      if(this.purpose=='jobSeeker') 
        request = {
          firstName: this.firstName,
          lastName: this.lastName,
          email: this.email,
          password: this.password,
          dob: this.dob,
          address: this.address,
          purpose: this.purpose,
          phoneNumber: this.phoneNumber,
          jobField: this.jobField,
          country: this.country,
          yearsOfExperience: this.yearsOfExperience,
        }
      else 
        request = {
          firstName: this.firstName,
          lastName: this.lastName,
          email: this.email,
          password: this.password,
          address: this.address,
          purpose: this.purpose,
          phoneNumber: this.phoneNumber,
          companyName: this.companyName,
          country: this.country,
        }

      console.log(request)

      //resets all the input values
      this.resetForm()
      //after finishing everything, push the user back to the login page.
      this.$router.push('/Login')
    },
    validateEmail(){
      if (!this.email.toLowerCase().match(/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)) {
          this.warningMsg = 'Please enter a valid email address';
          return false
      }else{
        this.warningMsg = '';
        return true;
      }
    },
    resetForm(){
      this.allowRegistration=false,
      this.warningMsg= ''
      this.firstName=''
      this.lastName= ''
      this.email= ''
      this.password= ''
      this.confirmPassword= ''
      this.dob= undefined
      this.address= ''
      this.purpose= ''
      this.phoneNumber= null
      this.jobField= ''
      this.companyName= ''
      this.country= ''
      this.yearsOfExperience= null
    }
  }
};
</script>