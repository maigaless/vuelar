<template>
    <div class="flex flex-col min-h-screen bg-black w-64 text-white shadow-lg">
      <!-- Sidebar Header -->
      <div class="text-center p-3 bg-white">
        <h1 class="text-3xl font-bold text-blue-500">{{ appName }}</h1>
      </div>
  
      <!-- Sidebar Links -->
      <div class="space-y-4 py-2">
        <div class="w-full hover:bg-red-500 no-underline ">
          <router-link 
            to="dashboard"
            class="block py-2 text-lg text-white hover:text-gray-900  hover:text-red-500  no-underline  px-3 transition duration-200">
            Dashboard
          </router-link>
        </div>


        <div class="w-full hover:bg-red-500 no-underline ">
          <router-link 
            to="/catalog"
            class="block py-2 text-lg text-white hover:text-gray-900 
             hover:text-red-500  no-underline  px-3 transition duration-200">
            Catalog
          </router-link>
        </div>

        <div class="w-full hover:bg-red-500 no-underline ">
          <router-link 
            to="users"
            class="block py-2 text-lg text-white hover:text-gray-900 
             hover:text-red-500  no-underline  px-3 transition duration-200">
            Users
          </router-link>
        </div>
  
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: 'Sidebar',
    data() {
      return {
        appName: import.meta.env.VITE_APP_NAME,  // Using the env variable for app name
      };
    },
  };
  </script>
  
  <style scoped>
  /* No additional styles required, TailwindCSS takes care of most styling */
  .router-link-active{
    background-color: red;
  }
  </style>
  