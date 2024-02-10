<template>
    <div>
        <button @click="downloadImage" class="download-button">Download Image</button>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    props:{
        imageId: String
    },
    methods: {
        downloadImage() {
            axios.get('/api/downloadImage/' + this.imageId)
                .then(response => {
                    // Handle the response to download the image
                    const blob = new Blob([response.data], { type: response.headers['content-type'] });
                    const url = window.URL.createObjectURL(blob);
                    const link = document.createElement('a');
                    link.href = url;
                    link.download = 'downloaded_image.jpg';
                    document.body.appendChild(link);
                    link.click();
                    window.URL.revokeObjectURL(url);
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
