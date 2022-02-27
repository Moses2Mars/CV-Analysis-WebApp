<template>
  <div id='app'>
    <form @submit.prevent='registerUser'>
      <div>
        <label for='firstName'>First Name</label>
        <input name='firstName' v-model='firstName' placeholder='first name' required>
      </div>
      <div>
        <label for='lastName'>Last Name</label>
        <input name='lastName' v-model='lastName' placeholder='last name' required>
      </div>
      <div>
        <label for='Email'>Email</label>
        <input name='Email' v-model='email' placeholder='Email' required @blur="validateEmail">
        <h3>{{warningMsg}}</h3>
      </div>
      <div>
        <label for='dob'>Date Of Birth: </label>
        <input name='dob' v-model='dob' type='date' required>
      </div>
      <div>
        <label for='password'>Password</label>
        <input name='password' v-model='password' placeholder='password' type='password' required>
      </div>
      <div>
        <label for='address'>Address</label>
        <input name='address' v-model='address' placeholder='address' required>
      </div>
      <div>
        <label for='address'>Purpose Of Using This Site: </label>
        <select name='purpose' id='purpose' @change='setPurpose($event)'>
          <option disabled selected value> -- select an option -- </option>
          <option value='jobSeeker'>Looking For A Job</option>
          <option value='recruiter'>Recruiting Candidates</option>
        </select>
      </div>
      <input type='submit' value='register'>
    </form>
  </div>
</template>

<script>
export default {
  name: 'App',
  data() {
    return {
      allowRegistration: false,
      warningMsg: '',
      firstName: '',
      lastName: '',
      email: '',
      password: '',
      dob: undefined,
      address: '',
      purpose: '',
    };
  },
  methods: {
    setPurpose(e){
      this.purpose = e.target.value
    },
    registerUser(){
      if(!this.allowRegistration) return;
      //check if email is correct format, then send these values to the backend and insert them to the database
      let request = {
        firstName: this.firstName,
        lastName: this.lastName,
        email: this.email,
        password: this.password,
        dob: this.dob,
        address: this.address,
        purpose: this.purpose
      }
      console.log(request)

      //resets all the input values
      this.resetForm()
      //after finishing everything, push the user back to the login page.
      this.$router.push('/Login')
    },
    validateEmail(){
      if (this.email.split('') != '' && !this.email.toLowerCase().match(/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)) {
          this.warningMsg = 'Please enter a valid email address';
          this.allowRegistration = false
      }else{
        this.warningMsg = '';
        this.allowRegistration = true;
      }
    },
    resetForm(){
      this.firstName= '',
      this.lastName= '',
      this.email= '',
      this.password= '',
      this.dob= undefined,
      this.address= ''
    }
  }
};
</script>