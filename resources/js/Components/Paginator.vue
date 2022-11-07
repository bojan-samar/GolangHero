<template>
    <section class="flex items-center justify-center space-x-2" v-if="links">
        <template v-for="link in links" v-if="links.length > 3">
            <Link
                :href="link.url"
                v-html="link.label"
                v-if="link.url"
                class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium rounded-full text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"
                :class="{'bg-gray-100 disabled': link.active}">
            </Link>
        </template>
    </section>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";

export default {
    components: {
        Link,
    },
    props: ['links'],
}
</script>
