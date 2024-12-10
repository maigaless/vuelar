export const SET_PRODUCTS = (state,data)=>{
    state.products = data
  }
  
  
  export const UPDATE_PRODUCTS = (state, product) =>{
    const existingIndex = state.products.findIndex((item) => item.id === product.id);
  
    if (existingIndex !== -1) {
      // Update the existing category
      state.products.splice(existingIndex, 1, tax);
    } else {
      // Add a new category
      state.products.push(tax);
    }
  }
  