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
    users: Object,
    sort: String,
    direction: String,
});

</script>

<template>
    <AdminLayout title="Users Admin">

        <section class="max-w-4xl mx-auto">
            <SearchForm route-name="admin.user.index"></SearchForm>
        </section>

        <section class="max-w-4xl mx-auto mt-5">
            <table-main>
                <template #heading>
                    <table-heading :sort="sort" :direction="direction" column="name">Name</table-heading>
                    <table-heading :sort="sort" :direction="direction" column="created_at">Created At</table-heading>
                </template>
                <template #body>
                    <table-row v-for="user in users.data">
                        <table-cell>
                            <Link :href="route('admin.user.edit', user.username)">
                                {{ user.name }}
                            </Link>
                        </table-cell>

                        <table-cell>
                            {{ user.created_at_date_string }}
                        </table-cell>
                    </table-row>
                </template>
            </table-main>
        </section>

        <section class="mt-8">
            <Paginator :links="users.links"></Paginator>
        </section>

    </AdminLayout>
</template>
