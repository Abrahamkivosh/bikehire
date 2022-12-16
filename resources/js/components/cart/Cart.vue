<template>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Bike</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="(item,index) in carts" :key="index" >
        <td>
          <div class="media">
            <div class="media-left">
              <a href="#">
                <img
                  width="100"
                  height="50"
                  class="media-object img-fluid rounded-circle "
                  :src="item.image"
                  :alt="item.name"
                />
              </a>
            </div>
            <div>
              <h4 class="media-heading" v-text="item.name" ></h4>
              <div>
                <p v-text="item.color" ></p>
                <p v-text="item.description" ></p>
              </div>
            </div>
          </div>
        </td>
        <td>Ksh <span v-text="item.price_per_hour" ></span> </td>
        <td>
          <input type="number" class="form-control quantity-items" v-model.number="item.quantity"  />
        </td>
        <td>Ksh <span v-text="subTotal(item)" ></span></td>
        <td>
          <a href="#" @click.prevent="removeItem(item)" class="btn btn-danger btn-sm"
            ><i class="fa fa-trash"></i
          ></a>
        </td>
      </tr>
        <tr class="h3" >
            <td colspan="3" class="text-right">Total</td>
            <td class="text text-info " colspan="2">Ksh <span  >{{grandTotal()}}</span></td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">
                <a @click.prevent="checkout()" href="#" class="btn btn-primary btn-lg">Checkout</a>
            </td>
        </tr>

    </tbody>
  </table>
</template>
<script>
import axios from "axios";
export default {
  props: ["cart"],
  data() {
    return {
      carts: [],
    };
  },
  created() {
    this.carts = this.cart;
  },
  computed: {
 
   
  },
  methods: {
    updateQuantity() {
      console.log("update quantity");
    },
    subTotal(item) {
      return parseFloat(item.price_per_hour) * parseInt(item.quantity);
    },
    grandTotal(){
        let total = 0;
       const items = this.carts;
    //   change items from object to array
         const itemsArray = Object.values(items);
            itemsArray.forEach(item => {
                total += parseFloat(item.price_per_hour) * parseInt(item.quantity);
            });


        return total;
    },

    removeItem(item){

        console.log(item);
    },
    checkout(){
      let cart = Object.values(this.carts);
      console.log(cart);
   
      axios.post('/api/checkout',cart).then((result) => {

        console.log(result);
        alert("Checkout successful")
        
      }).catch((err) => {
        console.log(err);
        alert("Checkout failed")
        
      });
    }
    
  },
};
</script>
<style>
.quantity-items{
    width: 100px;
    color: #000;
    font-weight: bold;
}
</style>