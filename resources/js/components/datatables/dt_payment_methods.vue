<template>
  <div class="w-full px-4 py-6">
   
    
<div class="flex flex-row items-center px-1 border-b-2 ">
   <h1 class="text-3xl font-bold text-gray-800 flex-1 page-title ">t</h1>
   <div class="w-auto h-9 ">
      <span @click="AddNewpaymentMethod" class="w-full bg-blue-400 cursor-pointer py-2 px-2 text-white"> 
       + mode de Paiment  </span>
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
            <th class="py-1 px-2 text-left">Code</th>
            <th class="py-1 px-2 text-left">Opérationnel</th>
            <th class="py-1 px-2 text-left">Action</th>
          </tr>
        </thead>

        <!-- Table Body -->
        <tbody class="text-gray-600 text-sm font-light">
          <tr
            v-for="paymentMethod in GET_PAYMENT_METHODS"
            :key="paymentMethod.id"
            @dblclick="openModal(paymentMethod)"
            @click="setSelection(paymentMethod)"
            class="border-b border-gray-200 hover:bg-gray-100"
            :class="paymentMethod.id === SelectedPaymentMethod.id ? 'bg-yellow-200' : ''"
          >
            <td class="py-1 px-2 text-left whitespace-nowrap">{{ paymentMethod.id }}</td>
            <td class="py-1 px-2 text-left">{{ paymentMethod.code }}</td>
            <td class="py-1 px-2 text-left">{{ paymentMethod.name }}</td>
            <td class="py-1 px-2 text-left">
              <i :class="paymentMethod.is_active == true ? 'fas fa-check-circle mr-2':''"></i>
            </td>
           
            <td class="py-1 px-2 text-left">
              <span 
                @click.stop="openModal(paymentMethod)" 
                class="text-blue-500 hover:underline cursor-pointer">
                <i class="fas fa-pencil"></i>
              </span>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    
    <!-- paymentMethod Modal -->
    <PaymentMethodModal 
      v-if="isVisible" 
      :PaymentMethod="SelectedPaymentMethod" 
      @closeModal="closeModal" 
    />
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
import PaymentMethodModal from "../forms/frm_payment_method.vue";

export default {
  data() {
    return {
      SelectedPaymentMethod: {}, // Data to pass to the modal
      isVisible: false, // Modal visibility state
    };
  },
  components: {
    PaymentMethodModal,
  },
  computed: {
    ...mapGetters(["GET_PAYMENT_METHODS"]),
  },
  methods: {
    ...mapActions(["fetchPaymentWays"]),
    setSelection(paymentMethod){
      this.SelectedPaymentMethod=paymentMethod
    },
    AddNewpaymentMethod(){
        this.openModal({})
    },
    openModal(paymentMethod) {
      console.log(paymentMethod)
      this.SelectedPaymentMethod = paymentMethod;
      this.isVisible = true; // Show the modal
    },
    closeModal() {
      this.isVisible = false; // Hide the modal
      this.SelectedPaymentMethod = {};
    },
  },
};
</script>

<style scoped>
/* Add your custom styles here */
</style>
