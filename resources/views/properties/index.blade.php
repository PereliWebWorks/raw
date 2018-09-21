@extends('layouts.app')

@section('component-registration')
<script>
	function deleteProperty(id){
		
	}

	var properties = @json($properties);
	@foreach($properties as $i => $property)
		properties[{{$i}}].addresses = @json($property->addresses);
	@endforeach

	//Vue.component('thang', {template: '<h1>It works finally</h1>'});
	Vue.component('properties-list', {
		data: function(){
			return {properties}
		},
		template: `
				<b-container id="properties-list">
					<b-row v-for="(property, index) in properties" :key="property.id">
						<b-col>
							<h3>@{{property.nickname}}</h3>
							<div v-for="address in property.addresses" :key="address.id">
								<small>@{{address.address}}</small>
							</div>
						</b-col>
						<b-col>
							<b-button :variant="'danger'" v-on:click="deleteProperty(property.id, index)">
								Delete
							</b-button>
						</b-col>
					</b-row>
				</b-container>
		`,
		methods: {
			deleteProperty: function(id, index) {
				axios.delete(route('properties.destroy', id))
				.then(() => {
					properties.splice(index, 1);
				})
				.catch(e => console.log(e));
			}
		}
	});

</script>
@endsection

@section('content')
	<properties-list></properties-list>
@endsection