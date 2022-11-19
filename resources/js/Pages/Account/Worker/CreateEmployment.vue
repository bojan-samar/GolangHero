<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import { useForm, Link } from '@inertiajs/inertia-vue3';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import SecondaryButton from '@/Components/SecondaryButton.vue';
    import TextInput from '@/Components/TextInput.vue';
    import InputError from '@/Components/InputError.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import ActionMessage from '@/Components/ActionMessage.vue';

    defineProps({
        months: Object,
        years: Object,
    });

    const form = useForm({
        fromMonth: null,
        fromYear: null,
        toMonth: null,
        toYear: null,
        title: null,
        company: null,
        url: null,
    });

    const storeEmployment = () => {
        form.post(route('account.worker-employment.store'));
    };

</script>

<template>
    <AppLayout title="Create New Employment History">
        <section class="max-w-2xl mx-auto flex justify-between pt-12">
            <Link :href="route('account.worker.index')">
                <SecondaryButton>Back</SecondaryButton>
            </Link>
        </section>

        <section class="max-w-2xl mx-auto pb-20 pt-5">
            <form @submit.prevent="storeEmployment" autocomplete="off" class="card bg-white">
                <section class="grid md:grid-cols-2 gap-6">
                    <div>
                        <InputLabel for="fromMonth" value="From Month" :required="true"/>
                        <select name="fromMonth" class="form-input pr-6 mt-1 w-full" v-model="form.fromMonth" required>
                            <option v-for="month in months" :value="month.month">{{ month.name }}</option>
                        </select>
                        <InputError :message="form.errors.fromMonth" class="mt-2"/>
                    </div>

                    <div>
                        <InputLabel for="fromYear" value="From Year" :required="true"/>
                        <select name="fromYear" class="form-input pr-6 mt-1 w-full" v-model="form.fromYear" required>
                            <option v-for="year in years" :value="year">{{ year }}</option>
                        </select>
                        <InputError :message="form.errors.fromYear" class="mt-2"/>
                    </div>
                </section>

                <section class="grid md:grid-cols-2 gap-6 mt-4">
                    <div>
                        <InputLabel for="toMonth" value="To Month" :required="true"/>
                        <select name="toMonth" class="form-input pr-6 mt-1 w-full" v-model="form.toMonth" required>
                            <option v-for="month in months" :value="month.month">{{ month.name }}</option>
                        </select>
                        <InputError :message="form.errors.toMonth" class="mt-2"/>
                    </div>

                    <div>
                        <InputLabel for="toYear" value="To Year" :required="true"/>
                        <select name="toYear" class="form-input pr-6 mt-1 w-full" v-model="form.toYear" required>
                            <option v-for="year in years" :value="year">{{ year }}</option>
                        </select>
                        <InputError :message="form.errors.toYear" class="mt-2"/>
                    </div>
                </section>

                <section class="mt-4">
                    <InputLabel for="title" value="Job Title" :required="true"/>
                    <TextInput id="title" type="text" class="mt-1 block w-full" v-model="form.title" required/>
                    <InputError :message="form.errors.title" class="mt-2"/>
                </section>

                <section class="mt-4">
                    <InputLabel for="company" value="Company Name" :required="true"/>
                    <TextInput id="company" type="text" class="mt-1 block w-full" v-model="form.company" required/>
                    <InputError :message="form.errors.company" class="mt-2"/>
                </section>

                <section class="mt-4">
                    <InputLabel for="url" value="Company URL" :required="true"/>
                    <TextInput id="url" type="text" class="mt-1 block w-full" v-model="form.url" required/>
                    <InputError :message="form.errors.url" class="mt-2"/>
                </section>


                <section class="mt-4">
                    <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Save
                    </PrimaryButton>
                </section>
            </form>
        </section>
    </AppLayout>
</template>

