//-----------------CATEGORIES----------------
export const SET_CATEGORY = (state,data)=>{
    state.category = data
}

export const SET_CATEGORIES = (state,data)=>{
    state.categories = data
}

export const UPDATE_CATEGORIES=(state, category) =>{
  const existingIndex = state.categories.findIndex((item) => item.id === category.id);

  if (existingIndex !== -1) {
    // Update the existing category
    state.categories.splice(existingIndex, 1, category);
  } else {
    // Add a new category
    state.categories.push(category);
  }
}



//----------------TARIFS-------------------------------------------
export const SET_TARIFS = (state,data)=>{
  state.tarifs = data
}


export const UPDATE_TARIFS=(state, tarif) =>{
  const existingIndex = state.tarifs.findIndex((item) => item.id === tarif.id);

  if (existingIndex !== -1) {
    // Update the existing category
    state.tarifs.splice(existingIndex, 1, tarif);
  } else {
    // Add a new category
    state.tarifs.push(tarif);
  }
}

//----------------DEPOTS-------------------------------------------
export const SET_DEPOTS = (state,data)=>{
  state.depotstocks = data
}


export const UPDATE_DEPOTS=(state, depotstocks) =>{
  const existingIndex = state.depotstocks.findIndex((item) => item.id === depotstocks.id);

  if (existingIndex !== -1) {
    // Update the existing category
    state.depotstocks.splice(existingIndex, 1, depotstocks);
  } else {
    // Add a new category
    state.depotstocks.push(depotstocks);
  }
}


//----------------PAYMENT WAYS-------------------------------------------
export const SET_PAYMENT_METHODS = (state,data)=>{
  state.payment_Methods = data
}


export const UPDATE_PAYMENT_METHODS=(state, paymentMethod) =>{
  const existingIndex = state.payment_Methods.findIndex((item) => item.id === paymentMethod.id);

  if (existingIndex !== -1) {
    // Update the existing category
    state.payment_Methods.splice(existingIndex, 1, paymentMethod);
  } else {
    // Add a new category
    state.payment_Methods.push(paymentMethod);
  }
}


//----------------SHIP WAYS-------------------------------------------
export const SET_SHIPPMENT_METHODS = (state,data)=>{
  state.shipping_Methods = data
}


export const UPDATE_SHIPPING_METHODS=(state, shipMethod) =>{
  const existingIndex = state.shipping_Methods.findIndex((item) => item.id === shipMethod.id);

  if (existingIndex !== -1) {
    // Update the existing category
    state.shipping_Methods.splice(existingIndex, 1, shipMethod);
  } else {
    // Add a new category
    state.shipping_Methods.push(shipMethod);
  }
}

//----------------TAXES-------------------------------------------
export const SET_TAXES = (state,data)=>{
  state.taxs = data
}


export const UPDATE_TAXES = (state, tax) =>{
  const existingIndex = state.taxs.findIndex((item) => item.id === tax.id);

  if (existingIndex !== -1) {
    // Update the existing category
    state.taxs.splice(existingIndex, 1, tax);
  } else {
    // Add a new category
    state.taxs.push(tax);
  }
}

// ---------------------Number_Patterns-------------------------------------

export const SET_NUMBERPATTERNS = (state,data)=>{
  state.numberPatterns = data
}


export const UPDATE_NUMBERPATTERNS = (state, numberPattern) =>{
  const existingIndex = state.numberPatterns.findIndex((item) => item.id === numberPattern.id);

  if (existingIndex !== -1) {
    // Update the existing category
    state.numberPatterns.splice(existingIndex, 1, numberPattern);
  } else {
    // Add a new category
    state.numberPatterns.push(numberPattern);
  }
}









  