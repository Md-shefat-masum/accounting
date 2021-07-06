<template>
    <div
        style="position: absolute;
                top: 210px;
                left: 17px;
                width: 237px;
                height: 110vh;"
    >
        <ul class="dropdown-menu A54VNK-ge-d  p-3">
            <li class="active">
                <a class="ellipsis-block" data-toggle="modal" href="#" data-target="#categoryCreateModal">
                    <b>Create New Category</b>
                </a>
            </li>
            <li>
                <ul class="receipt_edit_block receipt_select_list" id="receipt_edit_block1" v-for="category_type in categories_by_types" :key="category_type.type_name">
                    <li><h4>{{category_type.type_name}}</h4></li>
                    <li v-for="category in category_type.categories" :key="category.id">
                         <i :style="dots_color()" class="fa fa-dot-circle"></i> {{category.name}}
                        <i class="fa fa-angle-right"></i>
                        <ul>
                            <li @click="addCategoryToSplit(id,'category',subcategory.name)" v-for="subcategory in category.sub_categories" :key="subcategory.id">
                                {{subcategory.name}}
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
        
        <!-- Modal -->
        <div class="modal fade" id="categoryCreateModal" tabindex="-1" role="dialog" aria-labelledby="categoryCreateModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom">
                        <h5 class="modal-title text-center text-capitalize" id="categoryCreateModalLabel">Customise Categories</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-3 border-right">
                                <ul class="receipt_edit_block" id="receipt_edit_block1" v-for="category_type in categories_by_types" :key="category_type.type_name">
                                    <li><h4>{{category_type.type_name}}</h4></li>
                                    <li v-for="category in category_type.categories" 
                                        :key="category.id" 
                                        @click="getSubCategories(category.id,$event)">
                                        <i :style="dots_color()" class="fa fa-dot-circle"></i> {{category.name}}
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-3 border-right">
                                <ul class="receipt_edit_block2">
                                    <li @click="getSubCategoryData(sub_category.id,$event)" v-for="sub_category in sub_categories" :key="sub_category.id">
                                        {{sub_category.name}}
                                    </li>
                                </ul>
                                <a href="#" @click="make_insert_form()" class="btn btn-default">Add New</a>
                            </div>
                            <div class="col-lg-6">
                                <form>
                                    <div class="form-group floating-label">
                                        <input type="text" class="form-control form-component" id="gwt-uid-1df" v-model="selected_category.name" 
                                        autocomplete="off" data-toggle="dropdown">
                                        <label class="control-label form-question ellipsis active" style="top:-6px; color:#26a69a;" for="gwt-uid-1df">Parent Category</label>
                                        <ul class="dropdown-menu A54VNK-ge-d receipt_edit_block2" >
                                            <li @click="changeCategory(category.id,$event)" v-for="category in selected_category_by_types" :key="category.id">
                                                {{category.name}}
                                            </li>
                                        </ul>
                                        <div class="error-panel"></div>
                                    </div>

                                    <div class="form-group floating-label" v-if="sub_category_data.creator == 'super_admin'">
                                        <input type="text" class="form-control form-component" id="gwt-uid-1dff" readonly v-model="sub_category_data.name" 
                                        autocomplete="off" data-toggle="dropdown">
                                        <label class="control-label form-question ellipsis active" style="top:-6px; color:#26a69a;" for="gwt-uid-1dff">Name</label>
                                        <div class="error-panel"></div>
                                    </div>

                                    <div class="form-group floating-label" v-else>
                                        <input type="text" class="form-control form-component" id="gwt-uid-1dff" v-model="sub_category_data.name" 
                                        autocomplete="off" data-toggle="dropdown">
                                        <label class="control-label form-question ellipsis active" style="top:-6px; color:#26a69a;" for="gwt-uid-1dff">Name</label>
                                        <div class="error-panel"></div>
                                    </div>

                                    <div class="form-group floating-label show">
                                        <input type="text" class="form-control form-component" id="gwt-uid-1dfff" v-model="sub_category_data.accounting_account" 
                                        autocomplete="off" data-toggle="dropdown">
                                        <label class="control-label form-question ellipsis active"  for="gwt-uid-1dfff">Accounting Account</label>
                                        <div class="error-panel"></div>
                                    </div>

                                    <div class="form-group floating-label show">
                                        <button v-if="submit_btn_type === 'update'" type="button" @click="updateSubCategory()" class="btn active btn-default">Update</button>
                                        <button v-if="submit_btn_type === 'insert'" type="button" @click="createSubCategory()" class="btn active btn-default">Create</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <!-- <button type="button" class="btn btn-primary">Confirm</button> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    

    export default {
        props:{
            addCategoryToSplit: Function,
            id: Number,
        },
        name: "ReceiptCategory",
        created: function(){
            this.listCategory();
        },
        data: function(){
            return {
                categories: [],
                sub_categories: [],
                categories_by_types: [],
                sub_category_data: [],
                selected_category: [],
                selected_category_by_types: [],
                submit_btn_type : 'update',

                form: new Form({
                    'id' : '',
                    'name' : '',
                    'accounting_account' : '',
                    'category_id' : '',
                    'creator' : '',
                    'slug' : '',
                    'status' : '',
                    'created_at' : '',
                    'updated_at' : '',
                })
            }
        },
        methods: {
            listCategory: function(){
                let that = this;
                axios.get('/api/receipts_category_by_type')
                    .then((res)=>{
                        that.categories_by_types = res.data;
                    })
                axios.get('/api/receipts_category_first')
                    .then((res)=>{
                        that.sub_categories = res.data.sub_categories;
                        that.selected_category = res.data.selected_category;
                        that.sub_category_data = res.data.sub_category_data;
                        that.selected_category_by_types = res.data.selected_category_by_types;

                        setTimeout(() => {
                            $('#receipt_edit_block1:nth-child(1) li:nth-child(2)').first().addClass('active');
                            $('.receipt_edit_block2 li:nth-child(1)').addClass('active');
                        }, 300);
                    })
            },
            make_insert_form: function(){
                this.sub_category_data.creator = 'user';
                this.sub_category_data.name = '';
                this.submit_btn_type = 'insert';
            },
            createSubCategory: function(){
                this.form.id = 'new_data';
                this.form.name = this.sub_category_data.name;
                this.form.accounting_account = this.sub_category_data.accounting_account;
                this.form.category_id = this.selected_category.id;

                let that = this;
                axios.post('/api/receipts_sub_category_create',this.form).then(() => {
                    this.form.reset();
                    that.getSubCategories(that.selected_category.id,'');
                    Toast.fire({
                        icon: 'success',
                        title: 'created successfully'
                    });
                    // this.$router.replace({name: 'customerLists'})
                }).catch(() => {
                    Toast.fire({
                        icon: 'error',
                        title: 'Create error'
                    });
                });
            },
            updateSubCategory: function(){
                this.form.id = this.sub_category_data.id;
                this.form.name = this.sub_category_data.name;
                this.form.accounting_account = this.sub_category_data.accounting_account;
                this.form.category_id = this.selected_category.id;

                let that = this;
                axios.post('/api/receipts_sub_category_update',this.form).then(() => {
                    that.form.reset();
                    that.getSubCategories(that.selected_category.id,'');
                    Toast.fire({
                        icon: 'success',
                        title: 'Updated successfully'
                    });
                    // this.$router.replace({name: 'customerLists'})
                }).catch(() => {
                    Toast.fire({
                        icon: 'error',
                        title: 'Update error'
                    });
                });
            },
            dots_color: function(){
                return 'color: #'+Math.floor(100000 + Math.random() * 900000);
            },
            getSubCategories: function(id,event){
                let that = this;
                $(event.target).siblings('li').removeClass('active');
                $(event.target).addClass('active');
                axios.get('/api/receipts_category/'+id)
                    .then((res)=>{
                        that.sub_categories = res.data.sub_categories;
                        that.selected_category = res.data;
                        that.sub_category_data = [];
                    })
            },
            getSubCategoryData: function(id,event){
                let that = this;
                $(event.target).siblings('li').removeClass('active');
                $(event.target).addClass('active');
                axios.get('/api/receipts_sub_category/'+id)
                    .then((res)=>{
                        that.sub_category_data = res.data;
                        this.submit_btn_type = 'update';
                    })
            },
            changeCategory: function(id,event){
                let that = this;
                $(event.target).siblings('li').removeClass('active');
                $(event.target).addClass('active');
                axios.get('/api/receipts_category/'+id)
                    .then((res)=>{
                        that.selected_category = res.data;
                    })
            },
        }
    }
