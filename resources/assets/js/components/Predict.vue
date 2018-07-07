<template>
    <div>
        <div class="container">
            <h1 class="text-center">Predict Bee Species</h1>
            <vue-dropzone id="dropzone" :options="dropzoneOptions"
                          @vdropzone-file-added="fileAdded"></vue-dropzone>
        </div>
    </div>
</template>

<script>
  import VueDropzone from 'vue2-dropzone';

  export default {
    name: 'Predict',

    components: {
      VueDropzone,
    },

    data() {
      return {
        state: {
          hover: false,
        },
      };
    },

    methods: {
      fileAdded(file) {
        console.log(file);
      },
    },

    computed: {
      dropzoneOptions() {
        console.log(window.Laravel.csrfToken);
        return {
          url: '/upload',
          createImageThumbnails: false,
          thumbnailWidth: 150,
          previewTemplate: '<div></div>',
          dictDefaultMessage: 'Drop images',
          params: {
            '_token': window.Laravel.csrfToken,
          },
        };
      },
    },
  };
</script>

<style scoped>

</style>