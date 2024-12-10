export default {

    category:{name:'',code:'',parent_id:''},
    categories:[],
    tarifs:[],
    depotstocks:[],
    ds_types: [
                        {
                        "id": 0,
                        "name": "Depot Stock",
                        "description": "Depot stock used as a warehouse for storage."
                        },
                        {
                        "id": 1,
                        "name": "Hub stock",
                        "description": "Depot stock intended for retail distribution."
                        },
                        {
                        "id": 2,
                        "name": "Store",
                        "description": "A central depot for distributing goods."
                        },
                ],
   payment_Methods:[],
   shipping_Methods:[],
   taxs: [],
   numberPatterns:[],
   models:[
           {id:1,name:'Product'},
           {id:2,name:'Customer'},
           {id:3,name:'Supplier'}
        ]

}