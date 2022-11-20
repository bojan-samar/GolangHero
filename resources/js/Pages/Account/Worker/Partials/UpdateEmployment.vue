<script setup>
import {useForm, Link} from '@inertiajs/inertia-vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import {Inertia} from "@inertiajs/inertia";

const props = defineProps({
    employments: Object,
});

const destroySkill = (uuid) => {
    Inertia.delete(route('account.worker-employment.destroy', uuid));
};

</script>

<template>
    <template v-for="employment in employments">
        <section class="py-4 border-b flex justify-between items-center">
            <div>
                <div>{{ employment.title }}</div>
                <div>
                    <a class="link" :href="employment.url">{{ employment.company }}</a>
                </div>
                <div>
                    {{ employment.from_month }}/{{ employment.from_year }} - {{
                        employment.to_month
                    }}/{{ employment.to_year }}
                </div>
            </div>

            <div>
                <button @click="destroySkill(employment.uuid)" class="bg-red-600 p-2.5 text-white rounded-full">

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                </button>
            </div>

        </section>
    </template>

    <section class="mt-4">
        <Link :href="route('account.worker-employment.create')">
            <PrimaryButton>Add</PrimaryButton>
        </Link>
    </section>
</template>
