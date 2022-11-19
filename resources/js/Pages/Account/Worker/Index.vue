<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import UpdateUsername from '@/Pages/Account/Worker/Partials/UpdateUsername.vue';
import UpdateSkills from '@/Pages/Account/Worker/Partials/UpdateSkills.vue';

defineProps({
    user: Object,
});
</script>

<template>
    <AppLayout title="Worker Profile">
        <section class="max-w-2xl mx-auto py-12 px-4">
            <div class="card bg-white">
                <UpdateUsername :user="user"></UpdateUsername>
            </div>

            <div class="card bg-white mt-10">
                <UpdateSkills :skills="user.worker.skills"></UpdateSkills>
            </div>
        </section>
    </AppLayout>
</template>
