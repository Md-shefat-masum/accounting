<template>
    <!-- form section -->
    <form @submit.prevent="updateEmployee">
        <div class="right-content form1">
            <div id="contentRootPanel" class="fullpage">
                <div class="page-panel page-right-content A54VNK-be-a">
                    <div class="panel-body page-panel-body">
                        <div class="container-fluid A54VNK-Ae-e">
                            <div class="A54VNK-Ae-c"></div>
                            <div class="row">
                                <div class="col-md-2 hidden-xs A54VNK-Ae-g"></div>
                                <div class="col-12 col-md-10">
                                    <div class="form-group row">
                                        <div class="col-md-2 align-items-center d-flex justify-content-end tl">
                                            <label>Name <small style="color: red;padding-left: 4px;">*</small></label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" v-model="form.name" class="form-control" id="gwt-uid-1">
                                            <div v-if="form.errors.has('name')" class="required-text-inline" v-html="form.errors.get('name')"></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-2 align-items-center d-flex justify-content-end tl">
                                            <label>Job Title <small style="color: red;padding-left: 4px;">*</small></label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" v-model="form.job_title" class="form-control" id="gwt-uid-2">
                                            <div v-if="form.errors.has('job_title')" class="required-text-inline" v-html="form.errors.get('job_title')"></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-2 align-items-center d-flex justify-content-end tl">
                                            <label>Email Address</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" v-model="form.email" class="form-control" id="gwt-uid-3">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-2 align-items-center d-flex justify-content-end tl">
                                            <label>Phone Number</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" v-model="form.phone" class="form-control" id="gwt-uid-4">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-2 A54VNK-Ae-g"></div>
                                <div class="col-12 col-md-10">
                                    <div class="form-group row">
                                        <div class="col-md-2 align-items-center d-flex justify-content-end tl">
                                            <label>Active</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label v-on:click="form.active = true" class="btn btn-default" v-bind:class="{ active: form.active }" for='active1' style="text-transform: capitalize;">
                                                    <input type="radio" id="active1" v-model="form.active">Yes
                                                </label>
                                                <label v-on:click="form.active = false" class="btn btn-default" v-bind:class="{ active: !form.active }" for='active2' style="text-transform: capitalize;">
                                                    <input type="radio" id="active2" v-model="form.active">No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <a class="accordion-toggle collapsed A54VNK-ri-a" data-toggle="collapse" href="#gwt-uid-708">Advanced</a>
                            <div class="panel-collapse collapse" id="gwt-uid-708">
                                <div class="A54VNK-Ae-b">
                                    <div class="row">
                                        <div class="col-md-2 A54VNK-Ae-g"></div>
                                        <div class="col-12 col-md-10">
                                            <div class="form-group row">
                                                <div class="col-md-2 align-items-center d-flex justify-content-end tl">
                                                    <label>Service Bill</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" v-model="form.service_bill" class="form-control" id="gwt-uid-5">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-2 align-items-center d-flex justify-content-end tl">
                                                    <label>Date of Joining</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="date" v-model="form.date_of_joining" class="form-control form-component" id="gwt-uid-6" autocomplete="off" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-2 align-items-center d-flex justify-content-end tl">
                                                    <label>Date of Birth</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" v-model="form.date_of_birth" class="form-control form-component" id="gwt-uid-7">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-2 align-items-center d-flex justify-content-end tl">
                                                    <label>Father Name</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" v-model="form.father_name" class="form-control" id="gwt-uid-8">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-2 align-items-center d-flex justify-content-end tl">
                                                    <label>Mother Name</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" v-model="form.mother_name" class="form-control" id="gwt-uid-9">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-2 align-items-center d-flex justify-content-end tl">
                                                    <label>Address</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" v-model="form.address" class="form-control" id="gwt-uid-10">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-2 align-items-center d-flex justify-content-end tl"></div>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" id="gwt-uid-11">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-2 align-items-center d-flex justify-content-end tl">
                                                    <label>NID Number</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" v-model="form.nid_number" class="form-control" id="gwt-uid-12">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-2 A54VNK-Ae-g"></div>
                                        <div class="col-12 col-md-10">
                                            <div class="form-group row">
                                                <div class="col-md-2 align-items-center d-flex justify-content-end tl">
                                                    <label>Private Note</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <textarea class="form-control" v-model="form.private_note" rows="5" id="gwt-uid-13" style="resize: vertical; min-height: 50px;"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-1 A54VNK-Ae-g"></div>
                                        <div class="col-12 col-md-11">
                                            <div class="form-group row">
                                                <div class="col-md-3 align-items-center d-flex justify-content-end tl">
                                                    <label>Accounting Account</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" v-model="form.accounting_account" class="form-control" id="gwt-uid-14">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12 A54VNK-qi-c">
                                    <label><b>Attachments</b></label>
                                </div>
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

                                    <div class="A54VNK-Ri-b">
                                        <div class="A54VNK-Ri-e">
                                            <div class="picto-font A54VNK-Ri-d drap_mob_none"></div>
                                            <div class="drap_mob_none"> Drag files to attach , or </div>
                                            <label for="upload-photo" class="btn btn-link A54VNK-Ri-a" style="margin-bottom: 0;padding-top: 6px;padding-left: 0;padding-bottom: 0;text-transform: capitalize;">Browse files from your device</label>
                                        </div>
                                        <div class="text-muted A54VNK-Ri-c"> or </div>
                                        <label class="btn btn-default" for="upload-photo" style="margin-bottom: 0;text-transform: capitalize;font-weight: 400;">Browse uploaded files</label>
                                        <input @change="addFile" type="file" name="photo" id="upload-photo" multiple="multiple" style='opacity: 0;position: absolute;z-index: -1;' />
                                    </div>
                                </div>
                            </div>
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

        name: 'EditEmployee',
        data: function () {
            return {
                loaded: false,
                form: new Form({
                    "id": "",
                    "name": "",
                    "job_title": "",
                    "email": "",
                    "phone": "",
                    "active": true,
                    "service_bill": "",
                    "date_of_joining": "",
                    "date_of_birth": "",
                    "father_name": "",
                    "mother_name": "",
                    "address": "",
                    "nid_number": "",
                    "private_note": "",
                    "accounting_account": "",
                    "files": [],
                    "business_code": '',
                    "created_at": "",
                    "updated_at": "",
                })
            }
        },
        created: function () {
            this.getEmployeeSingle();
        },
        methods: {
            getEmployeeSingle: function (employee) {
                var that = this;
                this.form.get('/api/employees/' + this.$route.params.id).then(function (response) {
                    that.form.fill(response.data);
                });
            },
            updateEmployee: function () {
                this.form.put('/api/employees/'+this.form.id).then(() => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Update successfully'
                    });
                    this.$router.replace({ name: 'employeeLists'})
                }).catch(() => {
                    Toast.fire({
                        icon: 'error',
                        title: 'Error Created'
                    });
                });
            },
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
            }

        }
    }
</script>
