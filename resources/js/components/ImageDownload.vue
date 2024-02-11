<template>
    <div>
        <button @click="downloadImage" class="download-button">Download Image</button>
    </div>
</template>

<script>
import axios from 'axios';

export default {
  props: {
    imageId: String
  },
  methods: {
    downloadImage() {
      axios.get(`/api/downloadImage/${this.imageId}`, { responseType: 'blob' })
        .then(response => {
          const contentType = response.headers['content-type'];
          const blob = new Blob([response.data], { type: contentType });
          const link = document.createElement('a');
          link.href = window.URL.createObjectURL(blob);
          link.download = `image.${contentType.split('/')[1]}`;
          link.click();
          window.URL.revokeObjectURL(link.href);
          document.body.removeChild(link);
        })
        .catch(error => {
          console.error('Error downloading image:', error);
        });
    }
  }
}
</script>

<style scoped>
.download-button {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
    margin: 10px 0;
}

.download-button:hover {
    background-color: #0056b3;
}
</style>
