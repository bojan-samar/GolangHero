<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import AdminLayout from "@/Layouts/AdminLayout.vue";
import TableMain from "@/Components/Table/Main.vue";
import TableHeading from "@/Components/Table/Heading.vue";
import TableRow from "@/Components/Table/Row.vue";
import TableCell from "@/Components/Table/Cell.vue";
import DangerButton from '@/Components/DangerButton.vue';
import SearchForm from "@/Components/SearchForm.vue";
import Paginator from "@/Components/Paginator.vue";

let props = defineProps({
    jobs: Object,
});

const destroyJobImport = (jobId, index) => {
    axios.delete( route('admin.job-import.destroy', jobId))
        .then(() => {
            props.jobs.data.splice(index, 1)
        }).catch(error => {
        console.log(error)
    });
};

</script>

<template>
    <AdminLayout title="Job Import Admin">
        <div class="max-w-4xl mx-auto">
            <section>
                <SearchForm route-name="admin.job-import.index"></SearchForm>
            </section>

            <section class="mt-8">
                <TableMain>
                    <template #heading>
                        <table-heading>Job</table-heading>
                        <table-heading>Company</table-heading>
                        <table-heading></table-heading>
                    </template>
                    <template #body>
                        <TableRow v-for="(job, index) in jobs.data" :key="job.id">
                            <TableCell>
                                <Link :href="route('admin.job-import.edit', job.id)">{{ job.title }}</Link>
                            </TableCell>
                            <TableCell>{{ job.company_name }}</TableCell>
                            <TableCell>
                                <DangerButton @click="destroyJobImport(job.id, index)">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </DangerButton>
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
