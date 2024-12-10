<template>
  <div class="w-full px-4 py-6">
   
    
<div class="flex flex-row items-center px-1 border-b-2 ">
   <h1 class="text-3xl font-bold text-gray-800 flex-1 page-title ">Categories</h1>
   <div class="w-auto h-12 ">
      <span @click="AddNewCategory" class="w-full bg-blue-400 cursor-pointer py-2 px-2 text-white"> New Category</span>
   </div>
</div>

    <!-- Table Wrapper -->
    <div class="overflow-hidden border rounded-lg">
      <table class="min-w-full bg-white">
        <!-- Table Header -->
        <thead>
          <tr class="bg-gray-200 text-gray-700 uppercase text-sm leading-normal">
            <th class="py-1 px-2 text-left">ID</th>
            <th class="py-1 px-2 text-left">Name</th>
            <th class="py-1 px-2 text-left">Description</th>
            <th class="py-1 px-2 text-left">Action</th>
          </tr>
        </thead>

        <!-- Table Body -->
        <tbody class="text-gray-600 text-sm font-light">
          <tr
            v-for="category in GET_CATEGORIES"
            :key="category.id"
            @dblclick="openModal(category)"
            @click="setSelection(category)"
            class="border-b border-gray-200 hover:bg-gray-100"
            :class="category.id === selectedCategory.id ? 'bg-yellow-200' : ''"
          >
            <td class="py-1 px-2 text-left whitespace-nowrap">{{ category.id }}</td>
            <td class="py-1 px-2 text-left">{{ category.code }}</td>
            <td class="py-1 px-2 text-left">{{ category.name }}</td>
           
            <td class="py-1 px-2 text-left">
              <span 
                @click.stop="openModal(category)" 
                class="text-blue-500 hover:underline cursor-pointer">
                <i class="fas fa-pencil"></i>
              </span>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    
    <!-- Category Modal -->
    <CategoryModal 
      v-if="isVisible" 
      :category="selectedCategory" 
      @closeModal="closeModal" 
    />
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
import CategoryModal from "../forms/frm_category.vue";

export default {
  data() {
    return {
      selectedCategory: {}, // Data to pass to the modal
      isVisible: false, // Modal visibility state
    };
  },
  components: {
    CategoryModal,
  },
  computed: {
    ...mapGetters(["GET_CATEGORIES"]),
  },
  methods: {
    ...mapActions(["fetchCategories"]),
    setSelection(category){
      this.selectedCategory=category
    },
    AddNewCategory(){
        this.openModal({})
    },
    openModal(category) {
      this.selectedCategory = category;
      this.isVisible = true; // Show the modal
    },
    closeModal() {
      this.isVisible = false; // Hide the modal
      this.selectedCategory = {};
    },
  },
};
</script>

<style scoped>
/* Add your custom styles here */
</style>
