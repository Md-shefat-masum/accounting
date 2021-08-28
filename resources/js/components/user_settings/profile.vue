<template>
    <!-- form section -->
    <div>
        <sub-header></sub-header>

        <section class="content content-menu">
            <div class="container-fluid">
                <!-- breadcumbs -->

                <div class="block-header">
                    <div class="row">
                        <div class="col-md-8 offset-2">
                            <div class="card" style="margin-bottom: 13px; padding-top: 30px;">
                                <div class="body">
                                    <div class="A54VNK-Mc-e">
                                        <div class="row">
                                            <div class="col-sm-4 offset-1">
                                                <h4>
                                                    <div class="">Profile Image</div>
                                                </h4>
                                            </div>
                                            <div class="col-sm-6 A54VNK-Nd-d">
                                                <form action="" name="profile_pic_form" id="profile_pic_form">
                                                    <input type="file" @change="upload_image" name="profile_image" class="form-control form-component" autocomplete="off" />
                                                    <img :src="'/'+this.get_auth_user_info.image" alt="" style="height: 40px;margin: 10px;">
                                                </form>
                                            </div>

                                            <div class="col-sm-4 offset-1">
                                                <h4>
                                                    <div class="">Change Email</div>
                                                </h4>
                                            </div>
                                            <div class="col-sm-6 A54VNK-Nd-d">
                                                <div class="form-group">
                                                    <div class="form-group floating-label focused">
                                                        <input type="email" class="form-control form-component email_body" v-model="email" placeholder="Email" id="gwt-uid-253" />
                                                        <label class="control-label form-question ellipsis" for="gwt-uid-253">Email</label>
                                                        <div class="error-panel"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button type="button" @click.prevent="change_email" class="btn btn-primary">Save Email</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4 offset-1"><h4>Change Password</h4></div>
                                            <div class="col-sm-6 A54VNK-Nd-d">
                                                <div class="form-group">
                                                    <div class="form-group floating-label focused" autocomplete="off">
                                                        <input type="password" class="form-control form-component" v-model="old_pass" placeholder="Current Password" id="gwt-uid-257" autocomplete="off" />
                                                        <label class="control-label form-question ellipsis" for="gwt-uid-257">Current Password</label>
                                                        <div class="error-panel"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-group floating-label">
                                                        <input type="password" class="form-control form-component" v-model="new_pass" placeholder="New Password" id="gwt-uid-261" autocomplete="off" />
                                                        <label class="control-label form-question ellipsis" for="gwt-uid-261">New Password</label>
                                                        <div class="error-panel"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-group floating-label">
                                                        <input type="password" class="form-control form-component" v-model="new_psss_confirmation" placeholder="Confirm New Password" id="gwt-uid-265" autocomplete="off" />
                                                        <label class="control-label form-question ellipsis" for="gwt-uid-265">Confirm New Password</label>
                                                        <div class="error-panel"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group" style="display: none;" aria-hidden="true">
                                                    <label> Password must: </label>
                                                    <ul>
                                                        <li>Be eight or more characters long</li>
                                                        <li>Contain a lower case letter</li>
                                                        <li>Contain an upper case letter</li>
                                                        <li>Contain at least one number and one of these symbols -/_+£&amp;@"?!‘.,()</li>
                                                    </ul>
                                                </div>
                                                <div class="form-group">
                                                    <button type="button" @click.prevent="change_password" class="btn btn-primary">Save Password</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</template>
<script>
import { mapActions, mapGetters } from 'vuex';
    import SubHeader from './sub_header'

    export default {
        components: {
            SubHeader,
        },

        name: 'Profile',

        data: function () {
            return {
                form: new Form({
                    "id": "",
                    "is_company": true,
                }),
                email: '',
                old_pass: '',
                new_pass: '',
                new_psss_confirmation: '',
            }
        },
        created: function () {
            this.email =  this.get_auth_user_info.email;
        },
        methods: {
            ...mapActions(['fetch_user_information']),
            upload_image: function(){
               let form_data = new FormData($('#profile_pic_form')[0]);
               axios.post('/api/user-profile-update',form_data)
                    .then((res)=>{
                        Toast.fire({
                            icon: 'success',
                            title: 'Profile Image Updated'
                        });
                        this.fetch_user_information();
                    })
            },
            
            change_email: function(){
                axios.post('/api/user-email-update',{email: this.email})
                        .then((res)=>{
                            Toast.fire({
                                icon: 'success',
                                title: 'Email Updated'
                            });
                        })
                        .catch(err => {
                            let error = err.response.data;
                            $('.email_body').addClass('text-danger');
                            // console.log(error);
                            Toast.fire({
                                icon: 'error',
                                title: error.errors.email
                            });
                        })
            },
            change_password: function(){
                axios.post('/api/user-password-update',{
                    old_pass: this.old_pass,
                    new_pass: this.new_pass,
                    new_pass_confirmation: this.new_psss_confirmation,
                })
                .then((res)=>{
                    console.log(res);
                })
                .catch(err => {
                    let error = err.response.data;
                    console.log(error);
                    Toast.fire({
                        icon: 'error',
                        title: error.errors.old_pass&&error.errors.old_pass + ' ' + error.errors.new_pass&&error.errors.new_pass
                    });
                })
            }
        },
        computed: {
            ...mapGetters(['get_auth_user_info']),
        }
    }
</script>
