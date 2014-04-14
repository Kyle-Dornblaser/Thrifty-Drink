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

	@foreach ($submissions as $drink_type => $drinks)
	<h2>{{ $drink_type }}</h2>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Drink Name</th>
				<th>Average Price</th>
				<th>Number of Submissions</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($drinks as $drink_id => $drink_data)
			<tr>
				<td>{{ $drink_id }}</td>
				<td>&#36;{{ number_format($drink_data['averagePrice'], 2) }}</td>
				<td>{{ $drink_data['count'] }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@endforeach

	@endif
</div>
@stop
