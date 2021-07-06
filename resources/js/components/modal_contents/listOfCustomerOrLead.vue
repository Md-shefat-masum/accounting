<template>
    <section class="content content-menu m-0 mt-3">
        <div class="row clearfix">
            <div class="col-md-6">
                <input type="text" @keyup="listCustomerSearch" class="form-contorl" id="modal_customer_search" placeholder="Search custmer or lead">
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
                            <tr v-for="customer in customers.data" :key="customer.id">
                                <td @click="customerSelect(customer)" style="cursor: pointer;">
                                    <div class="ellipsis" v-if="customer.is_company == false">
                                        {{ customer.first_name }} {{ customer.last_name }}
                                    </div>
                                    <div class="ellipsis" v-if="customer.is_company == true">
                                        {{ customer.company_name }}
                                    </div>
                                </td>
                                <td @click="customerSelect(customer)" style="cursor: pointer;">
                                    <div class="ellipsis">
                                        {{ customer.billing_address }}
                                        {{ customer.line_2 }}
                                        {{ customer.city }}
                                        {{ customer.zip_code }}
                                        {{ customer.country_name.name }}
                                    </div>
                                </td>
                                <td @click="customerSelect(customer)" style="cursor: pointer;">
                                    <div class="ellipsis">
                                        {{ customer.email }}
                                    </div>
                                </td>
                                <td @click="customerSelect(customer)" style="cursor: pointer;">
                                    <div class="ellipsis">
                                        {{ customer.phone }}
                                    </div>
                                </td>
                                <td class="text-center" @click="customerSelect(customer)" style="cursor: pointer;">
                                    <div class="ellipsis">
                                        {{ customer.business_code }}
                                    </div>
                                </td>
                                <td class="text-center" @click="customerSelect(customer)" style="cursor: pointer;">
                                    <div class="ellipsis">
                                        {{ customer.note }}
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <pagination :data="customers" @pagination-change-page="getResults"></pagination>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: 'Customer',
        props: ['getCustomerNameId','getCustomerRecipent','set_customer_name'],
        data: function () {
            return {
                customers: {},
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
            this.listCustomers();
        },
        methods: {
            getResults(page = 1) {
                let that = this;
                let status = this.data_get_url_status;
                axios.get(`/api/customers-paginate`+'?page=' + page)
                    .then(response => {
                        this.customers = response.data;
                    });
            },

            listCustomers: function () {
                axios.get('/api/customers-paginate').then(response => this.customers = response.data);
            },

            listCustomerSearch: function () {
                axios.get('/api/customers-paginate?user_name='+$('#modal_customer_search').val())
                    .then(response => this.customers = response.data);
            },

            customerSelect: function(customer){
                let address = '';
                customer.billing_address ? address += customer.billing_address + ' - ' : '';
                customer.line_2 ? address += customer.line_2 + '\r' : '';
                customer.city ? address += customer.city + ' ' : '';
                customer.zip_code ? address += customer.zip_code + '\r' : '';
                customer.state ? address += customer.state + '\r' : '';
                customer.country_name ? address += customer.country_name.name + '' : '';

                if(customer.is_company){
                    this.getCustomerNameId(customer.company_name,customer.id,address,customer);
                    this.set_customer_name(customer.company_name);
                }else{
                    // console.log(customer);
                    this.getCustomerNameId(customer.first_name +' '+ customer.last_name,customer.id,address,customer)
                    this.set_customer_name(customer.first_name +' '+ customer.last_name);
                }
                axios.get('/api/customers/'+customer.id)
                    .then((res)=>{
                        this.getCustomerRecipent(res.data.contacts);
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
