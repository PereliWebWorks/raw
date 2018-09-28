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
				fields: {
					'name': {
						required: true,
						autocomplete_list: this.referrant_orgs
					}
				},
				route: route('referrant_orgs.store')
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
				<new-referrant-org-form v-bind:referrant_orgs="referrant_orgs" 
					v-on:update:referrant_orgs="newOrg($event)" />
			</b-col>
			<b-col cols="4">
				<h3>Referrant Organizations</h3>
				<b-list-group>
					<b-list-group-item 
						v-for="org in referrant_orgs"
						:key="org.id"
						class="d-flex justify-content-between align-items-center"
					>
						@{{humanize(org.name)}}
						<span class="d-flex justify-content-start">
							<edit-btn class="m-2" />
							<delete-btn 
								class="m-2" 
								:resource_id="org.id"
								:resource_type="'referrant organization'"
								:resource_name="org.name"
								:route="get_route('referrant_orgs.destroy', org.id)"
								:succeed="removeOrgFromList"
							/>
						</span>
					</b-list-group-item>
				</b-list-group>
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
				this.referrant_orgs.push(org);
				var message = `${this.humanize(org.name)} added!`;
				this.$store.commit('setMessage', {message: message, variant: 'success'});
			},
			removeOrgFromList: function(id){
				var index = this.referrant_orgs.findIndex(el => id === el.id);
				this.referrant_orgs.splice(index, 1);
			}
		}
	});
</script>
@endsection

@section('content')
	<page />
@endsection