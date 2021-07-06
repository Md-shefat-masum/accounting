<template>
    <!-- form section -->

    <form action="">
        <div class="right-content form2">
            <div id="contentRootPanel" class="fullpage">
                <div class="page-panel page-right-content A54VNK-be-a">
                    <div class="panel-body page-panel-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-12 col-sm-4">
                                    <div class="form-group floating-label mandatory">
                                        <input type="text" class="form-control form-component" placeholder="Location Name" id="gwt-uid-339" autocomplete="off" />
                                        <label class="control-label form-question ellipsis active" for="gwt-uid-339">Location Name</label>
                                        <div class="error-panel"></div>
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
        name: 'Expense',
        data: function () {
            return {
                loaded: false,
                form: new Form({
                    "id": "",
                    "paid_to": "",
                    "billing_date": "",
                    "category": "",
                    "currency": "",
                    "is_paid": "",
                    "payment_method": "",
                    "paid_on": "",
                    "bank": "",
                    "transaction_id": "",
                    "attachments": "",
                    "project": "",
                    "assigned": "",
                    "created_at": "",
                    "updated_at": "",
                })
            }
        },
        created: function () {
            this.getExpense();
        },
        methods: {
            getExpense: function (Expense) {

                var that = this;
                this.form.get('/api/expenses/' + this.$route.params.id).then(function (response) {
                    that.form.fill(response.data);
                    that.loaded = true;
                });

            },
            updateExpense: function () {

                var that = this;
                this.form.put('/api/expenses/' + this.$route.params.id).then(function (response) {
                    that.form.fill(response.data);
                })

            },
            deleteExpense: function () {

                var that = this;
                this.form.delete('/api/expenses/' + this.$route.params.id).then(function (response) {
                    that.form.fill(response.data);
                    that.$router.push('/super-admin/expenses');
                })

            }
        }
    }
</script>
