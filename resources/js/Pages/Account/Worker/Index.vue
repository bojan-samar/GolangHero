<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import UpdateEmployment from '@/Pages/Account/Worker/Partials/UpdateEmployment.vue';
import UpdateSkills from '@/Pages/Account/Worker/Partials/UpdateSkills.vue';
import UpdateSocials from '@/Pages/Account/Worker/Partials/UpdateSocials.vue';
import UpdateUsername from '@/Pages/Account/Worker/Partials/UpdateUsername.vue';
import UpdateResume from '@/Pages/Account/Worker/Partials/UpdateResume.vue';

defineProps({
    user: Object,
});
</script>

<template>
    <AppLayout title="Worker Profile">
        <section class="max-w-2xl mx-auto pt-12 pb-20 px-4">
            <div class="card bg-white">
                <UpdateUsername :user="user"></UpdateUsername>
            </div>

            <div id="employment" class="card bg-white mt-10">
                <h2 class="text-center">Work History</h2>
                <UpdateEmployment :employments="user.worker.employments"></UpdateEmployment>
            </div>

            <div class="card bg-white mt-10">
                <h2 class="text-center mb-4">Your Skills</h2>
                <UpdateSkills :skills="user.worker.worker_skills"></UpdateSkills>
            </div>

            <div class="card bg-white mt-10">
                <h2 class="text-center mb-4">Social Accounts</h2>
                <UpdateSocials :worker="user.worker"></UpdateSocials>
            </div>

            <div class="card bg-white mt-10">
                <h2 class="text-center mb-4">Your Resume</h2>
                <UpdateResume :resume="user.worker.resume"></UpdateResume>
            </div>
        </section>
    </AppLayout>
</template>
