<template>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <passport-clients></passport-clients>
                        <passport-authorized-clients></passport-authorized-clients>
                        <passport-personal-access-tokens></passport-personal-access-tokens>
                    </div>
                </div>
            </div>
            <!-- Widgets -->
        </div>
    </section>
</template>
<script>
    import PassportClients from "./Clients";
    import PassportAuthorizedClients from "./AuthorizedClients.vue";
    import PassportPersonalAccessTokens from "./PersonalAccessTokens.vue";

    export default {
        components: {
            PassportClients,
            PassportAuthorizedClients,
            PassportPersonalAccessTokens,
        },
    }
</script>
