<template>
    <div class="w-full px-4 py-6">
     
      
  <div class="flex flex-row items-center px-1 border-b-2 ">
     <h1 class="text-3xl font-bold text-gray-800 flex-1  page-title">Suppliers</h1>
     <div class="w-auto h-9 ">
        <span @click="AddNewSupplier" class="w-full bg-blue-400 cursor-pointer py-2 px-2 text-white"> New Supplier</span>
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
              <th class="py-1 px-2 text-left">Status</th>     
           
              <th class="py-1 px-2 text-left">Action</th>
            </tr>
          </thead>
  
          <!-- Table Body -->
          <tbody class="text-gray-600 text-sm font-light">
            <tr
              v-for="supplier in GET_SUPPLIERS"
              :key="supplier.id"
              @dblclick="openModal(supplier)"
              @click="setSelection(supplier)"
              class="border-b border-gray-200 hover:bg-gray-100"
              :class="supplier.id === selectedSupplier.id ? 'bg-yellow-200' : ''"
            >
              <td class="py-1 px-2 text-left whitespace-nowrap">{{ supplier.id }}</td>
              <td class="py-1 px-2 text-left">{{ supplier.code }}</td>
              <td class="py-1 px-2 text-left">{{ supplier.name }}</td>
              <td class="py-1 px-2 text-left">
              <i :class="supplier.is_active == 1 ? 'fa fa-check':'fa fa-remove'"></i> 
              
              </td>
             
              <td class="py-1 px-2 text-left">
                <span 
                  @click.stop="openModal(supplier)" 
                  class="text-blue-500 hover:underline cursor-pointer">
                  <i class="fas fa-pencil"></i>
                </span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      
      <!-- Supplier Modal -->
      <SupplierModal 
        v-if="isVisible" 
        :supplier="selectedSupplier" 
        @closeModal="closeModal" 
      />
    </div>
  </template>
  
  <script>
  import { mapActions, mapGetters } from "vuex";
  import SupplierModal from "../forms/frm_supplier.vue";
  
  export default {
    data() {
      return {
        selectedSupplier: {}, // Data to pass to the modal
        isVisible: false, // Modal visibility state
      };
    },
    components: {
        SupplierModal,
    },
    computed: {
      ...mapGetters(["GET_SUPPLIERS"]),
    
    },
    methods: {
      ...mapActions(["fetchSuppliers"]),
      setSelection(supplier){
        this.selectedSupplier=supplier
      },
      AddNewSupplier(){
          this.openModal({})
      },
      openModal(supplier) {
        this.selectedSupplier = supplier;
        this.isVisible = true; // Show the modal
      },
      closeModal() {
        this.isVisible = false; // Hide the modal
        this.selectedSupplier = {};
      },
      GetParentName(parent_id){
        const parent = this.GET_SupplierSTOCKS.find(item => item.id === parent_id);
        return parent ? parent.ds_name : "-";
      },
      GetTypeSupplier(ds_type){
        const dstype = this.GET_DS_TYPES.find(item => item.id === ds_type);
        return dstype ? dstype.name : "-";
      }
  
    },
  };
  </script>
  
  <style scoped>
  /* Add your custom styles here */
  </style>
  