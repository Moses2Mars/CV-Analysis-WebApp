<template>
  <div>
    <span>Please sign in to your account below.</span>
    dont have an account? <a href="/register"> register here</a>
    <form>
      <div class="email-section">
        <label for="email"> Email: </label>
          <input id="email" type="email" name="email" v-model="user.email" placeholder="Enter Your Email..." required>
      </div>
      <div class="password-section">
        <label for="password"> Password: </label>
          <input id="password"  type="password" name="password" v-model="user.password" placeholder="Enter Password..." required>
      </div>
      <button @click="Login" class="login-button">Login</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      user: {
        email: '',
        password: '',
      }
    }
  },
  methods: {
    Login(){ 
      console.log('hi')
      //login the user
    }
  }
};
</script>

<style></style>
