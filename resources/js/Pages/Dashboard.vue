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
import MultiSelect from "@/Components/MultiSelect.vue";
import { ref } from "vue";
import axios from "axios";

// Track the current step
const currentStep = ref(1);

// Change the step when a step is clicked
const goToStep = (step) => {
  currentStep.value = step;
};

const options = ref([
  { value: "Línea de crédito", label: "Línea de crédito" },
  { value: "Anticipo de caja", label: "Anticipo de caja" },
  { value: "Confirming", label: "Confirming" },
  { value: "Descuento comercial", label: "Descuento comercial" },
  { value: "Préstamo a corto plazo", label: "Préstamo a corto plazo" },
  { value: "Financiación export", label: "Financiación export" },
  { value: "Financiación import", label: "Financiación import" },
  { value: "Multilínea", label: "Multilínea" },
  { value: "Préstamo largo plazo", label: "Préstamo largo plazo" },
  { value: "Leasing", label: "Leasing" },
  { value: "Renting", label: "Renting" },
  { value: "Factoring", label: "Factoring" },
  { value: "Anticipo facturas", label: "Anticipo facturas" },
  { value: "Avales", label: "Avales" },
]);

// Define the selected model value
const selectedValue = ref("");
const isTouched = ref(false);
const optionsActivities = ref([
  {
    value: "Agricultura, ganadería, silvicultura y pesca",
    label: "Agricultura, ganadería, silvicultura y pesca",
  },
  { value: "Industrias extractivas", label: "Industrias extractivas" },
  { value: "Industria manufacturera", label: "Industria manufacturera" },
  {
    value: "Suministro de energía eléctrica, gas, vapor y aire acondicionado",
    label: "Suministro de energía eléctrica, gas, vapor y aire acondicionado",
  },
  {
    value:
      "Suministro de agua, actividades de saneamiento, gestión de residuos y descontaminación",
    label:
      "Suministro de agua, actividades de saneamiento, gestión de residuos y descontaminación",
  },
  { value: "Construcción", label: "Construcción" },
  {
    value:
      "Comercio al por mayor y al por menor; reparación de vehículos de motor y motocicletas",
    label:
      "Comercio al por mayor y al por menor; reparación de vehículos de motor y motocicletas",
  },
  {
    value: "Transporte y almacenamiento",
    label: "Transporte y almacenamiento",
  },
  {
    value: "Transporte y almacenamiento",
    label: "Transporte y almacenamiento",
  },
  {
    value: "Información y comunicaciones",
    label: "Información y comunicaciones",
  },
  {
    value: "Actividades financieras y de seguros",
    label: "Actividades financieras y de seguros",
  },
  { value: "Actividades inmobiliarias", label: "Actividades inmobiliarias" },
  {
    value: "Actividades profesionales, científicas y técnicas",
    label: "Actividades profesionales, científicas y técnicas",
  },
  {
    value: "Actividades administrativas y servicios auxiliares",
    label: "Actividades administrativas y servicios auxiliares",
  },
  {
    value: "Administración Pública y defensa; Seguridad Social obligatoria",
    label: "Administración Pública y defensa; Seguridad Social obligatoria",
  },
  { value: "Educación", label: "Educación" },
  {
    label: "Actividades sanitarias y de servicios sociales",
    value: "Actividades sanitarias y de servicios sociales",
  },
  {
    label: "Actividades artísticas, recreativas y de entretenimiento",
    value: "Actividades artísticas, recreativas y de entretenimiento",
  },
  { label: "Otros servicios", value: "Otros servicios" },
  {
    label: "Actividades de los hogares como empleadores de personal doméstico",
    value: "Actividades de los hogares como empleadores de personal doméstico",
  },
  {
    label: "Actividades de organizaciones y organismos extraterritoriales",
    value: "Actividades de organizaciones y organismos extraterritoriales",
  },
  { label: "Otras actividades", value: "Otras actividades" },
]);

// Options for the MultiSelect component
const multiSelectOptions = ref([
  { id: 1, name: "BBVA" },
  { id: 2, name: "Caixa Bank" },
  { id: 3, name: "Banco Santander" },
  { id: 4, name: "Banco Sabadell" },
  { id: 5, name: "Abanca" },
  { id: 6, name: "Bankinter" },
  { id: 7, name: "Kutxabank" },
  { id: 8, name: "Cajamar" },
  { id: 9, name: "Ibercaja" },
  { id: 10, name: "Novicap" },
  { id: 11, name: "Kintai" },
]);

