@extends('layouts.app')


@section('component-registration')
<script>
	Vue.component('new-client-form', {
		template: `
			<v-form :groups="groups" :route="route" />
		`,
		data: function(){
			return {
				route: route('clients.store')
			}
		},
		computed: {
			groups: function(){
				return {
					client_info: {
						fields: {
							first_name: {},
							last_name: {},
							email: {required: false},
							phone: {required: false},
							property: {
								//autocomplete_list: this.$store.state.data.properties.map(e => this.humanize(e.name)),
								//autocomplete_dropdown: true
							},
							discharge_date: {type: 'date', required: false},
							admit_date: {type: 'date'}
						}
					}
				}
			}
		}
	});
</script>
@endsection

@section('content')

<new-client-form />
	

@endsection