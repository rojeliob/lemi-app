<script setup>
import { ref, defineProps, watch } from "vue";
import axios from "axios";

const props = defineProps({
  name: {
    type: String,
    required: true,
  },
});

const model = ref(null);
const dragOver = ref(false);
const fileInput = ref(null);
const isLoading = ref(false);

const handleDrop = (event) => {
  event.preventDefault();
  dragOver.value = false;
  const files = event.dataTransfer.files;
  if (files.length > 0) {
    model.value = files[0]; // Assuming a single file upload
  }
};

const handleDragOver = (event) => {
  event.preventDefault();
  dragOver.value = true;
};

const handleDragLeave = () => {
  console.log("aca");
  dragOver.value = false;
};

const handleFileChange = (event) => {
  const files = event.target.files;
  if (files.length > 0) {
    model.value = files[0];
  }
};

const uploadFile = async () => {
  if (!model.value) return;

  isLoading.value = true;

  const formData = new FormData();
  formData.append(props.name, model.value); // Use the `name` prop as the key

  try {
    const response = await axios.post(route("upload"), formData, {
      headers: {
        "Content-Type": "multipart/form-data",
      },
    });

    // Handle successful upload
    alert("File uploaded successfully! File path: " + response.data.file_path);
  } catch (error) {
    // Handle error
    alert("File upload failed.");
  } finally {
    isLoading.value = false;
  }
};

// Watch for changes to the model to automatically upload the file
watch(model, (newFile) => {
  if (newFile) {
    uploadFile();
  }
});
</script>

<template>
  <div>
    <div
      class="border-2 border-dashed rounded-md p-4 cursor-pointer mb-2"
      :class="{
        'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark: dark: text-turquoise-500':
          !dragOver,
        'border-indigo-500 dark:border-indigo-600 bg-indigo-50 dark:bg-indigo-800':
          dragOver,
      }"
      @dragover="handleDragOver"
      @dragleave="handleDragLeave"
      @drop="handleDrop"
      @click="fileInput.click()"
    >
      <p v-if="!model">
        {{
          dragOver
            ? "Suelta tu archivo aquí"
            : "Arrastre y suelte un archivo o haga clic para seleccionarlo"
        }}
      </p>
      <p v-else>{{ model.value.name }}</p>
      <input
        type="file"
        class="hidden"
        ref="fileInput"
        @change="handleFileChange"
      />
    </div>

    <button
      class="mt-4 bg-blue-500 dark: text-white-50 py-2 px-4 rounded-md"
      :disabled="!model || isLoading"
      @click="uploadFile"
    >
      <!-- {{ isLoading ? "Uploading..." : "Upload File" }} -->
    </button>
  </div>
</template>
