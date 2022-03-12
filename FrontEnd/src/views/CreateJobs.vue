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
                    <!-- note: there should be an option to use default values from when the company registered-->
                    Company Name: 
                    <input type="text" name="companyName" class="form-control text-center" placeholder="Company Name" v-model="companyName" disabled/>
                </div>
                <div class="form-group">
                    <input type="email" name="contactEmail" class="form-control text-center" placeholder="Company Contact / HR Email" v-model="contactEmail" required />
                </div>
                <!-- note: get list of possible jobs from the database and use a for loop  -->               
                <div class="form-group">
                  Job Field:
                  <select class="form-select" name='field' id='field' @change='setField($event)' required> &ShortDownArrow;
                    <option disabled selected value class="text-center"> -- select an option -- </option>
                    <option value='CompSci' class="text-center">Computer Science</option>
                    <option value='Admin' class="text-center">Administration</option>
                  </select>
                </div>
                <div class="form-group">
                    <input type="text" name="jobPosition" class="form-control text-center" placeholder="Job Position" autocomplete="off"  v-model="jobPosition" required/>
                </div>
                <div class="form-group">
                    <input type="number" name="minExperience" class="form-control text-center" min="0" max="5" autocomplete="off"  placeholder="Minimum Years Of Experience" v-model="minExperience" required/>
                </div>
                <div class="form-group">
                    Schedule Job Listing Release Date: 
                    <input type="date" id="releaseDate" v-model='releaseDate' class="text-center form-control" required autocomplete="off" >
                </div>
                <div class="form-group">
                  Job Listing Expiry Date: 
                    <input type="date" id="expiryDate" v-model='expiryDate' class="text-center form-control" required autocomplete="off" >
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                  <!-- note: maybe add text styling like bold, italic and font size? -->
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
  height: 35em;
  min-height: 17rem; 
  max-height: 35em;
}
</style>

<script>
export default {
  data() {
    return {
      companyName: 'AUST',
      contactEmail: '',
      jobPosition: '',
      field: null,
      releaseDate: undefined,
      expiryDate: undefined,
      minExperience: null,
      jobDescription: '',
    }
  },
  methods: {
    setField(e){
      this.field = e.target.value
    },
    createJob() {
      this.$vToastify.success('Job Created Successfully!')
      this.resetFields()
    },
    resetFields() {
      this.companyName= 'AUST',
      this.contactEmail= '',
      this.jobPosition= '',
      this.field= null,
      this.releaseDate= undefined,
      this.expiryDate= undefined,
      this.minExperience= null,
      this.jobDescription= ''
    },
  },
}
</script>

<style>

</style>