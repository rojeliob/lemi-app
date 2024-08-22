<template>
  <div
    class="flex flex-wrap items-center justify-between m-12 text-center md:flex-nowrap md:space-x-4 space-y-6 md:space-y-0"
  >
    <!-- Step 1 -->
    <div
      class="flex flex-col items-center w-full md:w-1/5 cursor-pointer"
      @click="goToStep(1)"
    >
      <div
        :class="{
          'w-12 h-12 flex items-center justify-center font-bold rounded-full': true,
          'bg-turquoise-500 text-white': currentStep === 1,
          'bg-white-50 text-black': currentStep !== 1,
        }"
      >
        1
      </div>
      <h3 class="mt-4 text-lg md:text-xl font-semibold dark: text-white-50">
        Registrate
      </h3>
      <p class="dark: text-white-50 text-sm md:text-base">
        Completa los datos de tu empresa
      </p>
    </div>

    <!-- Connector Line (hidden on small screens) -->
    <div class="hidden md:block flex-1 border-t-2 border-white-50 relative">
      <div class="absolute inset-y-1/2 w-full border-t-2 border-gray-300"></div>
    </div>

    <!-- Step 2 -->
    <div
      class="flex flex-col items-center w-full md:w-1/5 cursor-pointer"
      @click="goToStep(2)"
    >
      <div
        :class="{
          'w-12 h-12 flex items-center justify-center font-bold rounded-full': true,
          'bg-turquoise-500 text-white': currentStep === 2,
          'bg-white-50 text-black': currentStep !== 2,
        }"
      >
        2
      </div>
      <h3
        class="mt-4 text-lg md:text-xl font-semibold dark: dark: text-white-50"
      >
        Sube tus documentos
      </h3>
      <p class="dark: text-white-50 text-sm md:text-base">
        ¡Solo debes hacerlo una vez!
      </p>
    </div>

    <!-- Connector Line (hidden on small screens) -->
    <div class="hidden md:block flex-1 border-t-2 border-white-50 relative">
      <div class="absolute inset-y-1/2 w-full border-t-2 border-gray-300"></div>
    </div>

    <!-- Step 3 -->
    <div
      class="flex flex-col items-center w-full md:w-1/5 cursor-pointer"
      @click="goToStep(3)"
    >
      <div
        :class="{
          'w-12 h-12 flex items-center justify-center font-bold rounded-full': true,
          'bg-turquoise-500 text-white': currentStep === 3,
          'bg-white-50 text-black': currentStep !== 3,
        }"
      >
        3
      </div>
      <h3 class="mt-4 text-lg md:text-xl font-semibold dark: text-white-50">
        Solicita tu préstamo
      </h3>
      <p class="dark: text-white-50 text-sm md:text-base">
        Elige la mejor opción
      </p>
    </div>
  </div>
</template>
