<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import SearchForm from "@/Components/SearchForm.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";


defineProps({
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

        <section class="p-4 text-center font-bold">
            Special Offer: For a limited time, you can post a Golang job for only $9.99
        </section>

        <section class="max-w-3xl mx-auto px-4">
            <h1 class="text-lg mb-4 text-center">Select A Company First</h1>
            <SearchForm route-name="job-create"></SearchForm>
        </section>

        <section v-if="companies" class="max-w-3xl mx-auto px-4 mt-5">
            <template v-for="company in companies.data">
                <Link :href="route('job-create.details', company.slug)" class="border rounded-lg py-2 px-4 bg-white flex justify-between items-center">
                    <span>{{ company.name }}</span>
                    <SecondaryButton>Select</SecondaryButton>
                </Link>
            </template>


            <div class="text-center" v-if="! companies.data.length">
                <div class="mb-2">Company Not Found!!!</div>
            </div>

            <div class="mt-5 text-center">
                <Link :href="route('job-create.company.create')">
                    <PrimaryButton>Create New Company</PrimaryButton>
                </Link>
            </div>
        </section>

<!--        <section class="mt-10 max-w-3xl mx-auto px-4">-->
<!--            <h2 class="text-xl font-bold mb-2">Uncompleted Jobs</h2>-->

<!--            <div v-for="draft in drafts">-->
<!--                <Link href="#">{{ draft.title }}</Link>-->
<!--            </div>-->
<!--        </section>-->

    </AppLayout>
</template>
