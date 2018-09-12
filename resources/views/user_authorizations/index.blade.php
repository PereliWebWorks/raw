@extends('layouts.app')

@section('content')
	
	<unauthorized-user-list v-bind:unauthorized_user_list_init='{{$unauthorized_users}}'>
	</unauthorized-user-list>



@endsection