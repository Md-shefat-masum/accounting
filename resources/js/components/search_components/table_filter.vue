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
                                        <a class="ellipsis-block" @click="list()" role="button"> Any Date </a>
                                    </li>

                                    <li class="">
                                        <a class="ellipsis-block" @click="data_by_day('today','by_day','today',$event)" role="button"> today </a>
                                    </li>
                                    
                                    <li class="">
                                        <a class="ellipsis-block" @click="data_by_day('this_month','by_day','this month',$event)" role="button"> this month </a>
                                    </li>
                                    <li class="">
                                        <a class="ellipsis-block" @click="data_by_day('this_year','by_day','this year',$event)" role="button"> this year </a>
                                    </li>

                                    <li class="">
                                        <a class="ellipsis-block" @click="data_by_day('last_week','by_sub_day','last week',$event)" role="button"> last week </a>
                                    </li>
                                    <li class="">
                                        <a class="ellipsis-block" @click="data_by_day('last_month','by_sub_day','month',$event)" role="button"> last month </a>
                                    </li>
                                    <li class="">
                                        <a class="ellipsis-block" @click="data_by_day('last_year','by_sub_day','last year',$event)" role="button"> last year </a>
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
                                        <a class="ellipsis-block" @click="dataSort('date','DESC','sorted by date',$event)" role="button"> sorted by date (recent first) </a>
                                    </li>
                                    <li class="">
                                        <a class="ellipsis-block" @click="dataSort('date','ASC','sorted by date',$event)" role="button"> sorted by date (oldest first) </a>
                                    </li>

                                    <!-- <li class="">
                                        <a class="ellipsis-block" @click="dataSort('expiration_date','ASC','sorted by expiration date',$event)" role="button"> sorted by quote date (ordest first) </a>
                                    </li>
                                    <li class="">
                                        <a class="ellipsis-block" @click="dataSort('expiration_date','DESC','sorted by expiration date',$event)" role="button"> sorted by quote expiration date (recent first) </a>
                                    </li> -->
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
            // show_list: Object,
            data_sort_type: String,
            data_by_day_name: String,
            
            list: Function,
            dataSort: Function,
            data_by_day: Function,
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
