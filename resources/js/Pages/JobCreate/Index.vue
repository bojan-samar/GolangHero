<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import Paginator from '@/Components/Paginator.vue';
import SearchForm from "@/Components/SearchForm.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";


defineProps({
    uuid: String,
    drafts: Object,
    companies: Object,
});

</script>

<template>
    <AppLayout>
        <Head>
            <title>Post a job</title>
            <meta name="description" content="Post a Golang job today.">
        </Head>

        <section class="max-w-3xl mx-auto pt-12 px-8">
            <h1 class="text-lg mb-4 text-center">Select A Company First</h1>
            <SearchForm route-name="job-create"></SearchForm>
        </section>


        <section v-if="companies" class="max-w-3xl mx-auto px-8 mt-5">
            <template v-for="company in companies.data">
                <Link :href="route('job-create.details', company.slug)" class="border rounded-lg py-2 px-4 bg-white flex justify-between items-center">
                    <span>{{ company.name }}</span>
                    <SecondaryButton>Select</SecondaryButton>
                </Link>
            </template>


            <div class="text-center" v-if="! companies.data.length">
                <div class="mb-2">Nothing Found!!!</div>
                <PrimaryButton>Create New Company</PrimaryButton>
            </div>
        </section>

    </AppLayout>
</template>
