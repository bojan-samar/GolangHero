<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import AdminLayout from "@/Layouts/AdminLayout.vue";
import SecondaryButton from '@/Components/SecondaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue';
import {Inertia} from "@inertiajs/inertia";
import {Editor, EditorContent} from '@tiptap/vue-3'
import StarterKit from '@tiptap/starter-kit'
import {onMounted, reactive} from "vue";

const props = defineProps({
    application: Object,
});

const state = reactive({
    'editor': null,
})

onMounted(() => {

    state.editor = new Editor({
        editable: false,
        extensions: [
            StarterKit,
        ],
        content: JSON.parse(props.application.resume)
    })

});


const destroy = () => {
    Inertia.delete(route('admin.application.destroy', props.application.uuid))
};

</script>

<template>
    <AdminLayout title="Applications Admin">
        <section class="max-w-xl mx-auto flex justify-between">
            <Link :href="route('admin.application.index')">
                <SecondaryButton>Back</SecondaryButton>
            </Link>

            <div>
                <DangerButton @click="destroy">Delete</DangerButton>
            </div>
        </section>

        <section class="max-w-xl mx-auto mt-5 card bg-white">
            <div><b>Applicant Name:</b> {{ application.name }}</div>

            <div class="mt-1"><b>Email:</b> {{ application.email }}</div>

            <div class="mt-1"><b>Phone:</b> {{ application.phone }}</div>

            <div class="mt-1"><b>Job Title: </b>
                <Link class="link" :href="route('job.show', application.job.slug)">
                    {{ application.job.title }}
                </Link>
            </div>

            <div class="mt-1"><b>Company:</b> {{ application.job.company.name }}</div>

            <div id="resume" class="mt-4">
                <h3 class="font-bold">Description</h3>
                <EditorContent :editor="state.editor"/>
            </div>

        </section>


        <section v-if="application.tracking" class="max-w-xl mx-auto mt-10 card bg-white">
            <div v-if="application.tracking.utm">
                <h2 class="font-bold mb-1">UTM Params</h2>
                <div v-for="(value, key, index) in application.tracking.utm" :value="value">{{ value }}</div>
            </div>

            <div v-if="application.tracking.referer" class="mt-5">
                <h2 class="font-bold">Referer</h2>
                <div>{{ application.tracking.referer }}</div>
            </div>

            <div v-if="application.tracking.referral" class="mt-5">
                <h2 class="font-bold">Referral</h2>
                <div>{{ application.tracking.referral }}</div>
            </div>
        </section>
    </AdminLayout>
</template>
