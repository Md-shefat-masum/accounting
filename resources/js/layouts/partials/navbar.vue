<template>
    <!-- Top Bar -->
    <nav class="navbar mainnav">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="#" onClick="return false;" class="navbar-toggle collapsed" data-toggle="collapse"
                   data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="#" onClick="return false;" class="bars"></a>
                <router-link class="navbar-brand" to="/">
                    <img src="/backend/assets/images/logo.png" alt="" />
                </router-link>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="pull-left">
                    <li>
                        <a href="#" onClick="return false;" class="sidemenu-collapse">
                            <i class="material-icons">reorder</i>
                        </a>
                    </li>
                    <li class="setting_li_search">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="What do you want to do">
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <!-- Full Screen Button -->
                    <li class="fullscreen">
                        <a href="javascript:;" class="fullscreen-btn">
                            <i class="fas fa-expand"></i>
                        </a>
                    </li>
                    <!-- #END# Full Screen Button -->

                    <!-- #START# setting -->
                    <li class="dropdown">
                        <h5 class="nav_name">
                            {{ this.auth_user.name }}
                        </h5>
                    </li>
                    <!-- #END# setting -->

                    <!-- #START# setting -->
                    <li class="dropdown user_profile">
                        <a href="#" onClick="return false;" class="dropdown-toggle" data-toggle="dropdown"
                           role="button" style="padding: 10px 11px;">
                            <i class="fas fa-cog"></i>
                        </a>
                        <ul class="dropdown-menu pullDown">
                            <li class="body">
                                <ul class="user_dw_menu">
                                    <li>
                                        <router-link to="/settings/company-settings">Company Settings</router-link>
                                    </li>
                                    <li>
                                        <router-link to="/settings/tax-and-vat">Tax And Vat</router-link>
                                    </li>
                                    <!-- <li>
                                        <a href="#" onClick="return false;">
                                            Genareal Settings
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">
                                            Manage User
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">
                                            Employees
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">
                                            Manage Subscription
                                        </a>
                                    </li> -->
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# setting -->

                    <!-- #START# user_settings -->
                    <li class="dropdown user_profile">
                        <a href="#" onClick="return false;" class="dropdown-toggle" data-toggle="dropdown"
                           role="button">
                            <img :src="'/'+get_auth_user_info.image" width="32" height="32" alt="User">
                            <i class="fas fa-angle-down" style="padding-left: 8px;"></i>
                        </a>
                        <ul class="dropdown-menu pullDown">
                            <li class="body">
                                <ul class="user_dw_menu">
                                    <li>
                                        <router-link to="/settings/profile">
                                            <i class="material-icons">person</i>User Settings
                                        </router-link>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">
                                            <i class="material-icons">feedback</i>Feedback
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">
                                            <i class="material-icons">help</i>Help
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/logout">
                                            <i class="material-icons">power_settings_new</i>Logout
                                        </a>
                                    </li>
                                </ul>
                                <!-- #END# user_settings -->
                            </li>
                        </ul>
                    </li>
                    <!-- #END# user_settings -->
                    <!-- #END# Tasks -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
</template>
<script>
import { mapActions, mapGetters } from 'vuex';
    export default {
        data: function(){
            return {
                auth_user : window.user,
            }
        },
        methods:{
            ...mapActions(['fetch_user_information']),
            logout:function(){
                axios.get('logout').then(response => {
                    if (response.status === 302 || 401) {
                        //console.log('logout')
                        window.location.href = '/login';
                    }
                    else {
                        window.location.href = '/login';
                    }
                }).catch(error => {

                });
            },
        },
        created: function(){
            this.fetch_user_information();
        },
        computed:{
            ...mapGetters(['get_auth_user_info'])
        }
    }
</script>
