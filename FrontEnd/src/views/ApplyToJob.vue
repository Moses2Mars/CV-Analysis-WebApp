<template>
    <div>
        <div class="row">
            <div class="text-blue display-1">Hello Candidate</div>
            <div class="text-dark pt-2 fs-3">Submit your Cv and best of Luck.</div>
        </div>

        <div class="container">

            <div class="documentIcon" style="">
                <img src="https://static.jobscan.co/images/homePage/document.svg" alt="document icon"/>
            </div>

            <div class="instruction">
                <p role="heading" class="upload-text">
                Upload your resume to get started
                </p>
            </div>
            <form v-on:submit.prevent="applyToJob()" method="POST" enctype="multipart/form-data">
              <div class="devfile">
                  <label style="width: 100%;">
                    <input class="input" type="file" id="file" ref="file" v-on:change="handleFileUpload($event)" accept="application/pdf,application/msword,
                    application/vnd.openxmlformats-officedocument.wordprocessingml.document" required/>
                  </label>
              </div>

              <div class="types">
                  <span style="justify-content: center">as .pdf or .docx file</span>
              </div>

              <div>
                  <LoadingComponent v-show="loading"></LoadingComponent>
                  <button class="btnLocation" v-on:submit.prevent="applyToJob()" v-show="!loading">Submit</button>
              </div>
            </form>
        </div>
    </div>
</template>
<script>
import LoadingComponent from '@/components/LoadingComponent'
export default {
    components: {
      LoadingComponent
    },
    data() {
        return {
            loading: false,
            selected_file: undefined,
            job_uuid: this.$route.params.uuid,
            job_description: '',
        }
    },
    methods: {
        handleFileUpload(event) {
          this.selected_file = event.target.files[0]
        },
        async applyToJob() {
          this.loading = true

          // first let's check if the user has applied to this job before
          const hasApplied = await this.hasApplied()

          if(hasApplied === true) {
            console.log(hasApplied)
            this.loading = false
            this.$vToastify.error('You Have Already Applied For This Job')
            return this.$router.go(-1)
          }

          //then let's get the job description to send to the flask server
          await this.getJobDescription()

          //form data required to send file over in a post request to flask server
          const formData = new FormData();
          formData.append('email', this.userEmail)
          formData.append('job_uuid', this.job_uuid)
          formData.append('job_description', this.job_description)
          formData.append('file', this.selected_file)

          //send information for flask to parse and give us back the percentage of similarity between the job description and the resume
          await this.$http.post('http://127.0.0.1:5000/cv-form', formData, { headers: { 'Content-Type': 'multipart/form-data' } })
              .then( (response) => {
                let request = {
                  email: this.userEmail,
                  job_uuid: this.job_uuid,
                  percentage: response.data
                }
                  //save values in database
                  this.saveInDatabase(request)
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
            job_uuid: this.job_uuid
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
              this.$router.go(-1)
            })
            .catch((error)=> {
              this.loading = false
              console.error(error)
            })
        },
        async getJobDescription(){
          return await this.$http.get(`get-job/${this.job_uuid}`)
                .then( (response) => {
                  this.job_description = response.data.job_description
                })
                .catch( (error)=> {
                  this.loading = false
                  console.error(error)
                })
        }
    },
    computed: {
        userEmail() {
            return this.$store.getters['login_module/getEmail']
        },
    }
}
</script>
<style scoped>
@import url("https://fonts.googleapis.com/css?family=Montserrat:400,800");
* {
  box-sizing: border-box;
}
body {
  background: #f6f5f7;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  font-family: "Montserrat", sans-serif;
  height: 100vh;
  margin: -20px 0 50px;
}
h1 {
  font-weight: bold;
  margin: 0;
}
h2 {
  text-align: center;
}
p {
  font-size: 14px;
  font-weight: 100;
  line-height: 20px;
  letter-spacing: 0.5px;
  margin: 20px 0 30px;
}
span {
  font-size: 12px;
}
a {
  color: #333;
  font-size: 14px;
  text-decoration: none;
  margin: 15px 0;
}

footer {
  background-color: #222;
  color: #fff;
  font-size: 14px;
  bottom: 0;
  position: fixed;
  left: 0;
  right: 0;
  text-align: center;
  z-index: 999;
}

.types {
  margin-top: 3%;
}
.btnLocation {
  margin-top: 20%;
  cursor: pointer;
  border-radius: 20px;
  transition: 0.2s;
  border: 1px solid rgb(41, 64, 136);
  color: #ffffff;
  background-color: rgb(10, 142, 230);
  font-size: 12px;
  font-weight: bold;
  padding: 12px 45px;
  letter-spacing: 1px;
  text-transform: uppercase;
}
.btnLocation:hover {
  background-color: white;
  color: rgb(88, 109, 175);
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
  margin: auto;
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
  position: relative;
  overflow: hidden;
  width: 768px;
  max-width: 100%;
  min-height: 480px;
  margin-top: 30px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
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