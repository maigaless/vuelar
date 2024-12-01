<template>
  <div class="flex h-screen">
    <Sidebar />
    <div class="flex-1 overflow-y-auto">
      <Topbar />
      <RouterView class="p-4 overflow-x-auto mx-auto" />
    </div>
  </div>
</template>

<script>
import Sidebar from '../../components/navis/sidebar.vue';
import Topbar from '../../components/navis/topbar.vue';

export default {
  components: { Sidebar, Topbar }
}
</script>

<style>
/* Tailwind CSS classes for responsive design */
</style>
