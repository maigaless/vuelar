<template>
    <div class="w-full px-4 py-6">
      <!-- Header -->
      <div class="flex justify-between items-center border-b pb-1 mb-1 flex-row-reverse">
    
        <button
          @click="openModal"
          class="bg-blue-500 text-white py-2 px-2 rounded hover:bg-blue-600"
        >
        <i class="fas fa-plus"></i>  Ajouter Nouveau Model
        </button>
      </div>
  
      <!-- Patterns Table -->
      <div class="overflow-hidden border ">
        <table class="min-w-full bg-white">
          <thead>
            <tr class="bg-gray-200 text-gray-700 uppercase text-sm leading-normal">
              <th class="py-2 px-4 text-left">Model</th>
              <th class="py-2 px-4 text-left">Template</th>
            
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
            
              <td class="py-2 px-4">
                <span
                  @click="openModal(pattern)"
                  class="text-blue-500 hover:underline mr-2"
                >
                  <i class="fas fa-pencil "></i>
                </span>

                <span
                  @click="resetCounter(pattern.model)"
                  class="text-orange-500 hover:underline cursor-pointer hover:text-[12px]"
                >
                  <i class="fas fa-refresh "></i>
                </span>
               
              </td>
            </tr>
          </tbody>
        </table>
      </div>
  
      <NumberPatternModal 
      v-if="isVisible" 
      :numberpattern="Selectednumberpattern" 
      @closeModal="closeModal" 
    />
     
    </div>
  </template>
  
  <script>
  import {mapGetters,mapActions} from 'vuex'

  import NumberPatternModal from "../forms/frm_number_patterns.vue";

  import { useToast } from "vue-toastification";

 

  export default {
    data() {
      return {
        Selectednumberpattern:{},
        isVisible: false, // Modal visibility
    
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
    editPattern(pattern){
            this.Selectedpattern=pattern
    },
    AddNewnumberpattern(){
        this.openModal({})
        this.isVisible = true; // Show the modal
    },
    openModal(numberpattern) {
      this.Selectednumberpattern = numberpattern;
      this.isVisible = true; // Show the modal
    },
    closeModal() {
      this.isVisible = false; // Hide the modal
      this.Selectednumberpattern = {};
    },
   async resetCounter($model) {
      const taost = useToast();
     
      try {
          const response = await axios.post('/api/numerotations/resetcounter',{model:$model });
          

          if (response.data.success){
            const taost = useToast();
            taost.success(response.data.message);
          }
          
          
        } catch (error) {
         
          const taost = useToast();
            taost.success(response.error.message);
        }


   
    }
   
  },
    
  };
  </script>
  
  <style scoped>
  /* Add your custom styles here */
  </style>
  