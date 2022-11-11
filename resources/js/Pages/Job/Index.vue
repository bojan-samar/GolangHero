<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import Paginator from '@/Components/Paginator.vue';
import JobCard from "@/Components/Job/JobCard.vue";
import SearchForm from "@/Components/SearchForm.vue";


defineProps({
    jobs: Object,
    canonicalUrl: String
});

</script>

<template>
    <AppLayout>
        <Head>
            <title>Golang Jobs. Find A Jobs Today</title>
            <meta name="description" content="Browse through hundreds of good paying Golang jobs and start your career today.">
            <link rel="canonical" :href="canonicalUrl" />
        </Head>

        <section class="max-w-3xl mx-auto py-12 px-8">
            <SearchForm route-name="job.index"></SearchForm>
        </section>

        <section class="my-8 px-4 max-w-3xl mx-auto">
            <div v-for="job in jobs.data">
                <JobCard :job="job"></JobCard>
            </div>
        </section>

        <section class="pb-8">
            <Paginator :links="jobs.meta.links"></Paginator>
        </section>


    </AppLayout>
</template>
