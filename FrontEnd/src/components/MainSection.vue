<template>
  <div>        
    <div class="masthead text-center text-white pt-5">
      <div class="masthead-content">
        <div class="container">
          <div class="row">
            <div class="col-12"> 
                <div class="text-blue display-1">Recruiting</div>
                <div class="text-wrapper text-dark display-1 pb-5">
                  <div class="box b1">Inspiration</div>
                    <div class="box b2">Creativity</div>
                    <div class="box b3">Professionals</div>
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
            <button class="btn-post my-5 ms-5 fw-bold" @click="routeTo('/create-jobs')">
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
            <button class="btn-find my-5 fw-bold" @click="routeTo('/find-work')">
              Find Work
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
</template>

<script>
export default {
  methods: {
    routeTo(link) {
        this.$router.push(link)
    }
  },
  computed: {
    userType() {
      return this.$store.getters['login_module/getPurpose']
    },
  }
};
</script>
