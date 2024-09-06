<script setup>
import { ref, reactive, computed } from "vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

const currentStep = ref(1);
const showSuccessPopup = ref(false);

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

const errors = reactive({});

// Simple client-side validation rules
const validateStep1 = () => {
  errors.name = form.name.trim() === "" ? "Name is required." : "";
  errors.last_name =
    form.last_name.trim() === "" ? "Last Name is required." : "";
  errors.email = !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(form.email)
    ? "A valid email is required."
    : "";
  errors.phone = !/^\d+$/.test(form.phone) ? "Phone number is invalid." : "";
  return !errors.name && !errors.last_name && !errors.email && !errors.phone;
};

const validateStep2 = () => {
  errors.company_name =
    form.company_name.trim() === "" ? "Company Name is required." : "";
  errors.cif = form.cif.trim() === "" ? "CIF is required." : "";
  errors.antiquity =
    form.antiquity.trim() === "" ? "Antiquity is required." : "";
  errors.annual_billing =
    form.annual_billing.trim() === "" ? "Annual Billing is required." : "";
  errors.password =
    form.password.length < 8 ? "Password must be at least 8 characters." : "";

  return (
    !errors.company_name &&
    !errors.cif &&
    !errors.antiquity &&
    !errors.annual_billing &&
    !errors.password
  );
};

// Handle step navigation
const goToStep = (step) => {
  currentStep.value = step;
};

// Handle form submission
const submit = () => {
  if (currentStep.value === 1) {
    if (validateStep1()) {
      form.post(route("register-custom.step1"), {
        onFinish: () => goToStep(2),
      });
    }
  } else if (currentStep.value === 2) {
    if (validateStep2()) {
      form.post(route("register-custom.step2"), {
        onFinish: () => form.reset("password", "password_confirmation"),
        onSuccess: () => {
          showSuccessPopup.value = true;
        },
      });
    }
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
          <InputError
            class="my-2 p-2 bg-primary-400 rounded-md text-center text-white-100"
            :message="form.errors.name"
          />
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
          <InputError
            class="my-2 p-2 bg-primary-400 rounded-md text-center text-white-100"
            :message="form.errors.last_name"
          />
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
          <InputError
            class="my-2 p-2 bg-primary-400 rounded-md text-center text-white-100"
            :message="form.errors.email"
          />
        </div>

        <div class="mt-4">
          <InputLabel for="phone" value="Phone" />
          <TextInput
            id="phone"
            type="number"
            class="mt-1 block w-full"
            v-model="form.phone"
            required
            autocomplete="tel"
          />
          <InputError
            class="my-2 p-2 bg-primary-400 rounded-md text-center text-white-100"
            :message="form.errors.phone"
          />
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
          <InputError
            class="my-2 p-2 bg-primary-400 rounded-md text-center text-white-100"
            :message="form.errors.company_name"
          />
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
          <InputError
            class="my-2 p-2 bg-primary-400 rounded-md text-center text-white-100"
            :message="form.errors.cif"
          />
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
          <InputError
            class="my-2 p-2 bg-primary-400 rounded-md text-center text-white-100"
            :message="form.errors.antiquity"
          />
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
          <InputError
            class="my-2 p-2 bg-primary-400 rounded-md text-center text-white-100"
            :message="form.errors.annual_billing"
          />
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

          <InputError
            class="my-2 p-2 bg-primary-400 rounded-md text-center text-white-100"
            :message="form.errors.password"
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
    <!-- Success Popup -->
    <div
      v-if="showSuccessPopup"
      class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50"
    >
      <div class="bg-white p-6 rounded-lg shadow-lg text-center">
        <h2 class="text-2xl font-bold mb-4">Registration Successful!</h2>
        <p class="mb-6">
          You have successfully registered. Please log in to continue.
        </p>
        <PrimaryButton @click="() => (showSuccessPopup.value = false)">
          OK
        </PrimaryButton>
      </div>
    </div>
  </GuestLayout>
</template>
