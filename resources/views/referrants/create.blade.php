@extends('layouts/app')
@section('component-registration')
<script>
	Vue.component('new-referrant-form', {
		template: `
			<v-form :fields="fields" :displayMessageOnSuccess="true" :route="route" />
		`,
		data: function(){
			return {
				route: route('referrants.store')
			}
		},
		computed: {
			fields: function(){
				return {
					referrant_organization: {
						autocomplete_list: this.$store.state.data.referrant_orgs.map(e => this.humanize(e.name)),
						autocomplete_dropdown: true
					},
					name: {},
					email: {type: 'email'},
					phone: {type: 'tel'}
				}
			}
		}
	});
</script>
@endsection
@section('content')
	<h1>New Referrant</h1>
	<new-referrant-form />
@endsection