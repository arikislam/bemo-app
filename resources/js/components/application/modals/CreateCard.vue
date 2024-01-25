<template>
  <div class="modal" v-if="showModal">
    <div class="modal-content">
      <div class="modal-header">
        <h2>Create Card</h2>
      </div>
      <div class="modal-body">
        <form @submit.prevent="saveModal">
          <div class="form-group">
            <label for="title">Title:</label>
            <input
                type="text"
                id="title"
                v-model="formData.title"
            />
            <span style="color: red" v-if="error.hasOwnProperty('title')">{{ error.title }}</span>
          </div>
          <div class="form-group">
            <label for="details">Details:</label>
            <textarea
                class="styled-textarea"
                id="details"
                rows="4"
                v-model="formData.details"
            />
            <span style="color: red" v-if="error.hasOwnProperty('details')">{{ error.details }}</span>
          </div>
          <div class="modal-buttons">
            <button type="submit" class="btn-save">Save</button>
            <button @click="closeModal" class="btn-close">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    showModal: Boolean,
  },
  data() {
    return {
      formData: {
        title: '',
        details: ''
      },
      error: {
        title: '',
        details: ''
      }
    };
  },
  methods: {
    closeModal() {
      this.formData = {
        title: '',
        details: ''
      };
      this.$emit('closeCreate');
    },
    saveModal() {
      if(!this.validateForm()) {
        return;
      }
      this.$emit('create', this.formData);
    },

    validateForm() {
      this.error = {
        title: '',
        details: ''
      };

      if (!this.formData.title.length || this.formData.title === '') {
        this.error.title = 'Title is required.';
        return false;
      }

      if (!this.formData.details.length || this.formData.details === '') {
        this.error.details = 'Details is required.';
        return false;
      }
      return true;
    },
  }
};
</script>

<style lang="scss" scoped>
/* Modal Styles */
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

  .modal-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
  }

  .modal-content {
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    max-width: 80%;
    width: 500px;

    .modal-header {
      text-align: center;
      margin-bottom: 20px;
    }

    .modal-body {
      text-align: left;

      .form-group {
        margin-bottom: 20px;
      }

      label {
        font-weight: bold;
      }

      input[type="text"] {
        width: 90%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
      }
      .styled-textarea {
        width: 90%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
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
}
</style>
