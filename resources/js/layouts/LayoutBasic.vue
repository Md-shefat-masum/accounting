<template>
    <div class="template-container">
        <Site-navbar type="basic"/>
        <site-sidebar type="basic"/>
        <site-right type="basic"/>
        <transition name="fade" mode="out-in">
            <router-view/>
        </transition>
    </div>
</template>
<script type="text/babel">
    import SiteNavbar from './partials/navbar.vue'
    import SiteSidebar from './partials/TheSiteSidebar.vue'
    import SiteRight from './partials/rightsidebar.vue'


    export default {
        components: {
            SiteSidebar,
            SiteNavbar,
            SiteRight,
        },
    }
</script>
