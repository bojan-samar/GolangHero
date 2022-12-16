<script setup>
import { Link } from '@inertiajs/inertia-vue3';

defineProps({
    sort: String,
    direction: String,
    column: String,
});

</script>

<template>
    <th class="px-6 py-3 font-black tracking-wider uppercase text-xs">
        <template v-if="! column">
            <slot></slot>
        </template>
        <template v-else>
            <Link :href="route(route().current(), {'sort': column, 'direction': direction === 'asc' ? 'desc': 'asc'})" class="flex items-center">
                <slot></slot>
                <div v-if="sort && sort === column">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                        <path v-if="direction === 'asc'" d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                        <path v-else d="M10.707 7.05L10 6.343 4.343 12l1.414 1.414L10 9.172l4.243 4.242L15.657 12z"/>
                    </svg>
                </div>
            </Link>
        </template>
    </th>
</template>
