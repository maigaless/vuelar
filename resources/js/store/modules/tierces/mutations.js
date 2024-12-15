//------------------------ **** SUPPLIERS **** ----------------------------------------
export const SET_SUPPLIERS = (state,data) => {
    state.suppliers = data
}


export const UPDATE_SUPPLIERS = (state,supplier) => {
    const existingIndex = state.suppliers.findIndex((item) => item.id === supplier.id);

    if (existingIndex !== -1) {
      // Update the existing category
      state.suppliers.splice(existingIndex, 1, supplier);
    } else {
      // Add a new category
      state.suppliers.push(supplier);
    }
}


//------------------------ **** CUSTOMERS **** ----------------------------------------
export const SET_CUSTOMERS = (state,data) => {
    state.customers = data
}

export const UPDATE_CUSTOMERS = (state,customer) => {
    const existingIndex = state.customers.findIndex((item) => item.id === customer.id);

    if (existingIndex !== -1) {
      // Update the existing category
      state.customers.splice(existingIndex, 1, customer);
    } else {
      // Add a new category
      state.customers.push(customer);
    }
}