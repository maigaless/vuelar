<template>
    <div class="w-full px-4 py-6">
     
      
  <div class="flex flex-row items-center px-1 border-b-2 ">
     <h1 class="text-3xl font-bold text-gray-800 flex-1  page-title">Customers</h1>
     <div class="w-auto h-9 ">
        <span @click="AddNewCustomer" class="w-full bg-blue-400 cursor-pointer py-2 px-2 text-white"> New Customer</span>
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
              v-for="customer in GET_CUSTOMERS"
              :key="customer.id"
              @dblclick="openModal(customer)"
              @click="setSelection(customer)"
              class="border-b border-gray-200 hover:bg-gray-100"
              :class="customer.id === selectedCustomer.id ? 'bg-yellow-200' : ''"
            >
              <td class="py-1 px-2 text-left whitespace-nowrap">{{ customer.id }}</td>
              <td class="py-1 px-2 text-left">{{ customer.code }}</td>
              <td class="py-1 px-2 text-left">{{ customer.name }}</td>
              <td class="py-1 px-2 text-left">
              <i :class="customer.is_active == 1 ? 'fa fa-check':'fa fa-remove'"></i> 
              
              </td>
             
              <td class="py-1 px-2 text-left">
                <span 
                  @click.stop="openModal(customer)" 
                  class="text-blue-500 hover:underline cursor-pointer">
                  <i class="fas fa-pencil"></i>
                </span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      
      <!-- Customer Modal -->
      <CustomerModal 
        v-if="isVisible" 
        :customer="selectedCustomer" 
        @closeModal="closeModal" 
      />
    </div>
  </template>
  
  <script>
  import { mapActions, mapGetters } from "vuex";
  import CustomerModal from "../forms/frm_customer.vue";
  
  export default {
    data() {
      return {
        selectedCustomer: {}, // Data to pass to the modal
        isVisible: false, // Modal visibility state
      };
    },
    components: {
        CustomerModal,
    },
    computed: {
      ...mapGetters(["GET_CUSTOMERS"]),
    
    },
    methods: {
      ...mapActions(["fetchCustomers"]),
      setSelection(Customer){
        this.selectedCustomer=Customer
      },
      AddNewCustomer(){
          this.openModal({})
      },
      openModal(Customer) {
        this.selectedCustomer = Customer;
        this.isVisible = true; // Show the modal
      },
      closeModal() {
        this.isVisible = false; // Hide the modal
        this.selectedCustomer = {};
      },
      GetParentName(parent_id){
        const parent = this.GET_CUSTOMERS.find(item => item.id === parent_id);
        return parent ? parent.ds_name : "-";
      },
      GetTypeCustomer(ds_type){
        const dstype = this.GET_DS_TYPES.find(item => item.id === ds_type);
        return dstype ? dstype.name : "-";
      }
  
    },
  };
  </script>
  
  <style scoped>
  /* Add your custom styles here */
  </style>
  