<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import AdminLayout from "@/Layouts/AdminLayout.vue";
import TableMain from "@/Components/Table/Main.vue";
import TableHeading from "@/Components/Table/Heading.vue";
import TableRow from "@/Components/Table/Row.vue";
import TableCell from "@/Components/Table/Cell.vue";
import SecondaryButton from '@/Components/SecondaryButton.vue';
import Paginator from "@/Components/Paginator.vue";

defineProps({
    applications: Object,
    sort: String,
    direction: String,
});

</script>

<template>
    <AdminLayout title="Applications Admin">
        <section class="max-w-4xl mx-auto mt-8">
            <table-main>
                <template #heading>
                    <table-heading :sort="sort" :direction="direction" column="name">Name</table-heading>
                    <table-heading :sort="sort" :direction="direction" column="created_at">Created At</table-heading>
                </template>
                <template #body>
                    <table-row v-for="application in applications.data">
                        <table-cell>
                            <Link :href="route('admin.application.show', application.uuid)">
                                {{ application.name }}
                            </Link>
                        </table-cell>

                        <table-cell>{{ application.created_at_date_string }}</table-cell>
                    </table-row>
                </template>
            </table-main>
        </section>

        <section class="mt-8">
            <Paginator :links="applications.links"></Paginator>
        </section>

    </AdminLayout>
</template>
