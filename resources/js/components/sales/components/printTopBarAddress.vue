<template>
    <div v-if="get_basic_information.address_json">
        <h4>{{ get_basic_information.company }}</h4>
        <p>{{ get_basic_information.address_json.line1 }},</p>
        <p>{{ get_basic_information.address_json.line2 }},{{ get_basic_information.address_json.line3 }}</p>
        <p>{{ get_basic_information.city }} {{ get_basic_information.zip }}</p>
        <p>Phone: {{ get_basic_information.phone }}</p>
        <p>Mobile: {{ get_basic_information.mobile }}</p>
        <p>{{ get_basic_information.website }}</p>
    </div>
</template>

<script>
    import { mapGetters, mapMutations } from 'vuex'
    export default {
        computed:{
            ...mapGetters([
                'get_basic_information'
            ])
        }
    }
</script>

<style>

</style>

