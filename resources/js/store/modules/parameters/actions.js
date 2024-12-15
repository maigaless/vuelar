import axios from "axios";

//------------------------CATEGORIES----------------------------------
export const fetchCategories = ({ commit }) => {
    axios.get('/api/categories')
        .then(response => {
            
            commit('SET_CATEGORIES', response.data);
        })
        .catch(error => {
            console.error("There was an error fetching the categories:", error);
            // Optionally, you can commit an error mutation or handle the error as needed
        });
}

export const  SaveCategory = async ({ commit }, categoryData) =>{

    try {
      const response = await axios.post('/api/categories/store', categoryData);
        // Assuming the response contains the created category
      commit('UPDATE_CATEGORIES', response.data.category);
      
    } catch (error) {
      console.error('Error creating category:', error);

      // Handle error appropriately (e.g., show a notification)

    }

  }

export const SELECT_CATEGORY =({commit},category)=>{
  commit('SET_CATEGORY',category)
}  




//---------------------TARIFS-------------------------------------
export const fetchTarifs = ({ commit }) => {
  axios.get('/api/tarifs')
      .then(response => {
          
          commit('SET_TARIFS', response.data);
      })
      .catch(error => {
          console.error("There was an error fetching the TARIFS:", error);
          // Optionally, you can commit an error mutation or handle the error as needed
      });
}


export const  SaveTarif = async ({ commit }, TarifData) =>{

  try {
    const response = await axios.post('/api/tarifs/store', TarifData);
      // Assuming the response contains the created category
    commit('UPDATE_TARIFS', response.data.tarif);
    
  } catch (error) {
    console.error('Error creating tarif:', error);

    // Handle error appropriately (e.g., show a notification)

  }

}


//---------------------TARIFS-------------------------------------
export const fetchDepots = ({ commit }) => {
  axios.get('/api/depotstocks')
      .then(response => {
          
          commit('SET_DEPOTS', response.data);
      })
      .catch(error => {
          console.error("There was an error fetching the TARIFS:", error);
          // Optionally, you can commit an error mutation or handle the error as needed
      });
}


export const  SaveDepotStock = async ({ commit }, DepotData) =>{

  try {
    const response = await axios.post('/api/depotstocks/store', DepotData);
      // Assuming the response contains the created category
    commit('UPDATE_DEPOTS', response.data.depotstock);
    
  } catch (error) {
    console.error('Error creating depot:', error);

    // Handle error appropriately (e.g., show a notification)

  }

}


//---------------------Payments Ways-------------------------------------
export const fetchPaymentWays = ({ commit }) => {
  axios.get('/api/paymentsWays')
      .then(response => {
          
          commit('SET_PAYMENT_METHODS', response.data);
      })
      .catch(error => {
          console.error("There was an error fetching the TARIFS:", error);
          // Optionally, you can commit an error mutation or handle the error as needed
      });
}

export const  SavePaymentMethod = async ({ commit }, PaymentData) =>{

  try {
    const response = await axios.post('/api/paymentsWays/store', PaymentData);
      // Assuming the response contains the created category
    commit('UPDATE_PAYMENT_METHODS', response.data.paymentMethod);
    
  } catch (error) {
    console.error('Error creating depot:', error);

    // Handle error appropriately (e.g., show a notification)

  }

}


//---------------------Payments Ways-------------------------------------
export const fetchShippmentWays = ({ commit }) => {
  axios.get('/api/shippmentsWays')
      .then(response => {
          
          commit('SET_SHIPPMENT_METHODS', response.data);
      })
      .catch(error => {
          console.error("There was an error fetching the TARIFS:", error);
          // Optionally, you can commit an error mutation or handle the error as needed
      });
}

export const  SaveShippementMethod = async ({ commit }, PaymentData) =>{

  try {
    const response = await axios.post('/api/shippmentsWays/store', PaymentData);
      // Assuming the response contains the created category
    commit('UPDATE_SHIPPING_METHODS', response.data.ShippmentMethod);
    
  } catch (error) {
    console.error('Error creating depot:', error);

    // Handle error appropriately (e.g., show a notification)

  }

}


export const fetchTaxes = ({ commit }) => {
  axios.get('/api/taxes')
      .then(response => {
          
          commit('SET_TAXES', response.data);
      })
      .catch(error => {
          console.error("There was an error fetching the TARIFS:", error);
          // Optionally, you can commit an error mutation or handle the error as needed
      });
}


export const  SaveTaxe = async ({ commit }, taxData) =>{

  try {
    const response = await axios.post('/api/taxes/store', taxData);
      // Assuming the response contains the created category
      console.log(response.data.tax);
    commit('UPDATE_TAXES', response.data.tax);
    
    
  } catch (error) {
    console.error('Error creating depot:', error);

    // Handle error appropriately (e.g., show a notification)

  }

}

export const fetchNumberPatterns = ({commit})=>{
 

      axios.get('/api/numerotations')
      .then(response => {
          commit('SET_NUMBERPATTERNS', response.data);
      })
      .catch(error => {
          console.error("There was an error fetching the Numbers patterns", error);
          
      });
    
}

export const SaveNumberPattern = async ({commit},numberPatterndata)=>{
  try {
    const response = await axios.post('/api/numerotations/store',numberPatterndata);
      // Assuming the response contains the created category
    commit('UPDATE_NUMBERPATTERNS', response.data.numberPattern );
    
  } catch (error) {
    console.error('Error creating category:', error);

    // Handle error appropriately (e.g., show a notification)

  }
}


