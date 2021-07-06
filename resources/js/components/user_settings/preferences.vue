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
                                        <div class="row">
                                            <div class="col-sm-4 offset-1">
                                                <h4>
                                                    <div class="">Local Settings</div>
                                                </h4>
                                            </div>
                                            <div class="col-sm-6 A54VNK-Nd-d">
                                                <div class="form-group">
                                                    <span class="control-label bold">Date format</span>
                                                    <select class="form-control">
                                                        <option value="yyyy/MM/dd">2016/12/25</option>
                                                        <option value="MM/dd/yyyy">12/25/2016</option>
                                                        <option value="dd/MM/yyyy">25/12/2016</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <span class="control-label bold">Language</span>
                                                    <select class="form-control">
                                                        <option value="en_US">English (US)</option>
                                                        <option value="en_GB">English (UK)</option>
                                                        <option value="fr_FR">Français</option>
                                                        <option value="es_MX">Español (Mexico)</option>
                                                        <option value="zh_CN">中国</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <span class="control-label bold">Start week on</span>
                                                    <select class="form-control">
                                                        <option value="6">Saturday</option>
                                                        <option value="7">Sunday</option>
                                                        <option value="1">Monday</option>
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
                                                    <select class="form-control">
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
                                                    <label class="control-label bold A54VNK-Md-a">Shorter Amounts </label>
                                                    <div class="btn-group A54VNK-Cc-c switch-button" aria-atomic="true">
                                                        <a class="btn btn-default" href="#" aria-pressed="false">On</a>
                                                        <a class="btn active btn-primary" href="#" aria-pressed="true">Off</a>
                                                    </div>
                                                    <p class="help-block">Amount in filters and dashboards will be
                                                        rounded. i.e. Tk137,320 will be replaced by Tk137K
                                                    </p>
                                                </div>
                                                <div class="form-group"><label class="control-label bold A54VNK-Md-a">
                                                    Contact Info Previewer </label>
                                                    <div class="btn-group A54VNK-Cc-c switch-button" aria-atomic="true">
                                                        <a class="btn active btn-primary" href="#" aria-pressed="true">On</a>
                                                        <a class="btn btn-default" href="#" aria-pressed="false">Off</a>
                                                    </div>
                                                    <div class="help-block"> Preview your contacts’ information when
                                                        hovering over their name
                                                    </div>
                                                </div>
                                                <div class="form-group"><label class="control-label bold A54VNK-Md-a">
                                                    Accountant Mode </label>
                                                    <div class="btn-group A54VNK-Cc-c switch-button" aria-atomic="true">
                                                        <a class="btn btn-default" href="#" aria-pressed="false">On</a>
                                                        <a class="btn active btn-primary" href="#" aria-pressed="true">Off</a>
                                                    </div>
                                                    <div class="help-block"> Display accounting account information
                                                        within categories and other features
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4 offset-1"><h4> Change Password </h4></div>
                                            <div class="col-sm-6 A54VNK-Nd-d">
                                                <div class="form-group">
                                                    <div class="form-group floating-label focused"
                                                         autocomplete="off"><input type="password"
                                                                                   class="form-control form-component"
                                                                                   placeholder="Current Password"
                                                                                   id="gwt-uid-257"
                                                                                   autocomplete="off"> <label
                                                        class="control-label form-question ellipsis"
                                                        for="gwt-uid-257">Current Password</label>
                                                        <div class="error-panel"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-group floating-label"><input type="password"
                                                                                                  class="form-control form-component"
                                                                                                  placeholder="New Password"
                                                                                                  id="gwt-uid-261"
                                                                                                  autocomplete="off">
                                                        <label class="control-label form-question ellipsis"
                                                               for="gwt-uid-261">New Password</label>
                                                        <div class="error-panel"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-group floating-label"><input type="password"
                                                                                                  class="form-control form-component"
                                                                                                  placeholder="Confirm New Password"
                                                                                                  id="gwt-uid-265"
                                                                                                  autocomplete="off">
                                                        <label class="control-label form-question ellipsis"
                                                               for="gwt-uid-265">Confirm New Password</label>
                                                        <div class="error-panel"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group" style="display:none;" aria-hidden="true">
                                                    <label> Password must: </label>
                                                    <ul>
                                                        <li>Be eight or more characters long</li>
                                                        <li>Contain a lower case letter</li>
                                                        <li>Contain an upper case letter</li>
                                                        <li>Contain at least one number and one of these symbols
                                                            -/_+£&amp;@"?!‘.,()
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-primary">Save Password
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
