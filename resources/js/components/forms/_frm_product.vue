<template lang="">
    <div>
  <!-- Modal Backdrop -->
  <div class="fixed inset-0 bg-black bg-opacity-50 z-40">
  </div>

  <div class="fixed inset-0 flex  justify-center z-50 py-[12%] ">
            <div class="w-[60%] shadow-lg bg-white ">
                  <!-- Modal Header -->
                        <div class="h-auto min-h-10 w-full flex items-center justify-between  border-b ">
                        <span class="text-lg font-semibold capitalize px-4">Product</span>
                        <button
                            class="w-8  min-h-10 flex items-center justify-center  bg-red-500 text-white
                            font-bold hover:bg-red-600"
                            @click="close"
                        >
                            X
                        </button>
                        </div>


                    <!--body--->    

                    <div class="flex flex-col p-1 space-x-1 h-auto">
                        <div class="flex border-b">
                                    <span
                                    v-for="(tab, index) in tabs"
                                    :key="index"
                                    @click="active_tab = tab.name"
                                    :class="[
                                        'py-2 px-4 focus:outline-none cursor-pointer',
                                        active_tab === tab.name ? 'border-b-4 border-blue-500 font-semibold text-blue-500' : 'text-gray-500'
                                    ]"
                                    >
                                    {{ tab.label }}
                                    </span>
                                </div>
                    
                                        <div v-if="active_tab == 'Info'" class="w-full p-2 space-y-2">

                                            <div class="w-full  ">
                                              <label>Article</label>
                                              <input v-model="product.name" type="text"  class="w-full p-2" placeholder="Nom d'article "/>
                                            </div>  
                                          
                                        </div>

                                        <!-- Tarifs -->
                                        <div v-if="active_tab == 'Tarifs'" class="w-full p-2 space-y-2">
                                            <h3>Tarifs</h3>
                                            {{GET_TARIFS}}
                                        </div>
                                        <div v-if="active_tab == 'Stock'" class="w-full p-2 space-y-2">
                                            <h3>Stock</h3>
                                           
                                        </div>
                                        <div v-if="active_tab == 'Suppliers'" class="w-full p-2 space-y-2">
                                            <h3>Suppliers</h3>
                                        </div>
                                        <div v-if="active_tab == 'Statistics'" class="w-full p-2 space-y-2">
                                            <h3>Statistics</h3>
                                        </div>   

                                        
                    </div> 

                
                    <div class="flex flex-row p-2 items-center justify-center border-t-2 ">
                                                                <span  class="w-auto  px-3  text-white bg-green-500 hover:bg-green-600 text-center text-lg font-sans font-semibold cursor-pointer">save</span>
                                                        
                                                                <span @click="close" class="w-auto  px-3  text-white bg-red-500 hover:bg-red-600 text-center text-lg font-sans font-semibold cursor-pointer">cancel</span> </div>
                                                        </div>
                   

            
            
  </div>
    </div>
</template>
<script>
import { mapGetters } from 'vuex';
export default {
    name:'ProductModal',
    data(){
      return {
        active_tab:'info',
        tabs:[
            {name:'info',label:'Info'},
            {name:'Tarifs',label:'Tarifs'},
            {name:'Stock',label:'Stock'},
            {name:'Suppliers',label:'Suppliers'},
            {name:'Statistics',label:'Statistics'},
            

        ]
      }
    },
    props:{
      product:{ type:Object, required:true},
    },
    computed: {
      ...mapGetters(['GET_DEPOTSTOCKS','GET_TARIFS']),
    activeTabComponent() {
      switch (this.activeTab) {
        case "info":
          return Info;
        case "Tarifs":
          return Tarifs;

        case "Stock":
          return Stock;

        case "Suppliers":
          return Suppliers;

        case "Statistics":
          return Statistics;
   
        
        default:
          return null;
      }
    },
  
  },
  methods:{
        close() {
        this.$emit("close"); // Emit updated category on close
      },
    }
}
</script>
<style lang="">
    
</style>