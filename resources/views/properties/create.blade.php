@extends('layouts.app')
@section('component-registration')
<script type="x-template" id="my-template">
	<v-form :route="route" :fields="fields" :postFields="postFields">
		<template slot="post-fields" slot-scope="slotProps">
			<transition-group name="fade" tag="div">	
				<v-field
					v-for="n in addressCount"
					:key="n"
					:field="{label: 'Address ' + n, id: 'address-' + n}"
					:name="'address[]'"
					v-model="slotProps.model.address[n]"
				/>
			</transition-group>
			<b-form-group>
					<b-btn @click="addressCount++" variant="info">Add Address</b-btn>
					<b-btn v-if="addressCount > 1" @click="addressCount--" variant="danger">Remove Address</b-btn>
			</b-form-group>
		</template>
	</v-form>
</script>
<script>
	Vue.component('new-property-form', {
		template: '#my-template',
		data: function(){
			return {
				route: route('properties.store'),
				addressCount: 1,
				fields: {
					nickname: {required: true}
				},
				postFields: {
					address: {initVal: []}
				}
			}
		}
	});
</script>
@endsection
@section('content')

	<b-row>
	<b-col md="6" offset-md="3">
	<new-property-form />
	</b-col>
	</b-row>

@endsection