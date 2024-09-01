<script setup>
import { ref } from "vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

const currentStep = ref(1);

const form = useForm({
  name: "",
  last_name: "",
  email: "",
  phone: "",
  company_name: "",
  cif: "",
  antiquity: "",
  annual_billing: "",
  password: "",
  password_confirmation: "",
});

// Handle step navigation
const goToStep = (step) => {
  currentStep.value = step;
};

// Handle form submission
const submit = () => {
  if (currentStep.value === 1) {
    goToStep(2); // Move to Step 2
  } else {
    form.post(route("register-custom.step1"), {
      onFinish: () => form.reset("password", "password_confirmation"),
    });
  }
};
</script>

<template>
  <GuestLayout>
    <Head title="Register" />
    <div
      class="max-w-7xl mx-auto flex flex-wrap items-center justify-between m-12 text-center md:flex-nowrap md:space-x-4 space-y-6 md:space-y-0"
    >
      <!-- Step 1 -->
      <div
        class="flex flex-col items-center w-full md:w-1/5 cursor-pointer"
        @click="goToStep(1)"
      >
        <div
          :class="{
            'px-4 py-4 flex items-center justify-center font-bold text-center w-full rounded-full min-h-20': true,
            'bg-violet-500 text-white-50': currentStep === 1,
            'bg-violet-700 text-white-50': currentStep !== 1,
          }"
        >
          1
        </div>
      </div>

      <!-- Connector Line (hidden on small screens) -->
      <div
        class="hidden md:block flex-1 border-dashed border-t-0 dark: border-white-50 relative"
      >
        <div
          class="absolute inset-y-1/2 w-full border-dashed border-t-2 dark: border-white-50"
        ></div>
      </div>

      <!-- Step 2 -->
      <div
        class="flex flex-col items-center w-full md:w-1/5 cursor-pointer"
        @click="goToStep(2)"
      >
        <div
          :class="{
            'px-4 py-4 flex items-center justify-center font-bold text-center w-full rounded-full min-h-20 max-h-20': true,
            'bg-violet-500 text-white-50': currentStep === 2,
            'bg-violet-700 text-white-50': currentStep !== 2,
          }"
        >
          2
        </div>
      </div>
    </div>

    <form @submit.prevent="submit">
      <!-- Step 1 Fields -->
      <div v-if="currentStep === 1">
        <div>
          <InputLabel for="name" value="Name" />
          <TextInput
            id="name"
            type="text"
            class="mt-1 block w-full"
            v-model="form.name"
            required
            autofocus
            autocomplete="name"
          />
          <InputError class="mt-2" :message="form.errors.name" />
        </div>

        <div class="mt-4">
          <InputLabel for="last_name" value="Last Name(s)" />
          <TextInput
            id="last_name"
            type="text"
            class="mt-1 block w-full"
            v-model="form.last_name"
            required
            autocomplete="family-name"
          />
          <InputError class="mt-2" :message="form.errors.last_name" />
        </div>

        <div class="mt-4">
          <InputLabel for="email" value="Email" />
          <TextInput
            id="email"
            type="email"
            class="mt-1 block w-full"
            v-model="form.email"
            required
            autocomplete="username"
          />
          <InputError class="mt-2" :message="form.errors.email" />
        </div>

        <div class="mt-4">
          <InputLabel for="phone" value="Phone" />
          <TextInput
            id="phone"
            type="text"
            class="mt-1 block w-full"
            v-model="form.phone"
            required
            autocomplete="tel"
          />
          <InputError class="mt-2" :message="form.errors.phone" />
        </div>

        <div class="flex items-center justify-end mt-4">
          <PrimaryButton
            class="ms-4"
            :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing"
          >
            Next
          </PrimaryButton>
        </div>
      </div>

      <!-- Step 2 Fields -->
      <div v-if="currentStep === 2">
        <div class="mt-4">
          <InputLabel for="company_name" value="Company Name" />
          <TextInput
            id="company_name"
            type="text"
            class="mt-1 block w-full"
            v-model="form.company_name"
            required
            autocomplete="organization"
          />
          <InputError class="mt-2" :message="form.errors.company_name" />
        </div>

        <div class="mt-4">
          <InputLabel for="cif" value="CIF" />
          <TextInput
            id="cif"
            type="text"
            class="mt-1 block w-full"
            v-model="form.cif"
            required
            autocomplete="cif"
          />
          <InputError class="mt-2" :message="form.errors.cif" />
        </div>

        <div class="mt-4">
          <InputLabel for="antiquity" value="Antiquity" />
          <TextInput
            id="antiquity"
            type="text"
            class="mt-1 block w-full"
            v-model="form.antiquity"
            required
            autocomplete="antiquity"
          />
          <InputError class="mt-2" :message="form.errors.antiquity" />
        </div>

        <div class="mt-4">
          <InputLabel for="annual_billing" value="Annual Billing" />
          <TextInput
            id="annual_billing"
            type="text"
            class="mt-1 block w-full"
            v-model="form.annual_billing"
            required
            autocomplete="annual-billing"
          />
          <InputError class="mt-2" :message="form.errors.annual_billing" />
        </div>

        <div class="mt-4">
          <InputLabel for="password" value="Password" />

          <TextInput
            id="password"
            type="password"
            class="mt-1 block w-full"
            v-model="form.password"
            required
            autocomplete="new-password"
          />

          <InputError class="mt-2" :message="form.errors.password" />
        </div>

        <div class="mt-4">
          <InputLabel for="password_confirmation" value="Confirm Password" />

          <TextInput
            id="password_confirmation"
            type="password"
            class="mt-1 block w-full"
            v-model="form.password_confirmation"
            required
            autocomplete="new-password"
          />

          <InputError
            class="mt-2"
            :message="form.errors.password_confirmation"
          />
        </div>

        <div class="flex items-center justify-end mt-4">
          <PrimaryButton
            class="ms-4"
            :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing"
          >
            Register
          </PrimaryButton>
        </div>
      </div>
    </form>
  </GuestLayout>
</template>
