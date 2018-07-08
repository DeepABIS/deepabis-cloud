<template>
    <div>
        <div class="container">
            <h1 class="text-center">Predict Bee Species</h1>
            <vue-dropzone id="dropzone" :options="dropzoneOptions"
                          @vdropzone-sending="sending"
                          @vdropzone-file-added="fileAdded" @vdropzone-success="success"></vue-dropzone>
            <h2 class="results-headline" v-if="results.length > 0">Results</h2>
            <div class="results">
                <div class="result" v-for="result in results">
                    <div class="row">
                        <div class="col-auto">
                            <img :src="result.image" alt=""/>
                        </div>
                        <div class="col" v-if="result.complete">
                            <div class="row class" v-for="(item, index) in result.response.top5"
                                 :class="{'top-1': index === 0}">
                                <div class="col-2 font-weight-bold text-right">{{ index + 1}}.</div>
                                <div class="col-6 text-nowrap">
                                    {{ result.response.embedding[item[0]] }}
                                </div>
                                <div class="col-4 text-right">
                                    {{ formatted(item[1]) }}%
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import VueDropzone from 'vue2-dropzone'

    export default {
        name: 'Predict',

        components: {
            VueDropzone,
        },

        data () {
            return {
                results: [],
            }
        },

        methods: {
            formatted (number) {
                number = (number * 100).toString()
                return (number.substr(0, number.indexOf('.')) + number.substr(number.indexOf('.'), 3))
            },

            getBase64 (file) {
                const reader = new FileReader()
                return new Promise(((resolve, reject) => {
                    reader.readAsDataURL(file)
                    reader.onload = () => resolve(reader.result)
                    reader.onerror = error => reject(error)
                }))
            },

            fileAdded (file) {
                console.log(file)
                this.getBase64(file).then(src => {
                    const result = {
                        uuid: file.upload.uuid,
                        image: src,
                        complete: false,
                    }
                    this.results.unshift(result)
                }).catch(() => {})
            },

            sending (file, xhr, formData) {
                formData.set('_token', window.Laravel.csrfToken)
                formData.set('uuid', file.upload.uuid)
            },

            success (file, response) {
                const result = this.results.find(result => result.uuid === response.uuid)
                result.complete = true
                result.response = response
            },

        },

        computed: {
            dropzoneOptions () {
                return {
                    url: '/upload',
                    createImageThumbnails: false,
                    thumbnailWidth: 150,
                    previewTemplate: '<div></div>',
                    dictDefaultMessage: 'Drop images',
                }
            },
        },
    }
</script>

<style scoped>

</style>
