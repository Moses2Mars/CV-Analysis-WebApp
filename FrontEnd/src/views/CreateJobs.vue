<template>
  <div class="container contact-form">
    <div class="contact-image">
        <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact"/>
    </div>
    <form method="post">
        <h3>Fill In The Following Form To Create A Job!</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    note: there should be an option to use default values
                    <input type="text" name="companyName" class="form-control" placeholder="Company Name" value="" />
                </div>
                <div class="form-group">
                    <input type="text" name="contactEmail" class="form-control" placeholder="Company / HR Email" value="" />
                </div>
                note: get list of possible jobs from the database and use a for loop 
                <div class="form-group">
                  <select class="form-select" name='field' id='field' @change='setField($event)' required> &ShortDownArrow;
                    <option disabled selected value class="text-center"> -- select an option -- </option>
                    <option value='CompSci' class="text-center">Computer Science</option>
                    <option value='Admin' class="text-center">Administration</option>
                  </select>
                </div>
                <div class="form-group">
                    <input type="text" name="jobPosition" class="form-control" placeholder="Job Position" value="" />
                </div>
                <div class="form-group">
                    <input type="number" name="minExperience" class="form-control" min="0" max="5" placeholder="Minimum Years Of Experience" value="" />
                </div>
                <div class="form-group">
                    Schedule Release Date: 
                    <input type="date" id="birthDate" v-model='currentDate' class="text-center form-control">
                </div>
                <div class="form-group">
                  Job Listing Expiry Date: 
                    <input type="date" id="birthDate" v-model='expiryDate' class="text-center form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                  note: maybe add text styling like bold, italic and font size?
                    <textarea name="jobDescription" class="form-control text-area-size" placeholder="Job Description"></textarea>
                </div>
            </div>
            <div class="form-group">
              <input type="submit" name="btnSubmit" class="btnContact" value="Create Job" />
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
      field: null,
      currentDate: undefined,
      expiryDate: undefined,
    }
  },
  methods: {
    setField(e){
      this.field = e.target.value
    },
    setCurrentDate(){
      const dateObj = new Date();
      const currentDate = dateObj.getFullYear()+"/"+(dateObj.getMonth()+1)+"/"+dateObj.getDate();
      this.currentDate = currentDate;
    }
  },
  mounted(){
    this.setCurrentDate();
  }
}
</script>

<style>

</style>