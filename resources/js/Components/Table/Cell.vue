<template>
    <td :class="class" class="border-t border-gray-100 text-gray-700 px-6 py-2">
        <slot></slot>
    </td>
</template>

<script>
export default {
    name: "Cell",

    props: {
        class: String,
    },
}
</script>