// Selected values
const MultiselectedValues = ref([]);

// // Set values programmatically
// const setProgrammaticValues = () => {
//   // Setting values with ids 1, 2, and 3
//   MultiselectedValues.value = options.value.filter((option) =>
//     [1, 2, 3].includes(option.id)
//   );
// };
const debounce = (func, delay) => {
  let timer;
  return (...args) => {
    clearTimeout(timer);
    timer = setTimeout(() => func.apply(this, args), delay);
  };
};

// Debounce the saveData function to prevent excessive calls
const saveData = debounce(async () => {
  if (!isTouched.value) return; // Only save if the input has been touched

  try {
    const response = await axios.post(route("save-data"), {
      employeeCount: employeeCount.value,
      // Include other fields as needed
    });
    console.log("Data saved successfully:", response.data);
  } catch (error) {
    console.error(
      "Error saving data:",
      error.response ? error.response.data : error.message
    );
  }
}, 500); // Adjust debounce delay as needed

const handleBlur = () => {
  saveData(); // Call the debounced saveData function when the input loses focus
};

const handleInput = () => {
  isTouched.value = true; // Mark input as touched when user starts typing
};
</script>

<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <div class="mt-20 max-w-7xl mx-auto p-8 rounded-lg dark: bg-violet-900">
      <div class="max-w-7xl mx-auto">
        <h2 class="font-semibold text-xl text-gray-800 dark: text-white-50">
          Mi empresa
        </h2>
        <p class="dark: text-white-50 ext-sm">
          Completa tu información para tenerla disponible al momento de hacer
          una nueva solicitud
        </p>
      </div>
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
              'px-4 py-4 flex items-center justify-center font-bold text-center w-full rounded-md min-h-20': true,
              'bg-violet-500 text-white-50': currentStep === 1,
              'bg-violet-700 text-white-50': currentStep !== 1,
            }"
            class="rounded"
          >
            Información económica/financiera
          </div>
          <!-- <h3 class="mt-4 text-lg md:text-xl font-semibold dark:text-white-50">
          Registrate
        </h3>
        <p class="dark:text-white-50 text-sm md:text-base">
          Completa los datos de tu empresa
        </p> -->
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
              'px-4 py-4 flex items-center justify-center font-bold text-center w-full rounded-md min-h-20 max-h-20': true,
              'bg-violet-500 text-white-50': currentStep === 2,
              'bg-violet-700 text-white-50': currentStep !== 2,
            }"
            class="rounded"
          >
            Información legal
          </div>
          <!-- <h3 class="mt-4 text-lg md:text-xl font-semibold dark:text-white-50">
          Sube tus documentos
        </h3>
        <p class="dark:text-white-50 text-sm md:text-base">
          ¡Solo debes hacerlo una vez!
        </p> -->
        </div>

        <!-- Connector Line (hidden on small screens) -->
        <div
          class="hidden md:block flex-1 border-dashed border-t-0 dark: border-white-50 relative"
        >
          <div
            class="absolute inset-y-1/2 w-full border-dashed border-t-2 dark: border-white-50"
          ></div>
        </div>

        <!-- Step 3 -->
        <div
          class="flex flex-col items-center w-full md:w-1/5 cursor-pointer"
          @click="goToStep(3)"
        >
          <div
            :class="{
              'px-4 py-4 flex items-center justify-center font-bold text-center w-full rounded-md min-h-20': true,
              'bg-violet-500 text-white-50': currentStep === 3,
              'bg-violet-700 text-white-50': currentStep !== 3,
            }"
            class="rounded"
          >
            Información fiscal
          </div>
          <!-- <h3 class="mt-4 text-lg md:text-xl font-semibold dark:text-white-50">
          Solicita tu préstamo
        </h3>
        <p class="dark:text-white-50 text-sm md:text-base">
          Elige la mejor opción
        </p> -->
        </div>
      </div>

      <div class="py-12">
        <div class="max-w-7xl mx-auto">
          <div
            class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
          >
            <div class="relative">
              <!-- Form Content -->
              <div class="mt-10">
                <div v-if="currentStep === 1">
                  <!-- Step 1 Form -->
                  <form>
                    <!-- Form content for step 1 goes here -->
                    <div class="max-w-7xl mx-auto columns-2">
                      <div
                        class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg space-y-5 mr-20"
                      >
                        <div
                          class="text-gray-900 items-center dark:text-gray-100"
                        >
                          <InputLabel
                            for="company-name"
                            value="Actividad de la empresa"
                          />
                          <Select
                            v-model="selectedValue"
                            :options="optionsActivities"
                            @blur="handleBlur"
                            @input="handleInput"
                          />
                        </div>

                        <div class="text-gray-900 dark:text-gray-100">
                          <InputLabel for="company-name" value="Empleados" />
                          <NumericInput
                            id="employeeCount"
                            class="mt-1 block w-full"
                            required
                            autofocus
                            @blur="handleBlur"
                            @input="handleInput"
                          />
                        </div>

                        <div class="text-gray-900 dark:text-gray-100">
                          <InputLabel
                            for="company-name"
                            value="Explicacion del negocio"
                          />
                          <TextAreaInput
                            id="company-name"
                            type="company-name"
                            class="mt-1 block w-full"
                            required
                            autofocus
                            @blur="handleBlur"
                            @input="handleInput"
                          />
                        </div>
                      </div>
                      <div
                        class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg ml-20"
                      >
                        <div class="text-gray-900 dark:text-gray-100 space-y-2">
                          <InputLabel
                            for="company-name"
                            value="Impuestos de sociedades de los últimos dos años"
                          />
                          <DragAndDropFileInput name="corporate_taxes" />
                        </div>
                        <div class="text-gray-900 dark:text-gray-100 space-y-2">
                          <InputLabel
                            for="company-name"
                            value="Balance y cuenta de resultados del ejercicio en curso"
                          />
                          <DragAndDropFileInput
                            name="balance_sheet_current_year"
                          />
                        </div>
                        <div class="text-gray-900 dark:text-gray-100 space-y-2">
                          <InputLabel
                            for="company-name"
                            value="Pool bancario (relación de deudas bancarias de la empresa)"
                          />
                          <DragAndDropFileInput name="bank_debt_summary" />
                        </div>
                        <div class="text-gray-900 dark:text-gray-100 space-y-2">
                          <InputLabel for="company-name" value="CIRBE" />
                          <DragAndDropFileInput name="cirbe" />
                        </div>
                        <div class="text-gray-900 dark:text-gray-100 space-y-2">
                          <InputLabel
                            for="company-name"
                            value="Resumen de IVAs del último año e IVAs del año en curso"
                          />
                          <DragAndDropFileInput name="vat_summary" />
                        </div>
                      </div>
                    </div>
                    <!-- Add more fields as needed -->
                  </form>
                </div>

                <div v-if="currentStep === 2">
                  <!-- Step 2 Form -->
                  <form>
                    <div class="max-w-7xl mx-auto columns-2">
                      <div
                        class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg space-y-5 mr-20"
                      >
                        <div class="text-gray-900 dark:text-gray-100 space-y-2">
                          <InputLabel
                            for="company-name"
                            value="CIF de la empresa"
                          />
                          <DragAndDropFileInput
                            name="sociedades_y_auditorias"
                          />
                        </div>
                        <div class="text-gray-900 dark:text-gray-100 space-y-2">
                          <InputLabel
                            for="company-name"
                            value="Escrituras de constitución y apoderamiento"
                          />
                          <DragAndDropFileInput
                            name="balance_resultados_provisional"
                          />
                        </div>
                        <div class="text-gray-900 dark:text-gray-100 space-y-2">
                          <InputLabel
                            for="company-name"
                            value="Acta de titularidad real"
                          />
                          <DragAndDropFileInput name="liquidaciones_iva" />
                        </div>
                      </div>

                      <div
                        class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg space-y-5 ml-20"
                      >
                        <div class="text-gray-900 dark:text-gray-100 space-y-2">
                          <InputLabel
                            for="company-name"
                            value="Licencias y permisos necesarios para la actividad"
                          />
                          <DragAndDropFileInput name="liquidaciones_irpf" />
                        </div>
                        <div class="text-gray-900 dark:text-gray-100 space-y-2">
                          <InputLabel
                            for="company-name"
                            value="Certificación negativa del Registro Mercantil"
                          />
                          <DragAndDropFileInput name="modelo_390" />
                        </div>
                      </div>
                    </div>
                    <!-- Add more fields as needed -->
                  </form>
                </div>

                <div v-if="currentStep === 3">
                  <!-- Step 3 Form -->
                  <form>
                    <!-- Form content for step 3 goes here -->
                    <div class="max-w-7xl mx-auto columns-2">
                      <div
                        class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg space-y-5 mr-20"
                      >
                        <!-- <div class="p-6 text-gray-900 dark:text-gray-100">
                          <div class="columns-2">
                            <InputLabel
                              for="company-name"
                              value="Linea de crédito"
                            />
                            <Select
                              v-model="selectedValue"
                              :options="options"
                            />
                          </div>
                        </div> -->
                        <!-- <div class="p-6 text-gray-900 dark:text-gray-100">
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
                            <InputLabel for="company-name" value="Plazo" />
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
                            <InputLabel
                              for="company-name"
                              value="Fecha limite de credito"
                            />
                            <DatePicker />
                          </div>
                        </div>
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                          <div class="columns-2">
                            <InputLabel
                              for="company-name"
                              value="Destino de los fondos"
                            />
                            <TextInput
                              id="company-name"
                              type="text"
                              class="mt-1 block w-full"
                              required
                              autofocus
                            />
                          </div>
                        </div>
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                          <div class="columns-2">
                            <InputLabel
                              for="company-name"
                              value="Eleccion Bancos"
                            />
                            <MultiSelect
                              :options="multiSelectOptions"
                              v-model="selectedValues"
                              ref="multiSelect"
                            />
                          </div>
                        </div> -->
                        <div class="text-gray-900 dark:text-gray-100 space-y-2">
                          <InputLabel for="company-name" value="Modelo 347" />
                          <DragAndDropFileInput name="modelo_390" />
                        </div>
                        <div class="text-gray-900 dark:text-gray-100 space-y-2">
                          <InputLabel for="company-name" value="Modelo 349" />
                          <DragAndDropFileInput name="modelo_390" />
                        </div>
                        <div class="text-gray-900 dark:text-gray-100 space-y-2">
                          <InputLabel
                            for="company-name"
                            value="Liquidaciones periódicas de IVA del año anterior y el año en curso"
                          />
                          <DragAndDropFileInput name="modelo_390" />
                        </div>
                        <div class="text-gray-900 dark:text-gray-100 space-y-2">
                          <InputLabel
                            for="company-name"
                            value="Liquidaciones de IRPF del año anterior y el año en curso"
                          />
                          <DragAndDropFileInput name="modelo_390" />
                        </div>
                      </div>
                      <div
                        class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg space-y-5 ml-20"
                      >
                        <div class="text-gray-900 dark:text-gray-100 space-y-2">
                          <InputLabel
                            for="company-name"
                            value="Modelo 390 del año anterior, si existe obligación de presentación"
                          />
                          <DragAndDropFileInput name="modelo_390" />
                        </div>
                        <div class="text-gray-900 dark:text-gray-100 space-y-2">
                          <InputLabel
                            for="company-name"
                            value="Modelo 347 del año anterior, si existe obligación de presentación"
                          />
                          <DragAndDropFileInput name="modelo_390" />
                        </div>
                        <div class="text-gray-900 dark:text-gray-100 space-y-2">
                          <InputLabel
                            for="company-name"
                            value="Certificados de corriente de pago Seguridad Social y Hacienda"
                          />
                          <DragAndDropFileInput name="modelo_390" />
                        </div>
                        <div class="text-gray-900 dark:text-gray-100 space-y-2">
                          <InputLabel
                            for="company-name"
                            value="Declaración de bienes de la empresa, si tiene activos"
                          />
                          <DragAndDropFileInput name="modelo_390" />
                        </div>
                      </div>
                    </div>
                    <!-- Add more fields as needed -->
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
