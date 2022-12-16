<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import AdminLayout from "@/Layouts/AdminLayout.vue";
import SecondaryButton from '@/Components/SecondaryButton.vue';

const props = defineProps({
    user: Object,
});


</script>

<template>
    <AdminLayout :title="user.name">

        <section class="max-w-2xl mx-auto flex justify-between">
            <Link :href="route('admin.user.index')">
                <SecondaryButton>Back</SecondaryButton>
            </Link>

            <Link :href="route('admin.user.edit', props.user.username)">
                <SecondaryButton>Edit</SecondaryButton>
            </Link>
        </section>


        <section class="max-w-2xl mx-auto card bg-white mt-5">
            <!-- Current Profile Photo -->
            <div class="mb-4">
                <img :src="user.profile_photo_url" :alt="user.name" class="rounded-full h-20 w-20 object-cover">
            </div>

            <div>Name: {{ user.name }}</div>
            <div>Username: {{ user.username }}</div>
            <div>Email: {{ user.email }}</div>
            <div>Role: {{ user.role }}</div>

            <div v-if="user.tracking" id="tracking" class="mt-4">
                <h2 class="uppercase text-sm font-bold">Tracking</h2>
                <div>UTM = {{ user.tracking.utm }}</div>
                <div>Referral = {{ user.tracking.referral }}</div>
                <div>Referer = {{ user.tracking.referer }}</div>
            </div>
        </section>

    </AdminLayout>
</template>
