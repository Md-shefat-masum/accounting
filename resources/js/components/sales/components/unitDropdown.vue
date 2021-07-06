<template>
    <div>
        <div class="dropdown">
            <a class="clear_input" @click="selected_unit=''">
                <span class="picto-font">D</span>
            </a>
            <input type="text" class="form-control A54VNK-Qi-d"
                data-toggle="modal" data-target="#addUnitModal"
                :value="selected_unit"
                readonly
                style="color: black;"
                autocomplete="off" role="button" id="gwt-uid-480"
                placeholder="" aria-expanded="false" />
        </div>

        <div class="modal fade" id="addUnitModal" tabindex="-1" aria-labelledby="addProjectLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addProjectLabel">Units</h5>
                        <button type="button" class="close" @click="close_addUnitModal()" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row justify-content-center">
                            <div class="A54VNK-Vf-d pb-4">
                                <div class="btn-toolbar A54VNK-Vf-c">
                                    <button @click="unit_list = true" :class="{active:unit_list}" type="button" class="btn btn-default">All Unit</button>
                                    <button @click="unit_list = false" :class="{active:!unit_list}" type="button" class="btn btn-default ml-4">New Unit</button>
                                </div>
                            </div>
                        </div>
                        <div class="row" v-if="!unit_list">
                            <div class="col-12">
                                <unit-form-body :set_form_data="set_form_data" :key="new_unit_reder_key"></unit-form-body>
                                <div class="row justify-content-center">
                                    <div class="A54VNK-Vf-d">
                                        <div class="btn-toolbar A54VNK-Vf-c">
                                            <button type="button" @click="add_new_unit" class="btn btn-default">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table v-else class="A54VNK-Sb-y table table-striped table-hover table-link" cellspacing="0">
                            <colgroup>
                                <col />
                                <!-- <col /> -->
                            </colgroup>
                            <thead>
                                <tr __gwt_header_row="0">
                                    <th colspan="1" class="A54VNK-Sb-h A54VNK-Sb-f">Name</th>
                                    <!-- <th colspan="1" class="A54VNK-Sb-h" >Description</th> -->
                                </tr>
                            </thead>
                            <tbody style="">
                                <tr @click="setUnit(unit)" class="A54VNK-Sb-b" v-for="unit in units" :key="unit.id">
                                    <td class="A54VNK-Sb-a A54VNK-Sb-c"><div style="outline-style: none;" >{{ unit.name }}</div></td>
                                    <!-- <td class="A54VNK-Sb-a A54VNK-Sb-c"><div style="outline-style: none;" >{{ project.description }}</div></td> -->
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
import UnitFormBody from '../unit/unitFormBody.vue';
export default {
    components: {UnitFormBody},
    props: ['set_product_unit','old_unit_name'],
    data: function(){
        return {
            units: [],
            selected_unit: '',
            unit_list: true,
            new_unit_reder_key: 0,

            form: new Form({
                    "type": '',
                    "name": '',
                    "unit_reference": '',
                    "conversion_factor": '',
                    "created_at": "",
                    "updated_at": "",
                })
        }
    },
    created: function(){
        this.get_unit();
        this.$watch('old_unit_name',(newVal,oldVal)=>{
            this.selected_unit = this.old_unit_name;
        })
    },
    methods: {
        get_unit: function(){
            axios.get('/api/productunits')
                .then((res)=>{
                    this.units = res.data;
                })
        },
        setUnit: function(unit){
            this.selected_unit = unit.name;
            this.set_product_unit(unit);
            $('#addUnitModal').modal('hide');
        },
        add_new_unit: function(){
            if(this.form.type == '' || this.form.name == '' || this.form.unit_reference == ''){
                Toast.fire({
                        icon: 'error',
                        title: 'Fill up required fields.'
                    });
                return 0;
            }else{
                this.form.post('/api/productunits')
                    .then(() => {
                        this.form.reset();
                        this.get_unit();
                        this.unit_list = true;
                        this.new_unit_reder_key = Math.random();
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
            }

        },
        set_form_data: function(form_date){
            this.form.fill(form_date);
        },
        close_addUnitModal: function(){
            $('#addUnitModal').modal('hide');
        }
    }
}
</script>

<style>

</style>
