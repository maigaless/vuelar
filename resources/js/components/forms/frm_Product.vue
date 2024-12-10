<template>
  <!-- Modal Backdrop -->
  <div class="fixed inset-0 bg-black bg-opacity-50 z-40"></div>
  
  <!-- Modal Content -->
  <div class="fixed inset-0 flex items-center justify-center z-50  ">
    <div class="w-[30%] shadow-lg bg-white ">
      <!-- Modal Header -->
      <div class="h-auto min-h-10 w-full flex items-center justify-between  border-b">
        <span class="text-lg font-semibold capitalize px-2">{{ editableProduct.name }}</span>
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
          v-model="editableProduct.name"
          id="name"
          type="text"
          class="border p-2 w-full rounded-md"
          placeholder="Edit product name"
        />
    
        <label for="name" class="mb-2 font-medium">Code:</label>
        <input 
          v-model="editableProduct.code"
          id="name"
          
          class="border p-2 w-full rounded-md"
          placeholder="Edit product name"
        />
      </div>

      <!-- actions Buttons  -->

      <div class="flex flex-row p-2 items-center justify-center border-t-2 ">
          <span @click="saveProductData" class="w-auto  px-3  text-white bg-green-500 hover:bg-green-600 text-center text-lg font-sans font-semibold cursor-pointer">save</span>
     
          <span @click="close" class="w-auto  px-3  text-white bg-red-500 hover:bg-red-600 text-center text-lg font-sans font-semibold cursor-pointer">cancel</span> </div>
    </div>
  </div>
</template>

<script>
import { mapActions } from 'vuex';
export default {
  name: "ProductModal",
  props: {
    product: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
      editableProduct: { ...this.product }, // Local copy to avoid directly modifying the prop
    };
  },
  methods: {
    ...mapActions(["SaveProduct"]),
    close() {
      this.$emit("closeModal", this.editableProduct); // Emit updated product on close
    },
    saveProductData(){
      this.SaveProduct(this.editableProduct)
      this.close();
    }
  },
};
</script>

<style scoped>
/* Add custom styling if needed */
</style>
