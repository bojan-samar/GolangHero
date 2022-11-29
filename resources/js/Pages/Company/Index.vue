<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import Paginator from '@/Components/Paginator.vue';
import SearchForm from "@/Components/SearchForm.vue";


defineProps({
    companies: Object,
    canonicalUrl: String
});

</script>

<template>
    <AppLayout>
        <Head>
            <title>Companies Hiring Golang Jobs</title>
            <meta name="description" content="Browse through hundreds of good paying Golang jobs and start your career today.">
            <link rel="canonical" :href="canonicalUrl" />
        </Head>

        <section class="max-w-3xl mx-auto py-12 px-8">
            <SearchForm route-name="job.index"></SearchForm>
        </section>

        <section class="my-8 px-4 container mx-auto grid md:grid-cols-4 gap-6">
            <div v-for="company in companies.data" class="card bg-white flex items-center">
                <img v-if="company.photo" :src="company.photoUrl" :alt="company.name" class="rounded-full h-24 w-24 object-cover">

                <div class="md:pl-4">
                    {{ company.name }}
                </div>
            </div>
        </section>

        <section class="pb-8">
            <Paginator :links="companies.meta.links"></Paginator>
        </section>


    </AppLayout>
</template>
