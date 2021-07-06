<template>
    <div>
        <sub-header></sub-header>
        <!-- submenu -->
        <!-- full table -->
        <section class="content content-menu">
            <div class="container-fluid">

                <!-- breadcumbs -->

                <div class="block-header">
                    <div class="row">
                        <div class="col-md-8 offset-2">
                            <div class="card" style="margin-bottom: 13px; padding-top: 30px;">
                                <div class="body">
                                    <div class="A54VNK-Mc-e">
                                        <div>
                                            <div class="col-6">
                                                <div class="row A54VNK-uc-a">
                                                    <div class="col-6"><span class="control-label">Pickup-only customer</span></div>
                                                    <div class="col-6 text-right">
                                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                            <label v-on:click="form.is_pickup_only_customer = true" class="btn btn-default" v-bind:class="{ active: form.is_pickup_only_customer }" for='option1' style="text-transform: capitalize;">
                                                                <input type="radio" id="option1" value="true" v-model="form.is_pickup_only_customer">Yes
                                                            </label>
                                                            <label v-on:click="form.is_pickup_only_customer = false" class="btn btn-default" v-bind:class="{ active: !form.is_pickup_only_customer }" for='option2' style="text-transform: capitalize;">
                                                                <input type="radio" id="option2" value="false" v-model="form.is_pickup_only_customer">No
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-horizontal A54VNK-Ld-a"><label
                                                class="control-label col-sm-3 col-xs-12"> Notifications </label>
                                                <div class="col-sm-9 col-xs-12">
                                                    <div class="btn-group A54VNK-Cc-c switch-button" aria-atomic="true"
                                                         tabindex="0"><a class="btn active btn-primary" href="#"
                                                                         aria-pressed="true" role="button">On</a> <a
                                                        class="btn btn-default" href="#" aria-pressed="false"
                                                        role="button">Off</a></div>
                                                    <p class="help-block"> Enable and disable all email notifications
                                                        for this user account. <span
                                                            class="bold">sohangood12@gmail.com</span></p>
                                                    <div class="alert alert-info"><span
                                                        class="gwt-InlineLabel">OneUp</span> automatically sends you
                                                        notifications when due dates or expiration dates are
                                                        approaching. Here you can turn notifications on and off and set
                                                        when you will be reminded.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="A54VNK-pe-c">
                                                <div class="form-horizontal no-margin-bottom"><label
                                                    class="control-label col-sm-3 col-xs-12">Opportunity</label>
                                                    <div class="col-sm-9 col-xs-12">
                                                        <div>
                                                            <div class="A54VNK-pe-b A54VNK-pe-d">
                                                                <div class="btn-group A54VNK-Cc-c switch-button"
                                                                     aria-atomic="true" tabindex="0"><a
                                                                    class="btn active btn-primary" href="#"
                                                                    aria-pressed="true" role="button">On</a> <a
                                                                    class="btn btn-default" href="#"
                                                                    aria-pressed="false" role="button">Off</a></div>
                                                            </div>
                                                            <span style="display: inline-block;"> <div
                                                                class="A54VNK-pe-b"> <span> Send </span> </div> <div
                                                                class="A54VNK-pe-b" style="width: 50px;"> <input
                                                                type="text" class="form-control text-center"> </div> <div
                                                                class="A54VNK-pe-b"> <div class="select-panel"> <select
                                                                class="form-control"><option value="days">days</option><option
                                                                value="weeks">weeks</option></select> </div> </div> <div
                                                                class="A54VNK-pe-b"> <div class="select-panel"> <select
                                                                class="form-control"><option
                                                                value="before">before</option><option value="after">after</option></select> </div> </div> <div
                                                                class="A54VNK-pe-b"> <span
                                                                class="">the expiration date.</span> </div> </span>
                                                        </div>
                                                        <div class="text-danger A54VNK-pe-a" style="display: none;">
                                                            Delay for the notification must be a number between 0 and
                                                            999.
                                                        </div>
                                                        <p class="help-block">Notify me by email when an opportunity is
                                                            expiring.</p></div>
                                                </div>
                                            </div>
                                            <div class="A54VNK-pe-c">
                                                <div class="form-horizontal no-margin-bottom"><label
                                                    class="control-label col-sm-3 col-xs-12">Task</label>
                                                    <div class="col-sm-9 col-xs-12">
                                                        <div>
                                                            <div class="A54VNK-pe-b A54VNK-pe-d">
                                                                <div class="btn-group A54VNK-Cc-c switch-button"
                                                                     aria-atomic="true" tabindex="0"><a
                                                                    class="btn active btn-primary" href="#"
                                                                    aria-pressed="true" role="button">On</a> <a
                                                                    class="btn btn-default" href="#"
                                                                    aria-pressed="false" role="button">Off</a></div>
                                                            </div>
                                                            <span style="display: inline-block;"> <div
                                                                class="A54VNK-pe-b"> <span> Send </span> </div> <div
                                                                class="A54VNK-pe-b" style="width: 50px;"> <input
                                                                type="text" class="form-control text-center"> </div> <div
                                                                class="A54VNK-pe-b"> <div class="select-panel"> <select
                                                                class="form-control"><option value="days">days</option><option
                                                                value="weeks">weeks</option></select> </div> </div> <div
                                                                class="A54VNK-pe-b"> <div class="select-panel"> <select
                                                                class="form-control"><option
                                                                value="before">before</option><option value="after">after</option></select> </div> </div> <div
                                                                class="A54VNK-pe-b"> <span class="">the due date.</span> </div> </span>
                                                        </div>
                                                        <div class="text-danger A54VNK-pe-a" style="display: none;">
                                                            Delay for the notification must be a number between 0 and
                                                            999.
                                                        </div>
                                                        <p class="help-block">Notify me by email when a task is due.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="A54VNK-pe-c">
                                                <div class="form-horizontal no-margin-bottom"><label
                                                    class="control-label col-sm-3 col-xs-12">Call</label>
                                                    <div class="col-sm-9 col-xs-12">
                                                        <div>
                                                            <div class="A54VNK-pe-b A54VNK-pe-d">
                                                                <div class="btn-group A54VNK-Cc-c switch-button"
                                                                     aria-atomic="true" tabindex="0"><a
                                                                    class="btn active btn-primary" href="#"
                                                                    aria-pressed="true" role="button">On</a> <a
                                                                    class="btn btn-default" href="#"
                                                                    aria-pressed="false" role="button">Off</a></div>
                                                            </div>
                                                            <span style="display: inline-block;"> <div
                                                                class="A54VNK-pe-b"> <span> Send </span> </div> <div
                                                                class="A54VNK-pe-b" style="width: 50px;"> <input
                                                                type="text" class="form-control text-center"> </div> <div
                                                                class="A54VNK-pe-b"> <div class="select-panel"> <select
                                                                class="form-control"><option value="days">days</option><option
                                                                value="weeks">weeks</option></select> </div> </div> <div
                                                                class="A54VNK-pe-b"> <div class="select-panel"> <select
                                                                class="form-control"><option
                                                                value="before">before</option><option value="after">after</option></select> </div> </div> <div
                                                                class="A54VNK-pe-b"> <span class="">the due date.</span> </div> </span>
                                                        </div>
                                                        <div class="text-danger A54VNK-pe-a" style="display: none;">
                                                            Delay for the notification must be a number between 0 and
                                                            999.
                                                        </div>
                                                        <p class="help-block">Notify me by email when a call is due.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="A54VNK-pe-c">
                                                <div class="form-horizontal no-margin-bottom"><label
                                                    class="control-label col-sm-3 col-xs-12">Customer Invoice
                                                    Payment</label>
                                                    <div class="col-sm-9 col-xs-12">
                                                        <div>
                                                            <div class="A54VNK-pe-b A54VNK-pe-d">
                                                                <div class="btn-group A54VNK-Cc-c switch-button"
                                                                     aria-atomic="true" tabindex="0"><a
                                                                    class="btn active btn-primary" href="#"
                                                                    aria-pressed="true" role="button">On</a> <a
                                                                    class="btn btn-default" href="#"
                                                                    aria-pressed="false" role="button">Off</a></div>
                                                            </div>
                                                            <span style="display: inline-block;"> <div
                                                                class="A54VNK-pe-b"> <span> Send </span> </div> <div
                                                                class="A54VNK-pe-b" style="width: 50px;"> <input
                                                                type="text" class="form-control text-center"> </div> <div
                                                                class="A54VNK-pe-b"> <div class="select-panel"> <select
                                                                class="form-control"><option value="days">days</option><option
                                                                value="weeks">weeks</option></select> </div> </div> <div
                                                                class="A54VNK-pe-b"> <div class="select-panel"> <select
                                                                class="form-control"><option
                                                                value="before">before</option><option value="after">after</option></select> </div> </div> <div
                                                                class="A54VNK-pe-b"> <span class="">the due date.</span> </div> </span>
                                                        </div>
                                                        <div class="text-danger A54VNK-pe-a" style="display: none;">
                                                            Delay for the notification must be a number between 0 and
                                                            999.
                                                        </div>
                                                        <p class="help-block">Notify me by email when a customer invoice
                                                            payment is due.</p></div>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-7 col-sm-offset-3 A54VNK-Ld-c">
                                                <button type="button" class="btn btn-primary">Save Notifications
                                                    Settings
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </section>

        <!-- full table -->
    </div>
</template>

<script>
    import SubHeader from './sub_header'

    export default {
        components: {
            SubHeader
        },

        name: 'user_settings',

        data: function () {
            return {
                banks: false,
                form: new Form({
                    "id": "",
                    "bank_name": "",
                    "swift_code": "",
                    "phone": "",
                    "mobile": "",
                    "email": "",
                    "website": "",
                    "address": "",
                    "state": "",
                    "city": "",
                    "zip_code": "",
                    "country": "",
                    "created_at": "",
                    "updated_at": "",
                })
            }
        },
        created: function () {

        },
        methods: {}
    }
</script>
