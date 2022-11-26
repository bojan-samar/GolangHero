<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import Paginator from '@/Components/Paginator.vue';
import JobCard from "@/Components/Job/JobCard.vue";
import OutlineButton from "@/Components/OutlineButton.vue";


defineProps({
    workers: Object,
});

</script>

<template>
    <AppLayout>
        <Head>
            <title>Golang Workers Looking For Their Next Career</title>
            <meta name="description" content="Browse through workers looking for their next Golang job.">
        </Head>

        <section class="container mx-auto px-4 py-12">
            <div class="grid md:grid-cols-4 gap-6">
                <Link :href="route('worker.show', worker.user.username)" v-for="worker in workers.data" class="card bg-white text-center">
                    <div class="photo">
                        <img :src="worker.user.profile_photo_url" :alt="worker.user.name" class="rounded-full h-20 w-20 object-cover mx-auto">
                    </div>
                    <div class="name mt-3">{{ worker.user.name }}</div>
                    <div class="mt-1 skills">
                        <OutlineButton v-for="skill in worker.worker_skills">{{ skill.name }} ({{ skill.experience }} years)</OutlineButton>
                    </div>
                </Link>
            </div>
        </section>

    </AppLayout>
</template>
