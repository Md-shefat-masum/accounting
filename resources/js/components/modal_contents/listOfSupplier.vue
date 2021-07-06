<template>
    <section class="content content-menu m-0 mt-3">
        <div class="row clearfix">
            <div class="col-md-6">
                <input type="text" @keyup="listSuppliersearch" class="form-contorl" id="modal_customer_search" placeholder="Search custmer or lead">
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="table-responsive">
                    <table class="table table-hover modal_list_table" style="margin-bottom:30px;">
                        <thead>
                            <tr>
                                <th style="min-width: 125px;">Name</th>
                                <th style="min-width: 125px;">Address</th>
                                <th style="min-width: 125px;">Email</th>
                                <th style="min-width: 125px;">Phones</th>
                                <th class="text-center" style="min-width: 145px;">Customer Number</th>
                                <th class="text-center" style="min-width: 200px;">Notes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="supplier in suppliers.data" :key="supplier.id">
                                <td @click="supplierSelect(supplier)" style="cursor: pointer;">
                                    <div class="ellipsis" v-if="supplier.is_company == false">
                                        {{ supplier.first_name }} {{ supplier.last_name }}
                                    </div>
                                    <div class="ellipsis" v-if="supplier.is_company == true">
                                        {{ supplier.company_name }}
                                    </div>
                                </td>
                                <td @click="supplierSelect(supplier)" style="cursor: pointer;">
                                    <div class="ellipsis">
                                        {{ supplier.billing_address }}
                                        {{ supplier.line_2 }}
                                        {{ supplier.city }}
                                        {{ supplier.zip_code }}
                                        {{ supplier.country_name.name }}
                                    </div>
                                </td>
                                <td @click="supplierSelect(supplier)" style="cursor: pointer;">
                                    <div class="ellipsis">
                                        {{ supplier.email }}
                                    </div>
                                </td>
                                <td @click="supplierSelect(supplier)" style="cursor: pointer;">
                                    <div class="ellipsis">
                                        {{ supplier.phone }}
                                    </div>
                                </td>
                                <td class="text-center" @click="supplierSelect(supplier)" style="cursor: pointer;">
                                    <div class="ellipsis">
                                        {{ supplier.business_code }}
                                    </div>
                                </td>
                                <td class="text-center" @click="supplierSelect(supplier)" style="cursor: pointer;">
                                    <div class="ellipsis">
                                        {{ supplier.note }}
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <pagination :data="suppliers" @pagination-change-page="getResults"></pagination>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: 'Customer',
        props: ['getSupplierNameId','getSupplierRecipent'],
        data: function () {
            return {
                suppliers: {},
                form: new Form({
                    "id": "",
                    "is_company": true,
                    "company_name": "",
                    "first_name": "",
                    "last_name": "",
                    "middle_name": "",
                    "email": "",
                    "phone": "",
                    "website": "",
                    "vat_number": "",
                    "is_pickup_only_customer": true,
                    "billing_address": "",
                    "line_2": "",
                    "city": "",
                    "zip_code": "",
                    "country": "18",
                    "is_same_delivery": true,
                    "delivery_address": [{
                        address: '',

                    }],
                    "contacts": [{
                        single_contact: '',
                    }],
                    "payment_terms": "",
                    "price_family": "",
                    "currency": "18",
                    "business_code": "",
                    "opt_in_to_emails": true,
                    "assigned_to": "0",
                    "reference_account": "",
                    "date_as": new Date().toLocaleString(),
                    "note": "",
                    "files": [],
                    "created_at": "",
                    "updated_at": "",
                })
            }
        },
        created: function () {
            this.listSuppliers();
        },
        methods: {
            getResults(page = 1) {
                let that = this;
                let status = this.data_get_url_status;
                axios.get(`/api/suppliers-paginate`+'?page=' + page)
                    .then(response => {
                        this.suppliers = response.data;
                    });
            },

            listSuppliers: function () {
                axios.get('/api/suppliers-paginate').then(response => this.suppliers = response.data);
            },

            listSuppliersearch: function () {
                axios.get('/api/suppliers-paginate?user_name='+$('#modal_customer_search').val())
                    .then(response => this.suppliers = response.data);
            },

            supplierSelect: function(suppliers){
                let address =   `${suppliers.billing_address ? suppliers.billing_address+'\r' : ''}`+
                                `${suppliers.line_2 ? suppliers.line_2+'\r' : ''}`+
                                `${suppliers.city ? suppliers.city+', ' : ''}`+`${suppliers.state ? suppliers.state+', ' : ''}`+
                                `${suppliers.country_name.name} `;

                if(suppliers.is_company){
                    this.getSupplierNameId(suppliers.company_name,suppliers.id,address)
                }else{
                    this.getSupplierNameId(suppliers.first_name +' '+ suppliers.last_name,suppliers.id,address)
                }
                axios.get('/api/suppliers/'+suppliers.id)
                    .then((res)=>{
                        this.getSupplierRecipent(res.data.contacts);
                    })

                $('.modal').modal('hide');
            }
        }
    }
</script>

<style scoped>
    .modal{
        background-color: rgba(238,238,238,.41);
    }
</style>
