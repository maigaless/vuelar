<template>
    <!-- Modal Backdrop -->
    <div class="fixed inset-0 bg-black bg-opacity-50 z-40"></div>
    
    <!-- Modal Content -->
    <div class="fixed inset-0 flex items-center justify-center z-50  ">
      <div class="w-[30%] shadow-lg bg-white ">
        <!-- Modal Header -->
        <div class="h-auto min-h-10 w-full flex items-center justify-between  border-b">
          <span class="text-lg font-semibold capitalize px-2">{{ DataTax.name }}</span>
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
            v-model="DataTax.name"
            id="name"
            type="text"
            class="border p-2 w-full rounded-md"
            placeholder="Tax name"
          />
      
          <label for="name" class="mb-2 font-medium">Code:</label>
          <input 
            v-model="DataTax.code"
            id="code"
           type="text"
            class="border p-2 w-full rounded-md"
            placeholder="Tax Code"
          />

          <label for="name" class="mb-2 font-medium">Taux:</label>
          <input 
            v-model="DataTax.rate"
            id="rate"
            type="number"  step="1" min="0" max="20" digits="0"
            class="border p-2 w-full rounded-md"
            placeholder="Tax rate"
          />

          
          <label for="name" class="mb-2 font-medium">Type:</label>
          <select 
            v-model="DataTax.percentage"
            id="type"
            class="border p-2 w-full rounded-md"
            
          >
            <option value="true"  > Percentage</option>
            <option value="false" > Fixe</option>
          
          </select>


          <div class="flex flex-row px-2 py-3 justify-start items-baseline">
            <input 
          v-model="DataTax.is_active"
          id="is_active"
          type="checkbox"
        /> 
        <label for="name" class="mb-2 font-medium flex-1">TVA Opérationnel </label>
          </div>
        </div>

        <!-- actions Buttons  -->
  
        <div class="flex flex-row p-2 items-center justify-center border-t-2 ">
            <span @click="saveTaxData" class="w-auto  px-3  text-white bg-green-500 hover:bg-green-600 text-center text-lg font-sans font-semibold cursor-pointer">save</span>
       
            <span @click="close" class="w-auto  px-3  text-white bg-red-500 hover:bg-red-600 text-center text-lg font-sans font-semibold cursor-pointer">cancel</span> </div>
      </div>
    </div>
  </template>
  
  <script>
  import { mapActions } from 'vuex';
  export default {
    name: "TaxModal",
    props: {
      Tax: {
        type: Object,
        required: true,
      },
    },
    data() {
      return {
        DataTax: { ...this.Tax }, // Local copy to avoid directly modifying the prop
      };

    },
    methods: {
      ...mapActions(["SaveTaxe"]),

      close() {
        this.$emit("closeModal", this.Tax); // Emit updated Shippment way on close
      },
      saveTaxData(){

        if(!this.DataTax.rate){
          this.DataTax.rate = 0
        }

       
        this.SaveTaxe(this.DataTax)
        this.close();
      }
    },
  };
  </script>
  
  <style scoped>
  /* Add custom styling if needed */
  </style>
  