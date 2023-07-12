<template>
    <section class="newsletter-wrapper border-top py-6">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 text-center mx-auto">
                    <div class="mb-6 text-center">
                        <h2>{{lang['get_sports_updates']}}</h2>
                        <h5 class="mt-4">{{lang['get_sports_updates_description']}}</h5>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-8 mx-auto">
                    <form @submit.prevent="addSubscriptionEmail">
                        <div class="d-none d-md-flex input-group border-theme radius-5 shadow">
                            <input type="email" class="form-control custom-input-height radius-5 border-0 no-bg-color" v-model="email" placeholder="Please enter your email to subscribe">
                            <span class="input-group-btn ml-n5">
                                <button class="btn btn-style px-5 py-3 text-white radius-5 subscribe-btn" type="submit">{{lang['subscribe']}}</button>
                            </span>
                        </div>
                        <div class="d-inline-block d-md-none mb-3 input-group border-theme radius-5 shadow">
                            <input type="email" class="form-control custom-input-height radius-5 border-0 no-bg-color" v-model="email" placeholder="Please enter your email to subscribe">
                        </div>
                        <div class="text-center d-block d-md-none">
                            <button class="btn btn-style px-5 py-3 mx-auto text-white radius-5 subscribe-btn" type="submit">{{lang['subscribe']}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.'),
            this.lang = i18n.site
        },
        data() {
            return {
                email: '',
                lang: {}
            }
        },
        methods: {
            addSubscriptionEmail() {
                axios.post('/add_subscription_email', {email : this.email})
                    .then(response => (
                        this.email = '',
                        this.$swal('Great!',response.data.msg,'success')
                    ))
                    .catch(err => (
                        this.$swal('Oops!',err.response.data.message,'error')
                    ))
                    .finally(() => console.log('closed'))
            }
        }
    }
</script>
