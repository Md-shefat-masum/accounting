<template>
    <div>
        <div class="dropdown">
            <a class="clear_input" @click="selected_project=''"><span class="picto-font">D</span></a>
            <input type="text" class="form-control A54VNK-Qi-d"
                data-toggle="modal" data-target="#addProject"
                readonly
                :value="selected_project"
                autocomplete="off" role="button" id="gwt-uid-480"
                placeholder="Project name" aria-expanded="false" />
        </div>

        <div class="modal fade" id="addProject" tabindex="-1" aria-labelledby="addProjectLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addProjectLabel">Projects</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row justify-content-center">
                            <div class="A54VNK-Vf-d pb-4">
                                <div class="btn-toolbar A54VNK-Vf-c">
                                    <button @click="project_list = true" :class="{active:project_list}" type="button" class="btn btn-default">All Project</button>
                                    <button @click="project_list = false" :class="{active:!project_list}" type="button" class="btn btn-default ml-4">New Project</button>
                                </div>
                            </div>
                        </div>
                        <div class="row" v-if="!project_list">
                            <div class="col-12">
                                <project-form-body :set_form_data="set_form_data" :key="new_project_reder_key"></project-form-body>
                                <div class="row justify-content-center">
                                    <div class="A54VNK-Vf-d">
                                        <div class="btn-toolbar A54VNK-Vf-c">
                                            <button type="button" @click="add_new_project" class="btn btn-default">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table v-else class="A54VNK-Sb-y table table-striped table-hover table-link" cellspacing="0">
                            <colgroup>
                                <col />
                                <col />
                            </colgroup>
                            <thead>
                                <tr __gwt_header_row="0">
                                    <th colspan="1" class="A54VNK-Sb-h A54VNK-Sb-f">Name</th>
                                    <th colspan="1" class="A54VNK-Sb-h" >Description</th>
                                </tr>
                            </thead>
                            <tbody style="">
                                <tr @click="setProject(project)" class="A54VNK-Sb-b" v-for="project in projects" :key="project.id">
                                    <td class="A54VNK-Sb-a A54VNK-Sb-c"><div style="outline-style: none;" >{{ project.name }}</div></td>
                                    <td class="A54VNK-Sb-a A54VNK-Sb-c"><div style="outline-style: none;" >{{ project.description }}</div></td>
                                </tr>
                            </tbody>
                            <tfoot aria-hidden="true" style="display: none;"></tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ProjectFormBody from '../projects/projectFormBody.vue';
export default {
    components: {ProjectFormBody},
    props: ['set_customer_project','old_project_name'],
    data: function(){
        return {
            projects: [],
            selected_project: '',
            project_list: true,
            new_project_reder_key: 0,

            form: new Form({
                    "id": "",
                    "name": "",
                    "description": "",
                    "customer": "",
                    "supplier": "",
                    "created_at": "",
                    "updated_at": "",
                })
        }
    },
    created: function(){
        this.get_project();
        this.$watch('old_project_name',(newVal,oldVal)=>{
            this.selected_project = this.old_project_name;
        })
    },
    methods: {
        get_project: function(){
            axios.get('/api/projects-all')
                .then((res)=>{
                    this.projects = res.data;
                })
        },
        setProject: function(project){
            this.selected_project = project.name;
            this.set_customer_project(project.name,project);
            $('#addProject').modal('hide');
        },
        add_new_project: function(){
            this.form.post('/api/projects').then(() => {
                    this.form.reset();
                    this.get_project();
                    this.project_list = true;
                    this.new_project_reder_key = Math.random();
                    Toast.fire({
                        icon: 'success',
                        title: 'Created successfully'
                    });
                }).catch(() => {
                    Toast.fire({
                        icon: 'error',
                        title: 'Created error'
                    });
                });
        },
        set_form_data: function(form_date){
            this.form.fill(form_date);
        }
    }
}
</script>

<style>

</style>
