<template>
    <div>
        <sub-header type="basic"/>

        <!-- full table -->

        <section class="content content-menu">
            <div class="container-fluid">

                <!-- breadcumbs -->

                <div class="block-header">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <ul class="breadcrumb breadcrumb-style d-inline-block mb-0">
                                <li class="breadcrumb-item">
                                    <h4 style="border: 0;" class="page-title">Projects</h4>
                                </li>
                            </ul>
                            <ul class="d-inline-block mb-0" style="float: right;padding: .75rem 1rem;">
                                <li style="float: left;">
                                    <router-link to='/sales/project/create' class="btn btn-default m-0 mr-2 mb-2 mb-lg-0 mobile_d_none">New Projects</router-link>
                                    <router-link to='/sales/project/create' class="btn btn-default m-0 mr-2 mb-2 mb-lg-0 mobile_d_block"><i class="fas fa-plus"></i></router-link>
                                </li>
                                <li class="mobile_d_search_block" style="float: left;">
                                    <a class="btn btn-white nav-link m-0 mr-2">
                                        <i class="fas fa-search" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li  style="float: left;">
                                    <a class="btn btn-white new_dot nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </a>
                                    <div class="dropdown-menu new_dropdown" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item">Export Projects Lines</a>
                                        <a class="dropdown-item">Export Projects Details</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- breadcumbs -->

                <!-- filter -->

                <div class="row" v-if="checked_id.length>0">
                    <div class="col-12">
                        <div class="page-panel A54VNK-Zc-c" style="display: flex;justify-content:space-between;background:white;padding: 5px 10px;">
                            <div class="d-flex align-items-center">
                                <span class="bolder d-flex align-items-center">{{checked_id.length}} selected </span> 
                                <a class="A54VNK-Zc-a" role="button" style="display: none;" aria-hidden="true">select all</a> 
                                <span style="display: none;" aria-hidden="true">|</span>
                                <a class="A54VNK-Zc-b" role="button">clear selection</a>
                            </div>
                            <div><button @click="delete_selected_all()" type="button" class="btn btn-danger">Delete</button></div>
                        </div>
                    </div>
                </div>

                <tableFilterVue 
                    v-else
                    :show_list="projects"
                    :data_sort_type="data_sort_type"
                    :data_by_day_name="data_by_day_name"

                    :dataSearch="dataSearch" 
                    :list="listProjects" 
                    :dataSort="dataSort" 
                    :data_by_day="data_by_day">
                </tableFilterVue>

                <!-- filter -->

                <!-- tab -->



                <!-- tab -->

                <!-- table -->

                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;padding: 5px;">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <label>
                                                        <input id="check_all" @click="checkAll()" type="checkbox" class="filled-in">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </th>
                                        <th style="min-width: 165px;">Projects Opening Date</th>
                                        <th style="min-width: 120px;">Projects Name</th>
                                        <th style="min-width: 120px;">Projects Description</th>
                                        <!-- <th style="min-width: 130px;">Projects Cost</th>
                                        <th style="min-width: 130px;">Projects Cost</th>
                                        <th style="min-width: 130px;">Income</th>
                                        <th class="text-center" style="min-width: 120px;">Status</th> -->
                                        <th class="text-center" style="width: 70px;min-width: 70px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="project in projects.data" :key="project.id">
                                        <td style="padding: 5px 5px 4px;">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <label>
                                                        <input @click="checkSingle(project.id)" :value="project.id" type="checkbox" class="check_single filled-in">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div @click="editProject(project.id)" class="ellipsis">
                                                {{project.date}}
                                            </div>
                                        </td>
                                        <td>
                                            <div @click="editProject(project.id)" class="ellipsis">
                                                {{project.name}}
                                            </div>
                                        </td>
                                        <td>
                                            <div @click="editProject(project.id)" class="ellipsis">
                                                {{project.description}}
                                            </div>
                                        </td>
                                        <!-- <td>
                                            <div class="ellipsis">
                                                TK 12,58,52,25.00
                                            </div>
                                        </td>
                                        <td>
                                            <div class="ellipsis">
                                                TK 12,58,52,25.00
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="ellipsis">
                                                <div class="badge col-red">Open</div>
                                            </div>
                                        </td> -->
                                        <td class="action" style="text-align:right;padding-top: 6px;padding-bottom: 6px;">
                                            <div class="dropdown d-inline-block">
                                                <div class="btn-group dropleft text-center">
                                                    <a href="#" onclick="return false;" class="btn btn-white dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item waves-effect waves-light" href="#/product/edit">Close</a>
                                                        <a class="dropdown-item text-danger waves-effect waves-light" @click="deleteProject(project.id)">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <pagination :data="projects" @pagination-change-page="getResults"></pagination>
                    </div>
                </div>


                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h4> Are you sure you want to delete</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Confirm</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- table -->

            </div>
        </section>

        <!-- full table -->
    </div>
