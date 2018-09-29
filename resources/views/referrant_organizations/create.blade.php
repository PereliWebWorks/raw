@extends('layouts/app')

@section('component-registration')
<script>

	
	
	Vue.component('new-referrant-org-form', {
		template: `
			<v-form :fields="fields" :route="route" :succeed="succeed" :fail="fail" />
		`,
		props: ['referrant_orgs'],
		data: function(){
			return {
				route: route('referrant_orgs.store')
			}
		},
		computed: {
			fields: function(){
				return {
					'name': {
						required: true,
						autocomplete_list: this.referrant_orgs.map(el => this.humanize(el.name))
					}
				}
			}
		},
		methods: {
			succeed: function(response){
				this.$emit('update:referrant_orgs', response.data);
			},
			fail: function(response){
				var message = response.data.errors.name[0];
				this.$store.commit('setMessage', {message: message, variant: 'danger'});
			}
		}
	});


	Vue.component('page', {
		template: `
		<b-row>
			<b-col cols="6" offset="1">
				<new-referrant-org-form v-bind:referrant_orgs="$store.state.data.referrant_orgs" 
					v-on:update:referrant_orgs="newOrg($event)" />
			</b-col>
			<b-col cols="4">
				<referrant-org-list :referrant_orgs="$store.state.data.referrant_orgs"/>
			</b-col>
		</b-row>
		`,
		data: function(){
			return {
				referrant_orgs: @json($referrant_orgs)
			}
		},
		methods: {
			newOrg: function(org){
				this.$store.commit('addData', {type: 'referrant_orgs', data: org});
				var message = `${this.humanize(org.name)} added!`;
				this.$store.commit('setMessage', {message: message, variant: 'success'});
			}
		}
	});


</script>
@endsection

@section('content')
	<page />
@endsection