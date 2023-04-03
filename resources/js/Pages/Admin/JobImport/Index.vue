<script setup>
import {Link, useForm} from '@inertiajs/inertia-vue3';
import AdminLayout from "@/Layouts/AdminLayout.vue";
import TableMain from "@/Components/Table/Main.vue";
import TableHeading from "@/Components/Table/Heading.vue";
import TableRow from "@/Components/Table/Row.vue";
import TableCell from "@/Components/Table/Cell.vue";
import Paginator from "@/Components/Paginator.vue";
import Checkbox from '@/Components/Checkbox.vue';
import {reactive} from "vue";
import {Inertia} from "@inertiajs/inertia";
import InputLabel from '@/Components/InputLabel.vue';



let props = defineProps({
    jobs: Object,
    sort: String,
    direction: String,
});


const state = reactive({
    search: null,
    titleOnly: false,
})


const destroyJobImport = (jobId, index) => {
    axios.delete( route('admin.job-import.destroy', jobId))
        .then(() => {
            props.jobs.data.splice(index, 1)
        }).catch(error => {
        console.log(error)
    });
};


const search = () => {
    Inertia.get(route('admin.job-import.index'), {search: state.search, 'title-only': state.titleOnly}, {
        preserveState: true,
    });
};

</script>

<template>
    <AdminLayout title="Job Import Admin">
        <div class="max-w-4xl mx-auto">

            <section id="search-section">
                <form @submit.prevent="search" id="search" autocomplete="off">

                    <div class="flex items-center">
                        <div class="relative w-full">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                            </div>
                            <input v-model="state.search" type="text" id="voice-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search ...">
                        </div>

                        <button type="submit" class="inline-flex items-center py-2.5 px-3 ml-2 text-sm font-medium bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><svg class="mr-2 -ml-1 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>Search</button>
                    </div>



                    <InputLabel for="title-only" class="mt-2">
                        <div class="flex items-center">
                            <Checkbox id="title-only" v-model:checked="state.titleOnly" name="title-only" />

                            <div class="ml-2">
                                Title Only
                            </div>
                        </div>
                    </InputLabel>

                </form>
            </section>

            <section class="mt-8">
                <TableMain>
                    <template #heading>
                        <table-heading :sort="sort" :direction="direction" column="title">Job</table-heading>
                        <table-heading :sort="sort" :direction="direction" column="company_name">Company</table-heading>
                        <table-heading></table-heading>
                    </template>
                    <template #body>
                        <TableRow v-for="(job, index) in jobs.data" :key="job.id">
                            <TableCell>
                                <Link :href="route('admin.job-import.edit', job.id)">{{ job.title }}</Link>
                                <div class="text-sm">
                                    Salary Min: {{ job.salary_min }} - Salary Max: {{ job.salary_max }}
                                </div>
                            </TableCell>
                            <TableCell>{{ job.company_name }}</TableCell>
                            <TableCell>
                                <button @click="destroyJobImport(job.id, index)" class="bg-red-600 p-2.5 text-white rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </button>
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
