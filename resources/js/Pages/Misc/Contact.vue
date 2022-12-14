<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from '@inertiajs/inertia-vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import { ref } from 'vue';
import ActionMessage from "@/Components/ActionMessage.vue";

const formId = ref('lead-form-' + Math.floor(Math.random() * 100))

const form = useForm({
    name: '',
    email: '',
    message: ''
});


const submit = () => {
    form.post(route("contact.store"), {
        errorBag: "updatePassword",
        preserveScroll: true,
        onSuccess: () => {
            form.reset()
            axios.get(route('queueWorkerStart'))
        },
    });
};

</script>


<template>
  <AppLayout title="Contact Us">
      <section class="py-12 max-w-3xl px-4 mx-auto">
          <form @submit.prevent="submit" class="card bg-white">
              <div>
                  <InputLabel for="name" value="Name" :required="true"/>
                  <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus />
                  <InputError :message="form.errors.name" class="mt-2" />
              </div>

              <div class="mt-4">
                  <InputLabel for="email" value="Email" :required="true"/>
                  <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required/>
                  <InputError :message="form.errors.email" class="mt-2" />
              </div>

              <div class="mt-4">
                  <InputLabel for="message" value="Message" :required="true"/>
                  <textarea id="message" rows="4" class="form-input w-full" v-model="form.message"></textarea>
                  <InputError :message="form.errors.message" class="mt-2" />
              </div>

              <div class="mt-4 flex items-center">
                  <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                      Send
                  </PrimaryButton>
                  <ActionMessage :on="form.recentlySuccessful" class="ml-3">
                      Message Sent.
                  </ActionMessage>
              </div>
          </form>
      </section>
  </AppLayout>
</template>
