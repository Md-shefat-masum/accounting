<template>
    <div>
        <div class="dropdown">
            <a class="clear_input" @click="selected_family=''">
                <span class="picto-font">D</span>
            </a>
            <input type="text" class="form-control A54VNK-Qi-d"
                data-toggle="modal" data-target="#addProductFamilyModal"
                :value="selected_family"
                readonly
                style="color: black;"
                autocomplete="off" role="button" id="gwt-uid-480"
                placeholder="" aria-expanded="false" />
        </div>

        <div class="modal fade" id="addProductFamilyModal" tabindex="-1" aria-labelledby="addProjectLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addProjectLabel">Product Families</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row justify-content-center">
                            <div class="A54VNK-Vf-d pb-4">
                                <div class="btn-toolbar A54VNK-Vf-c">
                                    <button @click="product_family_list = true" :class="{active:product_family_list}" type="button" class="btn btn-default">All Family</button>
                                    <button @click="product_family_list = false" :class="{active:!product_family_list}" type="button" class="btn btn-default ml-4">New Family</button>
                                </div>
                            </div>
                        </div>
                        <div class="row" v-if="!product_family_list">
                            <div class="col-12">
                                <product-family-form-body :set_form_data="set_form_data" :key="new_unit_reder_key"></product-family-form-body>
                                <div class="row justify-content-center">
                                    <div class="A54VNK-Vf-d">
                                        <div class="btn-toolbar A54VNK-Vf-c">
                                            <button type="button" @click="add_new_family" class="btn btn-default">Submit</button>
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
                                <tr @click="setFamily(family)" class="A54VNK-Sb-b" v-for="family in families" :key="family.id">
                                    <td class="A54VNK-Sb-a A54VNK-Sb-c"><div style="outline-style: none;" >{{ family.name }}</div></td>
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
import ProductFamilyFormBody from '../productFamilies/productFamilyFormBody.vue';
export default {
    components: {ProductFamilyFormBody},
    props: ['set_product_family','old_family_name'],
    data: function(){
        return {
            families: [],
            selected_family: '',
            product_family_list: true,
            new_unit_reder_key: 0,

            form: new Form({
                    "name": ''
                })
        }
    },
    created: function(){
        this.get_family();
        this.$watch('old_family_name',(newVal,oldVal)=>{
            this.selected_family = this.old_family_name;
        })
    },
    methods: {
        get_family: function(){
            axios.get('/api/productfamily')
                .then((res)=>{
                    this.families = res.data;
                })
        },
        setFamily: function(family){
            this.selected_family = family.name;
            this.set_product_family(family);
            $('#addProductFamilyModal').modal('hide');
        },
        add_new_family: function(){
            if(this.form.name == ''){
                Toast.fire({
                        icon: 'error',
                        title: 'Fill up required fields.'
                    });
                return 0;
            }else{
                this.form.post('/api/productfamily')
                    .then(() => {
                        this.form.reset();
                        this.get_family();
                        this.product_family_list = true;
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
        }
    }
}
</script>

<style>

</style>
