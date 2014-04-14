@extends('master')

@section('jumbotron')

<div class="col-sm-12">
	<h1>Thank you!</h1>
	
</div>

@stop

@section('main-content')

<div class="col-sm-12">
	<h2>We saved your submission.</h2>
	<p>You can view your submission on the <a href="/restaurant/{{ $restaurant }}">{{$restaurant}}</a> page.</p>

</div>
@stop
