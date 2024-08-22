<script setup>
import { ref, defineProps, defineEmits, watch } from "vue";

// Define props
const props = defineProps({
  options: {
    type: Array,
    required: true,
  },
  modelValue: {
    type: Array,
    default: () => [],
  },
});

// Define emits
const emit = defineEmits(["update:modelValue"]);

// Internal state for dropdown visibility
const isOpen = ref(false);
const selectedOptions = ref(props.modelValue);

// Toggle option selection
const toggleOption = (option) => {
  const index = selectedOptions.value.findIndex(
    (selected) => selected.id === option.id
  );
  if (index === -1) {
    selectedOptions.value.push(option);
  } else {
    selectedOptions.value.splice(index, 1);
  }
  emit("update:modelValue", selectedOptions.value);
};

// Check if an option is selected
const isSelected = (option) => {
  return selectedOptions.value.some((selected) => selected.id === option.id);
};

// Watch for external updates to modelValue
watch(
  () => props.modelValue,
  (newValue) => {
    selectedOptions.value = newValue;
  }
);
</script>

<template>
  <div>
    <!-- Dropdown Toggle -->
    <div
      class="border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark: dark: text-white-50 rounded-md shadow-sm p-2 cursor-pointer"
      @click="isOpen = !isOpen"
    >
      <div class="flex flex-wrap gap-2">
        <span v-if="selectedOptions.length === 0" class="text-gray-400">
          Seleccione las opciones
        </span>
        <span
          v-for="option in selectedOptions"
          :key="option.id"
          class="bg-indigo-500 dark: text-white-50 rounded-md px-2 py-1"
        >
          {{ option.name }}
        </span>
      </div>
    </div>

    <!-- Options List -->
    <div
      v-if="isOpen"
      class="mt-2 border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark: dark: text-white-50 rounded-md shadow-sm"
      style="
        position: relative;
        width: 100%;
        max-width: 100%;
        box-sizing: border-box;
      "
    >
      <div class="flex flex-col w-full">
        <!-- First half of options -->
        <div class="flex-1">
          <div
            v-for="option in props.options.slice(
              0,
              Math.ceil(props.options.length / 2)
            )"
            :key="option.id"
            @click="toggleOption(option)"
            :class="{
              'p-2 cursor-pointer': true,
              'bg-indigo-500 dark: text-white-50': isSelected(option),
              'hover:bg-gray-200 dark:hover:bg-gray-800': !isSelected(option),
            }"
          >
            {{ option.name }}
          </div>
        </div>

        <!-- Second half of options -->
        <div class="flex-1 mt-2">
          <div
            v-for="option in props.options.slice(
              Math.ceil(props.options.length / 2)
            )"
            :key="option.id"
            @click="toggleOption(option)"
            :class="{
              'p-2 cursor-pointer': true,
              'bg-indigo-500 dark: text-white-50': isSelected(option),
              'hover:bg-gray-200 dark:hover:bg-gray-800': !isSelected(option),
            }"
          >
            {{ option.name }}
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
