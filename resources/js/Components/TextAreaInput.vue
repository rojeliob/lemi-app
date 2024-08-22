<script setup>
import { onMounted, ref } from "vue";

const model = defineModel({
  type: String,
  required: true,
});

const textarea = ref(null);

onMounted(() => {
  if (textarea.value.hasAttribute("autofocus")) {
    textarea.value.focus();
  }
});

defineExpose({ focus: () => textarea.value.focus() });
</script>

<template>
  <textarea
    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark: dark: text-white-50-50 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
    v-model="model"
    ref="textarea"
  ></textarea>
</template>
