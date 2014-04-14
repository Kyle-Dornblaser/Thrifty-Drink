@extends('master')

@section('jumbotron')

<div class="col-sm-12">
	<h1>My Submissions</h1>
</div>

@stop

@section('main-content')
<div class="col-sm-12">
	<h1></h1>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Restaurant</th>
				<th>Drink Name</th>
				<th>Price</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($submissions as $submission)
			<tr>
				<td>{{ $submission -> restaurant_id }}</td>
				<td>{{ $submission -> drink_id }}</td>
				<td>&#36;{{ number_format($submission -> price, 2) }}</td>
				<td><a href="{{ url('/mysubmissions/edit/' . $submission -> id) }}" class="btn btn-xs btn-default">
					<span class="glyphicon glyphicon-edit"></span>
				</a>
				<button onclick="deleteModal({{ $submission->id }})" type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteModal">
					<span class="glyphicon glyphicon-remove"></span>
				</button></td>

				@endforeach
			</tr>
		</tbody>
	</table>
</div>
@stop

@section('scripts')
<script src="/bootstrap/js/pricesubmission.js"></script>

<div class="modal fade" id="deleteModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					×
				</button>
				<h4 class="modal-title">Confirm Delete</h4>
			</div>
			<div class="modal-body">
				<p>
					Are you sure you want to delete this submission? This process is irreversible.
				</p>
			</div>
			<div class="modal-footer">
				{{ Form::open(array('id' => "deleteForm")) }}
				{{ Form::hidden('id','', array('id' => 'deleteFormHidden'))}}
				<button type="button" class="btn btn-default" data-dismiss="modal">
					Cancel
				</button>
				<button type="submit" class="btn btn-danger">
					Delete
				</button>
				{{ Form::close() }}
			</div>
		</div>
	</div>
</div>
@stop