<template>
    <div style="width: 100%;">
        <div class="container-fluid">
            <div class="row A54VNK-qi-a" id="dvPreview">
                <div class="col-12 col-sm-4 col-md-3 A54VNK-kh-b" v-for="(file, m) in form.files" :key="m">
                    <div class="A54VNK-kh-a">
                        <div class="A54VNK-kh-g">
                            <img class="img-responsive" :src="form.files[m].image">
                        </div>
                        <div class="A54VNK-kh-e">
                            <div class="ellipsis-block A54VNK-kh-f bolder">{{ form.files[m].name }}</div>
                        </div>
                    </div>
                    <button @click="removeFile(m, file)" type="button" class="A54VNK-kh-c" title="Delete">×</button>
                </div>
            </div>

            <div class="A54VNK-Ri-b" style="position:relative">
                <div class="A54VNK-Ri-e">
                    <div class="picto-font A54VNK-Ri-d drap_mob_none"></div>
                    <div class="drap_mob_none"> Drag files to attach , or </div>
                    <label for="upload-photo" class="btn btn-link A54VNK-Ri-a" style="margin-bottom: 0;padding-top: 6px;padding-left: 0;padding-bottom: 0;text-transform: capitalize;">Browse files from your device</label>
                </div>
                <div class="text-muted A54VNK-Ri-c"> or </div>
                <label class="btn btn-default" style="margin-bottom: 0;text-transform: capitalize;font-weight: 400;">Browse uploaded files</label>
                <input @change="addFile" type="file" name="photo" class="fileUploadInput" id="upload-photo" multiple="multiple" />
            </div>
        </div>
    </div>
</template>


<script>
export default {
    props: ['set_files','old_files'],
    data: function(){
        return {
            form: new Form({
                "attachments": "",
                "files": [],
                "test": '',
            }),
        }
    },
    watch: {
        form: {
            handler: function(val,oldVal){
                this.set_files(this.form);
            },
            deep: true,
        },
        old_files: {
            handler: function(val,oldVal){
                if(this.old_files){
                    this.form.files = this.old_files;
                }
            },
            deep: true,
        }
    },
    methods: {
        addFile(e){
            let file = e.target.files;
            var i;
            for (i = 0; i < file.length; i++) {
                var file_name = file[i].name;
                let reader = new FileReader();
                reader.onloadend = (file) => {
                    this.form.files.push({
                        image: reader.result,
                        file: '',
                        name: file_name,
                    });
                }
                reader.readAsDataURL(file[i]);
            }
        },

        removeFile(m, file){
            if (m > -1) {
                this.form.files.splice(m, 1);
            }
        },
    }
}
</script>

<style scoped>
    .fileUploadInput{
        opacity: 0;
        position: absolute;
        /* z-index: -1; */
        top: 2px;
        left: 0;
        border: 1px solid red;
        height: 60px;
        width: 100%;
        cursor: pointer;
    }
</style>
