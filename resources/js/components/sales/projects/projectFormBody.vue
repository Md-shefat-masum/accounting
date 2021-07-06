<template>
    <div>
        <div class="row">
            <div class="col-md-1 hidden-xs A54VNK-Ae-g"></div>
            <div class="col-12 col-md-11">
                <div class="form-group row">
                    <div class="col-md-4 align-items-center d-flex justify-content-end tl">
                        <label>Name <span class="text-danger bold">*</span></label>
                    </div>
                    <div class="col-md-8">
                        <input v-model="form_data.name" class="form-control">
                        <div class="error-panel"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1 hidden-xs A54VNK-Ae-g"></div>
            <div class="col-12 col-md-11">
                <div class="form-group row">
                    <div class="col-md-4 align-items-center d-flex justify-content-end tl">
                        <label>Description</label>
                    </div>
                    <div class="col-md-8">
                        <textarea v-model="form_data.description" class="form-control" rows="3" style="resize: vertical; min-height: 50px;"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
</template>

<script>
    export default {
        props: ['set_form_data'],
        data: function(){
            return {
                form_data : {
                    name: '',
                    description: '',
                }
            }
        },
        updated: function(){
            this.set_form_data(this.form_data)
        }
    }
</script>

<style>

</style>

