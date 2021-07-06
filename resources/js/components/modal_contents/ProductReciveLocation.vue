<template>
    <!-- <form @submit.prevent="createProductReciveLocation"> -->
        <div class="row" style="justify-content:center;">
            <div class="col-md-7">
                <div class="form-group">
                    <label for="">Location Name</label>
                    <input type="text" v-model="form.name" class="form-control">
                </div>
                <div class="form-group">
                    <button type="button" @click="createProductReciveLocation" class="btn btn-default">Submit</button>
                </div>
            </div>
        </div>
    <!-- </form> -->
</template>

<script>
export default {
    name: 'ProductReciveLocation',
    
    data: function(){
        return {
            locations: false,
            form: new Form({
                "id" : "",
                "name" : "",
                "creator" : "",
                "slug" : "",
                "created_at" : "",
                "updated_at" : ""
            })
        }
    },
    created: function(){
        this.listReciveLocation();
    },
    methods: {
        listReciveLocation: function(){
            axios.get('/api/productrecivelocation').then(response => this.locations = response.data);
        },
        createProductReciveLocation: function(){
            this.form.post('/api/productrecivelocation').then(() => {
                this.form.reset();
                Toast.fire({
                    icon: 'success',
                    title: 'Created successfully'
                });
                // this.$router.replace({name: 'product_services_create'})
                $('#addProductReciveModal').modal('hide');
                $('#addProductOrService').modal('show');
            }).catch(() => {
                Toast.fire({
                    icon: 'error',
                    title: 'Created error'
                });
            });
        },
        customersEdit: function(location){
            this.$router.replace({ name: 'editproductrecivelocation', params: { id: location.id }});
        },
        customerDelete: function(id){
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
                        this.form.delete('/api/productrecivelocation/' + id).then(() => {
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