<template>
  <div>        
    <header class="masthead text-center text-white">
        <div class="masthead-content">
            <div class="container px-5">
                <h1 class="masthead-heading mb-0">E-Recruitment</h1>
                <h2 class="masthead-subheading mb-0">Welcome To Our Senior Project</h2>
                <a class="btn btn-primary btn-xl rounded-pill mt-5" href="#scroll">Learn More</a>
            </div>
        </div>
        <div class="bg-circle-1 bg-circle"></div>
        <div class="bg-circle-2 bg-circle"></div>
        <div class="bg-circle-3 bg-circle"></div>
        <div class="bg-circle-4 bg-circle"></div>
    </header>
    <section id="scroll">
        <div class="container px-5">
          <div class="row gx-5 align-items-center">
              <div class="col-lg-6 order-lg-2">
                  <div class="p-5"><img class="img-fluid rounded-circle" src="../assets/img/GoalCropped.jpg" alt="..." /></div>
              </div>
              <div class="col-lg-6 order-lg-1">
                  <div class="p-5">
                      <h2 class="display-4">Our Goal: </h2>
                      <p>What we aim to do with this project is to provide candidates a quick and easy way to apply to jobs, 
                        and a way to make the hiring process for job seekers a lot easier and less stressfull.</p>
                  </div>
              </div>
          </div>
        </div>
    </section>
  </div>
</template>

<script>
export default {
  name: "HelloWorld",
  props: {
    msg: String,
  },
};
</script>
