<template>
    <div>
        <sub-header></sub-header>
        <!-- submenu -->
        <!-- full table -->
        <section class="content content-menu content_setting">
            <div class="container-fluid">
                <!-- breadcumbs -->
                <div class="block-header">
                    <div class="row">
                        <div class="col-md-8 offset-2">
                            <div class="card" style="margin-bottom: 13px; padding-top: 30px;">
                                <div class="body">
                                    <div class="A54VNK-Mc-e">
                                        <div class="row">
                                            <div class="col-sm-4 offset-1">
                                                <h4>
                                                    <div class="">Local Settings</div>
                                                </h4>
                                            </div>
                                            <div class="col-sm-6 A54VNK-Nd-d">
                                                <div class="form-group">
                                                    <span class="control-label bold">Date format</span>
                                                    <select v-model="form.date_format" class="form-control">
                                                        <option value="yyyy/MM/dd">2016/12/25</option>
                                                        <option value="MM/dd/yyyy">12/25/2016</option>
                                                        <option value="dd/MM/yyyy">25/12/2016</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <span class="control-label bold">Language</span>
                                                    <select v-model="form.language" class="form-control">
                                                        <option value="en_US">English (US)</option>
                                                        <option value="en_GB">English (UK)</option>
                                                        <option value="fr_FR">Français</option>
                                                        <option value="es_MX">Español (Mexico)</option>
                                                        <option value="zh_CN">中国</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <span class="control-label bold">Start week on</span>
                                                    <select v-model="form.start_week_on" class="form-control">
                                                        <option value="Saturday">Saturday</option>
                                                        <option value="Sunday">Sunday</option>
                                                        <option value="Monday">Monday</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 offset-1">
                                                <h4>
                                                    <div class="">Export Settings</div>
                                                </h4>
                                            </div>
                                            <div class="col-sm-6 A54VNK-Nd-d">
                                                <div class="form-group">
                                                    <span class="ontrol-label bold">Export as</span>
                                                    <select v-model="form.export_as" class="form-control">
                                                        <option value="csv">CSV</option>
                                                        <option value="excel">Microsoft Excel</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 offset-1">
                                                <h4>
                                                    <div class="">User Interface</div>
                                                </h4>
                                            </div>
                                            <div class="col-sm-6 A54VNK-Nd-d">
                                                <div class="form-group">
                                                    <label class="control-label bold A54VNK-Md-a d-block font-weight-bold">Shorter Amounts </label>
                                                    <div class="btn-group A54VNK-tc-c switch-button" aria-atomic="true">
                                                        <button type="button" class="btn btn-default" v-bind:class="{ active: form.shorter_amount }" aria-pressed="true" style="text-transform: capitalize;" v-on:click="form.shorter_amount = true">Yes</button>
                                                        <button type="button" class="btn btn-default" v-bind:class="{ active: !form.shorter_amount }" aria-pressed="false" style="text-transform: capitalize;" v-on:click="form.shorter_amount = false">No</button>
                                                    </div>
                                                    <p class="help-block">Amount in filters and dashboards will be rounded. i.e. Tk137,320 will be replaced by Tk137K</p>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label bold A54VNK-Md-a d-block font-weight-bold"> Contact Info Previewer </label>
                                                    <div class="btn-group A54VNK-tc-c switch-button" aria-atomic="true">
                                                        <button type="button" class="btn btn-default" v-bind:class="{ active: form.contact_info_preview }" aria-pressed="true" style="text-transform: capitalize;" v-on:click="form.contact_info_preview = true">Yes</button>
                                                        <button type="button" class="btn btn-default" v-bind:class="{ active: !form.contact_info_preview }" aria-pressed="false" style="text-transform: capitalize;" v-on:click="form.contact_info_preview = false">No</button>
                                                    </div>
                                                    <div class="help-block">Preview your contacts’ information when hovering over their name</div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label bold A54VNK-Md-a d-block font-weight-bold"> Accountant Mode </label>
                                                    <div class="btn-group A54VNK-tc-c switch-button" aria-atomic="true">
                                                        <button type="button" class="btn btn-default" v-bind:class="{ active: form.accountant_mode }" aria-pressed="true" style="text-transform: capitalize;" v-on:click="form.accountant_mode = true">Yes</button>
                                                        <button type="button" class="btn btn-default" v-bind:class="{ active: !form.accountant_mode }" aria-pressed="false" style="text-transform: capitalize;" v-on:click="form.accountant_mode = false">No</button>
                                                    </div>
                                                    <div class="help-block">Display accounting account information within categories and other features</div>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-7 col-sm-offset-4 PMRVCW-Nd-c PMRVCW-Nd-b">
                                                <button type="button" @click.prevent="update_preference()" class="btn btn-primary">Save Preferences</button>
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
import { mapActions, mapGetters } from 'vuex'
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
                    "date_format": "",
                    "language": "",
                    "start_week_on": "",
                    "export_as": "",
                    "shorter_amount": "",
                    "contact_info_preview": "",
                    "accountant_mode": "",
                    "created_at": "",
                    "updated_at": "",
                })
            }
        },
        created: function () {
            // this.fetch_user_information();
            this.form.fill(this.get_auth_user_info);
        },
        methods: {
            ...mapActions(['fetch_user_information']),
            update_preference: function(){
                this.form.put('/api/user-preference-update')
                    .then(res=>{
                        console.log(res.data);
                        Toast.fire({
                            icon: 'success',
                            title: 'Data Updated'
                        });
                    })
            }
        },
        computed: {
            ...mapGetters(['get_auth_user_info']),
        }
    }
</script>
