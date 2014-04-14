@extends('master')

@section('jumbotron')

<div class="col-sm-12">
	<h1>My Submissions</h1>
</div>

@stop

@section('main-content')
<div class="col-sm-12">
	<h1></h1>
	{{ Form::open(array('url' => '/mysubmissions/edit/' . $priceSubmission -> id))}}
	<div class="form-group">
		<div class="col-sm-2">
			{{ Form::label('price', 'Price', array('class' => 'control-label'))}}
		</div>
		<div class="input-group col-sm-6">
			<span class="input-group-addon">$</span>
			{{ Form::text('price', number_format($priceSubmission -> price, 2), array('class' => 'form-control')) }}
		</div>
	</div>
	<div class="form-group col-sm-12">
		<button class="btn btn-default">
			Cancel
		</button>
		<button type="submit" class="btn btn-primary">
			Update
		</button>
	</div>
	{{ Form::close() }}
</div>
@stop