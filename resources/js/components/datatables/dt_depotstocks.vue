<template>
  <div class="w-full px-4 py-6">
   
    
<div class="flex flex-row items-center px-1 border-b-2 ">
   <h1 class="text-3xl font-bold text-gray-800 flex-1  page-title">Dépôts</h1>
   <div class="w-auto h-9 ">
      <span @click="AddNewCategory" class="w-full bg-blue-400 cursor-pointer py-2 px-2 text-white"> New Depot</span>
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
            <th class="py-1 px-2 text-left">Type</th>
            <th class="py-1 px-2 text-left">Parent</th>
            <th class="py-1 px-2 text-left">Principal</th>
            <th class="py-1 px-2 text-left">Action</th>
          </tr>
        </thead>

        <!-- Table Body -->
        <tbody class="text-gray-600 text-sm font-light">
          <tr
            v-for="depot in GET_DEPOTSTOCKS"
            :key="depot.id"
            @dblclick="openModal(depot)"
            @click="setSelection(depot)"
            class="border-b border-gray-200 hover:bg-gray-100"
            :class="depot.id === selectedDepot.id ? 'bg-yellow-200' : ''"
          >
            <td class="py-1 px-2 text-left whitespace-nowrap">{{ depot.id }}</td>
            <td class="py-1 px-2 text-left">{{ depot.ds_code }}</td>
            <td class="py-1 px-2 text-left">{{ depot.ds_name }}</td>
            <td class="py-1 px-2 text-left">{{ GetTypeDepot(depot.ds_type) }}</td>
            <td class="py-1 px-2 text-left">{{ GetParentName(depot.ds_parent_id) }}</td>
            <td class="py-1 px-2 text-left">{{ depot.ds_isDefault == 1 ? 'Yes' : 'No' }}</td>
           
            <td class="py-1 px-2 text-left">
              <span 
                @click.stop="openModal(depot)" 
                class="text-blue-500 hover:underline cursor-pointer">
                <i class="fas fa-pencil"></i>
              </span>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    
    <!-- Category Modal -->
    <DepotStockModal 
      v-if="isVisible" 
      :depotStock="selectedDepot" 
      @closeModal="closeModal" 
    />
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
import DepotStockModal from "../forms/frm_depotstock.vue";

export default {
  data() {
    return {
      selectedDepot: {}, // Data to pass to the modal
      isVisible: false, // Modal visibility state
    };
  },
  components: {
    DepotStockModal,
  },
  computed: {
    ...mapGetters(["GET_DS_TYPES","GET_DEPOTSTOCKS"]),
  
  },
  methods: {
    ...mapActions(["fetchDepots"]),
    setSelection(depot){
      this.selectedDepot=depot
    },
    AddNewCategory(){
        this.openModal({})
    },
    openModal(depot) {
      this.selectedDepot = depot;
      this.isVisible = true; // Show the modal
    },
    closeModal() {
      this.isVisible = false; // Hide the modal
      this.selectedDepot = {};
    },
    GetParentName(parent_id){
      const parent = this.GET_DEPOTSTOCKS.find(item => item.id === parent_id);
      return parent ? parent.ds_name : "-";
    },
    GetTypeDepot(ds_type){
      const dstype = this.GET_DS_TYPES.find(item => item.id === ds_type);
      return dstype ? dstype.name : "-";
    }

  },
};
</script>

<style scoped>
/* Add your custom styles here */
</style>
