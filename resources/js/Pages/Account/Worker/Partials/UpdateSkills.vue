<script setup>
import { useForm } from '@inertiajs/inertia-vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import OutlineButton from '@/Components/OutlineButton.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';

const props = defineProps({
    skills: Object,
});

const form = useForm({
    skill: null,
    experience: null,
});



const storeSkill = () => {
    form.post(route('account.worker-skill.store'), {
        errorBag: 'storeSkill',
        preserveScroll: true,
        onSuccess: () => form.reset(),
    });
};

const destroySkill = (uuid) => {
    form.delete(route('account.worker-skill.destroy', uuid), {
        errorBag: 'destroySkill',
        preserveScroll: true,
    });
};

</script>

<template>

    <section>
        <InputLabel value="Current Skills" class="mb-1"/>
        <OutlineButton v-for="skill in skills" @click="destroySkill(skill.uuid)">
            {{ skill.name }}
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </OutlineButton>
    </section>

    <form @submit.prevent="storeSkill" autocomplete="off" class="mt-5">
        <section class="grid md:grid-cols-2 gap-6">
            <div>
                <InputLabel for="skill" value="Add New Skill" :required="true"/>
                <TextInput id="skill" type="text" class="mt-1 block w-full" v-model="form.skill" required/>
                <InputError :message="form.errors.skill" class="mt-2"/>
            </div>

            <div>
                <InputLabel for="experience" value="Years Experience" :required="true"/>
                <TextInput id="experience" type="text" class="mt-1 block w-full" v-model="form.experience" required/>
                <InputError :message="form.errors.experience" class="mt-2"/>
            </div>
        </section>

        <div class="mt-4">
            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Add
            </PrimaryButton>
        </div>
    </form>

</template>
