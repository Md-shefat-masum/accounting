<template>
    <div>
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="form-group row">
                    <div class="col-md-3 align-items-center d-flex justify-content-end tl">
                        <label>Name <small style="color: red; padding-left: 4px;">*</small></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" style="padding-top:5px!important;" v-model="form.name" class="form-control" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3 align-items-center d-flex justify-content-end tl">
                        <label>Description</label>
                    </div>
                    <div class="col-md-9">
                        <textarea type="text" style="min-height: 85px;" v-model="form.description" class="form-control"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="btn-toolbar d-flex justify-content-end">
                            <button type="button" @click="create()" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</template>

<script>
export default {
    props: ['reset_data'],
    data: function(){
        return {
            form: new Form({
                "name" : '',
                "description" : '',
            }),
        }
    },
    methods: {
        create: function(){
            // console.log(this.form);
            this.form.post('/api/payment-processor')
                .then((res)=>{
                    this.form.reset();
                    this.reset_data(res.data);
                })
        }
    }
}
</script>

<style>

</style>
