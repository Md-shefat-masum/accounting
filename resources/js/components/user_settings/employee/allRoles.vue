<template>
    <div>
        <div class="card">
            <div class="card-header d-flex" style="justify-content: flex-end;">
                <a href="#" v-if="type == 'all_role'" @click.prevent="change_type('create_role')" class="btn btn-primary done_btn" style="padding: 7px 19px;">Create Role</a>
                <a href="#" v-if="type == 'create_role'" @click.prevent="change_type('all_role')" class="btn btn-primary done_btn" style="padding: 7px 19px;">All Roles</a>
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
                    <tr v-for="role in roles.data" :key="role.id">
                        <td>{{ role.role_name }}</td>
                        <td>{{ role.code }}</td>
                        <td>{{ role.description }}</td>
                        <td>
                            <div class="dropdown d-inline-block">
                                <div class="btn-group dropleft text-center">
                                    <a href="#" onclick="return false;" data-toggle="dropdown" role="button" aria-expanded="false" class="btn btn-white dropdown-toggle">
                                        <i aria-hidden="true" class="fa fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a @click.prevent="get_role(role.id)" class="dropdown-item text-danger waves-effect waves-light">Edit</a>
                                        <a @click.prevent="deleteRole(role.id)" class="dropdown-item text-danger waves-effect waves-light">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="card-body"  v-if="type == 'create_role'">
                <create-role :change_type="change_type" :role_info="role_info" :get_roles="get_roles" :form_type="form_type"></create-role>
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
            form_type: 'create',
            roles: {

            },
            role_info: {},
        }
    },
    created: function(){
        this.get_roles();
    },
    methods: {
        get_roles: function(){
            axios.get('/api/user-roles')
                .then((res)=>{
                    this.roles = res.data;
                })
        },
        get_role: function(id){
            axios.get('/api/user-role/'+id)
                .then((res)=>{
                    // this.roles = res.data;
                    // console.log(res.data);
                    this.role_info = res.data;
                    this.change_type('create_role');
                    this.form_type = 'update';
                })
        },
        change_type: function(type){
            this.type = type;
            this.form_type = 'create';
            // this.get_roles();
        },
        deleteRole: function (id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    axios.post('/api/delete-user-role/',{id:id}).then(() => {
                        Toast.fire({
                            icon: 'success',
                            title: 'Deleted successfully'
                        });
                        this.get_roles();
                    }).catch(() => {
                        Toast.fire({
                            icon: 'error',
                            title: 'Something went wrong'
                        });
                    });
                }
            })
        },
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
