<template>
    <div>
        <sub-header type="basic"/>

        <section class="content content-menu">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div id="contentRootPanel" style="" class="">
                            <div class="page-panel panel-default p-4">
                                <div class="panel-body page-panel-body">
                                    <div data-id="ace407dd-64aa-428b-a2f2-c6fb6aa5d8a7">
                                        <div class="row A54VNK-Xe-d">
                                            <h2 class="bolder ellipsis A54VNK-Xe-c col-xs-8 col-sm-6">Storage Locations</h2>
                                            <div class="col-xs-4 col-sm-6 clearfix">
                                                <div class="pull-right">
                                                    <router-link style="line-height:1" class="dropdown-item btn btn-primary ellipsis-inline"
                                                        to="/inventory/storage-location/create">New Storage Location</router-link>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6 col-sm-6"><input type="text" class="form-control" placeholder="Search this list" /></div>
                                        </div>
                                        <div class="A54VNK-Xe-a table-responsive">
                                            <table __gwtcellbasedwidgetimpldispatchingfocus="true" __gwtcellbasedwidgetimpldispatchingblur="true" class="A54VNK-Sb-y table table-striped table-hover table-link" cellspacing="0">
                                                <colgroup>
                                                    <col />
                                                </colgroup>
                                                <thead>
                                                    <tr __gwt_header_row="0">
                                                        <th colspan="1" class="A54VNK-Sb-h A54VNK-Sb-f A54VNK-Sb-p" __gwt_column="column-gwt-uid-330" __gwt_header="header-gwt-uid-331">
                                                            Warehouse Name
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody style="">
                                                    <tr __gwt_row="0" __gwt_subrow="0" class="A54VNK-Sb-b">
                                                        <td class="A54VNK-Sb-a A54VNK-Sb-c A54VNK-Sb-d A54VNK-Sb-n">
                                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-332">MAIN LOCATION</div>
                                                        </td>
                                                    </tr>
                                                    <tr __gwt_row="1" __gwt_subrow="0" class="A54VNK-Sb-r">
                                                        <td class="A54VNK-Sb-a A54VNK-Sb-s A54VNK-Sb-d A54VNK-Sb-n">
                                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-332">jatrabari</div>
                                                        </td>
                                                    </tr>
                                                    <tr __gwt_row="2" __gwt_subrow="0" class="A54VNK-Sb-b">
                                                        <td class="A54VNK-Sb-a A54VNK-Sb-c A54VNK-Sb-d A54VNK-Sb-n">
                                                            <div style="outline-style: none;" __gwt_cell="cell-gwt-uid-332">jatrabari</div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tbody style="display: none;">
                                                    <tr>
                                                        <td align="center" colspan="1">
                                                            <div>
                                                                <div aria-hidden="true" style="width: 100%; height: 100%; padding: 0px; margin: 0px; display: none;">
                                                                    <div aria-hidden="true" style="width: 100%; height: 100%; display: none;"><div class="text-muted text-left">No items to show</div></div>
                                                                </div>
                                                                <div style="width: 100%; height: 100%; padding: 0px; margin: 0px;">
                                                                    <div class="A54VNK-Sb-q" style="width: 100%; height: 100%;"><div class="text-muted text-left">Loading data...</div></div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tfoot aria-hidden="true" style="display: none;"></tfoot>
                                            </table>
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
import SubHeader from "../sub_header";
export default {
    components: {
        SubHeader,
    }

}
</script>

<style>

</style>

