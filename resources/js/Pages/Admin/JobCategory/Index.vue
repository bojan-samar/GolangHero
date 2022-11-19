<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import AdminLayout from "@/Layouts/AdminLayout.vue";
import TableMain from "@/Components/Table/Main.vue";
import TableHeading from "@/Components/Table/Heading.vue";
import TableRow from "@/Components/Table/Row.vue";
import TableCell from "@/Components/Table/Cell.vue";
import PrimaryButton from '@/Components/PrimaryButton.vue';

let props = defineProps({
    categories: Object,
});

</script>

<template>
    <AdminLayout title="Job Categories Admin">

        <section class="max-w-2xl mx-auto text-right">
            <Link :href="route('admin.category.create')">
                <PrimaryButton>New</PrimaryButton>
            </Link>
        </section>

        <section class="max-w-2xl mx-auto mt-5">
            <TableMain>
                <template #heading>
                    <table-heading>Name</table-heading>
                </template>
                <template #body>
                    <TableRow v-for="(category, index) in categories" :key="category.id">
                        <TableCell>
                            <Link :href="route('admin.category.edit', category.id)">
                                {{ category.name }}
                            </Link>
                        </TableCell>
                    </TableRow>
                </template>
            </TableMain>
        </section>
    </AdminLayout>
</template>
