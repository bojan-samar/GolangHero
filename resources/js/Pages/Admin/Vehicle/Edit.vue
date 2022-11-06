<script setup>
import {Link, useForm} from '@inertiajs/inertia-vue3';
import AdminLayout from "@/Layouts/AdminLayout.vue";
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import Checkbox from '@/Components/Checkbox.vue';
import DangerButton from '@/Components/DangerButton.vue';
import DialogModal from '@/Components/DialogModal.vue';
import {Inertia} from "@inertiajs/inertia";
import {ref} from "vue";

const props = defineProps({
    vehicle: Object,
});

const confirmingVehicleDeletion = ref(false);

const form = useForm({
    _method: 'PUT',
    name: props.vehicle.name,
    slug: props.vehicle.slug,
    meta: props.vehicle.meta,
    title: props.vehicle.title,
    owner_website: props.vehicle.owner_website,
    description: props.vehicle.description,
    price: String(props.vehicle.price),
    price_weekend: String(props.vehicle.price_weekend),
    capacity: String(props.vehicle.capacity),
    images: props.vehicle.images,
    type: props.vehicle.type,
    status: props.vehicle.status == 1 ? true : false,
});

const submit = () => {
    form.post(route('admin.vehicle.update', props.vehicle.uuid), {
        preserveScroll: false,
    })
};

const deleteVehicle = () => {
    Inertia.delete(route('admin.vehicle.destroy', props.vehicle.uuid))
};

</script>

<template>
  <AdminLayout title="Vehicle Edit">
      <section class="max-w-4xl mx-auto flex justify-between">
          <div>
              <Link :href="route('admin.vehicle.index')">
                  <SecondaryButton>Back</SecondaryButton>
              </Link>

              <a target="_blank" :href="route('vehicle.show', vehicle.slug)" class="ml-2">
                  <SecondaryButton>Show</SecondaryButton>
              </a>
          </div>

          <DangerButton class="ml-3" @click="confirmingVehicleDeletion = true">
              Delete
          </DangerButton>

      </section>

      <section class="max-w-4xl mx-auto">
          <form @submit.prevent="submit" class="mt-8 bg-white p-4 shadow rounded-lg">
              <div class="grid md:grid-cols-2 gap-6">
                  <div>
                      <InputLabel for="name" value="Name" required="true"/>
                      <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required/>
                      <InputError :message="form.errors.name" class="mt-2" />
                  </div>
                  <div>
                      <InputLabel for="slug" value="Slug" required="true"/>
                      <TextInput id="slug" type="text" class="mt-1 block w-full" v-model="form.slug" required/>
                      <InputError :message="form.errors.slug" class="mt-2" />
                  </div>
              </div>

              <div class="mt-6">
                  <InputLabel for="title" value="Meta Title" required="true"/>
                  <TextInput id="title" type="text" class="mt-1 block w-full" v-model="form.title" required />
                  <div :class="{'text-red-600 font-medium' : form.title.length > 60}" class="text-right text-sm mt-1">{{ form.title.length }} / 60</div>
                  <InputError :message="form.errors.title" class="mt-2" />
              </div>

              <div class="mt-6">
                  <InputLabel for="meta" value="Meta Description" required="true"/>
                  <textarea rows="3" id="meta" type="text" class="mt-1 block w-full form-input" v-model="form.meta"/>
                  <div :class="{'text-red-600 font-medium' : form.meta.length > 160}" class="text-right text-sm mt-1">{{ form.meta.length }} / 160</div>
                  <InputError :message="form.errors.meta" class="mt-2" />
              </div>

              <div class="mt-6">
                  <InputLabel for="description" value="Description" />
                  <textarea rows="5" id="description" type="text" class="mt-1 block w-full form-input editor"/>
                  <InputError :message="form.errors.description" class="mt-2" />
              </div>

              <div class="grid md:grid-cols-4 gap-6 mt-6">
                  <div>
                      <InputLabel for="price" value="Price" required="true"/>
                      <TextInput id="price" type="text" class="mt-1 block w-full" v-model="form.price" required/>
                      <InputError :message="form.errors.price" class="mt-2" />
                  </div>

                  <div>
                      <InputLabel for="price_weekend" value="Price Weekend" required="true"/>
                      <TextInput id="price_weekend" type="text" class="mt-1 block w-full" v-model="form.price_weekend" required/>
                      <InputError :message="form.errors.price_weekend" class="mt-2" />
                  </div>

                  <div>
                      <InputLabel for="capacity" value="Capacity" required="true"/>
                      <TextInput id="capacity" type="text" class="mt-1 block w-full" v-model="form.capacity" required/>
                      <InputError :message="form.errors.capacity" class="mt-2" />
                  </div>

                  <div>
                      <InputLabel for="type" value="Type" required="true"/>
                      <select id="type" v-model="form.type" class="form-input mt-1 w-full" required>
                          <option value="">All</option>
                          <option value="bus">Party Bus</option>
                          <option value="limo">Limo</option>
                      </select>
                      <InputError :message="form.errors.type" class="mt-2" />
                  </div>
              </div>

              <div class="mt-6">
                  <InputLabel for="images" value="Images" />
                  <textarea rows="3" id="images" type="text" class="mt-1 block w-full form-input" v-model="form.images"/>
                  <InputError :message="form.errors.images" class="mt-2" />
              </div>

              <div class="mt-6">
                  <InputLabel for="owner_website" value="Owner Website"/>
                  <TextInput id="owner_website" type="text" class="mt-1 block w-full" v-model="form.owner_website" />
                  <InputError :message="form.errors.owner_website" class="mt-2" />
              </div>

              <div class="mt-6">
                  <label class="flex items-center">
                      <Checkbox name="remember" v-model:checked="form.status" />
                      <span class="ml-2 text-sm text-gray-600">Active</span>
                  </label>
              </div>

              <div class="mt-6">
                  <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                      Save
                  </PrimaryButton>
              </div>

          </form>
      </section>

      <!-- Delete Reservation Confirmation Modal -->
      <DialogModal :show="confirmingVehicleDeletion" @close="confirmingVehicleDeletion = false">
          <template #title>
              Delete Vehicle
          </template>

          <template #content>
              Are you sure you want to delete this vehicle?
          </template>

          <template #footer>
              <SecondaryButton @click="confirmingVehicleDeletion = false">
                  Cancel
              </SecondaryButton>

              <DangerButton class="ml-3" @click="deleteVehicle">
                  Delete Vehicle
              </DangerButton>
          </template>
      </DialogModal>

  </AdminLayout>
</template>
