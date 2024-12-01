<template>
  <div class="flex justify-between items-center p-4  border-b-2 border-stone-800 ">
    <div class="flex items-center">
      <button class="mr-4" @click="toggleSidebar">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" 
        xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" 
        stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
      </button>
    </div>
    <div class="flex items-center justify-end space-x-4">
      <button class="mr-4 relative">
        <i class="fas fa-bell text-2xl"</i>
        <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full">99+</span>
      </button>
      <div class="flex items-center space-x-4">
        <span class="mr-2">{{ username }}</span>
        <button @click="logout">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions } from 'vuex';

export default {
  data() {
    return {
      username: 'John Doe'
    }
  },
  methods: {
     ...mapActions(['toggleSidebar', 'SET_LOGOUT_STEPS']),
    toggleSidebar() {
      // toggle sidebar logic
    },
    logout() {
      // logout logic

      this.SET_LOGOUT_STEPS();
      this.$router.push('/')



    }
  }
}
</script>

<style scoped>
</style>