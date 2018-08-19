<template>
    <div class="dataset-container">
        <div class="row no-gutters">
            <div class="col-2 limit-height">
                <ul class="dataset-ul">
                    <li v-for="spec in species" @click="select(spec)" :class="{'active': active.id === spec.id}">{{ spec.name }}</li>
                </ul>
            </div>
            <div class="col-10 p-10">
                <div class="row">
                    <div class="col-4">
                        <h5>{{ active.name }}</h5>
                    </div>
                    <div class="col-8 text-right">
                        <button class="btn btn-primary dropzone-open">Add</button>
                    </div>
                </div>
                <vue-dropzone id="dropzone" :options="dropzoneOptions"
                              @vdropzone-sending="sending"
                              @vdropzone-file-added="fileAdded" @vdropzone-success="success"></vue-dropzone>
                <div class="examples limit-height">
                    <figure v-for="result in results" class="example">
                        <img :src="result.image" alt="">
                    </figure>
                    <figure v-for="entry in active.dataset" class="example">
                        <img :src="'/console/dataset/' + entry.id" alt="">
                        <div class="remove" @click="remove(active, entry)">&times;</div>
                    </figure>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import VueDropzone from 'vue2-dropzone'

    export default {
        name: 'Dataset',
        props: ['species'],
        components: {
            VueDropzone,
        },

        data () {
            return {
                active: this.species.length > 0 ? this.species[0] : null,
                results: [],
            }
        },

        methods: {
            select (species) {
                this.active = species
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
                this.getBase64(file).then(src => {
                    const result = {
                        uuid: file.upload.uuid,
                        image: src,
                        complete: false,
                    }
                    this.results.push(result)
                }).catch(() => {})
            },

            sending (file, xhr, formData) {
                formData.set('_token', window.Laravel.csrfToken)
                formData.set('uuid', file.upload.uuid)
                formData.set('species', this.active.id)
            },

            success (file, response) {
                console.log(response.uuid)
                const result = this.results.find(result => result.uuid === response.uuid)
                result.complete = true
                result.response = response
            },

            remove (species, entry) {
                axios.delete(`/console/dataset/${entry.id}`)
                species.dataset.splice(species.dataset.indexOf(entry), 1)
            }

        },

        computed: {
            dropzoneOptions () {
                return {
                    url: '/console/dataset',
                    createImageThumbnails: true,
                    thumbnailWidth: 150,
                    previewTemplate: '<div></div>',
                    dictDefaultMessage: '',
                    parallelUploads: 1,
                    clickable: '.dropzone-open',
                }
            },
        },
    }
</script>

<style scoped>
    .vue-dropzone {
        position: absolute;
        border: none;
        width: 100%;
        height: 100%;
        top: 40px;
        left: 0;
    }

    .limit-height {
        max-height: 600px;
        overflow: auto;
    }
</style>
