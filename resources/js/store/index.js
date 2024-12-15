import { createStore } from "vuex";

import authen from './modules/authen/index'
import parameters from "./modules/parameters/index.js";
import tierces from "./modules/tierces/index.js"
import products from "./modules/products/index.js"

export default createStore({
    
    modules: {
              authen,
              parameters,
              tierces,
              products
             
             }

}
)