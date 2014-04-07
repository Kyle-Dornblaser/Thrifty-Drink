@extends('master')

@section('jumbotron')

<div class="col-sm-12">
	<h1>Sign in and get all these benefits</h1>
	<ul>
		<li>
			View all your past submissions
		</li>
		<li>
			Save your favorite restaurants and bars for easy access (future feature)
		</li>
		<li>
			Not subject to CAPTCHA (future feature)
		</li>
	</ul>
</div>

@stop

@section('main-content')

<div class="col-sm-6">

	<h1>Sign In</h1>
	{{ Form::open(array('action' => 'UserController@signIn')) }}
	<div class="form-group">
		{{ Form::label('username', 'Username', array('class' => 'label-control')) }}
		{{ Form::text('username', '', array('class' => 'form-control', 'id' => 'username', 'placeholder' => 'Username')) }}
	</div>
	<div class="form-group">
		{{ Form::label('password', 'Password', array('class' => 'label-control')) }}
		{{ Form::password('password', array('class' => 'form-control', 'id' => 'password', 'placeholder' => 'Password')) }}
	</div>
	<div class="form-group">

		<button type="reset" class="btn btn-default">
			Clear
		</button>
		<button type="submit" class="btn btn-primary">
			Sign In
		</button>
	</div>
	{{ Form::close() }}

</div>
@stop
