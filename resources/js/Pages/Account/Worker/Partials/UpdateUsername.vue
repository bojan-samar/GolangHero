<script setup>
import { useForm } from '@inertiajs/inertia-vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import ActionMessage from '@/Components/ActionMessage.vue';

const props = defineProps({
    user: Object,
});

const form = useForm({
    _method: 'PUT',
    username: props.user.username,
});



const updateUsername = () => {
    form.post(route('account.username.update'), {
        errorBag: 'updateUsername',
        preserveScroll: true,
    });
};

</script>

<template>
    <form @submit.prevent="updateUsername" autocomplete="off">
        <div>
            <InputLabel for="username" value="Username"/>
            <TextInput id="username" type="text" class="mt-1 block w-full" v-model="form.username" required/>
            <InputError :message="form.errors.username" class="mt-2"/>
        </div>


        <div class="mt-4 flex items-center">
            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
            </PrimaryButton>

            <ActionMessage :on="form.recentlySuccessful" class="ml-3">
                <span class="text-green-600 font-bold">Username Updated</span>
            </ActionMessage>
        </div>
    </form>
</template>
