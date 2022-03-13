<template>
  <div>
      User:
      {{data_info}}
      <button> Apply For Job</button>
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