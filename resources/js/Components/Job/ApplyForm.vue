<script setup>
import {useForm} from '@inertiajs/inertia-vue3';

import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import {ref} from "vue";


const props = defineProps({
    vehicle: Object,
});

const confirmingVehicleDeletion = ref(false);

const form = useForm({
    jobSlug: props.jobSlug,
    name: '',
    email: '',
    postalCode: '',
    phone: '',
    bdayYear: '',
    cdlStatus: '',
    experience: '',
    endorsement: '',
    freightType: '',
    driverType: '',
});

const submit = () => {
    form.post(this.route('apply.store'), {
        preserveScroll: true,
        onSuccess: () => {
            this.form.reset()
            setTimeout(() => {
                scrollToElement('application-submitted');
            }, 100);
        },
    })
};


</script>

<template>
    <section>
        <div v-if="form.wasSuccessful" class="py-4" id="application-submitted">
            <div class="bg-green-600 max-w-xl mx-auto p-4 rounded-lg text-center text-white">Application Submitted</div>
        </div>

        <section v-else>
            <h2 class="text-center text-xl font-medium mb-4">Apply Now</h2>

            <form @submit.prevent="submit">
                <div>
                    <InputLabel for="name" value="Name" required="true"/>
                    <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required />
                    <InputError :message="form.errors.name" class="mt-2" />
                </div>

                <div class="mt-4">
                    <InputLabel for="bday-year" value="Birth Year" required="true"/>
                    <TextInput id="bday-year" type="text" class="mt-1 block w-full" v-model="form.bdayYear" required />
                    <InputError :message="form.errors.bdayYear" class="mt-2" />
                </div>

                <div class="mt-4">
                    <InputLabel for="email" value="Email" required="true"/>
                    <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required />
                    <InputError :message="form.errors.email" class="mt-2" />
                </div>


                <div class="mt-4">
                    <InputLabel for="tel-national" value="Phone Number" required="true"/>
                    <TextInput id="tel-national" type="text" class="mt-1 block w-full" v-model="form.phone" required/>
                    <InputError :message="form.errors.phone" class="mt-2" />
                </div>

                <div class="mt-4">
                    <InputLabel for="postal-code" value="Zip Code" required="true"/>
                    <TextInput id="postal-code" type="text" class="mt-1 block w-full" v-model="form.postalCode" required/>
                    <InputError :message="form.errors.postalCode" class="mt-2" />
                </div>

                <div>
                    <PrimaryButton class="mt-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Submit
                    </PrimaryButton>
                </div>

            </form>
        </section>

    </section>
</template>
