<template>
    <!-- Modal Backdrop -->
    <div class="fixed inset-0 bg-black bg-opacity-50 z-40"></div>
    
    <!-- Modal Content -->
    <div class="fixed inset-0 flex items-center justify-center z-50  ">
      <div class="w-[30%] shadow-lg bg-white ">
        <!-- Modal Header -->
        <div class="h-auto min-h-10 w-full flex items-center justify-between  border-b">
          <span class="text-lg font-semibold capitalize px-2">{{ DataShippmentMethod.name }}</span>
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
            v-model="DataShippmentMethod.name"
            id="name"
            type="text"
            class="border p-2 w-full rounded-md"
            placeholder="Edit Shippment way name"
          />
      
          <label for="name" class="mb-2 font-medium">Code:</label>
          <input 
            v-model="DataShippmentMethod.code"
            id="name"
            
            class="border p-2 w-full rounded-md"
            placeholder="Edit Shippment way name"
          />

          <div class="flex flex-row px-2 py-3 justify-start items-baseline">
            <input 
          v-model="DataShippmentMethod.is_active"
          id="name"
          type="checkbox"
        /> 
        <label for="name" class="mb-2 font-medium flex-1">Service Opérationnel </label>
          </div>
        </div>

        <!-- actions Buttons  -->
  
        <div class="flex flex-row p-2 items-center justify-center border-t-2 ">
            <span @click="savePaymentMethodData" class="w-auto  px-3  text-white bg-green-500 hover:bg-green-600 text-center text-lg font-sans font-semibold cursor-pointer">save</span>
       
            <span @click="close" class="w-auto  px-3  text-white bg-red-500 hover:bg-red-600 text-center text-lg font-sans font-semibold cursor-pointer">cancel</span> </div>
      </div>
    </div>
  </template>
  
  <script>
  import { mapActions } from 'vuex';
  export default {
    name: "paymentMethodModal",
    props: {
      ShippmentMethod: {
        type: Object,
        required: true,
      },
    },
    data() {
      return {
        DataShippmentMethod: { ...this.ShippmentMethod }, // Local copy to avoid directly modifying the prop
      };

    },
    methods: {
      ...mapActions(["SaveShippementMethod"]),

      close() {
        this.$emit("closeModal", this.ShippmentMethod); // Emit updated Shippment way on close
      },
      savePaymentMethodData(){
        this.SaveShippementMethod(this.DataShippmentMethod)
        this.close();
      }
    },
  };
  </script>
  
  <style scoped>
  /* Add custom styling if needed */
  </style>
  