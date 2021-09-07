<template>
    <div>
        <div class="dropdown">
            <!-- <a class="A54VNK-pi-a" style="">
                <span class="picto-font">D</span>
            </a> -->
            <input  type="text"
                    class="form-control A54VNK-pi-d"
                    data-toggle="dropdown" autocomplete="off"
                    role="button" placeholder="Customer name or code"
                    v-model="customer_name"
                    name="customer"
                    readonly
                    aria-expanded="true" />
            <ul class="dropdown-menu A54VNK-pi-c">
                <li class="active">
                    <a class="ellipsis-block list_customer_button"
                        @click="customerListRender()" role="button" data-toggle="modal" data-target="#listOfCustomerOrLeadModal">
                        View all Leads and Customers
                    </a>
                </li>
                <li class="">
                    <a class="ellipsis-block" role="button" data-toggle="modal" data-target="#addCustomerOrLeadModal">Create a Lead or Customer</a>
                </li>
            </ul>
        </div>

        <!-- addCustomerOrLeadModal Modal -->
        <div class="modal fade" id="addCustomerOrLeadModal" tabindex="-1" aria-labelledby="addCustomerOrLeadModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCustomerOrLeadModalLabel">New Lead or Customer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <AddCustomerOrLead :customerListRender="customerListRender"></AddCustomerOrLead>
                    </div>
                </div>
            </div>
        </div>

        <!-- listOfCustomerOrLeadModal Modal -->
        <div class="modal fade" id="listOfCustomerOrLeadModal" tabindex="-1" aria-labelledby="listOfCustomerOrLeadModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="listOfCustomerOrLeadModalLabel">Customers List</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <list-of-customer-or-lead
                            :key="customer_list_random_number"
                            :set_customer_name="set_customer_name"
                            :getCustomerRecipent="getCustomerRecipent"
                            :getCustomerNameId="getCustomerNameId"></list-of-customer-or-lead>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import AddCustomerOrLead from '../../modal_contents/add_customer_or_lead.vue';
    import ListOfCustomerOrLead from '../../modal_contents/listOfCustomerOrLead.vue';

    export default {
        props: ['getCustomerRecipent','getCustomerNameId','old_customer_name'],
        components:{
            ListOfCustomerOrLead,
            AddCustomerOrLead,
        },
        created: function(){
            this.$watch('old_customer_name',(newValue,oldValue)=>{
                this.customer_name = this.old_customer_name;
            })
        },
        data: function(){
            return {
                customer_list_random_number: 0,
                customer_name: '',
            }
        },
        methods: {
            customerListRender: function(){
                this.customer_list_random_number++;
            },
            set_customer_name: function(customer_name){
                this.customer_name = customer_name;
            }
        }
    };
</script>

<style></style>
