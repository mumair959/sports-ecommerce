<template>
    <div class="col-lg-6">
        <div class="contact-form mt-5 mt-lg-0">
            <div class="contact-title mb-4">
                <h3>Leave Your Messages</h3>
            </div>
            <div class="enquiry-form">
                <form @submit.prevent="sendContactUsEmail">
                    <div class="form-row mb-4">
                        <div class="col-lg-6">
                            <input type="text" class="form-control" placeholder="Name" v-model="contact.name">
                            <span class="error-text-class">{{(errors.name == undefined) ? '' : errors.name[0]}}</span>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" placeholder="Email" v-model="contact.email">
                            <span class="error-text-class">{{(errors.email == undefined) ? '' : errors.email[0]}}</span>
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="col-lg-6">
                            <input type="text" class="form-control" placeholder="Subject" v-model="contact.subject">
                            <span class="error-text-class">{{(errors.subject == undefined) ? '' : errors.subject[0]}}</span>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" placeholder="Phone" v-model="contact.phone">
                            <span class="error-text-class">{{(errors.phone == undefined) ? '' : errors.phone[0]}}</span>
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="col-lg-12 mb-5">
                            <textarea rows="5" class="form-control p-3 mb-0" placeholder="Your text here..." v-model="contact.message"></textarea>
                            <span class="error-text-class">{{(errors.message == undefined) ? '' : errors.message[0]}}</span>
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="col-lg-12">
                            <div class="contact-btn text-center">
                                <button class="d-inline-block btn px-5 py-3 btn-style text-white radius-5 align-middle" type="submit">Send Request</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
                contact:{},
                errors: {}
            }
        },
        methods: {
            sendContactUsEmail() {
                this.errors = {};
                axios.post('/send_contact_us_email', this.contact)
                    .then(response => (
                        this.contact = {},
                        this.$swal('Great!',response.data.msg,'success')
                    ))
                    .catch(err => (
                        this.errors = err.response.data.errors
                    ))
                    .finally(() => console.log('closed'))
            }
        }
    }
</script>
