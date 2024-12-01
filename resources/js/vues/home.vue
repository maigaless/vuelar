<template>
    <div>
      <!-- Navigation Bar -->
      <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex-shrink-0">
              <router-link to="/" class="text-2xl font-bold text-blue-600 hover:text-blue-700 transition no-underline">{{appName}}</router-link>
            </div>
  
            <!-- Navigation Links -->
            <div class="hidden md:flex space-x-8">
              <router-link to="/" class="text-gray-700 hover:text-blue-600 transition">
                <i class="fas fa-home mr-2"></i> Home
              </router-link>
              <router-link to="/about" class="text-gray-700 hover:text-blue-600 transition">
                <i class="fas fa-info-circle mr-2"></i> About
              </router-link>
              <router-link to="/services" class="text-gray-700 hover:text-blue-600 transition">
                <i class="fas fa-cogs mr-2"></i> Services
              </router-link>
              <router-link to="/contact" class="text-gray-700 hover:text-blue-600 transition">
                <i class="fas fa-envelope mr-2"></i> Contact
              </router-link>
            </div>
  
            <!-- Auth Buttons -->
            <div class="hidden md:flex items-center space-x-4">
              <router-link to="/login" class="text-gray-700 hover:text-blue-600 transition">
                <i class="fas fa-sign-in-alt mr-2"></i> Login
              </router-link>
              <router-link
                to="/register"
                class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition"
              >
                <i class="fas fa-user-plus mr-2"></i> Register
              </router-link>
            </div>
  
            <!-- Mobile Menu Button -->
            <div class="md:hidden flex items-center">
              <button @click="toggleMobileMenu" class="text-gray-700 hover:text-blue-600 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
              </button>
            </div>
          </div>
        </div>
  
        <!-- Mobile Navigation Menu -->
        <div v-if="mobileMenuOpen" class="md:hidden bg-white shadow-lg">
          <router-link to="/" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
            <i class="fas fa-home mr-2"></i> Home
          </router-link>
          <router-link to="/about" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
            <i class="fas fa-info-circle mr-2"></i> About
          </router-link>
          <router-link to="/services" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
            <i class="fas fa-cogs mr-2"></i> Services
          </router-link>
          <router-link to="/contact" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
            <i class="fas fa-envelope mr-2"></i> Contact
          </router-link>
          <router-link to="/login" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
            <i class="fas fa-sign-in-alt mr-2"></i> Login
          </router-link>
          <router-link to="/register" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
            <i class="fas fa-user-plus mr-2"></i> Register
          </router-link>
        </div>
      </nav>
  
      <!-- Hero Section -->
      <header class="bg-gradient-to-r from-blue-500 to-blue-600 text-white py-24">
        <div class="max-w-7xl mx-auto px-4 text-center">
          <h1 class="text-5xl font-extrabold">Welcome to {{appName}}</h1>
          <p class="mt-4 text-lg">Your one-stop solution for all your needs.</p>
          <router-link
            to="/get-started"
            class="mt-6 inline-block bg-white text-blue-600 px-8 py-3 rounded-md shadow-lg hover:bg-gray-200 transition"
          >
            <i class="fas fa-arrow-right mr-2"></i> Get Started
          </router-link>
        </div>
      </header>
  
      <!-- Features Section -->
      <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
          <h2 class="text-4xl font-bold text-center text-gray-800">Features</h2>
          <p class="text-center text-gray-600 mt-4">Discover the unique features that make MyApp stand out.</p>
          <div class="mt-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
              <i class="fas fa-laptop-code text-3xl text-blue-600"></i>
              <h3 class="text-2xl font-semibold text-blue-600 mt-3">Feature One</h3>
              <p class="mt-3 text-gray-600">Description of feature one goes here. It is very useful and beneficial.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
              <i class="fas fa-users text-3xl text-blue-600"></i>
              <h3 class="text-2xl font-semibold text-blue-600 mt-3">Feature Two</h3>
              <p class="mt-3 text-gray-600">Description of feature two goes here. It is very useful and beneficial.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
              <i class="fas fa-mobile-alt text-3xl text-blue-600"></i>
              <h3 class="text-2xl font-semibold text-blue-600 mt-3">Feature Three</h3>
              <p class="mt-3 text-gray-600">Description of feature three goes here. It is very useful and beneficial.</p>
            </div>
          </div>
        </div>
      </section>
  
      <!-- Footer -->
      <footer class="bg-gray-900 text-white py-8">
        <div class="max-w-7xl mx-auto px-4 text-center">
          <p class="text-sm">&copy; 2023 MyApp. All rights reserved.</p>
          <div class="mt-4 space-x-4">
            <router-link to="/privacy" class="text-gray-400 hover:text-white">
              <i class="fas fa-shield-alt mr-2"></i> Privacy Policy
            </router-link>
            <span>|</span>
            <router-link to="/terms" class="text-gray-400 hover:text-white">
              <i class="fas fa-file-contract mr-2"></i> Terms of Service
            </router-link>
          </div>
        </div>
      </footer>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        mobileMenuOpen: false,
        apiUrl: import.meta.env.VITE_API_URL,
        appName: import.meta.env.VITE_APP_NAME,
      };
    },
    methods: {
      toggleMobileMenu() {
        this.mobileMenuOpen = !this.mobileMenuOpen;
      },
    },
  };
  </script>
  
  <style scoped>
  /* Add hover effects or custom styles here */
  </style>
  
  