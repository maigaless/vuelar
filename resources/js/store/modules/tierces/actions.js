import axios from "axios";
//------------------------Suppliers----------------------------------
export const fetchSuppliers = ({ commit }) => {
    axios.get('/api/suppliers')
        .then(response => {
            
            commit('SET_SUPPLIERS', response.data);
        })
        .catch(error => {
            console.error("There was an error fetching the categories:", error);
            // Optionally, you can commit an error mutation or handle the error as needed
        });
}



export const SaveSupplier = async ({commit},supplierData)=>{
 try {
      const response = await axios.post('/api/suppliers/store', supplierData);
        // Assuming the response contains the created category
      commit('UPDATE_SUPPLIERS', response.data.supplier);
     return response.data.supplier;
    } catch (error) {
      console.error('Error creating supplier:', error);

      // Handle error appropriately (e.g., show a notification)

    }
}

//------------------------CATEGORIES----------------------------------
export const fetchCustomers = ({ commit }) => {
    axios.get('/api/customers')
        .then(response => {
            
            commit('SET_CUSTOMERS', response.data);
        })
        .catch(error => {
            console.error("There was an error fetching the categories:", error);
            // Optionally, you can commit an error mutation or handle the error as needed
        });
}


export const SaveCustomer = async ({commit},customerData)=>{
    try {
         const response = await axios.post('/api/customers/store', customerData);
           // Assuming the response contains the created category
         commit('UPDATE_CUSTOMERS', response.data.customer);
        return response.data.customer;
       } catch (error) {
         console.error('Error creating costumer:', error);
   
         // Handle error appropriately (e.g., show a notification)
   
       }
   }
