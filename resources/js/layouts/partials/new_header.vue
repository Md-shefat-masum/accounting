<template>
    <!-- header start -->
    <header class="navbar navbar-default navbar-fixed-top navbar-custom fromheader">
        <div class="navbar-left">
            <router-link :to="this.url" type="button" class="btn btn-lg btn-link">
                <span class="picto-font"></span> <span class="back-btn-label bolder" style="padding-left: 10px"> Back </span>
            </router-link>
        </div>
        <div class="A54VNK-o-b">
            <div class="ellipsis text-center hidden-xs A54VNK-o-g">
                <h4 style="font-size: 20px;color: #000;font-weight: normal;">New {{ this.name[2] }}</h4>
            </div>
        </div>
    </header>
    <!-- header end -->


</template>

<script>
    export default {
        name: '',
        url: '',
        created: function(){
            this.name = window.location.pathname;
            this.name = this.name.split('/', 3);

            this.url = window.location.pathname;
            this.url = this.url.slice(0, -7);
            this.url = this.url + 's';
            // console.log(this.url);
        },
    }
</script>
