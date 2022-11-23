<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import {onMounted, reactive} from "vue";
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps({
    clientSecret: String,
    stripeKey: String,
    returnUrl: String,
    job: Object,
    jobPrice: Number,
});


const state = reactive({
    'stripe': null,
    'elements': null,
    'processing': false,
    'error': null,
})

const stripeInit = () => {
    state.stripe = Stripe(props.stripeKey);
    const options = {
        clientSecret: props.clientSecret,
    };

    // Set up Stripe.js and Elements to use in checkout form, passing the client secret obtained in step 3
    state.elements = state.stripe.elements(options);

    // Create and mount the Payment Element
    const paymentElement = state.elements.create('payment');
    paymentElement.mount('#payment-element');
    return null;
};

const stripeSubmit = async () => {
    state.processing = true;
    state.error = null;
    const elements = state.elements;

    const {error} = await state.stripe.confirmPayment({
        //`Elements` instance that was used to create the Payment Element
        elements,
        confirmParams: {
            return_url: props.returnUrl,
        },
    });

    if (error) {
        state.processing = false;
        // This point will only be reached if there is an immediate error when
        // confirming the payment. Show error to your customer (for example, payment
        // details incomplete)
        state.error = error.message;
    } else {
        // Your customer will be redirected to your `return_url`. For some payment
        // methods like iDEAL, your customer will be redirected to an intermediate
        // site first to authorize the payment, then redirected to the `return_url`.
    }
}

onMounted(() => {
    let stripeScript = document.createElement('script')
    stripeScript.setAttribute('src', 'https://js.stripe.com/v3/')
    document.head.appendChild(stripeScript)
    stripeScript.onload = function() {
        stripeInit()
    };
});

</script>

<template>
    <AppLayout title="Checkout">

        <div class="py-12 max-w-4xl mx-auto">
            <form @submit.prevent="stripeSubmit" id="payment-form" class="card bg-white" data-secret="">
                <h1 class="text-center font-bold text-lg mb-4">Checkout</h1>
                <div>
                    <div>Job: {{ job.title }}</div>
                    <div>Total: ${{ jobPrice / 100 }}</div>
                </div>

                <div id="payment-element" class="mt-5">
                    <!-- Elements will create form elements here -->
                </div>

                <PrimaryButton id="submit" class="mt-5" :class="{ 'opacity-25': state.processing }" :disabled="state.processing">Submit</PrimaryButton>
                <div v-if="state.error" class="mt-2 text-red-600">{{ state.error }}</div>
            </form>
        </div>
    </AppLayout>
</template>
