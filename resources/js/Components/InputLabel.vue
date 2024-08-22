<script setup>
defineProps({
  value: {
    type: String,
  },
});
</script>

<template>
  <label
    class="block font-medium text-sm text-gray-700 dark: dark: text-white-50"
  >
    <span v-if="value">{{ value }}</span>
    <span v-else><slot /></span>
  </label>
</template>
