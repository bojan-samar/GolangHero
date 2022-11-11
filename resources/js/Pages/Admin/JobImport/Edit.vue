<script setup>
import {Link, useForm} from '@inertiajs/inertia-vue3';
import AdminLayout from "@/Layouts/AdminLayout.vue";
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import {onMounted, reactive} from "vue";
import {Editor, EditorContent} from '@tiptap/vue-3'
import StarterKit from '@tiptap/starter-kit'
import ActionMessage from '@/Components/ActionMessage.vue';
import DangerButton from '@/Components/DangerButton.vue';
import {Inertia} from "@inertiajs/inertia";


const props = defineProps({
    job: Object,
});

const state = reactive({
    'editor': null,
    'count': 0,
    'companies': null,
    'creatingCompany': false,
    'searchText': '',
    'newCompanyName': null
})


onMounted(() => {
    let description;
    try {
        description = JSON.parse(props.job.description);
    } catch (error) {
        description = props.job.description;
    }

    state.editor = new Editor({
        extensions: [
            StarterKit,
        ],
        content: description
    })
});

const form = useForm({
    _method: 'PUT',
    company_slug: null,
    title: props.job.title,
    company_name: props.job.company_name,
    description: props.job.description,
    location: props.job.location,
    salary_min: props.job.salary_min,
    salary_max: props.job.salary_max,
    job_type: props.job.job_type,
    status: props.job.status,
});

const store = () => {
    form.description = state.editor.getJSON();
    form.post(route('admin.job-import.update', props.job.id))
};

const destroy = () => {
    Inertia.delete(route('admin.job-import.destroy', props.job.id))
};

const storeCompany = () => {
    axios.post(route('admin.company.store'), {
        company_name: state.newCompanyName,
    }).then(response => {
        state.creatingCompany = false;
        state.newCompanyName = null;
        form.company_slug = response.data.slug;
    });
};

const search = () => {
    axios.get('/admin/company?search=' + state.searchText)
        .then(response => {
            if (response.data.data.length) {
                state.companies = response.data.data;
            } else {
                state.companies = null;
            }
        })
};

</script>



<template>
    <AdminLayout title="Job Import Edit">

        <section class="max-w-4xl mx-auto flex justify-between">
            <Link :href="route('admin.job-import.index')">
                <SecondaryButton>Back</SecondaryButton>
            </Link>

            <div>
                <DangerButton @click="destroy">Delete</DangerButton>
            </div>
        </section>

        <section class="max-w-4xl mx-auto">

            <section class="bg-white p-4 shadow rounded-lg mt-5">
                <form @submit.prevent="store" class="mt-8">
                    <section class="grid md:grid-cols-2 gap-6">
                        <div>
                            <InputLabel for="title" value="Title"/>
                            <TextInput id="title" type="text" class="mt-1 block w-full" v-model="form.title" required
                                       autofocus/>
                            <InputError :message="form.errors.title" class="mt-2"/>
                        </div>
                    </section>


                    <section class="grid md:grid-cols-3 gap-6 mt-4">
                        <div>
                            <InputLabel for="location" value="Location"/>
                            <TextInput id="location" type="text" class="mt-1 block w-full" v-model="form.location"
                                       autofocus/>
                            <InputError :message="form.errors.location" class="mt-2"/>
                        </div>

                        <div>
                            <InputLabel for="salary_min" value="Salary Min"/>
                            <TextInput id="salary_min" type="text" class="mt-1 block w-full" v-model="form.salary_min"/>
                            <InputError :message="form.errors.salary_min" class="mt-2"/>
                        </div>

                        <div>
                            <InputLabel for="salary_max" value="Salary Max"/>
                            <TextInput id="salary_max" type="text" class="mt-1 block w-full" v-model="form.salary_max"/>
                            <InputError :message="form.errors.salary_max" class="mt-2"/>
                        </div>
                    </section>


                    <section class="grid md:grid-cols-2 gap-6 mt-4">
                        <div>
                            <InputLabel for="job_type" value="Job Type"/>
                            <TextInput id="job_type" type="text" class="mt-1 block w-full" v-model="form.job_type"
                                       required
                                       autofocus/>
                            <InputError :message="form.errors.job_type" class="mt-2"/>
                        </div>
                    </section>


                    <section class="mt-4">
                        <InputLabel for="body" value="Description"/>
                        <section>
                            <div v-if="state.editor" class="flex items-center mt-4">
                                <button type="button" class="prose-button" @click="state.editor.chain().focus().undo().run()"
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
                            <div class="mt-3 editable">
                                <EditorContent :editor="state.editor"/>
                            </div>
                        </section>
                        <InputError :message="form.errors.description" class="mt-2"/>
                    </section>


                    <section class="flex items-center mt-4">
                        <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Save
                        </PrimaryButton>
                        <ActionMessage :on="form.recentlySuccessful" class="ml-3">
                            Saved.
                        </ActionMessage>
                    </section>
                </form>
            </section>


            <section id="company-section" class="bg-white p-4 shadow rounded-lg mt-8">
                <div class="flex items-center justify-between">
                    <div>
                        <div>
                            Import Company: {{ job.company_name }}
                        </div>

                        <div v-if="form.company_slug">
                            Company Selected: {{ form.company_slug }}
                        </div>
                    </div>

                    <div>
                        <SecondaryButton
                            @click="state.creatingCompany = !state.creatingCompany; state.newCompanyName = form.company_name">
                            Create Company
                        </SecondaryButton>
                    </div>
                </div>

                <div v-if="state.creatingCompany">
                    <form @submit.prevent="storeCompany" class="mt-8">
                        <section>
                            <InputLabel for="New-Company" value="Company Name"/>
                            <TextInput id="New-Company" type="text" class="mt-1 block w-full" v-model="state.newCompanyName"/>
                            <InputError :message="form.errors.title" class="mt-2"/>
                        </section>

                        <section class="mt-4">
                            <PrimaryButton>
                                Save
                            </PrimaryButton>
                        </section>
                    </form>
                </div>

                <div class="mt-5">
                    <form @submit.prevent="search" id="company-search" class="flex items-center mt-8"
                          autocomplete="off">
                        <label for="voice-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                     viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                          clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input v-model="state.searchText" type="text" id="voice-search"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   placeholder="Search ...">
                        </div>
                        <button type="submit"
                                class="inline-flex items-center py-2.5 px-3 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="mr-2 -ml-1 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            Search
                        </button>
                    </form>
                </div>

                <div v-if="state.companies" class="mt-5">
                    <div v-for="company in state.companies">
                        {{ company.name }}
                        <SecondaryButton @click="form.company_slug = company.slug">Select</SecondaryButton>
                    </div>
                </div>
            </section>

        </section>
    </AdminLayout>
</template>
