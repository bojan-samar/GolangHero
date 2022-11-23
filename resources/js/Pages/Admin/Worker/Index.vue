<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import AdminLayout from "@/Layouts/AdminLayout.vue";
import TableMain from "@/Components/Table/Main.vue";
import TableHeading from "@/Components/Table/Heading.vue";
import TableRow from "@/Components/Table/Row.vue";
import TableCell from "@/Components/Table/Cell.vue";
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Paginator from "@/Components/Paginator.vue";
import SearchForm from "@/Components/SearchForm.vue";

defineProps({
    workers: Object,
    sort: String,
    direction: String,
});

</script>

<template>
    <AdminLayout title="Workers Admin">

        <section class="max-w-4xl mx-auto">
            <SearchForm route-name="admin.worker.index"></SearchForm>
        </section>

        <section class="max-w-4xl mx-auto mt-5">
            <table-main>
                <template #heading>
                    <table-heading :sort="sort" :direction="direction" column="name">Name</table-heading>
                    <table-heading :sort="sort" :direction="direction" column="created_at">Created At</table-heading>
                </template>
                <template #body>
                    <table-row v-for="worker in workers.data">
                        <table-cell>
                            <Link :href="route('admin.company.edit', worker.id)">
                                {{ worker.user.name }}
                            </Link>
                        </table-cell>

                        <table-cell>
                            <Link :href="route('admin.company.edit', worker.id)">
                                {{ worker.created_at_date_string }}
                            </Link>
                        </table-cell>
                    </table-row>
                </template>
            </table-main>
        </section>

        <section class="mt-8">
            <Paginator :links="workers.links"></Paginator>
        </section>

    </AdminLayout>
</template>
