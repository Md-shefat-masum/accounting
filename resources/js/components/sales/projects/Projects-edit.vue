<template>
    <!-- form section -->

    <form @submit.prevent="updateProject">
        <div class="A54VNK-g-d A54VNK-g-f" aria-hidden="true">
            <span class="">Field is Required</span>
            <a class="A54VNK-g-b" role="button"></a>
            <a class="A54VNK-g-c">×</a>
        </div>
        <div class="right-content form1">
            <div id="contentRootPanel" class="fullpage">
                <div class="page-panel page-right-content A54VNK-be-a">
                    <div class="panel-body page-panel-body">
                        <div class="container-fluid A54VNK-Ae-e">
                            <div class="A54VNK-Ae-c"></div>
                            <div class="row">
                                <div class="col-md-1 hidden-xs A54VNK-Ae-g"></div>
                                <div class="col-12 col-md-11">
                                    <div class="form-group row">
                                        <div class="col-md-4 align-items-center d-flex justify-content-end tl">
                                            <label>Name <span class="text-danger bold">*</span></label>
                                        </div>
                                        <div class="col-md-8">
                                            <input v-model="form.name" class="form-control">
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
                                            <textarea v-model="form.description" class="form-control" rows="3" style="resize: vertical; min-height: 50px;"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <!-- <a class="accordion-toggle collapsed A54VNK-ri-a" data-toggle="collapse" href="#gwt-uid-708">More</a>
                            <div class="panel-collapse collapse" id="gwt-uid-708">
                                <div class="A54VNK-Ae-b">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th style="min-width: 100px">First Name</th>
                                                                    <th style="min-width: 100px">Last Name</th>
                                                                    <th style="min-width: 100px">Phone</th>
                                                                    <th style="min-width: 100px">Email</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <div class="ellipsis">
                                                                            add.first_name
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="ellipsis">
                                                                            add.last_name
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="ellipsis">
                                                                            add.phone
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="ellipsis">
                                                                            add.email
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                            <tbody>
                                                                <tr>
                                                                    <td align="center" colspan="4">
                                                                        <div>
                                                                            <div style="width: 100%; height: 100%; padding: 0px; margin: 0px;">
                                                                                <div style="width: 100%; height: 100%;">
                                                                                    <div class="text-left">No items to show</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <button type="button" class="btn btn-default A54VNK-Ef-a" style="text-transform: capitalize;">
                                                        <i class="fas fa-search" style="font-size: 14px;" aria-hidden="true"></i> Add Customer Contact
                                                    </button>
                                                    <button type="button" class="btn btn-default A54VNK-Ef-a ml-2" style="text-transform: capitalize;">
                                                        <i class="fas fa-search" style="font-size: 14px;" aria-hidden="true"></i> Add Supplier Contact
                                                    </button>
                                                    <button type="button" class="btn btn-default A54VNK-Ef-a ml-2" style="text-transform: capitalize;">
                                                        <i class="picto-font" style="font-style: inherit;">-</i> Delete Contact
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <new-footer type="basic"/>
                </div>
            </div>
        </div>
    </form>

    <!-- form section -->
</template>

<script>
    import NewFooter from '../../../layouts/partials/new_footer'

    export default {
        components: {
            NewFooter,
        },
        name: 'Project',
        data: function () {
            return {
                loaded: false,
                form: new Form({
                    "id": "",
                    "name": "",
                    "description": "",
                    "customer": "",
                    "supplier": "",
                    "created_at": "",
                    "updated_at": "",
                })
            }
        },
        created: function () {
            this.getProject()
        },
        methods: {
            getProject: function (Project) {

                var that = this;
                this.form.get('/api/projects/' + this.$route.params.id).then(function (response) {
                    that.form.fill(response.data);
                    that.loaded = true;
                });

            },
            createProject: function() {
                this.form.post('/api/projects').then(() => {
                    this.form.reset();
                    Toast.fire({
                        icon: 'success',
                        title: 'Created successfully'
                    });
                    // this.$router.replace({name: 'customerLists'})
                }).catch(() => {
                    Toast.fire({
                        icon: 'error',
                        title: 'Created error'
                    });
                });
            },
            updateProject: function () {

                var that = this;
                this.form.put('/api/projects/' + this.$route.params.id).then(function (response) {
                    that.form.fill(response.data);
                    Toast.fire({
                        icon: 'success',
                        title: 'Updated successfully'
                    });
                }).catch(() => {
                    Toast.fire({
                        icon: 'error',
                        title: 'Updated error'
                    });
                });

            },
            deleteProject: function () {

                var that = this;
                this.form.delete('/api/projects/' + this.$route.params.id).then(function (response) {
                    that.form.fill(response.data);
                    that.$router.push('/super-admin/projects');
                })

            }
        }
    }
</script>
