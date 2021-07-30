<template>
    <div>
        <div class="card">
            <div class="card-body">
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tr v-for="(employee) in employees.data" :key="employee.id">
                        <td>{{ employee.name }}</td>
                        <td>{{ employee.email }}</td>
                        <td>{{ employee.phone }}</td>
                        <td>
                            <div class="dropdown d-inline-block">
                                <div class="btn-group dropleft text-center">
                                    <a href="#" onclick="return false;" data-toggle="dropdown" role="button" aria-expanded="false" class="btn btn-white dropdown-toggle">
                                        <i aria-hidden="true" class="fa fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu">
                                        <!-- <a class="dropdown-item text-danger waves-effect waves-light">Show</a> -->
                                        <a class="dropdown-item text-danger waves-effect waves-light">Edit</a>
                                        <a class="dropdown-item text-danger waves-effect waves-light">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions, mapMutations, mapGetters } from 'vuex';

export default {
    name:'',
    data:function () {
        return {
            id: '',
            employees: {},
        }
    },
    created: function(){
        this.get_employee();
    },
    methods: {
        ...mapActions([
            // 'nameOfAction', //also supports payload `this.nameOfAction(amount)`
        ]),
        ...mapMutations([

        ]),
        get_employee: function(){
            axios.get('/api/employees')
                .then((res)=>{
                    this.employees = res.data;
                });
        },

    },
    computed: {
        ...mapGetters([

        ]),
    }
};
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
