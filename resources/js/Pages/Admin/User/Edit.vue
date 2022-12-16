<script setup>
import { Link, useForm } from '@inertiajs/inertia-vue3';
import AdminLayout from "@/Layouts/AdminLayout.vue";
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import ActionMessage from '@/Components/ActionMessage.vue';


const props = defineProps({
    user: Object,
    userId: Number,
    roles: Object,
});

const form = useForm({
    name: props.user.name,
    email: props.user.email,
    username: props.user.username,
    role: props.user.role,
});

const submit = () => {
    form.put(route('admin.user.update', props.userId));
};

</script>

<template>
    <AdminLayout :title="user.name">

        <section class="max-w-2xl mx-auto flex justify-between">
            <Link :href="route('admin.user.show', user.username)">
                <SecondaryButton>Back</SecondaryButton>
            </Link>
        </section>



        <section class="max-w-2xl mx-auto card bg-white mt-5">
            <div class="mb-4">
                <img :src="user.profile_photo_url" :alt="user.name" class="rounded-full h-20 w-20 object-cover">
            </div>

            <form @submit.prevent="submit">
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <InputLabel for="name" value="Name" :required="true"/>
                        <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name"/>
                        <InputError :message="form.errors.name" class="mt-2"/>
                    </div>

                    <div>
                        <InputLabel for="email" value="Email" :required="true"/>
                        <TextInput id="email" type="text" class="mt-1 block w-full" v-model="form.email"/>
                        <InputError :message="form.errors.email" class="mt-2"/>
                    </div>

                    <div>
                        <InputLabel for="username" value="Username" :required="true"/>
                        <TextInput id="username" type="text" class="mt-1 block w-full" v-model="form.username"/>
                        <InputError :message="form.errors.username" class="mt-2"/>
                    </div>

                    <div>
                        <InputLabel for="role" value="Role" :required="true"/>
                        <select class="form-input w-full mt-1" v-model="form.role" name="role" id="role">
                            <option v-for="role in roles" :selected="form.role == role" :value="role">{{ role }}</option>
                        </select>
                        <InputError :message="form.errors.role" class="mt-2"/>
                    </div>
                </div>

                <div class="flex items-center mt-4">
                    <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Save
                    </PrimaryButton>
                    <ActionMessage :on="form.recentlySuccessful" class="ml-3">
                        Saved.
                    </ActionMessage>
                </div>
            </form>
        </section>

    </AdminLayout>
</template>
