<script setup>
import { useForm } from '@inertiajs/inertia-vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import ActionMessage from '@/Components/ActionMessage.vue';

const props = defineProps({
    worker: Object,
});

const form = useForm({
    _method: 'PUT',
    github: props.worker.github,
    linkedin: props.worker.linkedin,
    twitter: props.worker.twitter,
    website: props.worker.website,
});



const updateUsername = () => {
    form.post(route('account.worker-social.update'), {
        errorBag: 'updateSocials',
        preserveScroll: true,
    });
};

</script>

<template>
    <form @submit.prevent="updateUsername" autocomplete="off">
        <section class="grid md:grid-cols-2 gap-6">
            <div>
                <InputLabel for="github" value="Github"/>
                <TextInput id="github" type="text" class="mt-1 block w-full" v-model="form.github"/>
                <InputError :message="form.errors.github" class="mt-2"/>
            </div>

            <div>
                <InputLabel for="twitter" value="Twitter"/>
                <TextInput id="twitter" type="text" class="mt-1 block w-full" v-model="form.twitter"/>
                <InputError :message="form.errors.twitter" class="mt-2"/>
            </div>
        </section>

        <section class="grid md:grid-cols-2 gap-6 mt-4">
            <div>
                <InputLabel for="website" value="Website"/>
                <TextInput id="website" type="text" class="mt-1 block w-full" v-model="form.website"/>
                <InputError :message="form.errors.website" class="mt-2"/>
            </div>

            <div>
                <InputLabel for="linkedin" value="LinkedIn"/>
                <TextInput id="linkedin" type="text" class="mt-1 block w-full" v-model="form.linkedin"/>
                <InputError :message="form.errors.linkedin" class="mt-2"/>
            </div>
        </section>


        <div class="mt-4 flex items-center">
            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
            </PrimaryButton>

            <ActionMessage :on="form.recentlySuccessful" class="ml-3">
                <span class="text-green-600 font-bold">Social Accounts Updated</span>
            </ActionMessage>
        </div>
    </form>
</template>
