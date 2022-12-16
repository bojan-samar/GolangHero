<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import AdminLayout from "@/Layouts/AdminLayout.vue";
import TableMain from "@/Components/Table/Main.vue";
import TableHeading from "@/Components/Table/Heading.vue";
import TableRow from "@/Components/Table/Row.vue";
import TableCell from "@/Components/Table/Cell.vue";
import Paginator from "@/Components/Paginator.vue";
import SearchForm from "@/Components/SearchForm.vue";

defineProps({
    users: Object,
    sort: String,
    direction: String,
});

</script>

<template>
    <AdminLayout title="Users Admin">

        <section class="max-w-2xl mx-auto">
            <SearchForm route-name="admin.user.index"></SearchForm>
        </section>

        <section class="max-w-2xl mx-auto mt-5">
            <TableMain>
                <template #heading>
                    <TableHeading :sort="sort" :direction="direction" column="name">Name</TableHeading>
                    <TableHeading :sort="sort" :direction="direction" column="created_at">Created At</TableHeading>
                </template>
                <template #body>
                    <TableRow v-for="user in users.data">
                        <TableCell>
                            <Link :href="route('admin.user.show', user.username)">
                                {{ user.name }}
                            </Link>
                        </TableCell>

                        <TableCell>
                            {{ user.created_at_date_string }}
                        </TableCell>
                    </TableRow>
                </template>
            </TableMain>
        </section>

        <section class="mt-8">
            <Paginator :links="users.links"></Paginator>
        </section>

    </AdminLayout>
</template>
