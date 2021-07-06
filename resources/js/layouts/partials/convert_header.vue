<template>
    <!-- header start -->
    <header class="navbar navbar-default navbar-fixed-top navbar-custom fromheader">
        <div class="navbar-left">
            <router-link :to="url" type="button" class="btn btn-lg btn-link">
                <!-- <a href="#" @click="goback" class="btn btn-lg btn-link"> -->
                    <span class="picto-font"></span> <span class="back-btn-label bolder" style="padding-left: 10px"> Back </span>
                <!-- </a> -->
            </router-link>
        </div>
        <div class="A54VNK-o-b">
            <div class="ellipsis text-center hidden-xs A54VNK-o-g">
                <h4 class="edit_head_text" style="font-size: 20px;color: #000;font-weight: normal;">New {{ this.name[3] }}</h4>
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
            this.name = this.name.split('/', 4);
            this.url = '/' + this.name[1] + '/' + this.name[2] + 's';
            // this.url = router.back();
            console.log(this.name);
        },
        methods:{
            goback(){
                // this.$router.back();
                // console.log(this.$route);
                // history.back();
            }
        }
    }
</script>
