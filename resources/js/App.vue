<template>
    <div id="app">
      <ImageUpload />
      <BackgroundSelection />
      <Workspace />
      <DownloadButton />
    </div>
  </template>

  <script>
  import ImageUpload from './components/ImageUpload.vue';
  import BackgroundSelection from './components/BackgroundSelection.vue';
  import Workspace from './components/Workspace.vue';
  import DownloadButton from './components/DownloadButton.vue';

  export default {
    components: {
      ImageUpload,
      BackgroundSelection,
      Workspace,
      DownloadButton,
    }
  }
  </script>
