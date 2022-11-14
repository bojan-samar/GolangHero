<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import AdminLayout from "@/Layouts/AdminLayout.vue";
import TableMain from "@/Components/Table/Main.vue";
import TableHeading from "@/Components/Table/Heading.vue";
import TableRow from "@/Components/Table/Row.vue";
import TableCell from "@/Components/Table/Cell.vue";
import SearchForm from "@/Components/SearchForm.vue";
import Paginator from "@/Components/Paginator.vue";


let props = defineProps({
    jobs: Object,
});

const destroyJob = (jobId, index) => {
    axios.delete( route('admin.job.destroy', jobId))
        .then(() => {
            props.jobs.data.splice(index, 1)
        }).catch(error => {
        console.log(error)
    });
};

</script>

<template>
    <AdminLayout title="Jobs Admin">
        <div class="max-w-4xl mx-auto">
            <section>
                <SearchForm route-name="admin.job.index"></SearchForm>
            </section>

            <section class="mt-8">
                <TableMain>
                    <template #heading>
                        <table-heading>Title</table-heading>
                        <table-heading>Created At</table-heading>
                        <table-heading></table-heading>
                    </template>
                    <template #body>
                        <TableRow v-for="(job, index) in jobs.data" :key="job.id">
                            <TableCell>
                                <Link :href="route('admin.job.edit', job.id)">
                                    {{ job.title }}
                                    <div class="text-sm">{{ job.company.name }}</div>
                                </Link>
                            </TableCell>
                            <TableCell class="text-sm">{{ job.created_at_date_string }}</TableCell>
                            <TableCell>
                                <div class="flex items-center">
                                    <button class="bg-red-600 p-2.5 text-white rounded-full" @click="destroyJob(job.id, index)">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </button>

                                    <a v-if="!job.tweeted" target="_blank" :href="route('admin.job.tweet', job.slug)" class="ml-2 bg-blue-400 rounded-full text-white flex items-center p-2.5">
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon h-4 w-4 text-white" viewBox="0 0 512 512" fill="white"><title>Logo Twitter</title><path d="M496 109.5a201.8 201.8 0 01-56.55 15.3 97.51 97.51 0 0043.33-53.6 197.74 197.74 0 01-62.56 23.5A99.14 99.14 0 00348.31 64c-54.42 0-98.46 43.4-98.46 96.9a93.21 93.21 0 002.54 22.1 280.7 280.7 0 01-203-101.3A95.69 95.69 0 0036 130.4c0 33.6 17.53 63.3 44 80.7A97.5 97.5 0 0135.22 199v1.2c0 47 34 86.1 79 95a100.76 100.76 0 01-25.94 3.4 94.38 94.38 0 01-18.51-1.8c12.51 38.5 48.92 66.5 92.05 67.3A199.59 199.59 0 0139.5 405.6a203 203 0 01-23.5-1.4A278.68 278.68 0 00166.74 448c181.36 0 280.44-147.7 280.44-275.8 0-4.2-.11-8.4-.31-12.5A198.48 198.48 0 00496 109.5z"/></svg>
                                        </button>
                                    </a>
                                </div>
                            </TableCell>
                        </TableRow>
                    </template>
                </TableMain>
            </section>

            <section class="mt-8">
                <Paginator :links="jobs.links"></Paginator>
            </section>
        </div>
    </AdminLayout>
</template>
