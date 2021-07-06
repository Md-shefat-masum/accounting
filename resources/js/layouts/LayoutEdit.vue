<template>
    <div class="template-container">
        <Site-navbar type="basic"/>
        <transition name="fade" mode="out-in">
            <router-view/>
        </transition>
    </div>
</template>
<script type="text/babel">
    import SiteNavbar from './partials/edit_header'

    export default {
        components: {
            SiteNavbar,
        },
    }
</script>
