<template>
    <div class="row">
        <div class="col-12 col-lg-7">
            <div class="card shadow">
                <div class="card-header bg-white p-4 d-none d-md-block">
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="card-title mb-0 text-capitalize">Product Details</h4>
                        </div>
                        <div class="col-md-2 text-center">
                            <h4 class="card-title mb-0 text-capitalize">Price</h4>
                        </div>
                        <div class="col-md-2 text-center">
                            <h4 class="card-title mb-0 text-capitalize">Trash</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="cart-item-list clearfix" v-for="(cart,i) in carts.items" :key="i">
                        <div class="row align-items-center">
                            <div class="col-lg-8 col-md-8">
                                <div class="cart-item-desc xs-text-center">
                                    <img v-bind:src="cart.image" alt="Edit image" class="img-fluid cart-prod-img d-inline-block align-middle d-lg-inline-block">
                                    <div class="cart-item-info d-inline-block align-middle pl-0 pl-md-3 py-3 py-md-0 xs-text-center">
                                        <h5><a href="javascript:void(0)" class="text-link"><strong>{{cart.name}}</strong></a></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 p-0 text-center">
                                <div class="cart-item-price-wrapper">
                                    <div class="cart-item-price d-inline-block display-5">
                                        <span class=""><i class="fa fa-euro"></i>&nbsp;{{cart.price}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 mt-4 mt-md-0 text-center">
                                <a href="javascript:void(0);" @click="removeItemFromCart(cart.id)" class=""><span class="lnr lnr-trash text-theme display-5"></span></a>
                            </div>
                        </div>
                        <hr class="m-1">
                    </div>
                </div>
                <hr class="m-0">
            </div>
        </div>
        <div class="col-12 col-lg-5">
            <div class="card shadow mb-0 mt-4 mt-lg-0">
                <div class="card-header bg-white p-4">
                <h4 class="card-title mb-0 text-capitalize">Order Summary</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <tbody>
                                <tr>
                                    <td class="text-grey text-capitalize p-4 border-top-0">Sub Total</td>
                                    <td class="text-right p-4 border-top-0">€{{sub_total}}</td>
                                </tr>
                                <tr class="ord-sum-total">
                                    <td class="display-6 p-4">
                                        <b>Total</b>
                                    </td>
                                    <td class="text-right p-4 display-6"><b>€{{total}}</b></td>
                                </tr>
                            </tbody>
                        </table>
                        <hr class="m-0">

                        <div class="checkout-btn p-2 p-md-4 float-left d-inline-block">
                        </div>
                        <div class="checkout-btn p-2 p-md-4 float-right d-inline-block" v-if="this.carts.items.length > 0">
                            <a href="/checkout" class="d-inline-block btn btn-md btn-style py-3 px-4 radius-5 text-white">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        created() {
            this.getCartInfo()
        },
        data() {
            return {
                carts:{},
                total:0,
                sub_total:0
            }
        },
        methods: {
            getCartInfo() {
                let cartData = localStorage.getItem("cart");
                if(cartData == null){
                    this.carts = {items:[]};
                    this.total = 0;
                    this.sub_total = 0;
                }
                else{
                    this.carts = JSON.parse(cartData);
                    this.total = this.carts.total;
                    this.sub_total = this.carts.total;
                }
            },
            removeItemFromCart(id) {
                this.carts.items = this.removeObjectWithId(this.carts.items,id);
      
                let sum = 0;
                let count = 0;
                this.carts.items.forEach(element => {
                    count++;
                    sum += element.price;
                });

                this.total = sum;
                this.sub_total = sum;
                this.carts.itemcount = count;
                this.carts.total = sum;
                localStorage.setItem("cart",JSON.stringify(this.carts));
            },
            removeObjectWithId(arr,id){
                let objWithIdIndex = arr.findIndex((obj) => obj.id === id);
                arr.splice(objWithIdIndex, 1);
                return arr;
            }
        }
    }
</script>
