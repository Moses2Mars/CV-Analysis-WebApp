<template>
  <div>
      Company: 
      {{data_info}}
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