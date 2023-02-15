<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import {Editor, EditorContent} from '@tiptap/vue-3'
import StarterKit from '@tiptap/starter-kit'
import {onMounted, reactive} from "vue";


const state = reactive({
    'editor': null,
    'editor2': null,
})

const props = defineProps({
    job: Object,
    secondJob: Object,
    similarJobs: Object,
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

    let description2;
    try {
        description2 = JSON.parse(props.secondJob.data.description);
    } catch (error) {
        description2 = null;
    }

    state.editor2 = new Editor({
        editable: false,
        extensions: [
            StarterKit,
        ],
        content: description2
    })
});

</script>

<template>
    <AppLayout>
        <Head>
            <title>{{ job.data.title }}</title>
            <meta name="description" :content="job.data.title">
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
                <Link :href="route('apply.show', job.data.slug)" rel="nofollow">
                    <PrimaryButton class="p-4"><span class="px-4 py-0.5 text-base">Apply</span></PrimaryButton>
                </Link>
            </div>
        </section>

        <template v-if="secondJob">
            <section class="wave">
                <svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g transform="translate(-2.000000, 44.000000)" fill="#f3f4f6" fill-rule="nonzero">
                            <path
                                d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496"
                                opacity="0.400000001"></path>
                            <path
                                d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                                opacity="0.400000001"></path>
                            <path
                                d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z"
                                id="Path-4" opacity="0.400000003"></path>
                        </g>
                        <g transform="translate(-4.000000, 76.000000)" fill="#f3f4f6" fill-rule="nonzero">
                            <path
                                d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z">
                            </path>
                        </g>
                    </g>
                </svg>
            </section>

            <section id="similar-jobs" class="bg-gray-100 px-4 py-12">
                <h2 class="text-center mb-4 text-2xl">Similar Jobs</h2>
                <div class="grid md:grid-cols-3 gap-6">
                    <Link :href="route('job.show', job.slug)" v-for="job in similarJobs" class="card bg-white text-center hover:shadow-lg ease-in-out duration-300">
                        <h3>{{ job.title }}</h3>
                    </Link>
                </div>
            </section>

            <section id="second-job" class="bg-gray-100 px-4 py-12">
                <div class="max-w-5xl mx-auto">
                    <h2 class="text-xl text-center">You Might Also Be Interested in This Job</h2>

                    <h3 class="text-2xl text-center font-bold mt-8">{{ secondJob.data.title }}</h3>

                    <div class="flex flex-wrap justify-center space-x-8 mt-5">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            {{ secondJob.data.company.name }}
                        </div>

                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            {{ secondJob.data.created_at_human }}
                        </div>

                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            {{ secondJob.data.location }}
                        </div>
                    </div>

                    <div class="mt-4">
                        <EditorContent :editor="state.editor2"/>
                    </div>
                </div>

            </section>

        </template>

    </AppLayout>
</template>
