<template>
    <section>
        <div class="modal-body A54VNK-eh-a" style="max-height: 847px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-xl-3 col-sm-push-9 order-xl-2 order-md-1">
                        <div class="A54VNK-Di-b">
                            <div class="A54VNK-Di-h d-flex justify-content-start flex-wrap">
                                <button type="button"
                                    @click="trigger_show_mail"
                                    class="btn btn-primary modal_print_btn modal_print_btn_sm btn-lg btn-block ellipsis A54VNK-Di-a d-flex align-items-center justify-content-center" >
                                    <span class="picto-font A54VNK-Di-g" >M</span >
                                    <span class="ellipsis A54VNK-Di-f" v-if="!email_show">
                                        Email
                                    </span>
                                    <span class="ellipsis A54VNK-Di-f" v-else>
                                        Close Email
                                    </span>
                                </button>
                                <button
                                    @click="print_view()"
                                    type="button"
                                    class="btn btn-default modal_print_btn modal_print_btn_sm btn-lg btn-block ellipsis A54VNK-Di-a" >
                                    <span class="picto-font A54VNK-Di-g" >/</span >
                                    <span class="A54VNK-Di-f"> Print </span>
                                </button>
                                <button
                                    @click="edit(print_quote_id)"
                                    type="button" style="margin-top: 6px;"
                                    class="btn btn-default modal_print_btn btn-lg btn-block ellipsis A54VNK-Di-a" >
                                    <span class="picto-font A54VNK-Di-g" >p</span >
                                    <span class="A54VNK-Di-f">
                                        Customise this document
                                    </span>
                                </button>
                            </div>
                        </div>
                        <sent-email-from :key="email_render" :key_value="email_render" v-if="email_show" :data_info="email_data"></sent-email-from>
                    </div>
                    <div class="col-sm-12 col-xl-9 col-sm-pull-3 order-md-2 order-xl-1 order-sm-2">
                        <div class="A54VNK-ej-c iframe_body custom_scroll" id="print_document" style="height: 80vh;width:768px; overflow-y: scroll;" >
                            <!-- <iframe
                                class="A54VNK-ej-a"
                                :src="pdf_link" style="width:100%;height:100%"></iframe> -->

                            <receipt-print-view v-if="type == 'receipt'" :selected_data="selected_data"></receipt-print-view>

                            <quote-print-view v-if="type == 'quotation'" :selected_data="selected_data"></quote-print-view>

                            <sale-print-view v-if="type == 'sales_order'" :selected_data="selected_data"></sale-print-view>

                            <invoice-print-view v-if="type == 'invoice'" :selected_data="selected_data"></invoice-print-view>

                            <delivery-note-print-view v-if="type == 'deliverynote'" :selected_data="selected_data"></delivery-note-print-view>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import DeliveryNotePrintView from '../sales/deliverynotes/deliveryNotePrintView.vue';
    import InvoicePrintView from '../sales/invoices/invoicePrintView.vue';
    import quotePrintView from '../sales/quotes/quotePrintView.vue';
    import ReceiptPrintView from '../sales/receipts/receiptPrintView.vue';
    import SalePrintView from '../sales/saleOrders/SalePrintView.vue';
    import SentEmailFrom from './sentEmailFrom.vue';

    export default {
        components: { quotePrintView, DeliveryNotePrintView, ReceiptPrintView, SalePrintView, InvoicePrintView,SentEmailFrom },
        props: {
            type: String,
            selected_data: Object,
            pdf_link: String,
            print_quote_id: Number,
            sentMail: Function,
            print_quote: Function,
            edit_content: Function,
        },
        name: "printModalBody",
        data: function(){
            return {
                email_show : false,
                email_data : '',
                email_render: Math.random(),
            }
        },
        methods: {
            edit: function(quote_id){
                $('#printModal').modal('hide');
                this.edit_content(this.selected_data.id);
                // this.$router.replace({ name: 'editQuote', params: { id: this.print_quote_id }});
            },
            print_view: function(){

                var divToPrint=document.getElementById('print_document');

                var newWin=window.open('','Print-Window');

                newWin.document.open();

                // let printCss = `<link rel="stylesheet" href="'+${location.origin}+'/backend/assets/printview.css">`;
                newWin.document.write('<html><head><link rel="stylesheet" href="'+location.origin+'/backend/assets/printview.css"></head><body>'+divToPrint.innerHTML+'</body></html>');
                newWin.document.close();
                setTimeout(() => {
                    newWin.print();
                }, 200);
                setTimeout(function(){newWin.close();},1000);
            },
            trigger_show_mail: function(){
                this.email_show = !this.email_show;
                this.email_render = Math.random();
                this.email_data = this.selected_data;
            }
        }
    };
</script>

<style scoped>
    #print_document{
        padding-right: 15px;
    }
</style>
