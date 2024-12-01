<template>
  <div class="flex items-center justify-center min-h-screen bg-gray-50">
    <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-lg shadow-lg">
      <h2 class="text-3xl font-bold text-center text-gray-800">Login</h2>
      
      <!-- Login Method Toggle -->
      <div class="flex items-center justify-center space-x-4">
        <span :class="loginMethod === 'email' ? 'text-gray-800 font-medium' : 'text-gray-400'">Email</span>
        <div 
          class="relative flex items-center w-16 h-8 bg-gray-200 rounded-full cursor-pointer"
          @click="toggleLoginMethod"
        >
          <span 
            class="absolute left-1 top-1 w-6 h-6 bg-blue-500 rounded-full transition-transform transform"
            :class="loginMethod === 'email' ? '' : 'translate-x-8'"
          ></span>
        </div>
        <span :class="loginMethod === 'pincode' ? 'text-gray-800 font-medium' : 'text-gray-400'">Pincode</span>
      </div>
      
      <!-- Login Form -->
      <form @submit.prevent="handleLogin" class="space-y-6">
        <!-- Email/Password Login -->
        <div v-if="loginMethod === 'email'" class="space-y-4">
          <div>
            <label for="email" class="block text-gray-600">Email:</label>
            <input
              type="email"
              v-model="email"
              required
              class="mt-1 block w-full h-12 text-lg border border-gray-300 rounded-md shadow-sm
               focus:ring-blue-500 focus:border-blue-500 text-gray-700"
              placeholder="Enter your email"
            />
          </div>
          <div>
            <label for="password" class="block text-gray-600">Password:</label>
            <input
              type="password"
              v-model="password"
              required
              class="mt-1 block w-full  h-12 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 text-gray-700"
              placeholder="Enter your password"
            />
          </div>
        </div>

        <!-- Pincode Login -->
        <div v-if="loginMethod === 'pincode'" class="space-y-4">
          <div>
            <label for="pincode" class="block text-gray-600">Pincode:</label>
            <input
              type="text"
              v-model="pincode"
              required
              class="mt-1 block w-full h-12 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500
                 text-center font-bold focus:border-blue-500 text-gray-700"
              placeholder="Enter your pincode"
            />
          </div>
        </div>

        <!-- Submit Button -->
        <button
          type="submit"
          class="w-full py-3 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
        >
          Login
        </button>

        <!-- Error Message -->
        <p v-if="errorMessage" class="mt-2 text-red-500 text-center text-sm">{{ errorMessage }}</p>
      </form>

      <!-- Redirect to Register -->
      <p class="text-center text-sm text-gray-600">
        Don't have an account? 
        <router-link to="/register" class="text-blue-600 hover:underline">Register</router-link>
      </p>
    </div>
  </div>
</template>

<script>
import {mapActions} from 'vuex'
export default {
  data() {
    return {
      loginMethod: 'email', // Default login method
      email: '',
      password: '',
      pincode: '',
      errorMessage: '',
    };
  },
  methods: {
    ...mapActions(['SET_LOGIN_INFO']),
    toggleLoginMethod() {
      
      if (localStorage.getItem('vl_token')) {
         this.loginMethod = this.loginMethod === 'email' ? 'pincode' : 'email';
         this.resetFields();
      }else{
        alert("Please enter your email address and password")
      }
     
    },
    resetFields() {
      this.email = '';
      this.password = '';
      this.pincode = '';
      this.errorMessage = '';
    },
    async handleLogin() {
      this.errorMessage = '';
      try {
        if (this.loginMethod === 'email') {
          // Perform login with email and password
          const response = await this.$http.post('/api/login', {
            email: this.email,
            password: this.password,
          });
          // Handle successful login

          if (response.data.success) {
            localStorage.setItem('vl_token', response.data.user.remember_token);
             this.SET_LOGIN_INFO(response.data.user, response.data.user.is_admin,true);
             this.$router.push({name: "dashboard"});
          }
        } else {
          // Perform login with pincode
          console.log(this.pincode);
          const response = await this.$http.post('/api/loginpincode', {
            token:localStorage.getItem('vl_token'),
            pincode: this.pincode
          });
          // Handle successful login

          if(response.data.success){
            this.SET_LOGIN_INFO(response.data);
            this.$router.push({name: "dashboard"});
          }else{
            this.errorMessage = response.data.message
          }
        }
      } catch (error) {
        this.errorMessage = 'Login failed. Please check your credentials.';
      }
    },
  },
};
</script>

<style scoped>
/* You can add more custom styles if needed */
</style>
