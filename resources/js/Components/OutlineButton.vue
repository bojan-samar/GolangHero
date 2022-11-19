<script setup>
defineProps({
    type: {
        type: String,
        default: 'button',
    },
});
</script>

<template>
    <button :type="type" class="border inline-flex items-center text-sm rounded mr-2 p-1.5 hover:border-black transition ease-in-out duration-300 no-underline">
        <slot />
    </button>
</template>
