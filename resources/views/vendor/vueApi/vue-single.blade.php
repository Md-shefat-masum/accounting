<template>
    <div class="content-wrapper" style="min-height: 946px;">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <h1>Update {{ $data['singular'] }}</h1>

                        <form @submit.prevent="update{{$data['singular']}}" v-if="loaded">

                            <router-link to="/super-admin/{{ $data['plural_lower'] }}">< Back to {{ $data['plural_lower'] }}</router-link>

                            @foreach($data['fields'] as $field)
                                <div class="form-group">
                                    @if($field['name'] == 'id' || $field['name'] == 'updated_at' || $field['name'] == 'created_at' )
                                        <input type="hidden" v-model="form.{{$field['name']}}"></input>
                                    @elseif($field['simplified_type'] == 'text')
                                        <label>{{ $field['name'] }}</label>
                                        <input type="text" v-model="form.{{$field['name']}}" @if($field['max']) maxlength="{{$field['max']}}" @endif></input>
                                        @if($field['required'] && $field['name'] !== 'id')
                                            <has-error :form="form" field="{{$field['name']}}"></has-error>
                                        @endif
                                    @elseif($field['simplified_type'] == 'textarea')
                                        <label>{{ $field['name'] }}</label>
                                        <textarea v-model="form.{{$field['name']}}" @if($field['max']) maxlength="{{$field['max']}}" @endif></textarea>
                                        @if($field['required'] && $field['name'] !== 'id')
                                            <has-error :form="form" field="{{$field['name']}}"></has-error>
                                        @endif
                                    @else
                                        <label>{{ $field['name'] }}</label>
                                        <input type="number" v-model="form.{{$field['name']}}"></input>
                                        @if($field['required'] && $field['name'] !== 'id')
                                            <has-error :form="form" field="{{$field['name']}}"></has-error>
                                        @endif
                                    @endif
                                </div>
                            @endforeach

                            <div class="form-group">
                                <button class="button" type="submit" :disabled="form.busy" name="button">@{{ (form.busy) ? 'Please wait...' : 'Update'}}</button>
                                <button @click.prevent="delete{{$data['singular']}}">@{{ (form.busy) ? 'Please wait...' : 'Delete'}}</button>
                            </div>
                        </form>

                        <span v-else>Loading {{ $data['singular_lower'] }}...</span>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    import NewFooter from '../../../layouts/partials/new_footer'

    export default {
        components: {
            NewFooter,
        },
        name: '{{ $data['singular'] }}',
        data: function(){
            return {
                loaded: false,
                form: new Form({
                    @foreach($data['fields'] as $field)
                    "{{$field['name']}}" : "",
                    @endforeach
                })
            }
        },
        created: function(){
            this.get{{$data['singular']}}();
        },
        methods: {
            get{{$data['singular']}}: function({{$data['singular']}}){

                var that = this;
                this.form.get('{{config('vueApi.vue_url_prefix')}}/{{ $data['plural_lower'] }}/'+this.$route.params.id).then(function(response){
                    that.form.fill(response.data);
                    that.loaded = true;
                });

            },
            update{{$data['singular']}}: function(){

                var that = this;
                this.form.put('{{config('vueApi.vue_url_prefix')}}/{{ $data['plural_lower'] }}/'+this.$route.params.id).then(function(response){
                    that.form.fill(response.data);
                })

            },
            delete{{$data['singular']}}: function(){

                var that = this;
                this.form.delete('{{config('vueApi.vue_url_prefix')}}/{{ $data['plural_lower'] }}/'+this.$route.params.id).then(function(response){
                    that.form.fill(response.data);
                    that.$router.push('/super-admin/{{$data['plural_lower']}}');
                })

            }
        }
    }
</script>
