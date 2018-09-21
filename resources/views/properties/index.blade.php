@extends('layouts.app')

@section('scripts')
<script>
	function deleteProperty(id){
		axios.delete(route('properties.destroy', id))
		.then(() => console.log('it worked'))
		.catch(e => console.log(e));
	}

	var properties = @json($properties);
	@foreach($properties as $i => $property)
		properties[{{$i}}].addresses = @json($property->addresses);
	@endforeach


</script>
@endsection

@section('content')
	<b-container id="properties-list">
	@foreach ($properties as $property)
		<b-row>
			<b-col>
				<h3>{{$property->nickname}}</h3>
				@foreach($property->addresses as $address)
					<div><small>{{$address->address}}</small></div>
				@endforeach
			</b-col>
			<b-col>
				<b-button :variant="'danger'" onclick="deleteProperty({{$property->id}})">Delete</b-button>
			</b-col>
		</b-row>
	@endforeach
	</b-container>
@endsection