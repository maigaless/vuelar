<template>
  <!-- Modal -->
  <div
    class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center"
  >
    <div class="bg-white p-6 rounded-lg w-1/2">
      <div class="h-auto min-h-10 w-full flex items-center justify-between border-b">
        <span class="text-lg font-semibold capitalize px-2">
          Numerotation: {{ getModelName }}
        </span>
        <button
          class="w-8 min-h-10 flex items-center justify-center bg-red-500 text-white
             font-bold hover:bg-red-600"
          @click="close"
        >
          X
        </button>
      </div>
      <form @submit.prevent="savePattern">
        <div class="mb-4">
          <label class="block text-gray-700">Model:</label>
          <input
            type="text"
            v-model="editableNumberPattern.model"
            class="border p-2 w-full rounded"
            placeholder="Enter model"
            required
          />
        </div>
        <div class="mb-4">
          <label class="block text-gray-700">Template:</label>
          <input
            type="text"
            v-model="editableNumberPattern.template"
            class="border p-2 w-full rounded"
            placeholder="Enter template"
            required
          />
        </div>
        <div class="flex justify-end">
          <button
            type="button"
            @click="close"
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
import { mapActions, mapGetters } from "vuex";

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
  computed: {
    ...mapGetters(["GET_MODELS_FOR_TEMPLATES"]),
    getModelName() {
      // Find the model's name based on its ID
      if (this.editableNumberPattern.model) {
        const model = this.GET_MODELS_FOR_TEMPLATES.find(
          (item) => item.name === this.editableNumberPattern.model
        );
        return model ? model.name : "Nouveau Model";
      }
      return "Nouveau Model";
    },
  },
  methods: {
    ...mapActions(["SaveNumberPattern"]),
    numberOfZeros(template) {
      // Extract the zeros inside `{}` and count them
      const match = template.match(/{(0+)}/);
      return match ? match[1].length : 0;
    },
    close() {
      this.$emit("closeModal", this.editableNumberPattern); // Emit updated numberpattern on close
    },
    async savePattern() {
      try {
        // Calculate number of zeros in the template
        this.editableNumberPattern.nb_zeros = this.numberOfZeros(
          this.editableNumberPattern.template
        );

        // Save the pattern
        await this.SaveNumberPattern(this.editableNumberPattern);
        this.close();
      } catch (error) {
        console.error("Failed to save pattern:", error);
      }
    },
  },
};
</script>

<style scoped>
/* Add custom styling if needed */
</style>
