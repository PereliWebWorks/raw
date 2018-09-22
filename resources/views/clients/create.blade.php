@extends('layouts.app')


@section('component-registration')
<script>
	Vue.component('new-client-form', {
		template: `
			<b-form v-on:submit="submit" v-on:reset="reset">
				<b-card v-for="(group, groupName) in fieldGroups" :key="groupName">
					<b-form-group 
						horizontal
						:label="group.label ? group.label : humanize(groupName)"
						label-size="lg"
						label-class="font-weight-bold"
					>
						<template v-for="(field, fieldName) in group.fields">
							<b-form-group 
								:label="field.label ? field.label : humanize(fieldName)"
								:label-for="field.id ? field.id : fieldName"
							>
							<date-picker
								v-if="field.type && field.type === 'date'"
								:id="field.id ? field.id : fieldName"
								value="new Date()"
								:config="{format: 'MMMM Do, YYYY', }"
								v-model="form[fieldName]"
							/>	
							<b-form-input
								v-else
								:id="field.id ? field.id : fieldName"
								:type="field.type ? field.type : 'text'"
								v-model="form[fieldName]"
							/>
							</b-form-group>
						</template>
					</b-form-group>
				</b-card>
				<b-button type="submit" variant="primary">Submit</b-button>
			</b-form> 
		`,
		data: function(){
			return {
				fieldGroups: {
					'client_info': {
						fields: {
							first_name: {},
							last_name: {},
							email: {type: 'email'},
							phone: {type: 'tel'},
							admit_date: {type: 'date'},
							discharge_date: {type: 'date'},

						}
					},
					'financial_representative_info': {
						fields: {
							frp_first_name: {},
							frp_last_name: {},
							frp_email: {type: 'email'},
							frp_phone: {type: 'tel'}
						}
					}
				},
				form: {}
			}
		},
		methods: {
			submit: function(e){
				e.preventDefault();
				console.log(this.form);
			},
			reset: function(){return false;}
		}
	});
</script>
@endsection

@section('content')

	<new-client-form/>
	

@endsection