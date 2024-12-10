<template>
  <div class="flex h-screen">
    <Sidebar />
    <div class="flex-1 overflow-y-auto">
      <Topbar />
      <RouterView class=" overflow-x-auto mx-auto" />
    </div>
  </div>
</template>

<script>
import { mapActions } from 'vuex';
import Sidebar from '../../components/navis/sidebar.vue';
import Topbar from '../../components/navis/topbar.vue';

export default {
  components: { Sidebar, Topbar },
  methods: {
    ...mapActions(['fetchCategories','fetchTarifs','fetchDepots',
                  'fetchPaymentWays','fetchShippmentWays','fetchTaxes','fetchProducts']),
  },
  mounted() {
    this.fetchCategories();
    this.fetchTarifs();
    this.fetchDepots();
    this.fetchPaymentWays();
    this.fetchShippmentWays();
    this.fetchTaxes();
    this.fetchProducts();
  },
}
</script>

<style>
/* Tailwind CSS classes for responsive design */
</style>
