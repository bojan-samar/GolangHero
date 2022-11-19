<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import {Inertia} from "@inertiajs/inertia";

    const storeProfile = () => {
        Inertia.post(route('account.worker.store'));
    };
</script>

<template>
    <AppLayout title="Worker Profile" class="px">
        <section class="max-w-2xl mx-auto mt-12 px-4">
            <div class="card bg-white">
                <p>
                    Create a profile and list your bio, skills, and work experience. Companies and recruiters will discover you
                    and offer a job directly.
                </p>

                <div class="text-center" @click="storeProfile">
                    <PrimaryButton>Create Profile</PrimaryButton>
                </div>
            </div>
        </section>
    </AppLayout>
</template>
