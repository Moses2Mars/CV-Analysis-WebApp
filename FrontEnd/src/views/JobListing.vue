<template>
  <div> 
      hello
  </div>
</template>

<script>
export default {
    data() {
        return {
            job_uuid: this.$router.params.uuid,
        }
    },
    methods: {
        getJobDetails() {
            //send job uuid and get job info
        }
    }
}
</script>

<style>

</style>