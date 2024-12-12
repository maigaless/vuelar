<template>
    <div class="w-full px-4 py-6">
      <!-- Header -->
      <div class="flex justify-between items-center border-b pb-1 mb-1 flex-row-reverse">
    
        <button
          @click="openModal"
          class="bg-blue-500 text-white py-1 px-1 rounded hover:bg-blue-600"
        >
          Add New Pattern
        </button>
      </div>
  {{ GET_NUMBER_PATTERNS }}
      <!-- Patterns Table -->
      <div class="overflow-hidden border rounded-lg">
        <table class="min-w-full bg-white">
          <thead>
            <tr class="bg-gray-200 text-gray-700 uppercase text-sm leading-normal">
              <th class="py-2 px-4 text-left">Model</th>
              <th class="py-2 px-4 text-left">Template</th>
              <th class="py-2 px-4 text-left">Prefix</th>
              <th class="py-2 px-4 text-left">Suffix</th>
              <th class="py-2 px-4 text-left">Actions</th>
            </tr>
          </thead>
          <tbody class="text-gray-600 text-sm font-light">
            <tr
              v-for="pattern in GET_NUMBER_PATTERNS"
              :key="pattern.id"
              class="border-b border-gray-200 hover:bg-gray-100"
            >
              <td class="py-2 px-4">{{ pattern.model }}</td>
              <td class="py-2 px-4">{{ pattern.template }}</td>
              <td class="py-2 px-4">{{ pattern.prefix }}</td>
              <td class="py-2 px-4">{{ pattern.suffix }}</td>
              <td class="py-2 px-4">
                <button
                  @click="editPattern(pattern)"
                  class="text-blue-500 hover:underline"
                >
                  Edit
                </button>
                <button
                  @click="deletePattern(pattern.id)"
                  class="text-red-500 hover:underline ml-2"
                >
                  Delete
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
  
      <NumberPatternModal 
      v-if="isModalVisible" 
      :numberpattern="Selectednumberpattern" 
      @closeModal="closeModal" 
    />
     
    </div>
  </template>
  
  <script>
  import {mapGetters,mapActions} from 'vuex'

  import NumberPatternModal from "../forms/frm_shippment_method.vue";

  export default {
    data() {
      return {
      
        isModalVisible: false, // Modal visibility
    
      };
    },
    components: {
        NumberPatternModal,
  },
  computed: {
    ...mapGetters(["GET_NUMBER_PATTERNS"]),
  },
  methods: {
    ...mapActions(["fetchNumberPatterns"]),
    setSelection(numberpattern){
      this.Selectednumberpattern=numberpattern
    },
    AddNewnumberpattern(){
        this.openModal({})
    },
    openModal(numberpattern) {
     
      this.Selectednumberpattern = numberpattern;
      this.isVisible = true; // Show the modal
    },
    closeModal() {
      this.isVisible = false; // Hide the modal
      this.Selectednumberpattern = {};
    },
  },
    
  };
  </script>
  
  <style scoped>
  /* Add your custom styles here */
  </style>
  