<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import OutlineButton from "@/Components/OutlineButton.vue";


defineProps({
    user: Object,
});

</script>

<template>
    <AppLayout>
        <Head>
            <title>Golang Workers Looking For Their Next Career</title>
            <meta name="description" content="Browse through workers looking for their next Golang job.">
        </Head>

        <component :is="'style'">
            body{
                background: #ffffff!important;
            }
        </component>

        <section class="max-w-2xl mx-auto px-4 py-12 grid md:grid-cols-2 gap-6">
            <div class="photo">
                <img :src="user.data.profile_photo_url" :alt="user.data.name" class="rounded-full h-20 w-20 object-cover mx-auto">
            </div>

            <div>
                <div v-if="user.data.worker.twitter">{{ user.data.worker.twitter }}</div>
                <div v-if="user.data.worker.linkedin">{{ user.data.worker.linkedin }}</div>
                <div v-if="user.data.worker.github">{{ user.data.worker.github }}</div>
                <div v-if="user.data.worker.website">{{ user.data.worker.website }}</div>
            </div>
        </section>

        {{ user }}


    </AppLayout>
</template>
