<template>
  <div class="w-full px-4 py-6">
   
    
<div class="flex flex-row items-center px-1 border-b-2 ">
   <h1 class="text-3xl font-bold text-gray-800 flex-1 page-title ">t</h1>
   <div class="w-auto h-12 ">
      <span @click="AddNewshippmentMethod" class="w-full bg-blue-400 cursor-pointer py-2 px-2 text-white"> 
       + Mode de Livraison  </span>
   </div>
</div>

    <!-- Table Wrapper -->
    <div class="overflow-hidden border rounded-lg">
      <table class="min-w-full bg-white">
        <!-- Table Header -->
        <thead>
          <tr class="bg-gray-200 text-gray-700 uppercase text-sm leading-normal">
            <th class="py-1 px-2 text-left">ID</th>
            <th class="py-1 px-2 text-left">Name</th>
            <th class="py-1 px-2 text-left">Code</th>
            <th class="py-1 px-2 text-left">Opérationnel</th>
            <th class="py-1 px-2 text-left">Action</th>
          </tr>
        </thead>

        <!-- Table Body -->
        <tbody class="text-gray-600 text-sm font-light">
          <tr
            v-for="shippmentMethod in GET_SHIPPMENT_METHODS"
            :key="shippmentMethod.id"
            @dblclick="openModal(shippmentMethod)"
            @click="setSelection(shippmentMethod)"
            class="border-b border-gray-200 hover:bg-gray-100"
            :class="shippmentMethod.id === SelectedshippmentMethod.id ? 'bg-yellow-200' : ''"
          >
            <td class="py-1 px-2 text-left whitespace-nowrap">{{ shippmentMethod.id }}</td>
            <td class="py-1 px-2 text-left">{{ shippmentMethod.code }}</td>
            <td class="py-1 px-2 text-left">{{ shippmentMethod.name }}</td>
            <td class="py-1 px-2 text-left">
              <i :class="shippmentMethod.is_active == true ? 'fas fa-check-circle mr-2':''"></i>
            </td>
           
            <td class="py-1 px-2 text-left">
              <span 
                @click.stop="openModal(shippmentMethod)" 
                class="text-blue-500 hover:underline cursor-pointer">
                <i class="fas fa-pencil"></i>
              </span>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    
    <!-- shippmentMethod Modal -->
    <shippmentMethodModal 
      v-if="isVisible" 
      :ShippmentMethod="SelectedshippmentMethod" 
      @closeModal="closeModal" 
    />
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
import shippmentMethodModal from "../forms/frm_shippment_method.vue";

export default {
  data() {
    return {
      SelectedshippmentMethod: {}, // Data to pass to the modal
      isVisible: false, // Modal visibility state
    };
  },
  components: {
    shippmentMethodModal,
  },
  computed: {
    ...mapGetters(["GET_SHIPPMENT_METHODS"]),
  },
  methods: {
    ...mapActions(["fetchShippmentWays"]),
    setSelection(shippmentMethod){
      this.SelectedshippmentMethod=shippmentMethod
    },
    AddNewshippmentMethod(){
        this.openModal({})
    },
    openModal(shippmentMethod) {
     
      this.SelectedshippmentMethod = shippmentMethod;
      this.isVisible = true; // Show the modal
    },
    closeModal() {
      this.isVisible = false; // Hide the modal
      this.SelectedshippmentMethod = {};
    },
  },
};
</script>

<style scoped>
/* Add your custom styles here */
</style>
