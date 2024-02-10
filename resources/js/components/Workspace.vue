<template>
    <div class="workspace">
      <h2>Workspace</h2>
      <form @submit.prevent="saveActivity">
        <label for="image">Image URL:</label>
        <input type="text" id="image" v-model="image">
        <div v-if="background_id">
          <label>Background ID:</label>
          <span>{{ background_id }}</span>
        </div>
        <button type="submit">Save Activity</button>
      </form>
    </div>
  </template>

  <script>
  import axios from 'axios';

  export default {
    data() {
      return {
        image: '',
        background_id: ''
      };
    },
    methods: {
      saveActivity() {
        const requestData = {
          background_id: this.background_id,
        };

        axios.post('/api/save-activity', requestData)
          .then(response => {
            console.log(response.data);
          })
          .catch(error => {
            console.error(error);
          });
      },
      fetchBackgroundId() {
        const regex = /\/image\/(\d+)/; // Assuming the background_id is a number
        const match = this.image.match(regex);
        if (match && match[1]) {
          this.background_id = match[1];
        } else {
          console.error('Background ID not found in image URL');
        }
      }
    },
    watch: {
      image(newImage) {
        this.fetchBackgroundId();
      }
    }
  }
  </script>

  <style scoped>
  .workspace {
    text-align: center;
    padding: 20px;
  }
  </style>
