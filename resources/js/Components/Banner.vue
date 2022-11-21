<script setup>
import { computed, ref, watch } from 'vue';
import { usePage, Link } from '@inertiajs/inertia-vue3';

const show = ref(true);
const style = computed(() => {
    if (usePage().props.value.flash?.success) {
        return 'success';
    }

    if (usePage().props.value.flash?.danger || Object.keys(usePage().props.value.errors).length) {
        return 'danger';
    }

    return usePage().props.value.jetstream.flash?.bannerStyle || 'success'
});

const message = computed(() => {
    if (usePage().props.value.flash?.success) {
        return usePage().props.value.flash.success;
    }

    if (usePage().props.value.flash?.danger) {
        return usePage().props.value.flash.danger;
    }

    if (Object.keys(usePage().props.value.errors).length){
        return 'There are some errors!!!'
    }

    return usePage().props.value.jetstream.flash?.banner || ''
});

watch(message, async () => {
  show.value = true;
});
</script>

<template>
    <div>
        <div v-if="show && message" :class="{ 'bg-green-500': style == 'success', 'bg-red-600': style == 'danger' }">
            <div class="max-w-screen-xl mx-auto py-2 px-3 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between flex-wrap">
                    <div class="ml-3 font-medium text-sm text-white truncate">
                        {{ message }}
                        <ul v-if="usePage().props.value.errors">
                            <li v-for="error in usePage().props.value.errors">
                                {{ error }}
                            </li>
                        </ul>
                    </div>

                    <div class="shrink-0 sm:ml-3">
                        <button
                            type="button"
                            class="-mr-1 flex p-2 rounded-md focus:outline-none sm:-mr-2 transition"
                            :class="{ 'hover:bg-green-600 focus:bg-green-600': style == 'success', 'hover:bg-red-600 focus:bg-red-600': style == 'danger' }"
                            aria-label="Dismiss"
                            @click.prevent="show = false"
                        >
                            <svg
                                class="h-5 w-5 text-white"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"
                                />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
