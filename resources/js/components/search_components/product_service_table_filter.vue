<template>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mobile_d_search_none">
            <div class="card filter" style="margin-bottom: 13px;">
                <div class="body">
                    <!-- Filter Panel -->
                    <div class="row">
                        <div class="col-md-4 mb-0 d-flex align-content-center flex-wrap">
                            <div class="setting_li_search">
                                <i class="fas fa-search"></i>
                                <input type="text" @keyup="dataSearch()" id="quote_search" placeholder="Search in Quotes">
                            </div>
                        </div>
                        <div class="col-md-8 mb-0 text-right">
                            <div class="dropdown btn btn-outline-default">
                                <i class="fa fa-angle-down" aria-hidden="true" style="position: absolute;right:9px;top: 10px;"></i>
                                <input type="text"
                                        style="height:2rem;color:black;font-size:13px;"
                                        class="form-control A54VNK-Yj-b border-0"
                                        placeholder="any date"
                                        v-model="data_by_day_name"
                                        data-toggle="dropdown"
                                        autocomplete="off">
                                <ul class="dropdown-menu cus_dropdown_menu A54VNK-Yj-a">
                                    <li class="">
                                        <a class="ellipsis-block" @click="list()" role="button"> Product and service </a>
                                    </li>

                                    <li class="">
                                        <a class="ellipsis-block" @click="data_by_type('product','products',$event)" role="button"> products </a>
                                    </li>
                                    <li class="">
                                        <a class="ellipsis-block" @click="data_by_type('service','services',$event)" role="button"> Services </a>
                                    </li>

                                </ul>
                            </div>

                            <div class="dropdown btn btn-outline-default">
                                <i class="fa fa-angle-down" aria-hidden="true" style="position: absolute;right:9px;top: 10px;"></i>
                                <input type="text"
                                        style="height:2rem;color:black;font-size:13px;"
                                        class="form-control A54VNK-Yj-b border-0"
                                        placeholder="sorted Creation date"
                                        v-model="data_sort_type"
                                        data-toggle="dropdown"
                                        autocomplete="off">
                                <ul class="dropdown-menu cus_dropdown_menu A54VNK-Yj-a">
                                    <li class="">
                                        <a class="ellipsis-block" @click="dataSort('name','ASC','Name (a-z)',$event)" role="button"> Name (a-z) </a>
                                    </li>
                                    <li class="">
                                        <a class="ellipsis-block" @click="dataSort('name','DESC','Name (z-a)',$event)" role="button"> Name (z-a) </a>
                                    </li>
                                    <li class="">
                                        <a class="ellipsis-block" @click="dataSort('id','ASC','Code (01-99)',$event)" role="button"> code (01-99) </a>
                                    </li>
                                    <li class="">
                                        <a class="ellipsis-block" @click="dataSort('id','DESC','Code (01-99)',$event)" role="button"> code (99-01) </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Filter Panel -->
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mobile_d_search_block">
            <div class="card filter" style="margin-bottom: 13px;">
                <div class="body">
                    <!-- Filter Panel -->
                    <div class="row">
                        <div class="col-md-12 mb-0 d-flex align-content-center flex-wrap">
                            <div class="setting_li_search">
                                <i class="fas fa-search"></i>
                                <input type="text" placeholder="Search in Quotes">
                            </div>
                        </div>
                    </div>
                    <!-- Filter Panel -->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:{
            show_list:Object,
            data_sort_type: String,
            data_by_day_name: String,
            
            list: Function,
            dataSort: Function,
            data_by_type: Function,
            dataSearch: Function,
        },
    };
</script>

<style>
    .cus_dropdown_menu>li>a{
        font-size: 12px;
        color: black;
        line-height: 16px;
    }
    .ellipsis-block.active{
        background-color: rgba(0,0,0,.075);
    }
</style>
