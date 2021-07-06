<template>
    <form @submit.prevent="createProductFamily">
        <div class="row" style="justify-content:center;">
            <div class="col-md-7">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" v-model="form.name" class="form-control">
                </div>
                <!-- <div class="form-group">
                    <label for="">Type</label>
                    <input type="text" v-model="form.type" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Unit Reference</label>
                    <input type="text" v-model="form.unit_reference" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Conversion Factor</label>
                    <input type="text" v-model="form.conversion_factor" class="form-control">
                </div> -->
            </div>
            <div class="col-md-7">
                <div class="form-group">
                    <button class="btn btn-default">Submit</button>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
export default {
    name: 'ProductFamily',

    data: function(){
        return {
            locations: false,
            form: new Form({
                "id" : "",
                "type" : "",
                "name" : "",
                "unit_reference" : "",
                "conversion_factor" : "",
                "creator" : "",
                "slug" : "",
                "status" : "",
                "created_at" : "",
                "updated_at" : ""
            })
        }
    },
    created: function(){
        this.listProductFamily();
    },
    methods: {
        listProductFamily: function(){
            axios.get('/api/productfamily').then(response => this.locations = response.data);
        },
        createProductFamily: function(){
            this.form.post('/api/productfamily').then(() => {
                this.form.reset();
                Toast.fire({
                    icon: 'success',
                    title: 'Created successfully'
                });
                // this.$router.replace({name: 'product_services_create'})
                $('.modal').modal('hide');
            }).catch(() => {
                Toast.fire({
                    icon: 'error',
                    title: 'Created error'
                });
            });
        },
        ProductFamilyEdit: function(location){
            this.$router.replace({ name: 'productfamily', params: { id: location.id }});
        },
        ProductFamilyDelete: function(id){
            Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        this.form.delete('/api/productfamily/' + id).then(() => {
                            Toast.fire({
                                icon: 'success',
                                title: 'Deleted successfully'
                            });
                            this.listCustomers();
                        }).catch(() => {
                            Toast.fire({
                                icon: 'error',
                                title: 'Something went wrong'
                            });
                        });
                    }
                })
        }
    }
}
</script>

<style>

</style>
