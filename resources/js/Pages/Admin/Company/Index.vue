<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import AdminLayout from "@/Layouts/AdminLayout.vue";
import TableMain from "@/Components/Table/Main.vue";
import TableHeading from "@/Components/Table/Heading.vue";
import TableRow from "@/Components/Table/Row.vue";
import TableCell from "@/Components/Table/Cell.vue";
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Paginator from "@/Components/Paginator.vue";

defineProps({
    companies: Object,
});
</script>

<template>
    <AdminLayout title="Companies Admin">

        <section class="max-w-4xl mx-auto text-right">
            <Link :href="route('admin.company.create')">
                <PrimaryButton>New</PrimaryButton>
            </Link>
        </section>

        <section class="max-w-4xl mx-auto mt-8">
            <table-main>
                <template #heading>
                    <table-heading>Name</table-heading>
                </template>
                <template #body>
                    <table-row v-for="company in companies.data">
                        <table-cell>
                            <Link :href="route('admin.company.edit', company.id)">
                                {{ company.name }}
                            </Link>
                        </table-cell>
                    </table-row>
                </template>
            </table-main>
        </section>

        <section class="mt-8">
            <Paginator :links="companies.links"></Paginator>
        </section>

    </AdminLayout>
</template>
