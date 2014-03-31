@extends('master')

@section('jumbotron')

<div class="col-sm-12">
	<h1>Browse through the restaurants below</h1>
</div>

@stop

@section('main-content')

<div class="col-sm-12">
	<ul>
	@foreach ($restaurants as $restaurant)
		
	<li><a href="/restaurant/{{ $restaurant -> id }}">{{ $restaurant -> id }}</a></li>
	
	@endforeach
	</ul>


</div>
@stop
