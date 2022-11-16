<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Link } from '@inertiajs/inertia-vue3';

let props = defineProps({
    slug: String,
});

</script>


<template>
    <AppLayout title="Thank You">

        <div class="py-12 max-w-4xl mx-auto text-center">
            <h1 class="text-xl font-bold mb-4">Job Posted</h1>
            <Link :href="route('job.show', slug)">
                <PrimaryButton class="px-8">See Job</PrimaryButton>
            </Link>
        </div>

    </AppLayout>
</template>
