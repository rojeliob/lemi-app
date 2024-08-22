<script setup>
import { onMounted, ref } from "vue";

const model = defineModel({
  type: Number,
  required: true,
});

const input = ref(null);

onMounted(() => {
  if (input.value.hasAttribute("autofocus")) {
    input.value.focus();
  }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
  <div class="relative">
    <span
      class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500 dark:text-gray-400"
      >€</span
    >
    <input
      type="number"
      step="0.01"
      class="pl-10 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark: dark: text-white-50-50 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
      v-model="model"
      ref="input"
    />
  </div>
</template>
