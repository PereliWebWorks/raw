@extends('layouts/app')
@section('component-registration')
<script>
	Vue.component('new-referrant-form', {
		template: `
			<v-form :fields="fields" :displayMessageOnSuccess="true" :route="route" :succeed="succeed" />
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
						autocomplete_dropdown: true,
						help_text: 'Pick an existing organization, or add a new one'
					},
					first_name: {},
					last_name: {},
					email: {required: false},
					phone: {required: false}
				}
			}
		},
		methods: {
			succeed(response){
				var referrant_org;
				if (referrant_org = response.data.referrant_org)
					this.$store.commit('addData', {type: 'referrant_orgs', data: referrant_org});
			}
		}
	});
</script>
@endsection
@section('content')
<b-row>
	<b-col md="6" offset-md="3">
		<h1>New Referrant</h1>
		<new-referrant-form />
	</b-col>
</b-row>
@endsection