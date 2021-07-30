<template>
<div>
        <sub-header></sub-header>
        <!-- submenu -->
        <!-- full table -->
        <section class="content form2 right-content">
            <div class="container-fluid">
                <!-- breadcumbs -->

                <div class="block-header">
                    <div class="row" style="justify-content: center;">
                        <div class="col-md-10">
                            <div class="card" style="margin-bottom: 13px; margin-top: 80px;">

                                <!-- <div class="card-body pb-0">
                                    <ul class="tabs-container employee_menu_list">
                                        <li class="tab">
                                            <a class="active" @click.prevent="change_content('employee_list')" href="#"><span>All Employee</span></a>
                                        </li>
                                        <li class="tab">
                                            <a class="" @click.prevent="change_content('create_employee')" href="#"><span>Create</span></a>
                                        </li>
                                        <li class="tab active">
                                            <a class="" @click.prevent="change_content('roles')" href="#"><span>Roles</span></a>
                                        </li>
                                    </ul>
                                </div> -->

                                <!-- <all-employee v-if="type == 'employee_list'"></all-employee> -->

                                <!-- <create-employee v-if="type == 'create_employee'"></create-employee> -->

                                <all-roles v-if="type == 'roles'"></all-roles>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- full table -->
    </div>
</template>

<script>
import SubHeader from '../sub_header'
// import AllEmployee from './allEmployee.vue'
import AllRoles from './allRoles.vue'
// import CreateEmployee from './createEmployee.vue'

export default {
    components: {
        SubHeader,
        // CreateEmployee,
        AllRoles,
        // AllEmployee,
    },

    data: function(){
        return {
            type: 'roles',
        }
    },

    created: function(){
        $(window).on('load',function(){
            $('.employee_menu_list li a').on('click',function(){
                $('.employee_menu_list li a').removeClass('active');
                $(this).addClass('active');
            })
        })

    },

    methods: {
        change_content: function(type){
            this.type = type;
        }
    }

}
</script>

<style>

</style>