</template>


<script>
    import tableFilterVue from '../../search_components/table_filter.vue';
    import SubHeader from "../sub_header";

    export default {
        components: {
            SubHeader,
            tableFilterVue,
        },
        name: 'Project',

        data: function(){
            return {
            projects : {},
            data_sort_type: 'sorted by Creation date',
            data_by_day_name: 'any date',

            checked_id:[],
            form: new Form({
                            "id" : "",
                            "name" : "",
                            "description" : "",
                            "customer" : "",
                            "supplier" : "",

                            'checked_id':[],
                            "model_name":'',
                            "model_related":'',
                            "model_related_name":'',

                            "created_at" : "",
                            "updated_at" : "",
                        })
        }
        },
        created: function(){
            this.listProjects();
        },
        methods: {
            getResults(page = 1) {
                let that = this;
                axios.get(`/api/projects?`+'page=' + page)
                    .then(response => {
                        that.projects = response.data;
                    });
            },
            listProjects: function(){
                var that = this;
                this.form.get('/api/projects').then(function(response){
                    that.projects = response.data;
                })
            },
            createProject: function(){

                var that = this;
                this.form.post('/api/projects').then(function(response){
                    that.projects.push(response.data);
                    that.form.reset();
                })

            },
            editProject: function(project_id){
                this.$router.replace({ name: 'editProject', params: { id: project_id }});
            },
            deleteProject: function(id){

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
                        this.form.delete('/api/projects/' + id).then(() => {
                            Toast.fire({
                                icon: 'success',
                                title: 'Deleted successfully'
                            });
                            this.listProjects();
                        }).catch(() => {
                            Toast.fire({
                                icon: 'error',
                                title: 'Something went wrong'
                            });
                        });
                    }
                })

            },
            data_by_day: function(dayno,type,description,event){
                $('.cus_dropdown_menu li a').removeClass('active');
                $(event.target).addClass('active');
                this.data_by_day_name = description;

                let url = `/api/projects_by_day?key=${dayno}&type=${type}`;
                let that = this;

                axios.get(url)
                    .then((response)=>{
                        that.show_orders = that.saleorders = response.data;
                    })
            },
            dataSort: function(key,type,description,event){
                $('.cus_dropdown_menu li a').removeClass('active');
                $(event.target).addClass('active');
                this.data_sort_type = description;
                let url = `/api/projects_sort?key=${key}&type=${type}`;
                let that = this;
                axios.get(url)
                    .then((response)=>{
                        that.show_orders = that.saleorders = response.data;
                    })
            },
            dataSearch: function(){
                let value = $('#quote_search').val();
                let formData = new FormData();
                formData.append('key',value);
                let that = this;
                axios.post('/api/project_search',formData)
                    .then((res)=>{
                        that.projects = res.data;
                    })
            },
            checkAll: function(){
                if(this.checked_id.length > 0){
                    $('.check_single').prop('checked',false);
                    $('#check_all').prop('checked',false);
                    this.checked_id = [];
                }else{
                    $('.check_single').prop('checked',true);
                    this.projects.data.map((item)=>{
                        this.checked_id.push(item.id);
                    },this);
                }
                
            },
            checkSingle: function(id){
                $('#check_all').prop('checked',false)
                let array = this.checked_id;
                const index = array.indexOf(id);
                if (index > -1) {
                    array.splice(index, 1);
                }else{
                    array.push(id);
                }
                this.checked_id = array;
            },
            delete_selected_all: function(){
                this.form.checked_id = this.checked_id;
                this.form.model_name = 'Projects';
                this.form.model_related = '';
                this.form.model_related_name = '';
                this.form.post('/api/delete_selected_all')
                    .then((res)=>{
                        console.log(res.data);
                        $('#check_all').prop('checked',false)
                        this.checked_id = [];
                        this.listProjects();
                    })
            }
        }
    }
</script>
