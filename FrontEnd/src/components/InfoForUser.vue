<template>
  <div>
      User:
      {{data_info}}
      <button @click="applyToJob"> Apply For This Job</button>
  </div>
</template>

<script>
export default {
    props: {
        data_info: {
            default: null,
            type: undefined
        },
    },
    methods: {
        applyToJob() {
            let request= {
                email: this.userEmail,
                job_uuid: this.data_info.uuid,
            }
            this.$http.post('apply-for-job', request)
                .then( () => {
                    this.$vToastify.success('Applied To Job Successfully')
                })
                .catch( (error)=> {
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

<style>

</style>