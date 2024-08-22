<!-- resources/js/Components/SidebarLink.vue -->
<template>
  <li>
    <router-link
      :to="href"
      class="block py-2 px-4 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700"
      :class="{ 'bg-gray-200 dark:bg-gray-600': isActive }"
    >
      <slot></slot>
    </router-link>
  </li>
</template>
  
  <script setup>
import { computed } from "vue";
import { useRoute } from "vue-router";

const props = defineProps({
  href: String,
  active: Boolean,
});

const route = useRoute();

const isActive = computed(() => {
  return route.path === props.href || props.active;
});
</script>
  
  <style scoped>
/* Add styles for active link and hover effects */
</style>
  