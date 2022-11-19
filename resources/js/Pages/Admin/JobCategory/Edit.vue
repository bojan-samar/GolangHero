<script setup>
import {Link, useForm} from '@inertiajs/inertia-vue3';
import AdminLayout from "@/Layouts/AdminLayout.vue";
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';

let props = defineProps({
    category: Object,
});

const form = useForm({
    name: props.category.name,
    slug: props.category.slug,
});

const store = () => {
    form.put(route('admin.category.update', props.category.id))
};

</script>


<template>
    <AdminLayout title="Job Category Update Admin">

        <section class="max-w-2xl mx-auto">
            <Link :href="route('admin.category.index')">
                <SecondaryButton>Back</SecondaryButton>
            </Link>
        </section>


        <section class="max-w-2xl mx-auto">

            <section class="bg-white p-4 shadow rounded-lg mt-5">
                <form @submit.prevent="store" class="mt-8" autocomplete="off">
                    <div>
                        <InputLabel for="name" value="Name"/>
                        <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required
                                   autofocus/>
                        <InputError :message="form.errors.name" class="mt-2"/>
                    </div>

                    <div class="mt-4">
                        <InputLabel for="slug" value="Slug"/>
                        <TextInput id="slug" type="text" class="mt-1 block w-full" v-model="form.slug" required/>
                        <InputError :message="form.errors.slug" class="mt-2"/>
                    </div>


                    <div class="mt-4">
                        <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Save
                        </PrimaryButton>
                    </div>
                </form>
            </section>

        </section>
    </AdminLayout>
</template>
