<script setup>
import { ref, defineProps, defineEmits, onMounted, watch } from "vue";

// Define props for the component
const props = defineProps({
  modelValue: String, // This will be used for v-model binding
  options: {
    type: Array,
    default: () => [],
  },
});

// Define emits for the component
const emit = defineEmits(["update:modelValue"]);

// Local reference to the select element
const select = ref(null);

// Watch for changes to the modelValue prop and update select element
watch(
  () => props.modelValue,
  (newValue) => {
    if (select.value) {
      select.value.value = newValue;
    }
  }
);

// Focus the select element if autofocus attribute is present
onMounted(() => {
  if (select.value.hasAttribute("autofocus")) {
    select.value.focus();
  }
});

// Handle change event
const handleChange = (event) => {
  emit("update:modelValue", event.target.value);
};
</script>

<template>
  <select
    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark: dark: text-white-50 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
    :value="modelValue"
    ref="select"
    @change="handleChange"
  >
    <option value="" disabled>Seleccione una opción</option>
    <option v-for="option in options" :key="option.value" :value="option.value">
      {{ option.label }}
    </option>
  </select>
</template>
