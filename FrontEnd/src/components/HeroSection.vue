<template>
  <div>        
    <!-- <header class="masthead text-center text-white">
        <div class="masthead-content">
            <div class="container px-5">
                <div class="masthead-heading mb-0 text-dark">Recruiting</div>
                <div class="text-wrapper">
                  <div class="box b1">Inspiration</div>
                  <div class="box b2">Creativity</div>
                  <div class="box b3 ms-5">Profesionals</div>
                </div>
                 <h2 class="masthead-subheading mb-0">Welcome To Our Senior Project</h2> -->
                <!-- <a class="btn btn-primary btn-xl rounded-pill mt-5" href="#scroll">Learn More</a> -->
            <!-- </div>
        </div>
        <div class="bg-circle-1 bg-circle"></div>
        <div class="bg-circle-2 bg-circle"></div>
        <div class="bg-circle-3 bg-circle"></div>
        <div class="bg-circle-4 bg-circle"></div>
    </header> --> 
  <div class="masthead text-center text-white pt-5">
    <div class="masthead-content">
      <div class="container">
        <div class="row">
          <div class="col-12"> 
              <div class="text-blue display-1">Recruiting</div>
              <div class="text-wrapper text-dark display-1 pb-5">
                <div class="box b1">Inspiration</div>
                  <div class="box b2">Creativity</div>
                  <div class="box b3">Profesionals</div>
                  <div class="box b4">Personality</div>
              </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="pt-5">
              <div class="text-dark pt-5 fs-3">
                The job marketplace and community that connects and matches companies with remote professionals using<span class="blue-dash"> personality prediction system</span>.
              </div>
            </div>
          </div>
      </div>

      <div class="row">
        <div class="col-5 text-center align-center">
          <div class="d-flex justify-content-end"> 
            <button class="btn-post my-5 ms-5 fw-bold">
              Post Jobs
            </button>
          </div>
        </div>
        <div class="col-2 text-dark pt-5">
          <div class="pt-2"> 
            or
          </div>
        </div>
        <div class="col-5 text-center">
          <div class="d-flex justify-content-start">
            <button class="btn-find my-5 fw-bold">
              Find Work
            </button>
          </div>
        </div>

      </div>



      </div>
    </div>
  </div>
    <GoalSection/>
    <hr>
    <AfterSection/>
  </div>
</template>

<script>
import GoalSection from './GoalSection.vue'
import AfterSection from './AfterSection.vue'
export default {
  name: "HelloWorld",
  components: {
    GoalSection,
    AfterSection
  },
};
</script>
