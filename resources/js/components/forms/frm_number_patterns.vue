<template lang="">
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
</template>
<script>
import { mapActions } from 'vuex';
export default {
  name: "PatternModal",
  props: {
    numberpattern: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
      editableNumberPattern: { ...this.numberpattern }, // Local copy to avoid directly modifying the prop
    };
  },
  methods: {
    ...mapActions(["SaveNumberPattern"]),
    close() {
      this.$emit("closeModal", this.editableNumberPattern); // Emit updated numberpattern on close
    },
    saveCategroyData(){
      this.SaveNumberPattern(this.editableNumberPattern)
      this.close();
    }
  },
};
</script>

<style scoped>
/* Add custom styling if needed */
</style>