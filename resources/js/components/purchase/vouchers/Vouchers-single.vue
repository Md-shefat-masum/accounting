<template>
    <div class="content-wrapper" style="min-height: 946px;">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <h1>Update Voucher</h1>

                        <form @submit.prevent="updateVoucher" v-if="loaded">

                            <router-link to="/super-admin/vouchers">< Back to vouchers</router-link>

                                                            <div class="form-group">
                                                                            <input type="hidden" v-model="form.id"></input>
                                                                    </div>
                                                            <div class="form-group">
                                                                            <label>title</label>
                                        <input type="text" v-model="form.title"  maxlength="255" ></input>
                                                                                                            </div>
                                                            <div class="form-group">
                                                                            <input type="hidden" v-model="form.created_at"></input>
                                                                    </div>
                                                            <div class="form-group">
                                                                            <input type="hidden" v-model="form.updated_at"></input>
                                                                    </div>
                            
                            <div class="form-group">
                                <button class="button" type="submit" :disabled="form.busy" name="button">{{ (form.busy) ? 'Please wait...' : 'Update'}}</button>
                                <button @click.prevent="deleteVoucher">{{ (form.busy) ? 'Please wait...' : 'Delete'}}</button>
                            </div>
                        </form>

                        <span v-else>Loading voucher...</span>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    import NewFooter from '../../../layouts/partials/new_footer'

    export default {
        components: {
            NewFooter,
        },
        name: 'Voucher',
        data: function(){
            return {
                loaded: false,
                form: new Form({
                                        "id" : "",
                                        "title" : "",
                                        "created_at" : "",
                                        "updated_at" : "",
                                    })
            }
        },
        created: function(){
            this.getVoucher();
        },
        methods: {
            getVoucher: function(Voucher){

                var that = this;
                this.form.get('/api/vouchers/'+this.$route.params.id).then(function(response){
                    that.form.fill(response.data);
                    that.loaded = true;
                });

            },
            updateVoucher: function(){

                var that = this;
                this.form.put('/api/vouchers/'+this.$route.params.id).then(function(response){
                    that.form.fill(response.data);
                })

            },
            deleteVoucher: function(){

                var that = this;
                this.form.delete('/api/vouchers/'+this.$route.params.id).then(function(response){
                    that.form.fill(response.data);
                    that.$router.push('/super-admin/vouchers');
                })

            }
        }
    }
</script>
