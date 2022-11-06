<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import AdminLayout from "@/Layouts/AdminLayout.vue";
import TableMain from "@/Components/Table/Main.vue";
import TableHeading from "@/Components/Table/Heading.vue";
import TableRow from "@/Components/Table/Row.vue";
import TableCell from "@/Components/Table/Cell.vue";
import PrimaryButton from '@/Components/PrimaryButton.vue';

defineProps({
    vehicles: Object,
});
</script>

<template>
  <AdminLayout title="Vehicles Admin">

      <section class="max-w-5xl mx-auto text-right">
          <Link :href="route('admin.vehicle.create')">
              <PrimaryButton>New</PrimaryButton>
          </Link>
      </section>

      <section v-if="vehicles.data.length" class="max-w-5xl mx-auto mt-8">

          <table-main>
              <template #heading>
                  <table-heading></table-heading>
                  <table-heading>Name</table-heading>
              </template>
              <template #body>
                  <table-row v-for="vehicle in vehicles.data">
                      <table-cell>
                          <img style="max-width: 50px" class="rounded" :src="vehicle.full_image_urls[0]" :alt="vehicle.name">
                      </table-cell>

                      <table-cell>
                          <Link class="link" :href="route('admin.vehicle.edit', vehicle.slug)">
                              {{ vehicle.name }}
                          </Link>
                      </table-cell>
                  </table-row>
              </template>
          </table-main>


      </section>

      <section v-else class="card bg-white max-w-xl mx-auto mt-8 text-center font-bold text-lg tracking-wide">
          No Vehicles
      </section>
  </AdminLayout>
</template>
