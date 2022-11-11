<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import {Head} from '@inertiajs/inertia-vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';

const props = defineProps({
    application: Object,
});

</script>

<template>
    <AppLayout>
        <Head>
            <title>Application Successful</title>
            <meta name="description" content="Apply for a job">
            <meta name="robots" content="noindex">
        </Head>

        <section class="max-w-3xl mx-auto py-12 px-8 text-center font-bold text-lg">
            Application Success
        </section>

    </AppLayout>
</template>
