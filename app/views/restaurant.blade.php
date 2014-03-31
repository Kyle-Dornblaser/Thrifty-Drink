@extends('master')

@section('jumbotron')

<div class="col-sm-12">
	<h1>{{ $name }}</h1>
</div>

@stop

@section('main-content')

<div class="col-sm-12">
	@if ($submissions == null)
	<h1>No drinks found for {{ $name }}</h1>
	@else
		@foreach ($submissions as $submission)
				<p><strong>{{ $submission -> drink_id }}</strong>: &#36;{{ number_format($submission -> price, 2) }}</p>
				
			
		@endforeach
	@endif
</div>
@stop
