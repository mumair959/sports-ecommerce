<template>
    <div class="row">
        <div class="col-lg-4 col-md-12">
            <aside class="pdt-filter-blk card mb-4 shadow">
                <div class="card-header bg-white p-4">
                    <h3 class="card-title mb-0 d-inline-block">{{lang['filters']}}</h3>
                    <a href="javascript:;" class="d-inline-block float-right text-grey"><i class="lnr lnr-funnel display-5"></i></a>
                </div>
                <div id="accordion" class="accordion">
                    <div class="card mb-0 border-0">

                        <div class="card-header bg-white border-bottom-0 p-3 mb-0">
                            <h5 class="card-title mb-0 text-capitalize coll-arrow cursor-pointer" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true">{{lang['categories']}}</h5>
                        </div>

                        <div id="collapseOne" class="card-body pt-0 pb-3 collapse show" data-parent="#accordion">
                            <div class="custom-control custom-radio mb-2" v-for="(product_category,i) in product_categories" :key="i">
                                <input type="radio" class="custom-control-input" :id="'cat-'+product_category.id" name="cat-filter" :value="product_category.id" @change="onCategoryChange($event)">
                                <label class="custom-control-label pl-3" :for="'cat-'+product_category.id">{{product_category.name}}</label>
                            </div>
                        </div>

                        <div class="card-header bg-white border-bottom-0 p-3 mb-0">
                            <h5 class="card-title mb-0 text-capitalize coll-arrow cursor-pointer" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true">{{lang['price_range']}}</h5>
                        </div>

                        <div id="collapseThree" class="card-body collapse border border-0 pt-0 pb-3" data-parent="#accordion">
                            <div class="range-slider price-range"></div>
                            <div class="price-ranges mt-4">
                                <span class="custom-badge-sm mr-1" @click="onPriceRangeChange(100)">€100</span>
                                <span class="custom-badge-sm mr-1" @click="onPriceRangeChange(300)">€300</span>
                                <span class="custom-badge-sm mr-1" @click="onPriceRangeChange(500)">€500</span>
                                <span class="custom-badge-sm mr-1" @click="onPriceRangeChange(1000)">€1,000</span>
                                <span class="custom-badge-sm mr-1" @click="onPriceRangeChange(5000)">€5,000</span>
                            </div>
                        </div>

                        <div class="card-header bg-white border-bottom-0 p-3 mb-0">
                            <h5 class="card-title mb-0 text-capitalize coll-arrow cursor-pointer" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true">{{lang['condition']}}</h5>
                        </div>

                        <div id="collapseFour" class="card-body collapse border border-0 pt-0 pb-3" data-parent="#accordion">
                            <div class="custom-control custom-radio mb-2" v-for="(condition,i) in conditions" :key="i">
                                <input type="radio" class="custom-control-input" :id="'cond-'+condition.id" name="con-filter" :value="condition.id" @change="onConditionChange($event)">
                                <label class="custom-control-label pl-3" :for="'cond-'+condition.id">{{condition.name}}</label>
                            </div>
                        </div>

                    </div>
                </div>
            </aside>
        </div>

        <div class="col-12 col-lg-8">
            <div class="row">
                <div class="col-sm-12">
                </div>
            </div>
            
            <div class="custom-border-left rounded shadow border p-4 mb-4 stg-title">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h3 class="text-capitalize">{{lang['products_list']}}</h3>
                    </div>
                </div>
            </div>
            
            <div class="pdt-list-wrapper mb-3">
                <div class="pdt-list-blk shadow border mb-3" v-for="(product,i) in products" :key="i">
                    <div class="row align-items-center p-2">
                        <div class="col-md-4">
                            <div class="card-image position-relative">
                                <img class="card-img-top custom-img-top product-img-listing" v-bind:src='product.product_images[0].image_path' alt="Card image">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card-body p-md-0">
                                <h4 class="card-title mb-0"><a :href="'/product_details?id='+product.id" class="text-link">{{product.name}}</a></h4>
                                <div class="pdt-description my-1 my-lg-2">
                                    <p class="text-truncate">{{product.description}}</p>
                                </div>
                                <div class="pdt-cat-tag clearfix">
                                    <span class="bg-theme text-white px-3 py-1 radius-5">{{product.product_category.name}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-7 px-md-0">
                            <div class="card-body p-md-0">
                                <div class="media align-items-center">
                                    <a href="javascript:void(0)" class="text-link d-inline-block">
                                        <img src="assets/img/user-avatar-5.png" alt="John Doe" class="mr-3 rounded-circle d-inline-block d-md-none d-lg-none">
                                        <div class="media-body d-inline-block">
                                            <p><strong>{{product.user.name}}</strong></p>
                                        </div>
                                    </a>
                                </div>
                                <div class="media align-items-center">
                                    <a href="javascript:void(0)" class="text-link d-inline-block">
                                        <img v-bind:src='product.user.profile_image' alt="John Doe" class="mr-3 rounded-circle user-avatar-50 d-inline-block">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-5">
                            <div class="card-body p-0 text-center">
                                <div class="pdt-price-tag text-theme">
                                    <h3><i class="fa fa-euro"></i>&nbsp;{{product.offer_price}}</h3>
                                </div>
                                <div class="pdt-add-to-cart mt-4" v-if="auth == true">
                                    <a class="text-theme radius-5 btn btn-outline-theme py-1" @click="addToCart(product)" href="javascript:void(0)"><span class="lnr lnr-cart"></span>&nbsp;<span class="d-lg-none d-xl-inline-block">Cart</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['auth','type','category'],
        mounted() {
            console.log('Component mounted.'),
            this.lang = i18n.site
        },
        created() {
            if(this.category == undefined){
                this.getAllProducts({type : this.type});
            }
            else{
                this.category_id = this.category;
                this.getAllProducts({type : this.type, category_id : this.category_id});
            }
            this.getAllProductCategories(),
            this.getAllConditions()
        },
        data() {
            return {
                lang:{},
                products:{},
                product_categories:{},
                conditions:{},
                category_id:null,
                condition_id:null,
                price_range:null
            }
        },
        methods: {
            getAllProducts(params) {
                axios.get('/get_all_products',{params : params})
                    .then(response => (
                        this.products = response.data.products
                    ))
                    .catch(err => (
                        console.log(err)
                    ))
                    .finally(() => console.log('closed'))
            },
            getAllProductCategories() {
                axios.get('/get_all_product_categories')
                    .then(response => (
                        this.product_categories = response.data.product_categories
                    ))
                    .catch(err => (
                        console.log(err)
                    ))
                    .finally(() => console.log('closed'))
            },
            getAllConditions() {
                axios.get('/get_all_conditions')
                    .then(response => (
                        this.conditions = response.data.conditions
                    ))
                    .catch(err => (
                        console.log(err)
                    ))
                    .finally(() => console.log('closed'))
            },
            addToCart(product) {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
                })

                let cartData = localStorage.getItem("cart");

                if (!cartData) {
                cartData = {total : 0 ,itemcount: 0, items : []};
                }
                else{
                cartData = JSON.parse(cartData); 
                }

                let found = cartData.items.some(el => el.id === product.id);
                if (!found) {
                cartData.items.push({ id:product.id, name: product.name, price: product.offer_price, image: product.product_images[0].image_path });
                
                let sum = 0;
                let count = 0;

                cartData.items.forEach(element => {
                    count++;
                    sum += element.price;
                });

                cartData.total = sum;
                cartData.itemcount = count;

                localStorage.setItem("cart",JSON.stringify(cartData));

                Toast.fire({
                    icon: 'success',
                    title: 'Product added into cart'
                })
                }
                else{
                Toast.fire({
                    icon: 'error',
                    title: 'Product already cart'
                })
                }
            },
            onCategoryChange(event){
                this.category_id = event.target.value;
                let params = {'category_id' : this.category_id, 'condition_id' : this.condition_id, 'price_range' : this.price_range, 'type' : this.type};
                this.getAllProducts(params);
            },
            onConditionChange(event){
                this.condition_id = event.target.value;
                let params = {'category_id' : this.category_id, 'condition_id' : this.condition_id, 'price_range' : this.price_range, 'type' : this.type};
                this.getAllProducts(params);
            },
            onPriceRangeChange(range){
                this.price_range = range;
                let params = {'category_id' : this.category_id, 'condition_id' : this.condition_id, 'price_range' : this.price_range, 'type' : this.type};
                this.getAllProducts(params);
            }
        }
    }
</script>
