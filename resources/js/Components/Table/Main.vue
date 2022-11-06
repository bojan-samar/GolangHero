<template>
    <div class="bg-white overflow-hidden rounded-lg">
        <div class="overflow-x-auto" style="overflow-x: auto;">
            <table class="w-full whitespace-no-wrap bg-white overflow-hidden table-striped">

                <thead v-if="$slots.heading">
                    <tr class="text-left">
                        <slot name="heading"></slot>
                    </tr>
                </thead>

                <tbody>
                    <slot name="body"></slot>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    name: "Main"
}
</script>
