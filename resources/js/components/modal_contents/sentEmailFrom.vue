<template>
    <div class="row">
        <div class="col-12">
            <div class="card border">
                <div class="card-body email_body">
                    <div v-if="show_loader" class="loader"></div>
                    <div class="form-horizontal A54VNK-Xg-f">
                        <div class="form-group">
                            <label class="control-label"> To: <span class="text-danger">*</span> </label>
                            <div class="dropdown">
                                <input type="text" v-model="email" class="form-control border px-2" autocomplete="off" autocorrect="off" spellcheck="false" />
                            </div>
                        </div>

                        <br>
                        <div class="form-group">
                            <label class="control-label"> Subject: </label>
                            <input type="text" v-model="subject" class="form-control border  px-2" maxlength="100" />
                        </div>

                        <br>
                        <div class="form-group">
                            <label class="control-label"> Message: </label>
                            <textarea v-model="message" class="form-control border px-2" rows="8"></textarea>
                        </div>

                        <!-- <div class="form-group">
                            <div>
                                <label class="bolder"> <input class="A54VNK-Xg-d" type="checkbox" /> Send me a copy </label>
                            </div>
                        </div> -->
                        <div class="form-group" style="margin-top: 30px;">
                            <button type="button" @click="sentMail" class="btn btn-primary btn-lg btn-block">Send</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters, mapMutations } from 'vuex';
export default {
    props:['data_info'],
    data: function(){
        return {
            customer_id: this.data_info.customer_id,
            email: '',
            subject: this.data_info.customer + ' ' + this.data_info.code,
            message: '',
            show_loader: false,
        }
    },
    created: function(){
        axios.get('/api/customers/'+this.data_info.customer_id)
            .then((res)=>{
                this.email = res.data.email;
                this.subject = this.data_info.customer + ' ' + this.data_info.code;
            })
    },
    methods: {
        ...mapMutations([
            'get_pdf_link',
        ]),
        sentMail: function(){
            let data = {
                email: this.email,
                subject: this.subject,
                message: this.message,
            };
            this.show_loader = true;
            axios.post('/api/sent-mail/',data)
                .then((res)=>{
                    this.message = '';
                    this.show_loader = false;
                    alert('mail has been sent successfuly.');
                })
        },
    },
    computed: {
        ...mapGetters([
            'get_pdf_link'
        ])
    }
}
</script>

<style scoped>
    .form-group input.form-control {
        box-sizing: border-box;
    }
    .email_body{
        position: relative;
    }
    .email_body .loader{
        position: absolute;
        height: 100%;
        width: 100%;
        background: rgba(189, 189, 189, 0.623) url('/loader.gif');
        background-repeat: no-repeat;
        background-position: center center;
        left: 0;
        top: 0;
        z-index: 9;
        backdrop-filter: blur(2px);
    }
</style>

