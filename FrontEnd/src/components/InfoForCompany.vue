<template>
  <div>
      Users That Have Applied:
      <div v-if="data_info.length === 0"> None </div>
      <div else v-for="applicant in data_info" :key="applicant.id">
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