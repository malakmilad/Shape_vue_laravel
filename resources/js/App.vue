<template>
    <div id="app">
        <div class="header">
            <h1>Interview Task</h1>
        </div>
        <div class="main">
            <div class="sidebar">
                <ImageUpload @imageUploadedUrl="handleImageUrl" @imageUploadedId="handleImageId" />
                <ImageDownload />
            </div>
            <div class="workspace">
                <WorkspaceComponent :imageUrl="imageUrl" :imageId="imageId" />
            </div>
        </div>
        <div class="footer">
            <a href="#" class="back-link">BACK TO COURSE</a>
        </div>
    </div>
</template>

<script>
import ImageUpload from './components/ImageUpload.vue';
import ImageDownload from './components/ImageDownload.vue';
import WorkspaceComponent from './components/Workspace.vue';

export default {
    components: {
        ImageUpload,
        ImageDownload,
        WorkspaceComponent
    },
    data() {
        return {
            imageUrl: null,
            imageId: null
        };
    },
    methods: {
        handleImageUrl(url) {
            this.imageUrl = url;
        },
        handleImageId(id) {
            this.imageId = id;
        }
    }
};
</script>

<style scoped>
/* Style for app container */
#app {
  font-family: Arial, sans-serif;
  display: flex;
  flex-direction: column;
  height: 100vh;
}

/* Style for header */
.header {
  padding: 20px;
  background-color: #f0f0f0;
}

.header h1 {
  font-size: 24px;
  margin: 0;
}

.main {
  flex: 1;
  display: flex;
  overflow: hidden;
}

.sidebar {
  width: 200px;
  padding: 20px;
  background-color: #f9f9f9;
  overflow-y: auto;
}

.workspace {
  flex: 1;
  padding: 20px;
}

.footer {
  padding: 20px;
  background-color: #f0f0f0;
}

.back-link {
  color: #007bff;
  text-decoration: none;
}

.back-link:hover {
  text-decoration: underline;
}

.upload-download-button {
  display: block;
  width: 100%;
  margin-bottom: 10px;
  padding: 10px;
  text-align: center;
  background-color: #007bff;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.upload-download-button:hover {
  background-color: #0056b3;
}

.upload-download-button:focus {
  outline: none;
}

.upload-download-button + .upload-download-button {
  margin-top: 10px;
}
</style>
