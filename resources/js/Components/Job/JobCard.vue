<script setup>
import { Link } from '@inertiajs/inertia-vue3';

defineProps({
    job: Object,
});
</script>

<template>
    <div class="bg-white card mb-8 flex flex-wrap job-post">

        <section v-if="job.company && job.company.photo" class="w-full md:w-1/6 company-logo p-4">
            <img class="rounded-full h-16 w-16 object-cover" :src="job.company.photo" :alt="job.company.name">
        </section>

        <section class="w-full flex-1 job-details">
            <Link :href="route('job.show', job.slug)">
                <h2 class="font-medium text-lg">{{ job.title }}</h2>
            </Link>
            <div class="flex flex-wrap text-sm">
                <div class="company-name w-1/2 md:w-auto pr-6 flex items-center mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                    {{ job.company ? job.company.name : job.company }}
                </div>

                <div class="created_at w-1/2 md:w-auto pr-6 flex items-center mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    {{ job.location }}
                </div>


                <div class="created_at w-1/2 md:w-auto pr-6 flex items-center mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    {{ job.created_at_human }}
                </div>

            </div>

        </section>

    </div>
</template>
