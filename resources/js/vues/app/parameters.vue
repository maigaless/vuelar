<template>
    <div class="w-full px-6 py-4">
      <!-- Tabs -->
      <div class="flex border-b">
        <button
          v-for="(tab, index) in tabs"
          :key="index"
          @click="activeTab = tab.name"
          :class="[
            'py-2 px-4 focus:outline-none',
            activeTab === tab.name ? 'border-b-4 border-blue-500 font-semibold text-blue-500' : 'text-gray-500'
          ]"
        >
          {{ tab.label }}
        </button>
      </div>
  
      <!-- Tab Content -->
      <div class="mt-1">
        <component :is="activeTabComponent"></component>
      </div>
    </div>
  </template>
  
  <script>
import Categories from "./Categories.vue"; // Replace with the actual file path
import Tarifs from "./Tarifs.vue"; // Replace with the actual file path
import Depots from "./Depots.vue"; // Replace with the actual file path
import PaymentWays from "./paymentsWays.vue";
import ShippingsWays from "./shippingsWays.vue"
import Taxes from "./taxes.vue"
import numerotation from "./numerotation.vue";
export default {
  data() {
    return {
      activeTab: "categories", // Default active tab
      tabs: [
        { name: "categories", label: "Categories" },
        { name: "tarifs", label: "Tarifs" },
        { name: "depots", label: "Depots" },
        { name: "paymentWays", label: "Modes de Paiement" },
        { name: "shippingWays", label: "Modes de Livraison" },
        { name: "taxes", label: "Taxes" },
        { name: "numerotation", label: "Numerotation" },
      ],
    };
  },
  computed: {
    activeTabComponent() {
      switch (this.activeTab) {
        case "categories":
          return Categories;
        case "tarifs":
          return Tarifs;

        case "depots":
          return Depots;

        case "paymentWays":
          return PaymentWays;

        case "shippingWays":
          return ShippingsWays;

        case "taxes":
          return Taxes;  

        case "numerotation":
          return numerotation;    
        
        default:
          return null;
      }
    },
  },
};
</script>

<style lang="css">
    .page-title{
      visibility:hidden;
    }
</style>