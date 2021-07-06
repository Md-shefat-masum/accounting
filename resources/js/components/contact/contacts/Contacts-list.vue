<template>
    <div>
        <sub-header type="basic"/>
        <!-- full table -->
        <section class="content content-menu">
            <div class="container-fluid">

                <!-- breadcumbs -->

                <div class="block-header">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <ul class="breadcrumb breadcrumb-style d-inline-block mb-0">
                                <li class="breadcrumb-item">
                                    <h4 style="border: 0;" class="page-title">Contacts</h4>
                                </li>
                            </ul>
                            <ul class="d-inline-block mb-0" style="float: right;padding: .75rem 1rem;">
                                <li style="float: left;">
                                    <router-link to="/contact/contact/create" class="btn btn-default m-0 mr-2 mb-2 mb-lg-0 mobile_d_none">New Contacts</router-link>
                                    <router-link to="/contact/contact/create" class="btn btn-default m-0 mr-2 mb-2 mb-lg-0 mobile_d_block">
                                        <i class="fas fa-plus"></i></router-link>
                                </li>
                                <li class="mobile_d_search_block" style="float: left;">
                                    <a class="btn btn-white nav-link m-0 mr-2">
                                        <i class="fas fa-search" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li style="float: left;">
                                    <a class="btn btn-white new_dot nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </a>
                                    <div class="dropdown-menu new_dropdown" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item">Export Contacts Lines</a>
                                        <a class="dropdown-item">Export Contacts Details</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- breadcumbs -->

                <!-- filter -->

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  mobile_d_search_none">
                        <div class="card filter" style="margin-bottom: 13px;">
                            <div class="body">
                                <!-- Filter Panel -->
                                <div class="row">
                                    <div class="col-md-12 mb-0 d-flex align-content-center flex-wrap">
                                        <div class="setting_li_search">
                                            <i class="fas fa-search"></i>
                                            <input type="text" placeholder="Search in Contacts">
                                        </div>
                                    </div>
                                </div>
                                <!-- Filter Panel -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mobile_d_search_block">
                        <div class="card filter" style="margin-bottom: 13px;">
                            <div class="body">
                                <!-- Filter Panel -->
                                <div class="row">
                                    <div class="col-md-12 mb-0 d-flex align-content-center flex-wrap">
                                        <div class="setting_li_search">
                                            <i class="fas fa-search"></i>
                                            <input type="text" placeholder="Search in Contacts">
                                        </div>
                                    </div>
                                </div>
                                <!-- Filter Panel -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- filter -->

                <!-- table -->

                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;padding: 5px;">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <label>
                                                        <input type="checkbox" class="filled-in">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </th>
                                        <th style="min-width: 125px;">Name</th>
                                        <th style="min-width: 125px;">Job title</th>
                                        <th style="min-width: 125px;">Company</th>
                                        <th style="min-width: 125px;">Phones</th>
                                        <th style="min-width: 125px;">Email</th>
                                        <th class="text-center" style="width: 70px;min-width: 70px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="contact in contacts">
                                        <td style="padding: 5px 5px 4px;">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <label>
                                                        <input type="checkbox" class="filled-in">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                        <td @click="contactsEdit(contact)" style="cursor: pointer;">
                                            <div class="ellipsis">
                                                {{ contact.first_name }} {{ contact.last_name }}
                                            </div>
                                        </td>
                                        <td @click="contactsEdit(contact)" style="cursor: pointer;">
                                            <div class="ellipsis">
                                                {{ contact.position }}
                                            </div>
                                        </td>
                                        <td @click="contactsEdit(contact)" style="cursor: pointer;">
                                            <div class="ellipsis">
                                                {{ contact.company_name }}
                                            </div>
                                        </td>
                                        <td @click="contactsEdit(contact)" style="cursor: pointer;">
                                            <div class="ellipsis">
                                                {{ contact.phone }}
                                            </div>
                                        </td>
                                        <td @click="contactsEdit(contact)" style="cursor: pointer;">
                                            <div class="ellipsis">
                                                {{ contact.email }}
                                            </div>
                                        </td>
                                        <td class="action" style="text-align:right;padding-top: 6px;padding-bottom: 6px;">
                                            <div class="dropdown dropdown2 d-inline-block">
                                                <div class="btn-group btn-group2 dropleft text-center">
                                                    <a href="#" onclick="return false;" class="btn btn-white dropdown-toggle btn2 btn-white2 dropdown-toggle2" data-toggle="dropdown" role="button" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu2">
                                                        <a class="dropdown-item text-danger waves-effect waves-light" @click="deleteContact(contact.id)">Delete</a>
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
                <!-- table -->

            </div>
        </section>

        <!-- full table -->
    </div>
</template>


<script>

    import SubHeader from "../sub_header";

    export default {
        components: {
            SubHeader,
        },
        name: 'Contact',

        data: function () {
            return {
                contacts: false,
                form: new Form({
                    "id": "",
                    "first_name": "",
                    "last_name": "",
                    "company_name": "",
                    "position": "",
                    "worked_email": "",
                    "another_email": "",
                    "worked_phone": "",
                    "cell_phone": "",
                    "address": "",
                    "line_2": "",
                    "city": "",
                    "zip_code": "",
                    "country": "",
                    "note": "",
                    "created_at": "",
                    "updated_at": "",
                })
            }
        },
        created: function () {
            this.listContacts();
        },
        methods: {
            listContacts: function () {
                axios.get('/api/contacts').then(response => this.contacts = response.data);
            },
            contactsEdit(contact){
                this.$router.replace({ name: 'editContacts', params: { id: contact.id }});
            },
            deleteContact: function (id) {
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
                        this.form.delete('/api/contacts/' + id).then(() => {
                            Toast.fire({
                                icon: 'success',
                                title: 'Deleted successfully'
                            });
                            this.listContacts();
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
