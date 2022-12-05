<script setup>
import {useForm} from '@inertiajs/inertia-vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import ActionMessage from '@/Components/ActionMessage.vue';


const form = useForm({
    email: null,
    frequency: 1,
});

const submit = () => {
    form.post(route('alert.store'), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset()
        },
    })
};


</script>

<template>
    <section>
        <h2 class="text-center text-lg font-medium mb-2">Job Alert Signup</h2>

        <form @submit.prevent="submit" class="md:flex md:space-x-4 space-y-4 md:space-y-0 items-end">

            <div class="w-full">
                <InputLabel for="email" value="Email" :required="true"/>
                <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required />
                <InputError :message="form.errors.email" class="mt-2" />
            </div>

            <div class="w-full">
                <InputLabel for="frequency" value="Email Frequency" :required="true"/>
                <select name="frequency" class="form-input pr-6 mt-1 w-full" v-model="form.frequency" required>
                    <option value="1">Daily</option>
                    <option value="7">Weekly</option>
                    <option value="30">Monthly</option>
                </select>
            </div>


            <div>
                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Subscribe
                </PrimaryButton>
            </div>

        </form>

        <ActionMessage :on="form.recentlySuccessful" class="mt-2 font-medium">
            <span class="text-green-500">Saved.</span>
        </ActionMessage>
    </section>
</template>
