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
    alerts: Object,
});

</script>

<template>
    <AdminLayout title="Alerts Admin">

        <section class="max-w-4xl mx-auto">
            <SearchForm route-name="admin.job-alert.index"></SearchForm>
        </section>

        <section class="max-w-4xl mx-auto mt-5">
            <table-main>
                <template #heading>
                    <table-heading>Email</table-heading>
                    <table-heading>Created At</table-heading>
                </template>
                <template #body>
                    <table-row v-for="alert in alerts.data">
                        <table-cell>
                            <Link :href="route('admin.job-alert.show', alert.uuid)">
                                {{ alert.email }}
                            </Link>
                        </table-cell>

                        <table-cell>
                            {{ alert.created_at_date_string }}
                        </table-cell>
                    </table-row>
                </template>
            </table-main>
        </section>

        <section class="mt-8">
            <Paginator :links="alerts.links"></Paginator>
        </section>

    </AdminLayout>
</template>
