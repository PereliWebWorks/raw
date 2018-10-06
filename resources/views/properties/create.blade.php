@extends('layouts.app')
@section('component-registration')
<script type="x-template" id="my-template">
	<v-form :route="route" :fields="fields" />
</script>
<script>
	Vue.component('new-property-form', {
		template: '#my-template',
		data: function(){
			return {
				route: route('properties.store'),
				fields: {
					nickname: {required: true},
					address: {multi: true}
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