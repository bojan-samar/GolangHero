<script setup>
import { useForm, Link } from '@inertiajs/inertia-vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps({
    employments: Object,
});

const destroySkill = (uuid) => {
    form.delete(route('account.worker-skill.destroy', uuid), {
        errorBag: 'destroySkill',
        preserveScroll: true,
    });
};

</script>

<template>
    <template v-for="employment in employments">
        <section>
            <div>{{ employment.title }}</div>
            <div>
                <a class="link" :href="employment.url">{{ employment.company }}</a>
            </div>
            <div>
                {{ employment.from_month }}/{{ employment.from_year }} - {{ employment.to_month }}/{{ employment.to_year }}
            </div>
        </section>
    </template>

    <section class="mt-4">
        <Link :href="route('account.worker-employment.create')">
            <PrimaryButton>Add</PrimaryButton>
        </Link>
    </section>
</template>
