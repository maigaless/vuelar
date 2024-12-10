import { createStore } from "vuex";

import authen from './modules/authen/index'
import parameters from "./modules/parameters/index.js";

export default createStore({
    
    modules: {
              authen,
              parameters
             
             }

}
)