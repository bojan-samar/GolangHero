<template>
    <section class="flex items-center">
        <div class="bt-spinner mx-auto" :class="classes"></div>
        <div class="mt-2 font-bold uppercase text-sm text-center">{{ description }}</div>
    </section>
</template>

<script>
export default {
    props: ['description' ,'classes'],
}
</script>
