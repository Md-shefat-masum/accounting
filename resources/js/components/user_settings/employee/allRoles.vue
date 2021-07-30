<template>
    <div>
        <div class="card">
            <div class="card-header d-flex" style="justify-content: flex-end;">
                <a href="#" v-if="type == 'all_role'" @click.prevent="type ='create_role'" class="btn btn-primary done_btn" style="padding: 7px 19px;">Create Role</a>
                <a href="#" v-if="type == 'create_role'" @click.prevent="type ='all_role'" class="btn btn-primary done_btn" style="padding: 7px 19px;">All Roles</a>
            </div>

            <div class="card-body" v-if="type == 'all_role'">
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tr>
                        <td>Customer</td>
                        <td>Code</td>
                        <td>Description</td>
                        <td>
                            <div class="dropdown d-inline-block">
                                <div class="btn-group dropleft text-center">
                                    <a href="#" onclick="return false;" data-toggle="dropdown" role="button" aria-expanded="false" class="btn btn-white dropdown-toggle">
                                        <i aria-hidden="true" class="fa fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item text-danger waves-effect waves-light">Show</a>
                                        <a class="dropdown-item text-danger waves-effect waves-light">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="card-body"  v-if="type == 'create_role'">
                <create-role></create-role>
            </div>

        </div>
    </div>
</template>

<script>
import createRole from './createRole.vue'
export default {
    components: { createRole },
    data: function(){
        return {
            type: 'all_role',
        }
    }
}
</script>

<style scoped>
    .dropleft .dropdown-toggle::before{
        content: unset;
    }
    .form2.right-content .btn:hover, .form2.right-content .btn:focus, .form2.right-content .btn.focus {
        color: #ffffff !important;
        text-decoration: none;
    }
</style>
