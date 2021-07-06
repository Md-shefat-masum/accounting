<template>
    <!-- submenu -->
    <div class="submenu card content-card">
        <div class="body">
            <!-- Nav tabs -->

            <ul class="nav nav-tabs tab-nav-right text-center">
                <li>
                    <router-link to="/contact/customers">Customers</router-link>
                </li>
                <li>
                    <router-link to="/contact/suppliers">Suppliers </router-link>
                </li>
                <li class="mobile_d_none">
                    <a href="javascript:void(0)" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        MORE <i class="fas fa-angle-down"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <router-link class="dropdown-item" to="/contact/cf-agents">C&F Agent</router-link>
                        <router-link class="dropdown-item" to="/contact/employees">Employees</router-link>
                        <router-link class="dropdown-item" to="/contact/banks">Bank</router-link>
                        <router-link class="dropdown-item" to="/contact/contacts">Contact List</router-link>
                    </div>
                </li>
            </ul>
            <!-- Tab panes -->
        </div>
        <div class="mobile_d_block" style="position: fixed;right: 0;width: 50px;height: 49px;background: #fff;border-left: 1px solid #c7c5c5;">
            <a class="nav-link dropdown-toggle" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"style="height: 100%;text-align: center;font-size: 20px;color: #777;">
                <i class="fa fa-ellipsis-v"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                <router-link class="dropdown-item" to="/contact/cf-agents">C&F Agent</router-link>
                <router-link class="dropdown-item" to="/contact/employees">Employees</router-link>
                <router-link class="dropdown-item" to="/contact/banks">Bank</router-link>
                <router-link class="dropdown-item" to="/contact/contacts">Contact List</router-link>
            </div>
        </div>
    </div>
    <!-- submenu -->
</template>
