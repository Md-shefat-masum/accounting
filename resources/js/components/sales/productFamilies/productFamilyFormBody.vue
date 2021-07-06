<template>
    <div class="panel-body page-panel-body">
        <div class="form-horizontal">
            <div class="form-group SimpleTextQuestion row" data-id="v192168000015_1097766545265_2034">
                <div class="col-sm-4 col-xs-4 control-label">
                    <label class="" for="gwt-uid-1655" style="font-weight: normal;">Name</label>
                    <span class="text-danger bold">*</span>
                </div>
                <div class="col-sm-8 col-xs-8">
                    <input type="text" v-model="form_data.name" class="form-control" id="gwt-uid-1655" />
                </div>
            </div>

        </div>
        <hr />
    </div>
</template>

<script>
    export default {
        props: ['set_form_data'],
        data: function(){
            return {
                form_data : {
                    name: '',
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

