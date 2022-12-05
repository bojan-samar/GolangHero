<script setup>
import {Link} from '@inertiajs/inertia-vue3';
import AdminLayout from "@/Layouts/AdminLayout.vue";
import SecondaryButton from '@/Components/SecondaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue';
import {ref} from "vue";
import {Inertia} from "@inertiajs/inertia";
import DialogModal from '@/Components/DialogModal.vue';

const props = defineProps({
    alert: Object,
});

const confirmingAlertDeletion = ref(false);

const destroyAlert = () => {
    Inertia.delete(route('admin.job-alert.destroy', props.alert.uuid))
};

</script>


<template>
    <AdminLayout title="Alert Edit">

        <section class="max-w-xl mx-auto flex justify-between">
            <Link :href="route('admin.job-alert.index')">
                <SecondaryButton>Back</SecondaryButton>
            </Link>

            <div>
                <DangerButton @click="confirmingAlertDeletion = true">Delete</DangerButton>
            </div>
        </section>


        <section class="max-w-xl mx-auto bg-white card mt-8">
            <div>Name: {{ alert.email }}</div>
            <div>Frequency: {{ alert.frequency }}</div>
            <div>Date: {{ alert.created_at_date_string }}</div>
        </section>


        <!-- Delete Alert Confirmation Modal -->
        <DialogModal :show="confirmingAlertDeletion" @close="confirmingAlertDeletion = false">
            <template #title>
                Delete Alert
            </template>

            <template #content>
                Are you sure?
            </template>

            <template #footer>
                <SecondaryButton @click="confirmingAlertDeletion = false">
                    Cancel
                </SecondaryButton>

                <DangerButton class="ml-3" @click="destroyAlert">
                    Delete Alert
                </DangerButton>
            </template>
        </DialogModal>

    </AdminLayout>
</template>
