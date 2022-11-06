<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import AdminLayout from "@/Layouts/AdminLayout.vue";
import TableMain from "@/Components/Table/Main.vue";
import TableHeading from "@/Components/Table/Heading.vue";
import TableRow from "@/Components/Table/Row.vue";
import TableCell from "@/Components/Table/Cell.vue";
import PrimaryButton from '@/Components/PrimaryButton.vue';

defineProps({
    blogs: Object,
});
</script>

<template>
  <AdminLayout title="Blog Admin">

      <section class="max-w-5xl mx-auto text-right">
          <Link :href="route('admin.blog.create')">
              <PrimaryButton>New</PrimaryButton>
          </Link>
      </section>

      <section v-if="blogs.length">

        <TableMain>
            <template #heading>
                <TableHeading>Title</TableHeading>
            </template>
            <template #body>
                <TableRow v-for="blog in blogs">
                    <TableCell>
                        <Link :href="route('admin.blog.edit', blog.id)">{{ blog.title }}</Link>
                    </TableCell>
                </TableRow>
            </template>
        </TableMain>

      </section>

      <section v-else class="card bg-white max-w-5xl mx-auto mt-8 text-center font-bold text-lg tracking-wide">
          No Blogs
      </section>

  </AdminLayout>
</template>
