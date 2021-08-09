<template>
    <!-- form section -->
    <div>
        <sub-header></sub-header>

        <section class="content content-menu">
            <div class="container-fluid">
                <!-- breadcumbs -->

                <div class="block-header">
                    <div class="row">
                        <div class="col-md-8 offset-2">
                            <div class="card" style="margin-bottom: 13px; padding-top: 30px;">
                                <div class="body">
                                    <div class="row">
                                        <div class="col-12 text-right pb-3">
                                            <button class="btn btn-secondary" v-if="show_type == 'list'" @click="change_type('create')">Create</button>
                                            <button class="btn btn-secondary" v-else @click="change_type('list')">All</button>
                                        </div>
                                    </div>

                                    <div class="row" v-if="show_type == 'list'">
                                        <div class="col-12">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>Tax Name</th>
                                                        <th>Abbreviation</th>
                                                        <th>Tax Rate</th>
                                                        <th>
                                                            Action
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="vat in get_tax_and_vat" :key="vat.id">
                                                        <td>{{ vat.tax_name }}</td>
                                                        <td>{{ vat.abbreviation }}</td>
                                                        <td>{{ vat.tax_rate }}</td>
                                                        <td>
                                                            <div class="dropdown d-inline-block">
                                                                <div class="btn-group dropleft text-center">
                                                                    <a href="#" onclick="return false;" data-toggle="dropdown" role="button" aria-expanded="false" class="btn btn-white dropdown-toggle">
                                                                        <i aria-hidden="true" class="fa fa-ellipsis-v"></i>
                                                                    </a>
                                                                    <div class="dropdown-menu">
                                                                        <!-- <a class="dropdown-item text-danger waves-effect waves-light">Show</a> -->
                                                                        <a @click.prevent="edit_vat(vat)" class="dropdown-item text-danger waves-effect waves-light">Edit</a>
                                                                        <a @click.prevent="delete_vat(vat.id)" class="dropdown-item text-danger waves-effect waves-light">Delete</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="row" v-else>
                                        <div class="col-sm-4 offset-1">
                                            <h4>
                                                <div class="">Vat and Tax</div>
                                            </h4>
                                        </div>
                                        <div class="col-12">
                                            <form id="tax_form" @submit.prevent="form_submit">
                                                <div class="form-group SimpleTextQuestion row">
                                                    <div class="col-sm-4 col-xs-4 control-label text-right d-flex align-items-center justify-content-end">
                                                        <label class="m-0" for="gwt-uid-137" style="font-weight: normal;">Tax Name</label>
                                                        <span class="text-danger bold">*</span>
                                                    </div>
                                                    <div class="col-sm-8 col-xs-8">
                                                        <input type="text" name="tax_name" v-model="form.tax_name" class="form-control"/>
                                                    </div>
                                                </div>
                                                <div class="form-group SimpleTextQuestion row">
                                                    <div class="col-sm-4 col-xs-4 control-label text-right d-flex align-items-center justify-content-end">
                                                        <label class="m-0" for="gwt-uid-137" style="font-weight: normal;">Abbreviation</label>
                                                        <span class="text-danger bold">*</span>
                                                    </div>
                                                    <div class="col-sm-8 col-xs-8">
                                                        <input type="text" name="abbreviation" v-model="form.abbreviation" class="form-control"  />
                                                    </div>
                                                </div>
                                                <div class="form-group SimpleTextQuestion row">
                                                    <div class="col-sm-4 col-xs-4 control-label text-right d-flex align-items-center justify-content-end">
                                                        <label class="m-0" for="gwt-uid-137" style="font-weight: normal;">Tax rate (%)</label>
                                                        <span class="text-danger bold">*</span>
                                                    </div>
                                                    <div class="col-sm-8 col-xs-8">
                                                        <input type="text" name="tax_rate" v-model="form.tax_rate" class="form-control"  />
                                                    </div>
                                                </div>
                                                <div class="form-group SimpleTextQuestion row">
                                                    <div class="col-sm-4 col-xs-4 control-label text-right d-flex align-items-center justify-content-end">
                                                        <label class="m-0" for="gwt-uid-137" style="font-weight: normal;">Description</label>
                                                    </div>
                                                    <div class="col-sm-8 col-xs-8">
                                                        <input type="text" name="description" v-model="form.description" class="form-control"  />
                                                    </div>
                                                </div>
                                                <div class="form-group SimpleTextQuestion row">
                                                    <div class="col-sm-4 col-xs-4 control-label text-right d-flex align-items-center justify-content-end">
                                                        <label class="m-0" for="gwt-uid-137" style="font-weight: normal;">Your tax number</label>
                                                    </div>
                                                    <div class="col-sm-8 col-xs-8">
                                                        <input type="text" name="your_tax_number" v-model="form.your_tax_number" style="position:unset;opacity: 1;pointer-events: unset;" />
                                                    </div>
                                                </div>
                                                <div class="form-group  row">
                                                    <div class="col-sm-4 col-xs-4 control-label text-right d-flex align-items-center justify-content-end">
                                                        <label class="m-0" for="gwt-uid-137" style="font-weight: normal;">Show tax number on invoices</label>
                                                    </div>
                                                    <div class="col-sm-8 col-xs-8">
                                                        <input type="checkbox" name="show_tax_number_on_invoice" v-if="form.show_tax_number_on_invoice" v-model="form.show_tax_number_on_invoice" :value="1" checked  style="position: unset;opacity: 1;pointer-events: unset;"/>
                                                        <input type="checkbox" name="show_tax_number_on_invoice" v-else :value="0" v-model="form.show_tax_number_on_invoice"  style="position: unset;opacity: 1;pointer-events: unset;"/>
                                                    </div>
                                                </div>
                                                <div class="form-group SimpleTextQuestion row">
                                                    <div class="col-sm-4 col-xs-4 control-label text-right d-flex align-items-center justify-content-end">
                                                        <label class="m-0" for="gwt-uid-137" style="font-weight: normal;">Is this tax recoverable?</label>
                                                    </div>
                                                    <div class="col-sm-8 col-xs-8">
                                                        <input type="checkbox" name="is_this_tax_recoverable" v-if="form.is_this_tax_recoverable" v-model="form.is_this_tax_recoverable" :value="1" checked style="position: unset;opacity: 1;pointer-events: unset;" />
                                                        <input type="checkbox" name="is_this_tax_recoverable" v-else :value="0" v-model="form.is_this_tax_recoverable" style="position: unset;opacity: 1;pointer-events: unset;" />
                                                    </div>
                                                </div>
                                                <div class="form-group SimpleTextQuestion row">
                                                    <div class="col-sm-4 col-xs-4 control-label text-right d-flex  justify-content-end">
                                                        <label class="m-0" for="gwt-uid-137" style="font-weight: normal;">Is this a compound tax?</label>
                                                    </div>
                                                    <div class="col-sm-8 col-xs-8">
                                                        <input type="checkbox" name="is_compound" v-if="form.is_compound" :value="1" v-model="form.is_compound" checked style="position: unset;opacity: 1;pointer-events: unset;" />
                                                        <input type="checkbox" name="is_compound" v-else v-model="form.is_compound" :value="0" style="position: unset;opacity: 1;pointer-events: unset;" />
                                                        <i style="display: block;">Select if this tax is a compound tax.</i>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12 text-center">
                                                        <button class="btn btn-primary my-5">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</template>
