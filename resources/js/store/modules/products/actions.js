
export const fetchProducts = ({ commit }) => {
    axios.get('/api/products')
        .then(response => {
            
            commit('SET_PRODUCTS', response.data);
        })
        .catch(error => {
            console.error("There was an error fetching the TARIFS:", error);
            // Optionally, you can commit an error mutation or handle the error as needed
        });
  }
  
  
  export const  SaveProduct = async ({ commit }, productData) =>{
  
    try {
cos
      const response = await axios.post('/api/products/store', productData);
        // Assuming the response contains the created category
      
      commit('UPDATE_PRODUCTS', response.data.produt);
      
      
    } catch (error) {
      console.error('Error creating depot:', error);
  
    }
  
  }