<template>
    <!-- Modal Backdrop -->
    <div class="fixed inset-0 bg-black bg-opacity-50 z-40"></div>
    
    <!-- Modal Content -->
    <div class="fixed inset-0 flex items-center justify-center z-50  ">
      <div class="w-[30%] shadow-lg bg-white ">
        <!-- Modal Header -->
        <div class="h-auto min-h-10 w-full flex items-center justify-between  border-b">
        <div class="flex flex-row justify-between w-full">
          <span class="text-lg font-semibold capitalize px-2">{{ editableCustomer.name }}</span>
          <span class="text-lg font-semibold capitalize px-2">{{ editableCustomer.code }}</span>
        </div>
          
          <button
            class="w-8  min-h-10 flex items-center justify-center  bg-red-500 text-white
             font-bold hover:bg-red-600"
            @click="close"
          >
            X
          </button>
        </div>
  
        <!-- Modal Body -->
        <div class="flex flex-col p-2 space-x-1">
          
        
          <label for="name" class="mb-2 font-medium">Name:</label>
          <input
            v-model="editableCustomer.name"
            id="name"
            type="text"
            class="border p-2 w-full rounded-md"
            placeholder="Edit Customer name"
          />
      
          <label for="name" class="mb-2 font-medium">ice_number:</label>
          <input 
            v-model="editableCustomer.ice_number"
            id="name"
            
            class="border p-2 w-full rounded-md"
            placeholder="Edit Customer name"
          />
          <label for="name" class="mb-2 font-medium">if_number:</label>
          <input 
            v-model="editableCustomer.if_number"
            id="name"
            
            class="border p-2 w-full rounded-md"
            placeholder="Edit Customer name"
          />

          <label for="name" class="mb-2 font-medium">contact_email:</label>
          <input 
            v-model="editableCustomer.email"
            id="name"
            type="email"
            class="border p-2 w-full rounded-md"
            placeholder="Edit Customer name"
          />
          <label for="name" class="mb-2 font-medium">tel:</label>
          <input 
            v-model="editableCustomer.tel"
            id="name"
            type="text"
            class="border p-2 w-full rounded-md"
            placeholder="Edit Customer name"
          />

          <div class="flex flex-row items-baseline py-2">
            <input 
            v-model="editableCustomer.is_active" id="name" type="checkbox"
          
          />
            <label for="name" class="mb-2 font-medium">Account active</label>
         
          </div>
        </div>

        <!-- actions Buttons  -->

        <div class="flex flex-row p-2 items-center justify-center border-t-2 ">
            <span @click="saveCustomerData" class="w-auto  px-3  text-white bg-green-500 hover:bg-green-600 text-center text-lg font-sans font-semibold cursor-pointer">save</span>
       
            <span @click="close" class="w-auto  px-3  text-white bg-red-500 hover:bg-red-600 text-center text-lg font-sans font-semibold cursor-pointer">cancel</span> </div>
      </div>
    </div>
  </template>
  
  <script>
  import { mapActions } from 'vuex';
  import { useToast } from 'vue-toastification';
  export default {
    name: "CustomerModal",
    props: {
      customer: {
        type: Object,
        required: true,
      },
    },
    data() {
      return {
        editableCustomer: { ...this.customer }, // Local copy to avoid directly modifying the prop
      };
    },
    methods: {
      ...mapActions(["SaveCustomer"]),
      close() {
        this.$emit("closeModal", this.editableCustomer); // Emit updated Customer on close
      },
    async saveCustomerData(){
        const Customer = await this.SaveCustomer(this.editableCustomer);
       
        console.log('New Customer created:', Customer);

        // Optionally update local state or UI
        const toast = useToast();
        toast.success('Customer created successfully!');
        this.close();
      }
    },
  };
  </script>
  
  <style scoped>
  /* Add custom styling if needed */
  </style>
  