<script>
import { mapActions, mapGetters } from 'vuex';
    import SubHeader from './sub_header'

    export default {
        components: {
            SubHeader,
        },

        name: 'Tax-and-vat',

        data: function () {
            return {
                form: {
                    tax_name: '',
                    abbreviation: '',
                    tax_rate: '',
                    description: '',
                    your_tax_number: '',
                    show_tax_number_on_invoice: false,
                    is_this_tax_recoverable: false,
                    is_compound: false,
                },
                show_type: 'list',
                selected_vat: {},
            }
        },
        created: function () {
            this.fetch_tax_and_vat();
        },
        methods: {
            ...mapActions(['fetch_tax_and_vat']),

            form_submit: function(){
                let form = new FormData($('#tax_form')[0]);
                form.append('show_tax_number_on_invoice',this.form.show_tax_number_on_invoice?1:0);
                form.append('is_this_tax_recoverable',this.form.is_this_tax_recoverable?1:0);
                form.append('is_compound',this.form.is_compound?1:0);

                if(this.show_type == 'create'){
                    axios.post('/api/vat-and-tax',form)
                        .then((res)=>{
                            this.fetch_tax_and_vat();
                            this.show_type = 'list';
                        })
                }

                if(this.show_type == 'edit'){
                    form.append('id',this.form.id);
                    axios.post('/api/vat-and-tax-update',form)
                        .then((res)=>{
                            this.fetch_tax_and_vat();
                            this.show_type = 'list';
                        })
                }

            },

            edit_vat: function(vat){
                // this.selected_vat = vat;
                this.form = vat;
                this.show_type = 'edit';
            },

            delete_vat: function(id){
                if(confirm('sure want to delete')){
                    axios.post('/api/vat-and-tax-delete',{id:id})
                        .then((res)=>{
                            this.fetch_tax_and_vat();
                        })
                }
            },

            change_type: function(type){
                this.show_type = type;
                if(type == 'create'){
                    this.form = {
                        tax_name: '',
                        abbreviation: '',
                        tax_rate: '',
                        description: '',
                        your_tax_number: '',
                        show_tax_number_on_invoice: false,
                        is_this_tax_recoverable: false,
                        is_compound: false,
                    }
                }
            }

        },
        computed: {
            ...mapGetters(['get_tax_and_vat']),
        }
    }
</script>

<style scoped>
    section.content.content-menu a.btn.new_dot i,
    section.content.content-menu a.btn i,
    section.content.content-menu a.btn{
        line-height: 26px;
    }
</style>

