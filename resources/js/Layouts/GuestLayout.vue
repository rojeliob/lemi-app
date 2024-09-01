<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Link } from "@inertiajs/vue3";
</script>

<template>
  <div
    class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark: bg-custom-gradient"
  >
    <div>
      <Link href="/" class="text-white">
        <!-- <ApplicationLogo class="w-20 h-20 fill-current text-gray-500" /> -->
        Registrate
      </Link>
      <h4 class="text-white">Completa tus datos personales</h4>
    </div>

    <div
      class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg"
    >
      <slot />
    </div>
  </div>
</template>
