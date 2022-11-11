<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import {Head, useForm} from '@inertiajs/inertia-vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import {onMounted, reactive} from "vue";
import {Editor, EditorContent} from '@tiptap/vue-3'
import StarterKit from "@tiptap/starter-kit";

const props = defineProps({
    job: Object,
});

const state = reactive({
    'editor': null,
})

onMounted(() => {

    state.editor = new Editor({
        extensions: [
            StarterKit,
        ]
    })
});

const form = useForm({
    name: null,
    jobSLug: props.job.slug,
    email: null,
    phone: null,
});

const submit = () => {
    form.description = state.editor.getJSON();
    form.post(this.route('apply.store'))
};

</script>

<template>
    <AppLayout>
        <Head>
            <title>Apply for {{ job.title }}</title>
            <meta name="description" content="Apply for a job">
            <meta name="robots" content="noindex">
        </Head>

        <component :is="'style'">
            body{
            background: #f3f4f6;
            }
        </component>

        <section class="max-w-3xl mx-auto py-12 px-8">
            <form @submit.prevent="submit" class="card bg-white">
                <div>
                    <InputLabel for="name" value="Name" required="true"/>
                    <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required />
                    <InputError :message="form.errors.name" class="mt-2" />
                </div>

                <div class="mt-4">
                    <InputLabel for="email" value="Email" required="true"/>
                    <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required />
                    <InputError :message="form.errors.email" class="mt-2" />
                </div>


                <div class="mt-4">
                    <InputLabel for="tel-national" value="Phone Number" required="true"/>
                    <TextInput id="tel-national" type="text" class="mt-1 block w-full" v-model="form.phone" required/>
                    <InputError :message="form.errors.phone" class="mt-2" />
                </div>

                <div class="mt-4">
                    <InputLabel for="body" value="Resume"/>
                    <div>
                        <div v-if="state.editor" class="flex items-center mt-4">
                            <button type="button" class="prose-button"
                                    @click="state.editor.chain().focus().undo().run()"
                                    :disabled="!state.editor.can().chain().focus().undo().run()">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 cursor-pointer"
                                     viewBox="0 0 512 512"><title>Arrow Undo</title>
                                    <path
                                        d="M240 424v-96c116.4 0 159.39 33.76 208 96 0-119.23-39.57-240-208-240V88L64 256z"
                                        fill="none" stroke="currentColor" stroke-linejoin="round"
                                        stroke-width="32"/>
                                </svg>
                            </button>
                            <button type="button" class="prose-button mr-3"
                                    @click="state.editor.chain().focus().redo().run()"
                                    :disabled="!state.editor.can().chain().focus().redo().run()">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 cursor-pointer"
                                     viewBox="0 0 512 512"><title>Arrow Redo</title>
                                    <path
                                        d="M448 256L272 88v96C103.57 184 64 304.77 64 424c48.61-62.24 91.6-96 208-96v96z"
                                        fill="none" stroke="currentColor" stroke-linejoin="round"
                                        stroke-width="32"/>
                                </svg>
                            </button>
                            <button type="button" class="prose-button"
                                    @click="state.editor.chain().focus().toggleBold().run()"
                                    :disabled="!state.editor.can().chain().focus().toggleBold().run()"
                                    :class="{ 'prose-is-active': state.editor.isActive('bold') }">
                                <strong>B</strong>
                            </button>
                            <button type="button" class="prose-button"
                                    @click="state.editor.chain().focus().toggleItalic().run()"
                                    :disabled="!state.editor.can().chain().focus().toggleItalic().run()"
                                    :class="{ 'prose-is-active': state.editor.isActive('italic') }">
                                <i>I</i>
                            </button>
                            <button type="button" class="prose-button mr-3"
                                    @click="state.editor.chain().focus().toggleStrike().run()"
                                    :disabled="!state.editor.can().chain().focus().toggleStrike().run()"
                                    :class="{ 'prose-is-active': state.editor.isActive('strike') }">
                                <s>S</s>
                            </button>
                            <button type="button" class="prose-button"
                                    @click="state.editor.chain().focus().toggleHeading({ level: 1 }).run()"
                                    :class="{ 'prose-is-active': state.editor.isActive('heading', { level: 1 }) }">
                                H1
                            </button>
                            <button type="button" class="prose-button"
                                    @click="state.editor.chain().focus().toggleHeading({ level: 2 }).run()"
                                    :class="{ 'prose-is-active': state.editor.isActive('heading', { level: 2 }) }">
                                H2
                            </button>
                            <button type="button" class="prose-button mr-3"
                                    @click="state.editor.chain().focus().toggleHeading({ level: 3 }).run()"
                                    :class="{ 'prose-is-active': state.editor.isActive('heading', { level: 3 }) }">
                                H3
                            </button>
                            <button type="button" class="prose-button"
                                    @click="state.editor.chain().focus().toggleBulletList().run()"
                                    :class="{ 'prose-is-active': state.editor.isActive('bulletList') }">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5"
                                     stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-.375 5.25h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>
                                </svg>
                            </button>
                            <button type="button" @click="state.editor.chain().focus().toggleOrderedList().run()"
                                    :class="{ 'prose-is-active': state.editor.isActive('orderedList') }">
                                <svg class="h-5 w-5" stroke="currentColor" viewBox="0 0 18 18">
                                    <line class="ql-stroke" x1="7" x2="15" y1="4" y2="4"></line>
                                    <line class="ql-stroke" x1="7" x2="15" y1="9" y2="9"></line>
                                    <line class="ql-stroke" x1="7" x2="15" y1="14" y2="14"></line>
                                    <line class="ql-stroke ql-thin" x1="2.5" x2="4.5" y1="5.5" y2="5.5"></line>
                                    <path class="ql-fill"
                                          d="M3.5,6A0.5,0.5,0,0,1,3,5.5V3.085l-0.276.138A0.5,0.5,0,0,1,2.053,3c-0.124-.247-0.023-0.324.224-0.447l1-.5A0.5,0.5,0,0,1,4,2.5v3A0.5,0.5,0,0,1,3.5,6Z"></path>
                                    <path class="ql-stroke ql-thin"
                                          d="M4.5,10.5h-2c0-.234,1.85-1.076,1.85-2.234A0.959,0.959,0,0,0,2.5,8.156"></path>
                                    <path class="ql-stroke ql-thin"
                                          d="M2.5,14.846a0.959,0.959,0,0,0,1.85-.109A0.7,0.7,0,0,0,3.75,14a0.688,0.688,0,0,0,.6-0.736,0.959,0.959,0,0,0-1.85-.109"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="editable mt-3">
                            <EditorContent :editor="state.editor"/>
                        </div>
                    </div>
                    <InputError :message="form.errors.description" class="mt-2"/>
                </div>


                <div>
                    <PrimaryButton class="mt-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Apply
                    </PrimaryButton>
                </div>

            </form>

        </section>


    </AppLayout>
</template>
