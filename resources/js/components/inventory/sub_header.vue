<template>
    <!-- submenu -->

    <div class="submenu card content-card">
        <div class="body">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs tab-nav-right text-center">
                <li>
                    <router-link to="/inventory/stocks">Stock</router-link>
                </li>
                <li>
                    <router-link to="/inventory/purchase-orders">Purchase Orders</router-link>
                </li>
                <li>
                    <router-link to="/inventory/sales-orders">Sales Orders</router-link>
                </li>
                <li>
                    <router-link to="/inventory/receiving-notes">Receiving Notes</router-link>
                </li>
                <li>
                    <router-link to="/inventory/delivery-notes">Delivery Notes</router-link>
                </li>
                <li class="mobile_d_none">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        MORE <i class="fas fa-angle-down"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                        <router-link class="dropdown-item" to="#">Picking Lists</router-link>
                        <router-link class="dropdown-item" to="/inventory/purchase-returns">Purchase Returns</router-link>
                        <router-link class="dropdown-item" to="/#">Inventory Count Sheets</router-link>
                        <router-link class="dropdown-item" to="/inventory/inventory-entrys">Inventory Entries</router-link>
                        <router-link class="dropdown-item" to="/inventory/inventory-withdrawals">Inventory Withdrawals</router-link>
                        <router-link class="dropdown-item" to="/inventory/storage-locations">Storage Location</router-link>
                    </div>
                </li>
            </ul>
            <!-- Tab panes -->
        </div>
        <div class="mobile_d_block" style="position: fixed;right: 0;width: 50px;height: 49px;background: #fff;border-left: 1px solid #c7c5c5;">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="height: 100%;text-align: center;font-size: 20px;color: #777;">
                <i class="fa fa-ellipsis-v"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <router-link class="dropdown-item" to="/inventory/supplier-quotes">Suppliers Quotes</router-link>
                <router-link class="dropdown-item" to="/inventory/purchase-orders">Purchase Orders</router-link>
                <router-link class="dropdown-item" to="/inventory/receiving-notes">Receiving Notes</router-link>
                <router-link class="dropdown-item" to="/inventory/billing-payments">Billing Payments</router-link>
                <router-link class="dropdown-item" to="/inventory/supplier-credit-memos">Suppliers Credit Memos</router-link>
                <router-link class="dropdown-item" to="/inventory/product-services">Product &amp; Services</router-link>
            </div>
        </div>
    </div>
    <!-- submenu -->
</template>
