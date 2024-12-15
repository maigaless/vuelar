<template lang="">
  <div class="w-full px-4 py-6">
           
           <!-- Header Page -->
          <div class="flex flex-row-reverse items-center px-1 
           mb-1 border-b pb-1">
            <div class="w-auto h-9 ">
                  <span  class="w-full bg-blue-400 cursor-pointer py-2 px-2 text-white" @click="openModal"> 
                                <i class="fa fa-plus"></i> Nouveau  Produit
                  </span>
            </div>
          </div>

          <!-- datatable -->

          <div class="overflow-hidden border ">
      <table class="min-w-full bg-white">
        <!-- Table Header -->
        <thead>
          <tr class="bg-gray-200 text-gray-700 uppercase text-sm leading-normal">
            <th class="py-1 px-2 text-left">Code</th>
            <th class="py-1 px-2 text-left">Name</th>
            <th class="py-1 px-2 text-left">Category</th>
            <th class="py-1 px-2 text-left">stock</th>
            <th class="py-1 px-2 text-left">Action</th>
          </tr>
        </thead>

        <!-- Table Body -->
        <tbody class="text-gray-600 text-sm font-light">
          <tr
            v-for="pdt in GET_PRODUCTS"
            :key="pdt.id"
            @dblclick="openModal(pdt)"
            @click="setSelection(pdt)"
            class="border-b border-gray-200 hover:bg-gray-100"
            :class="pdt.id === selectedProduct.id ? 'bg-yellow-200' : ''"
          >
            <td class="py-1 px-2 text-left whitespace-nowrap">{{ pdt.id }}</td>
            <td class="py-1 px-2 text-left">{{ pdt.code }}</td>
            <td class="py-1 px-2 text-left">{{ pdt.name }}</td>
            <td class="py-1 px-2 text-left">{{ pdt.category_id }}</td>
            <td class="py-1 px-2 text-left">{{ pdt.stock }}</td>
            <td class="py-1 px-2 text-left">
              <span 
                @click.stop="openModal(pdt)" 
                class="text-blue-500 hover:underline cursor-pointer">
                <i class="fas fa-pencil"></i>
              </span>
            </td>
          </tr>
        </tbody>
      </table>
    </div>




  </div>
  <ProductModal
   v-if="showModal"
   :product="selectedProduct"
   @close="close" 
   ></ProductModal>
</template>
<script>
import { mapGetters , mapActions } from 'vuex';
import ProductModal from "../forms/_frm_product.vue";

export default {
  name:'dt_products',
  data() {
    return{
     showModal:false
    }
  },
  components:{
    ProductModal 
  },
  computed:{
    ...mapGetters(['GET_PRODUCTS'])
  },
  methods:{
    ...mapActions(['SaveProduct']),
    openModal(pdt) {
      this.selectedProduct = {name:'Product Test',
                              barcode:'123451234512345',sku:'sku_12345',
                              description:'description text for product test',
                              cost:12.99,tracking_stock:true,stock:10,category_id:1
                             }
         this.showModal=true;
    },
    close(){
      this.showModal=false;
    }
  }
}
</script>
<style lang="">
  
</style>