<template>
    <div class="w-full px-4 py-6">
     
      
  <div class="flex flex-row items-center px-1 border-b-2 ">
     <h1 class="text-3xl font-bold text-gray-800 flex-1 page-title ">t</h1>
     <div class="w-auto h-12 ">
        <span @click="AddNewtaxe" class="w-full bg-blue-400 cursor-pointer py-2 px-2 text-white"> 
         + Tax  </span>
     </div>
  </div>
  
      <!-- Table Wrapper -->
      <div class="overflow-hidden border rounded-lg">
        <table class="min-w-full bg-white">
          <!-- Table Header -->
          <thead>
            <tr class="bg-gray-200 text-gray-700 uppercase text-sm leading-normal">
              <th class="py-1 px-2 text-left">ID</th>
              <th class="py-1 px-2 text-left">Code</th>
              <th class="py-1 px-2 text-left">Name</th>
              <th class="py-1 px-2 text-left">rate</th>
              <th class="py-1 px-2 text-left">Type</th>
              <th class="py-1 px-2 text-left">Opérationnel</th>
              <th class="py-1 px-2 text-left">Action</th>
            </tr>
          </thead>
  
          <!-- Table Body -->
          <tbody class="text-gray-600 text-sm font-light">
            <tr
              v-for="taxe in GET_TAXES"
              :key="taxe.id"
              @dblclick="openModal(taxe)"
              @click="setSelection(taxe)"
              class="border-b border-gray-200 hover:bg-gray-100"
              :class="taxe.id === Selectedtaxe.id ? 'bg-yellow-200' : ''"
            >
              <td class="py-1 px-2 text-left whitespace-nowrap">{{ taxe.id }}</td>
              <td class="py-1 px-2 text-left">{{ taxe.code }}</td>
              <td class="py-1 px-2 text-left">{{ taxe.name }}</td>
              <td class="py-1 px-2 text-left">{{ taxe.rate}} {{ taxe.percentage == 1 ? '%' : '$' }} </td>
              <td class="py-1 px-2 text-left">{{ taxe.percentage == 1 ? 'Pourcentage' : 'Fixe' }}</td>
              <td class="py-1 px-2 text-left">
                <i :class="taxe.is_active == true ? 'fas fa-check-circle mr-2':''"></i>
              </td>
              
             
              <td class="py-1 px-2 text-left">
                <span 
                  @click.stop="openModal(taxe)" 
                  class="text-blue-500 hover:underline cursor-pointer">
                  <i class="fas fa-pencil"></i>
                </span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      
      <!-- taxe Modal -->
      <taxeModal 
        v-if="isVisible" 
        :Tax="Selectedtaxe" 
        @closeModal="closeModal" 
      />
    </div>
  </template>
  
  <script>
  import { mapActions, mapGetters } from "vuex";
  import taxeModal from "../forms/frm_tax.vue";
  
  export default {
    data() {
      return {
        Selectedtaxe: {}, // Data to pass to the modal
        isVisible: false, // Modal visibility state
      };
    },
    components: {
      taxeModal,
    },
    computed: {
      ...mapGetters(["GET_TAXES"]),
    },
    methods: {
      ...mapActions(["fetchTaxes"]),
      setSelection(taxe){
        this.Selectedtaxe=taxe
      },
      AddNewtaxe(){
          this.openModal({})
      },
      openModal(taxe) {
       
        this.Selectedtaxe = taxe;
        this.isVisible = true; // Show the modal
      },
      closeModal() {
        this.isVisible = false; // Hide the modal
        this.Selectedtaxe = {};
      },
    },
  };
  </script>
  
  <style scoped>
  /* Add your custom styles here */
  </style>
  