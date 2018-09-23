@extends('layouts/app')

@section('component-registration')
<script>
	Vue.component('new-referrant-org-form', {
		template: `
			<v-form :fields="fields" />
		`,
		data: function(){
			return {
				fields: {
					'name': {}
				}
			}
		}
	});
</script>
@endsection

@section('content')
	<new-referrant-org-form />
@endsection