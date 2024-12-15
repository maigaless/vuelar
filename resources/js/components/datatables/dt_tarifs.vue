<template>
    <div class="w-full px-4 py-6">
     
      
  <div class="flex flex-row items-center px-1 border-b-2 ">
     <h1 class="text-3xl font-bold text-gray-800 flex-1  page-title">Tarifs</h1>
     <div class="w-auto h-9 ">
        <span @click="AddNewTarif" class="w-full bg-blue-400 cursor-pointer py-2 px-2 text-white"> New Tarif</span>
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
              <th class="py-1 px-2 text-left">Description</th>
              <th class="py-1 px-2 text-left">Action</th>
            </tr>
          </thead>
  
          <!-- Table Body -->
          <tbody class="text-gray-600 text-sm font-light">
            <tr
              v-for="Tarif in GET_TARIFS"
              :key="Tarif.id"
              @dblclick="openModal(Tarif)"
              @click="setSelection(Tarif)"
              class="border-b border-gray-200 hover:bg-gray-100"
              :class="Tarif.id === selectedTarif.id ? 'bg-yellow-200' : ''"
            >
              <td class="py-1 px-2 text-left whitespace-nowrap">{{ Tarif.id }}</td>
              <td class="py-1 px-2 text-left">{{ Tarif.code }}</td>
              <td class="py-1 px-2 text-left">{{ Tarif.name }}</td>
             
              <td class="py-1 px-2 text-left">
                <span 
                  @click.stop="openModal(Tarif)" 
                  class="text-blue-500 hover:underline cursor-pointer">
                  <i class="fas fa-pencil"></i>
                </span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      
      <!-- Tarif Modal -->
      <TarifModal 
        v-if="isVisible" 
        :tarif="selectedTarif" 
        @closeModal="closeModal" 
      />
    </div>
  </template>
  
  <script>
  import { mapActions, mapGetters } from "vuex";
  import TarifModal from "../forms/frm_Tarif.vue";
  
  export default {
    data() {
      return {
        selectedTarif: {}, // Data to pass to the modal
        isVisible: false, // Modal visibility state
      };
    },
    components: {
      TarifModal,
    },
    computed: {
      ...mapGetters(["GET_TARIFS"]),
    },
    methods: {
      ...mapActions(["fetchtarifs"]),
      setSelection(Tarif){
        this.selectedTarif=Tarif
      },
      AddNewTarif(){
          this.openModal({})
      },
      openModal(Tarif) {
        this.selectedTarif = Tarif;
        this.isVisible = true; // Show the modal
      },
      closeModal() {
        this.isVisible = false; // Hide the modal
        this.selectedTarif = {};
      },
    },
  };
  </script>
  
  <style scoped>
  /* Add your custom styles here */
  </style>
  