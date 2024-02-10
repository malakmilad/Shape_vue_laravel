<template>
    <div class="image-upload">
      <label for="fileInput" class="custom-file-upload">
        <i class="fas fa-cloud-upload-alt"></i> Upload Image
      </label>
      <input id="fileInput" type="file" @change="handleFileUpload" />
      <p v-if="uploadedFileName">Uploaded file: {{ uploadedFileName }}</p>
    </div>
  </template>

  <script>
  import axios from 'axios';

  export default {
    data() {
      return {
        uploadedFileName: null
      };
    },
    methods: {
      handleFileUpload(event) {
        const file = event.target.files[0];
        this.uploadedFileName = file ? file.name : null;

        const formData = new FormData();
        formData.append('filename', file);

        axios.post('api/upload_image', formData)
          .then(response => {
            console.log(response.data);
          })
          .catch(error => {
            console.error(error);
          });
      }
    }
  }
  </script>

  <style scoped>
  .image-upload {
    text-align: center;
  }
  .custom-file-upload {
    cursor: pointer;
    display: inline-block;
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    transition: background-color 0.3s;
  }
  .custom-file-upload:hover {
    background-color: #45a049;
  }
  input[type="file"] {
    display: none;
  }
  </style>
