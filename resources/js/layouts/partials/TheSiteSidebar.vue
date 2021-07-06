<template>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- Menu -->
        <div class="menu mainsidebar">
            <ul class="list">
                <li>
                    <router-link to="/">
                        <i class="picto-font A54VNK-E-e" style="font-style:inherit;">H</i>
                        <span>Dashboard</span>
                    </router-link>
                </li>
                <li>
                    <router-link  to="/contact/customers">
                        <i class="picto-font A54VNK-E-e" style="font-style:inherit;">U</i>
                        <span>Contacts</span>
                    </router-link>
                </li>
                <li >
                    <router-link to="/sales/quotes">
                        <i class="picto-font A54VNK-E-e" style="font-style:inherit;">z</i>
                        <span>Sales</span>
                    </router-link>
                </li>
                <li>
                    <router-link to="/purchase/bills">
                        <i class="picto-font A54VNK-E-e" style="font-style:inherit;">E</i>
                        <span>Purchases</span>
                    </router-link>
                </li>
                <li>
                    <a href="#">
                        <i class="picto-font A54VNK-E-e" style="font-style:inherit;">r</i>
                        <span>Import LC</span>
                    </a>
                </li>
                <li>
                    <router-link to="/inventory/stocks">
                        <i class="picto-font A54VNK-E-e" style="font-style:inherit;">X</i>
                        <span>Inventory</span>
                    </router-link>
                </li>
                <li>
                    <router-link to="/accounting/bank-activitys">
                        <i class="picto-font A54VNK-E-e" style="font-style:inherit;">a</i>
                        <span>Accounting</span>
                    </router-link>
                </li>
                <li>
                    <a href="#">
                        <i class="picto-font A54VNK-E-e" style="font-style:inherit;">5</i>
                        <span>Reports</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- #Menu -->
    </aside>
    <!-- #END# Left Sidebar -->
</template>
<script>
    export default {
        name: '',
        url: '',
        created: function(){

        },
    }
</script>
