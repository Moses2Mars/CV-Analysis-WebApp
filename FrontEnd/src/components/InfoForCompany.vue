<template>
  <div>
      Company: 
      <div v-for="applicant in data_info" :key="applicant.id">
          {{applicant.user_email}}
      </div>
  </div>
</template>

<script>
export default {
    props: {
        data_info: {
            default: null,
            type: undefined
        }
    }
}
</script>

<style>

</style>