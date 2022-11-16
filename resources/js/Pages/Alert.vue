<script setup>
import {useForm} from '@inertiajs/inertia-vue3';
import AppLayout from "@/Layouts/AppLayout.vue";
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import ActionMessage from '@/Components/ActionMessage.vue';


const props = defineProps({
    frequency: Object,
});


const form = useForm({
    email: null,
    frequency: 7,
});

const store = () => {
    form.post(route('alert.store'), {
        onSuccess: () => {
            form.reset();
        },
    })
};

</script>


<template>
    <AppLayout title="Alert Signup">

        <section class="max-w-2xl mx-auto px-4 py-12">
            <div class="card bg-white text-center font-bold" v-if="form.wasSuccessful">
                Alert signup was successful
            </div>

            <div v-else class="card bg-white">
                <h1 class="text-center text-lg font-medium">Job Alert Sign Up</h1>

                <form @submit.prevent="store">
                    <section>
                        <InputLabel for="email" value="Email" :required="true"/>
                        <TextInput id="email" type="text" class="mt-1 block w-full" v-model="form.email" required
                                   autofocus/>
                        <InputError :message="form.errors.email" class="mt-2"/>
                    </section>

                    <section class="mt-4">
                        <InputLabel for="type" value="Job Type" :required="true"/>
                        <select name="frequency" class="form-input pr-6 mt-1" style="min-width: 180px" v-model="form.frequency">
                            <option v-for="(value, key, index) in frequency" :value="value.days">{{ value.name }}</option>
                        </select>
                        <InputError :message="form.errors.frequency" class="mt-2"/>
                    </section>


                    <section class="flex items-center mt-4">
                        <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Save
                        </PrimaryButton>
                        <ActionMessage :on="form.recentlySuccessful" class="ml-3">
                            Saved.
                        </ActionMessage>
                    </section>
                </form>
            </div>
        </section>
    </AppLayout>
</template>
