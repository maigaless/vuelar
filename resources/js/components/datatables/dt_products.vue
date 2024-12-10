 <template>
    <div class="w-full px-4 py-6">
     
      
  <div class="flex flex-row items-center px-1 border-b-2 ">
     <h1 class="text-3xl font-bold text-gray-800 flex-1  page-title">Catalog</h1>
     <div class="w-auto h-12 ">
        <span @click="AddNewProduct" class="w-full bg-blue-400 cursor-pointer py-2 px-2 text-white"> New Product</span>
     </div>
  </div>
  
      <!-- Table Wrapper -->
      <div class="overflow-hidden border rounded-lg">
        <table class="min-w-full bg-white">
          <!-- Table Header -->
          <thead>
            <tr class="bg-gray-200 text-gray-700 uppercase text-sm leading-normal">
              <th class="py-1 px-2 text-left">ID</th>
              <th class="py-1 px-2 text-left">Sku</th>
              <th class="py-1 px-2 text-left">Name</th>
              <th class="py-1 px-2 text-left">barcode</th>
              <th class="py-1 px-2 text-left">Stock</th>
              <th class="py-1 px-2 text-left">Action</th>
            </tr>
          </thead>
  
          <!-- Table Body -->
          <tbody class="text-gray-600 text-sm font-light">
            <tr
              v-for="Product in GET_PRODUCTS"
              :key="Product.id"
              @dblclick="openModal(Product)"
              @click="setSelection(Product)"
              class="border-b border-gray-200 hover:bg-gray-100"
              :class="Product.id === selectedProduct.id ? 'bg-yellow-200' : ''"
            >
              <td class="py-1 px-2 text-left whitespace-nowrap">{{ Product.id }}</td>
              <td class="py-1 px-2 text-left">{{ Product.sku }}</td>
              <td class="py-1 px-2 text-left">{{ Product.name }}</td>
              <td class="py-1 px-2 text-left">{{ Product.barcode }}</td>
              <td class="py-1 px-2 text-left">{{ Product.stock }}</td>
             
              <td class="py-1 px-2 text-left">
                <span 
                  @click.stop="openModal(Product)" 
                  class="text-blue-500 hover:underline cursor-pointer">
                  <i class="fas fa-pencil"></i>
                </span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      
      <!-- Product Modal -->
      <ProductModal 
        v-if="isVisible" 
        :Product="selectedProduct" 
        @closeModal="closeModal" 
      />
    </div>
  </template>
  
  <script>
  import { mapActions, mapGetters } from "vuex";
  import ProductModal from "../forms/frm_Product.vue";
  
  export default {
    data() {
      return {
        selectedProduct: {}, // Data to pass to the modal
        isVisible: false, // Modal visibility state
      };
    },
    components: {
      ProductModal,
    },
    computed: {
      ...mapGetters(["GET_PRODUCTS"]),
    },
    methods: {
      ...mapActions(["fetchProducts"]),
      setSelection(Product){
        this.selectedProduct=Product
      },
      AddNewProduct(){
          this.openModal({})
      },
      openModal(Product) {
        this.selectedProduct = Product;
        this.isVisible = true; // Show the modal
      },
      closeModal() {
        this.isVisible = false; // Hide the modal
        this.selectedProduct = {};
      },
    },
  };
  </script>
  
  <style scoped>
  /* Add your custom styles here */
  </style>
  
  