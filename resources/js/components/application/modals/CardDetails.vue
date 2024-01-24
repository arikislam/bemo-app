<template>
  <div class="modal" v-if="showModal">
    <div class="modal-content">
      <div class="modal-header">
        <h2>EDIT CARD</h2>
      </div>
      <div class="modal-body">
        <form @submit.prevent="saveModal">
          <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title" v-model="formData.title" />
          </div>
          <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" v-model="formData.description"></textarea>
          </div>
          <div class="modal-buttons">
            <button type="submit" class="btn-save" @click="saveData">Save</button>
            <button @click="closeModal" class="btn-close">Close</button>
          </div>
        </form>
      </div>
    </div>
    <div class="modal-overlay" @click="closeModal"></div>
  </div>
</template>

<script>
export default {
  props: {
    showModal: Boolean,
    card: Object,
  },
  data() {
    return {
      formData: {
        title: '',
        description: '', // Changed from "details" to "description"
      },
    };
  },
  methods: {
    closeModal() {
      this.$emit('close');
      this.formData.title = '';
      this.formData.description = '';
    },
    saveModal() {
      this.$emit('save-modal', this.formData);
      this.closeModal();
    },
    saveData() {
      this.$emit('save-data', this.formData);
      this.closeModal();
    },
  },
  mounted() {
    if (this.card) {
      this.formData = this.card;
    }
  },
};
</script>

<style lang="scss" scoped>
/* Add your SCSS styles here */
.modal {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.7);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 1000;

  .modal-content {
    background-color: white;
    padding: 20px;
    border-radius: 10px; // Make the modal bigger
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    max-width: 80%;
    width: 500px; // Adjust the width as needed

    .modal-header {
      text-align: center;
      margin-bottom: 20px;
    }

    .modal-body {
      text-align: left;

      .form-group {
        margin-bottom: 20px;
      }

      .modal-buttons {
        text-align: center;

        .btn-save {
          background-color: #4CAF50;
          color: white;
          border: none;
          border-radius: 5px;
          padding: 10px 20px;
          margin-right: 10px;
        }

        .btn-close {
          background-color: #ccc;
          color: #333;
          border: none;
          border-radius: 5px;
          padding: 10px 20px;
        }
      }
    }
  }

  .modal-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
  }
}
</style>
