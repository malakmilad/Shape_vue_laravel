<template>
    <div>
        <label for="fileInput" class="upload-button">Upload Image</label>
        <input type="file" id="fileInput" @change="uploadImage" class="file-input">
    </div>
</template>

<script>
import axios from 'axios';

export default {
    methods: {
        uploadImage(event) {
            const file = event.target.files[0];
            const formData = new FormData();
            formData.append('filename', file);
            axios.post('/api/upload_image', formData)
                .then(response => {
                    console.log('Image uploaded successfully');
                    const imageUrl = response.data.data.image;
                    const imageId = response.data.data.id;
                    this.$emit('imageUploadedUrl', imageUrl); // Emit the image URL
                    this.$emit('imageUploadedId', imageId); // Emit the image ID
                })
                .catch(error => {
                    console.error('Error uploading image:', error);
                });
        }
    }
}
</script>

<style scoped>
.file-input {
    display: none;
}

.upload-button {
    background-color: #28a745;
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
    margin-right: 10px; /* Add margin between buttons */
}

.upload-button:hover {
    background-color: #218838;
}
</style>