</script>

<style>
    .receipt_edit_block li{
        padding: 5px 15px;
        /* border: 1px solid; */
        cursor: pointer;
        color: black;
    }
    .receipt_edit_block2 li{
        padding: 5px;
        /* border: 1px solid; */
        cursor: pointer;
        color: black;
    }

    .receipt_edit_block2 li:hover,
    .receipt_edit_block li:hover{
        background: rgba(0, 0, 0, .1);
    }
    
    .receipt_edit_block li:first-child{
        background: unset;
    }

    #receipt_edit_block1 li.active,
    .receipt_edit_block2 li.active,
    .receipt_edit_block li.active{
        color: #fff !important;
        border: 1px solid #01AAAF !important;
        background: #01AAAF !important;
    }
    .receipt_edit_block li i{
        display: inline-block;
        padding-right: 10px;
    }
    .receipt_edit_block li:first-child{
        padding-left: 5px;
    }
    .receipt_select_list li{
        position: relative;
        padding: 8px 10px;
        padding-right: 12px;
    }
    .receipt_select_list li:first-child{
        padding-left: 10px;
    }
    .receipt_select_list li:hover{
        color: #fff !important;
        border: 1px solid #01AAAF !important;
        background: #01AAAF !important;
    }
    .receipt_select_list li i:nth-child(2){
        position: absolute;
        top: 50%;
        right: 5px;
        transform: translateY(-50%);
    }
    .receipt_select_list li ul{
        position: absolute;
        left: 100%;
        width: 200px;
        padding: 15px;
        top: 0;
        background: white;
        opacity: 0;
        visibility: hidden;
        box-shadow: 0px 0px 5px rgba(0, 0, 0, .1);
    }
    .receipt_select_list li:hover ul{
        visibility: visible;
        opacity: 1;
        z-index: 999;
    }
</style>