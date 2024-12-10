<template>
    <div class="w-full px-4 py-6">
      <!-- Header -->
      <div class="flex justify-between items-center border-b pb-4 mb-4">
        <h1 class="text-2xl font-bold">Number Patterns</h1>
        <button
          @click="openModal"
          class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600"
        >
          Add New Pattern
        </button>
      </div>
  
      <!-- Patterns Table -->
      <div class="overflow-hidden border rounded-lg">
        <table class="min-w-full bg-white">
          <thead>
            <tr class="bg-gray-200 text-gray-700 uppercase text-sm leading-normal">
              <th class="py-2 px-4 text-left">Model</th>
              <th class="py-2 px-4 text-left">Template</th>
              <th class="py-2 px-4 text-left">Prefix</th>
              <th class="py-2 px-4 text-left">Suffix</th>
              <th class="py-2 px-4 text-left">Actions</th>
            </tr>
          </thead>
          <tbody class="text-gray-600 text-sm font-light">
            <tr
              v-for="pattern in numberPatterns"
              :key="pattern.id"
              class="border-b border-gray-200 hover:bg-gray-100"
            >
              <td class="py-2 px-4">{{ pattern.model }}</td>
              <td class="py-2 px-4">{{ pattern.template }}</td>
              <td class="py-2 px-4">{{ pattern.prefix }}</td>
              <td class="py-2 px-4">{{ pattern.suffix }}</td>
              <td class="py-2 px-4">
                <button
                  @click="editPattern(pattern)"
                  class="text-blue-500 hover:underline"
                >
                  Edit
                </button>
                <button
                  @click="deletePattern(pattern.id)"
                  class="text-red-500 hover:underline ml-2"
                >
                  Delete
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
  
      <!-- Modal -->
      <div
        v-if="isModalVisible"
        class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center"
      >
        <div class="bg-white p-6 rounded-lg w-1/2">
          <h2 class="text-xl font-semibold mb-4">
            {{ isEditing ? "Edit Pattern" : "Add New Pattern" }}
          </h2>
          <form @submit.prevent="savePattern">
            <div class="mb-4">
              <label class="block text-gray-700">Model:</label>
              <input
                type="text"
                v-model="currentPattern.model"
                class="border p-2 w-full rounded"
                placeholder="Enter model name"
                required
              />
            </div>
            <div class="mb-4">
              <label class="block text-gray-700">Template:</label>
              <input
                type="text"
                v-model="currentPattern.template"
                class="border p-2 w-full rounded"
                placeholder="Enter template"
                required
              />
            </div>
            <div class="mb-4">
              <label class="block text-gray-700">Prefix:</label>
              <input
                type="text"
                v-model="currentPattern.prefix"
                class="border p-2 w-full rounded"
                placeholder="Enter prefix"
              />
            </div>
            <div class="mb-4">
              <label class="block text-gray-700">Suffix:</label>
              <input
                type="text"
                v-model="currentPattern.suffix"
                class="border p-2 w-full rounded"
                placeholder="Enter suffix"
              />
            </div>
            <div class="flex justify-end">
              <button
                type="button"
                @click="closeModal"
                class="bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600 mr-2"
              >
                Cancel
              </button>
              <button
                type="submit"
                class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600"
              >
                Save
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import axios from "axios";
  
  export default {
    data() {
      return {
        numberPatterns: [], // Store patterns
        isModalVisible: false, // Modal visibility
        isEditing: false, // Editing state
        currentPattern: {
          id: null,
          model: "",
          template: "",
          prefix: "",
          suffix: "",
        },
      };
    },
    methods: {
      async fetchPatterns() {
        try {
          const response = await axios.get("/api/number-patterns");
          this.numberPatterns = response.data;
        } catch (error) {
          console.error("Error fetching patterns:", error);
        }
      },
      openModal() {
        this.isModalVisible = true;
        this.resetForm();
      },
      closeModal() {
        this.isModalVisible = false;
      },
      resetForm() {
        this.currentPattern = {
          id: null,
          model: "",
          template: "",
          prefix: "",
          suffix: "",
        };
        this.isEditing = false;
      },
      async savePattern() {
        try {
          if (this.isEditing) {
            await axios.put(`/api/number-patterns/${this.currentPattern.id}`, this.currentPattern);
          } else {
            await axios.post("/api/number-patterns", this.currentPattern);
          }
          this.fetchPatterns(); // Refresh list
          this.closeModal();
        } catch (error) {
          console.error("Error saving pattern:", error);
        }
      },
      editPattern(pattern) {
        this.currentPattern = { ...pattern };
        this.isEditing = true;
        this.isModalVisible = true;
      },
      async deletePattern(id) {
        if (confirm("Are you sure you want to delete this pattern?")) {
          try {
            await axios.delete(`/api/number-patterns/${id}`);
            this.fetchPatterns(); // Refresh list
          } catch (error) {
            console.error("Error deleting pattern:", error);
          }
        }
      },
    },
    mounted() {
      this.fetchPatterns();
    },
  };
  </script>
  
  <style scoped>
  /* Add your custom styles here */
  </style>
  