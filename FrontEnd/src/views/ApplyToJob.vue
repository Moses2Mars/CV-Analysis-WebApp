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

            <div class="devfile">
                <label>
                <input class="input" type="file" id="file" ref="file" v-on:change="handleFileUpload()" />
                </label>
            </div>

            <div class="types">
                <span style="justify-content: center">as .pdf or .docx file</span>
            </div>

            <div>
                <button class="btnLocation" v-on:click="applyForJob()">Submit</button>
            </div>

        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            loading: false,
            job_uuid: this.$route.params.uuid,
        }
    },
    methods: {
        handleFileUpload() {
            this.$vToastify.error('Work In Progress')
        },
        async applyForJob() {
            this.loading = true

            let request= {
                email: this.userEmail,
                job_uuid: this.job_uuid,
            }

            await this.$http.post('apply-for-job', request)
                .then( () => {
                    this.$vToastify.success('Applied To Job Successfully')
                })
                .catch( (error)=> {
                    if(error.response.status == 512)
                        return this.$vToastify.error('You Have Already Applied To This Job!')
                    this.$vToastify.error('Something Went Wrong!')
                })
            this.loading = false
        }
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
.devfile {
  margin-top: 5%;
  width: 50%;
  align-items: center;
  align-content: center;
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