<template>
    <div class="download-button">
      <button @click="downloadImage" class="download-btn">
        <i class="fas fa-download"></i> Download Image
      </button>
    </div>
  </template>

  <script>
  export default {
    methods: {
      downloadImage() {
        console.log("Downloading image...");
      }
    }
  }
  </script>

  <style scoped>
  .download-button {
    text-align: center;
  }
  .download-btn {
    cursor: pointer;
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 4px;
    transition: background-color 0.3s;
  }
  .download-btn:hover {
    background-color: #0056b3;
  }
  .download-btn i {
    margin-right: 5px;
  }
  </style>
