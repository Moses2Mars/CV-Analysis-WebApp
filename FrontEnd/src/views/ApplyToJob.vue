<template>
  <div class="container">

    <img :src="require('../'+job_info.company_logo)" class="company-image">

    <div class="instruction">
        <p role="heading" class="upload-text"> Upload your resume to get started </p>
    </div>
    <form v-on:submit.prevent="applyToJob()" method="POST" enctype="multipart/form-data">
      <div class="devfile">
          <label style="width: 100%;">
            <input class="input" type="file" id="file" ref="file" v-on:change="handleFileUpload($event)" accept="application/pdf,.docx," required/>
          </label>
      </div>

      <div class="types">
          <span style="justify-content: center">as .pdf or .docx file</span>
      </div>

      <div class="flex-class">
          <LoadingComponent v-show="loading"></LoadingComponent>
          <button class="btn-style btnCancel" @click="seeJobDetails" v-show="!loading"> Cancel </button> 
          <button class="btn-style btnSubmit" v-on:submit.prevent="applyToJob()" v-show="!loading">Submit</button>
      </div>
    </form>
  </div>
</template>

<script>
import LoadingComponent from '@/components/LoadingComponent'
export default {
    components: {
      LoadingComponent
    },
    props: {
      job_info: {
        required: true,
        type: String
      }
    },
    data() {
        return {
            loading: false,
            selected_file: undefined,
        }
    },
    methods: {
        seeJobDetails() {
          this.$emit('showJobDetails', true)
        },
        handleFileUpload(event) {
          this.selected_file = event.target.files[0]
        },
        async applyToJob() {
          this.loading = true

          // first let's check if the user has applied to this job before
          const hasApplied = await this.hasApplied()

          if(hasApplied === true) {
            this.loading = false
            return this.$vToastify.error('You Have Already Applied For This Job')
          }

          //form data required to send file over in a post request to flask server
          let formData = new FormData();
          formData.append('email', this.userEmail)
          formData.append('job_uuid', this.job_info['uuid'])
          formData.append('job_description', this.job_info['job_description'])
          formData.append('file', this.selected_file)

          //send information for flask to parse and give us back the percentage of similarity between the job description and the resume
          await this.$http.post('http://127.0.0.1:5000/cv-form', formData, { headers: { 'Content-Type': 'multipart/form-data' } })
              .then( (response) => {
                  formData.append('percentage', response.data)
                  //save values in database
                  this.saveInDatabase(formData)
              })
              .catch( (error)=> {
                  this.loading = false
                  console.error(error)
                  this.$vToastify.error('Something Went Wrong!')
              })
        },
        async hasApplied() {
          let request = {
            email: this.userEmail,
            job_uuid: this.job_info['uuid']
          }
          return await this.$http.post('has-applied', request)
          .then( (response)=> { 
              return Boolean(response.data)
            })
        },
        saveInDatabase(request) {
          //after saving the information in the database, take the user back to the previous page
          this.$http.post('apply-for-job', request)
            .then( ()=> {
              this.loading = false
              this.$vToastify.success('Applied To Job Successfully')
              this.$emit('showJobDetails', true)
            })
            .catch((error)=> {
              this.loading = false
              console.error(error)
            })
        },
    },
    computed: {
        userEmail() {
            return this.$store.getters['login_module/getEmail']
        },
    }
}
</script>
<style scoped>
.flex-class {
  display: flex;
  flex-direction: row;
  gap: 2em;
  justify-content: center;
  align-items: center;
}
.job-info {
  text-transform: capitalize;
  margin-top: 1em;
  font-size: 2em;
  font-weight: 600;
}
.btn-style {
  margin-top: 20%;
  cursor: pointer;
  border-radius: 20px;
  transition: 0.2s;
  color: #ffffff;
  font-size: 12px;
  font-weight: bold;
  padding: 12px 45px;
  letter-spacing: 1px;
  text-transform: uppercase;
}

.company-image {
    object-fit: contain;
    width: 8em; 
    height: 100%;
    aspect-ratio: 1/1;
}

.btnSubmit {
  background-color: rgb(10, 142, 230);
  border: 1px solid rgb(41, 64, 136);
}

.btnSubmit:hover {
  background-color: white;
  color: rgb(88, 109, 175);
}

.btnCancel {
  background-color: rgb(238, 0, 0);
  border: 1px solid rgb(149, 5, 5);
}

.btnCancel:hover {
  background-color: rgb(255, 255, 255);
  color: rgb(255, 0, 0);
}

button.ghost:hover {
  transition: 0.3s;
  background-color: #4873ff;
}

button:active {
  transform: scale(0.95);
}

button:focus {
  outline: none;
}

button.ghost {
  background-color: transparent;
  border-color: #ffffff;
}

.container {
  margin-top: 1em;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-items: center;
  height: 100%;
  padding: 5em;
}
.instruction {
  margin-top: 3%;
}

.input {
  cursor: pointer;
  width: 100%;
  border: 1px solid #ffffff;
  background-color: rgb(10, 142, 230);
  color: #ffffff;
  border-radius: 8px;
  font-size: 12px;
  font-weight: bold;
  padding: 15px 20px;
  letter-spacing: 1px;
  text-transform: uppercase;
  transition: transform 80ms ease-in;
}
.row {
  margin-top: 2%;
}
.upload-text {
    margin: 0.75em auto 0.75em auto;
    font-size: 1.5em;
    line-height: 1.2em;
    text-align: center;
    margin-top: 5%;
    font-weight: bold;
}
</style>