<template>
    <div class="panel-body page-panel-body">
        <div class="form-horizontal">
            <div class="form-group" data-id="v192168000015_1097766273703_2032">
                <div class="col-sm-12">
                    <span class="">Please specify the Type and Name of the new Measurement Unit</span>
                </div>
            </div>
            <div class="form-group row" data-id="v192168000015_1097766321718_2033">
                <div class="col-sm-4 col-xs-4 control-label">
                    <label class="" for="gwt-uid-1654" style="font-weight: normal;">Type</label>
                    <span class="text-danger bold">*</span>
                </div>
                <div class="col-sm-8 col-xs-8">
                    <div class="select-panel A54VNK-Oi-c">
                        <select class="form-control" v-model="form_data.type" size="1" id="gwt-uid-1654">
                            <option value="Dimension">Dimension</option>
                            <option value="Piece">Piece</option>
                            <option value="Surface">Surface</option>
                            <option value="Time">Time</option>
                            <option value="Volume">Volume</option>
                            <option value="Weight">Weight</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group SimpleTextQuestion row" data-id="v192168000015_1097766545265_2034">
                <div class="col-sm-4 col-xs-4 control-label">
                    <label class="" for="gwt-uid-1655" style="font-weight: normal;">Name</label>
                    <span class="text-danger bold">*</span>
                </div>
                <div class="col-sm-8 col-xs-8">
                    <input type="text" v-model="form_data.name" class="form-control" id="gwt-uid-1655" />
                </div>
            </div>

            <div class="form-group row" data-id="v010000000013_1183029447843_5428">
                <div class="col-sm-4 col-xs-4 control-label">
                    <label class="" for="gwt-uid-1658" style="font-weight: normal;">Unit Reference</label>
                    <span class="text-danger bold">*</span>
                </div>
                <div class="col-sm-8 col-xs-8">
                    <div class="select-panel A54VNK-Oi-c">
                        <select v-if="form_data.type == 'Dimension'" class="form-control" v-model="form_data.unit_reference" size="1" id="gwt-uid-1658">
                            <option value="Meter">Meter</option>
                        </select>
                        <select v-if="form_data.type == 'Piece'" class="form-control" v-model="form_data.unit_reference" size="1" id="gwt-uid-1658">
                            <option value="Piece">Piece</option>
                        </select>
                        <select v-if="form_data.type == 'Surface'" class="form-control" v-model="form_data.unit_reference" size="1" id="gwt-uid-1658">
                            <option value="Sqare foot">Sqare foot</option>
                        </select>
                        <select v-if="form_data.type == 'Time'" class="form-control" v-model="form_data.unit_reference" size="1" id="gwt-uid-1658">
                            <option value="Day">Day</option>
                            <option value="Hour">Hour</option>
                            <option value="Month">Month</option>
                            <option value="Quarter">Quarter</option>
                            <option value="Year">Year</option>
                        </select>
                        <select v-if="form_data.type == 'Volume'" class="form-control" v-model="form_data.unit_reference" size="1" id="gwt-uid-1658">
                            <option value="Centiliter">Centiliter</option>
                            <option value="Cubic meter">Cubic meter</option>
                            <option value="Liter">Liter</option>
                        </select>
                        <select v-if="form_data.type == 'Weight'" class="form-control" v-model="form_data.unit_reference" size="1" id="gwt-uid-1658">
                            <option value="Gram">Gram</option>
                            <option value="Kilogram">Kilogram</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group row" data-id="v010000000013_1183036250031_5447">
                <div class="col-sm-4 col-xs-4 control-label">
                    <label class="" for="gwt-uid-1659" style="font-weight: normal;">Conversion factor</label>
                    <span class="text-danger bold" aria-hidden="true" style="display: none;">*</span>
                </div>
                <div class="col-sm-8 col-xs-8">
                    <input type="number" v-model="form_data.conversion_factor" class="form-control" id="gwt-uid-1659" style="text-align: right;" />
                </div>
            </div>
        </div>
        <hr />
    </div>
</template>

<script>
    export default {
        props: ['set_form_data'],
        data: function(){
            return {
                form_data : {
                    type: '',
                    name: '',
                    unit_reference: '',
                    conversion_factor: 0.00,
                }
            }
        },
        updated: function(){
            this.set_form_data(this.form_data)
        }
    }
</script>

<style>

</style>

