<template>
    <div class="row">
        <div class="col-lg-7">
            <div class="card shadow mb-0">
                <div class="card-header bg-white p-4">
                    <h4 class="card-title mb-0 text-capitalize coll-arrow cursor-pointer" data-toggle="collapse" data-target="#billing-inf" aria-expanded="false">Shipping Information</h4>
                </div>
                <div id="billing-inf" class="card-body p-4 collapse show">
                    <form @submit.prevent="saveShippingInfo">
                        <div class="form-row mb-4">
                            <div class="col-lg-6">
                                <label for="first-name">First Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control bg-input mb-lg-0 mb-md-4 mb-4" id="first-name" placeholder="Enter First Name" v-model="shipping.first_name">
                                <span class="error-text-class">{{(errors.first_name == undefined) ? '' : errors.first_name[0]}}</span>
                            </div>
                            <div class="col-lg-6">
                                <label for="last-name">Last Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control bg-input" id="last-name" placeholder="Enter Last Name" v-model="shipping.last_name">
                                <span class="error-text-class">{{(errors.last_name == undefined) ? '' : errors.last_name[0]}}</span>
                            </div>
                        </div>

                        <div class="form-row mb-4">
                            <div class="col">
                                <label>Email Address <span class="text-danger">*</span></label>
                                <input type="email" class="form-control bg-input" placeholder="Enter Email" v-model="shipping.email">
                                <span class="error-text-class">{{(errors.email == undefined) ? '' : errors.email[0]}}</span>
                            </div>
                        </div>

                        <div class="form-row mb-4">
                            <div class="col">
                                <label class="col-form-label">Country <span class="text-danger">*</span></label>
                                <select class="select bg-input" v-model="shipping.country">
                                    <option value="" selected disabled>Select your country</option>
                                    <option value="Netherlands">Netherlands</option>
                                </select>
                                <span class="error-text-class">{{(errors.country == undefined) ? '' : errors.country[0]}}</span>
                            </div>
                        </div>

                        <div class="form-row mb-4">
                            <div class="col">
                                <label>Address 1 </label>
                                <input type="text" class="form-control bg-input" placeholder="Enter your address" v-model="shipping.address_1">
                                <span class="error-text-class">{{(errors.address_1 == undefined) ? '' : errors.address_1[0]}}</span>
                            </div>
                        </div>

                        <div class="form-row mb-4">
                            <div class="col">
                                <label>Address 2 (Optional) </label>
                                <input type="text" class="form-control bg-input" placeholder="Enter your address" v-model="shipping.address_2">
                                <span class="error-text-class">{{(errors.address_2 == undefined) ? '' : errors.address_2[0]}}</span>
                            </div>
                        </div>

                        <div class="form-row mb-4">
                            <div class="col-lg-6">
                                <label for="first-name">City / State <span class="text-danger">*</span></label>
                                <select class="select bg-input mb-lg-0 mb-md-4 mb-4" v-model="shipping.city">
                                    <option value="" selected disabled>Select your city</option>
                                    <option value="Amsterdam">Amsterdam</option>
                                    <option value="Amsterdam">Amsterdam</option>
                                    <option value="The Hague">The Hague</option>
                                    <option value="Utrecht">Utrecht</option>
                                    <option value="Eindhoven">Eindhoven</option>
                                    <option value="Tilburg">Tilburg</option>
                                    <option value="Almere">Almere</option>
                                    <option value="Groningen">Groningen</option>
                                    <option value="Breda">Breda</option>
                                    <option value="Nijmegen">Nijmegen</option>
                                    <option value="Enschede">Enschede</option>
                                    <option value="Apeldoorn">Apeldoorn</option>
                                    <option value="Haarlem">Haarlem</option>
                                    <option value="Arnhem">Arnhem</option>
                                    <option value="Amersfoort">Amersfoort</option>
                                    <option value="Hertogenbosch">Hertogenbosch</option>
                                    <option value="Zoetermeer">Zoetermeer</option>
                                    <option value="Zwolle">Zwolle</option>
                                    <option value="Maastricht">Maastricht</option>
                                    <option value="Dordrecht">Dordrecht</option>
                                </select>
                                <span class="error-text-class">{{(errors.city == undefined) ? '' : errors.city[0]}}</span>
                            </div>
                            <div class="col-lg-6">
                                <label>Zip / Postal Code <span class="text-danger">*</span></label>
                                <input type="text" class="form-control bg-input" placeholder="Enter your zip code" v-model="shipping.zipcode">
                                <span class="error-text-class">{{(errors.zipcode == undefined) ? '' : errors.zipcode[0]}}</span>
                            </div>
                        </div>

                        <div class="d-inline-block">
                            <button type="submit" class="d-inline-block btn btn-md btn-style py-3 px-5 radius-5 text-white">Continue</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
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

                        <form @submit.prevent="confirmPayment">
                            <div class="card border-0 mb-0">
                                <div class="p-4">
                                    <h4 class="card-title mb-0 text-capitalize text-theme coll-arrow cursor-pointer" data-toggle="collapse" data-target="#payment-inf" aria-expanded="true">Select Payment Method</h4>
                                </div>
                                <div id="payment-inf" class="card-body p-0 collapse show">
                                    <div class="p-4 align-items-center">
                                        <div class="">
                                            <div class="form-group mb-0">
                                                <div class="custom-control custom-radio mb-2">
                                                    <input type="radio" class="custom-control-input" id="pay-card" name="payment-method" value="card" @change="onPaymentMethodChange($event)">
                                                    <label class="custom-control-label pl-3" for="pay-card">Credit Card</label>
                                                </div>
                                            </div>
                                            <div class="form-group mb-0">
                                                <div class="custom-control custom-radio mb-2">
                                                    <input type="radio" class="custom-control-input" id="pay-cod" name="payment-method" value="cod" @change="onPaymentMethodChange($event)">
                                                    <label class="custom-control-label pl-3" for="pay-cod">Cash On Delivery</label>
                                                </div>
                                            </div>
                                            <!--<div class="form-group mb-0">
                                                <div class="custom-control custom-radio mb-2">
                                                    <input type="radio" class="custom-control-input" id="pay-ideal" name="payment-method" value="ideal" @change="onPaymentMethodChange($event)">
                                                    <label class="custom-control-label pl-3" for="pay-ideal">iDEAL</label>
                                                </div>
                                            </div>-->
                                        </div>
                                    </div>
                                    <hr class="m-0">
                                    <div class="card-body p-4"  v-if="payment_method == 'card'">
                                        <div class="form-row mb-4">
                                            <div class="col">
                                                <label>Card Number</label>
                                                <input type="text" class="form-control bg-input" placeholder="Enter your card number here..." v-model="payment.card_number">
                                                <span class="error-text-class">{{(errors.card_number == undefined) ? '' : errors.card_number[0]}}</span>
                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="col-6">
                                                <label>Expiry Month</label>
                                                <br>
                                                <select class="select bg-input" v-model="payment.expiry_month">
                                                    <option value="" selected disabled>MM</option>
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                    <option value="05">05</option>
                                                    <option value="06">06</option>
                                                    <option value="07">07</option>
                                                    <option value="08">08</option>
                                                    <option value="09">09</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                </select>
                                                <br>
                                                <span class="error-text-class text-wrap">{{(errors.expiry_month == undefined) ? '' : errors.expiry_month[0]}}</span>
                                            </div>
                                            <div class="col-6">
                                                <label>Expiry Year</label>
                                                <br>
                                                <select class="select bg-input" v-model="payment.expiry_year">
                                                    <option value="" selected disabled>YYYY</option>
                                                    <option value="2022">2022</option>
                                                    <option value="2023">2023</option>
                                                    <option value="2024">2024</option>
                                                    <option value="2025">2025</option>
                                                    <option value="2026">2026</option>
                                                    <option value="2027">2027</option>
                                                    <option value="2028">2028</option>
                                                    <option value="2029">2029</option>
                                                    <option value="2030">2030</option>
                                                </select>
                                                <br>
                                                <span class="error-text-class text-wrap">{{(errors.expiry_year == undefined) ? '' : errors.expiry_year[0]}}</span>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <label>CVV Code</label>
                                                <input type="text" class="form-control bg-input" placeholder="Enter code here..." v-model="payment.cvv">
                                                <span class="error-text-class">{{(errors.cvv == undefined) ? '' : errors.cvv[0]}}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body p-4"  v-if="payment_method == 'ideal'">
                                        <div class="form-row mb-4">
                                            <div class="col">
                                                <label>Customer Name</label>
                                                <input type="text" class="form-control bg-input" placeholder="Enter Customer Name" v-model="payment.customer_name">
                                                <span class="error-text-class">{{(errors.customer_name == undefined) ? '' : errors.customer_name[0]}}</span>
                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="col">
                                                <label for="ideal-bank">Select Bank Name</label>
                                                <br>
                                                <select class="select bg-input mb-lg-0 mb-md-4 mb-4" v-model="payment.bank_name">
                                                    <option value="" selected disabled>Select Bank Name</option>
                                                    <option value="abn_amro">ABN AMRO</option>
                                                    <option value="asn_bank">ASN Bank</option>
                                                    <option value="bunq">Bunq</option>
                                                    <option value="handelsbanken">Handelsbanken</option>
                                                    <option value="ing">ING</option>
                                                    <option value="knab">Knab</option>
                                                    <option value="revolut">Revolut</option>
                                                    <option value="regiobank">RegioBank</option>
                                                    <option value="sns_bank">SNS Bank (De Volksbank)</option>
                                                    <option value="triodos_bank">Triodos Bank</option>
                                                    <option value="van_lanschot">Van Lanschot</option>                                                    	
                                                </select>
                                                <span class="error-text-class">{{(errors.bank_name == undefined) ? '' : errors.bank_name[0]}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="checkout-btn p-2 p-md-4 float-left d-inline-block">
                                <a href="/cart" class="d-inline-block py-3 text-theme-secondary"><i class="lnr lnr-chevron-left mr-2"></i>Back to Cart</a>
                            </div>
                            <div class="checkout-btn p-2 p-md-4 float-right d-inline-block">
                                <button type="submit" class="d-inline-block btn btn-md btn-style py-3 px-4 radius-5 text-white" :disabled="disablePaymentBtn">Confirm Pay</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['stripe'],
        mounted() {
            console.log('Component mounted.')
        },
        created() {
            this.getCartInfo(),
            this.getShippingInfo()
        },
        data() {
            return {
                carts:{},
                errors: {},
                shipping: {},
                payment: {'expiry_month' : '','expiry_year' : '', 'bank_name' : ''},
                total:0,
                sub_total:0,
                payment_method:null,
                disablePaymentBtn:true,
            }
        },
        methods: {
            getCartInfo() {
                let cartData = localStorage.getItem("cart");
                this.carts = JSON.parse(cartData);
                this.total = this.carts.total;
                this.sub_total = this.carts.total;
            },
            resetCart() {
                let cartData = {itemcount:0,items:[],total:0};
                localStorage.setItem("cart",JSON.stringify(cartData));
            },
            onPaymentMethodChange(event) {
                this.payment_method = event.target.value;
                if(this.payment_method == null){
                    this.disablePaymentBtn = true;
                }
                else{
                    this.disablePaymentBtn = false;
                }
            },
            saveShippingInfo() {
                this.errors = {};
                axios.post('/save_shipping_info', this.shipping)
                    .then(response => (
                        this.$swal('Great!',response.data.msg,'success')
                    ))
                    .catch(err => (
                        this.errors = err.response.data.errors
                    ))
                    .finally(() => console.log('closed'))
            },
            confirmPayment(){
                if(this.payment_method == 'card'){
                    if(this.validateCard()){
                        this.createStripeToken();
                    }
                    else{
                        this.$swal('Oops!','Please enter valid card details','error')
                    }
                }
                else if(this.payment_method == 'cod'){
                    this.confirmOrderCashOnDelivery();
                }
                else if(this.payment_method == 'ideal'){
                    if(this.validateiDEAL()){
                        this.confirmOrderiDEAL();
                    }
                    else{
                        this.$swal('Oops!','Please enter valid iDEAL details','error')
                    }
                }
            },
            getShippingInfo() {
                this.errors = {};
                axios.get('/get_shipping_info')
                    .then(response => (
                        this.shipping = (response.data.shipping == null) ? {} : response.data.shipping
                    ))
                    .catch(err => (
                        console.log(err)
                    ))
                    .finally(() => console.log('closed'))
            },
            createStripeToken(){
                Stripe.setPublishableKey(this.stripe);
                Stripe.createToken({
                    number: this.payment.card_number,
                    cvc: this.payment.cvv,
                    exp_month: this.payment.expiry_month,
                    exp_year: this.payment.expiry_year
                }, (status,response) => {
                    if (response.error) {
                        this.$swal('Oops!',response.error.message,'error')
                    } else {
                        this.errors = {};
                        this.payment.stripe_token = response['id'];
                        this.payment.cart = this.carts;
                        this.payment.payment_method = this.payment_method;
                        axios.post('/confirm_payment', this.payment)
                            .then(response => (
                                this.payment = {},
                                this.payment_method = null,
                                this.$swal(response.data.title,response.data.msg,response.data.type),
                                this.resetCart(),
                                this.getCartInfo()
                            ))
                            .catch(err => (
                                this.errors = err.response.data.errors
                            ))
                            .finally(() => console.log('closed'))
                    }
                });
            },
            confirmOrderCashOnDelivery(){
                this.errors = {};
                this.payment.payment_method = this.payment_method;
                this.payment.cart = this.carts;
                axios.post('/confirm_payment', this.payment)
                    .then(response => (
                        this.payment = {},
                        this.payment_method = null,
                        this.$swal(response.data.title,response.data.msg,response.data.type),
                        this.resetCart(),
                        this.getCartInfo()
                    ))
                    .catch(err => (
                        this.errors = err.response.data.errors
                    ))
                    .finally(() => console.log('closed'))
            },
            confirmOrderiDEAL(){
                
            },
            validateCard(){
                let validated = true;
                if(this.payment.card_number == null || this.payment.card_number == undefined || this.payment.card_number == ''){
                    validated = false;
                }
                if(this.payment.expiry_month == null || this.payment.expiry_month == undefined || this.payment.expiry_month == ''){
                    validated = false;
                }
                if(this.payment.expiry_year == null || this.payment.expiry_year == undefined || this.payment.expiry_year == ''){
                    validated = false;
                }
                if(this.payment.cvv == null || this.payment.cvv == undefined || this.payment.cvv == ''){
                    validated = false;
                }
                return validated;
            },
            validateiDEAL(){
                let validated = true;
                if(this.payment.customer_name == null || this.payment.customer_name == undefined || this.payment.customer_name == ''){
                    validated = false;
                }
                if(this.payment.bank_name == null || this.payment.bank_name == undefined || this.payment.bank_name == ''){
                    validated = false;
                }
                return validated;
            }
        }
    }
</script>
