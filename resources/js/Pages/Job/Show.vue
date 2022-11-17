<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import ApplyForm from "@/Components/Job/ApplyForm.vue";
import {Editor, EditorContent} from '@tiptap/vue-3'
import StarterKit from '@tiptap/starter-kit'
import {onMounted, reactive, ref} from "vue";


const state = reactive({
    'editor': null,
})

const props = defineProps({
    job: Object,
});

onMounted(() => {
    let description;
    try {
        description = JSON.parse(props.job.data.description);
    } catch (error) {
        description = null;
    }

    state.editor = new Editor({
        editable: false,
        extensions: [
            StarterKit,
        ],
        content: description
    })
});

</script>

<template>
    <AppLayout>
        <Head>
            <title>{{ job.data.title }}</title>
            <meta name="description" :content="job.data.title">
            <meta name="twitter:card" content="summary">
            <meta name="twitter:title" :content="job.data.title">
            <meta name="twitter:description" :content="job.data.title">
        </Head>

        <component :is="'style'">
            body{
            background: #ffffff!important;
            }
        </component>

        <section class="max-w-5xl mx-auto px-5 py-12">
            <h1 class="text-center font-black text-3xl">{{ job.data.title }}</h1>

            <div class="flex flex-wrap justify-center space-x-8 mt-5">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                    {{ job.data.company.name }}
                </div>

                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    {{ job.data.created_at_human }}
                </div>

                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    {{ job.data.location }}
                </div>
            </div>

            <div class="mt-4">
                <EditorContent :editor="state.editor"/>
            </div>

            <div class="mt-5">
                <Link :href="route('apply.show', job.data.slug)">
                    <PrimaryButton class="p-4"><span class="px-4 py-0.5 text-base">Apply</span></PrimaryButton>
                </Link>
            </div>
        </section>

    </AppLayout>
</template>
