<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import TextAreaInput from "@/Components/TextAreaInput.vue";
import NumericInput from "@/Components/NumericInput.vue";
import Select from "@/Components/Select.vue";
import MoneyInput from "@/Components/MoneyInput.vue";
import DatePicker from "@/Components/DatePicker.vue";
import DragAndDropFileInput from "@/Components/DragAndDropFileInput.vue";
</script>

<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <template #header>
      <h2
        class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
      >
        Dashboard de c-pull
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div
          class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
        >
          <div class="p-6 text-gray-900 dark:text-gray-100">
            <div class="columns-2">
              <InputLabel for="company-name" value="Nombre empresa" />
              <TextInput
                id="company-name"
                type="company-name"
                class="mt-1 block w-full"
                required
                autofocus
              />
            </div>
          </div>
          <div class="p-6 text-gray-900 dark:text-gray-100">
            <div class="columns-2">
              <InputLabel for="company-name" value="CIF" />
              <TextInput
                id="company-name"
                type="company-name"
                class="mt-1 block w-full"
                required
                autofocus
              />
            </div>
          </div>
          <div class="p-6 text-gray-900 dark:text-gray-100">
            <div class="columns-2">
              <InputLabel for="company-name" value="Explicacion del negocio" />
              <TextAreaInput
                id="company-name"
                type="company-name"
                class="mt-1 block w-full"
                required
                autofocus
              />
            </div>
          </div>
          <div class="p-6 text-gray-900 dark:text-gray-100">
            <div class="columns-2">
              <InputLabel for="company-name" value="Empleados" />
              <NumericInput
                id="company-name"
                class="mt-1 block w-full"
                required
                autofocus
              />
            </div>
          </div>
          <!-- <div class="p-6 text-gray-900 dark:text-gray-100">
            <div class="columns-2">
              <InputLabel for="company-name" value="Linea de crédito" />
              <Select></Select>
            </div>
          </div> -->
          <div class="p-6 text-gray-900 dark:text-gray-100">
            <div class="columns-2">
              <InputLabel for="company-name" value="Monto" />
              <MoneyInput />
            </div>
          </div>
          <div class="p-6 text-gray-900 dark:text-gray-100">
            <div class="columns-2">
              <InputLabel for="company-name" value="Monto" />
              <NumericInput
                id="company-name"
                class="mt-1 block w-full"
                required
                autofocus
              />
            </div>
          </div>
          <div class="p-6 text-gray-900 dark:text-gray-100">
            <div class="columns-2">
              <InputLabel for="company-name" value="Fecha limite de credito" />
              <DatePicker />
            </div>
          </div>
          <div class="p-6 text-gray-900 dark:text-gray-100">
            <div class="columns-2">
              <InputLabel for="company-name" value="Fecha limite de credito" />
              <DragAndDropFileInput />
            </div>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
