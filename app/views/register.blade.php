@extends('master')

@section('jumbotron')

<div class="col-sm-12">
	<h1>Benefits of signing up</h1>
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
	<h1>Register</h1>
	{{ Form::open(array('action' => 'UserController@register')) }}
	<div class="form-group">
		{{ Form::label('username', 'Username', array('class' => 'label-control')) }}
		{{ Form::text('username', '', array('class' => 'form-control', 'id' => 'username', 'placeholder' => 'Username')) }}
	</div>
	<div class="form-group">
		{{ Form::label('email', 'Email', array('class' => 'label-control')) }}
		{{ Form::text('email', '', array('class' => 'form-control', 'id' => 'email', 'placeholder' => 'Email')) }}
	</div>
	<div class="form-group">
		{{ Form::label('password', 'Password', array('class' => 'label-control')) }}
		{{ Form::password('password', array('class' => 'form-control', 'id' => 'password', 'placeholder' => 'Password')) }}
	</div>
	<div class="form-group">
		{{ Form::label('repeat-password', 'Repeat Password', array('class' => 'label-control')) }}
		{{ Form::password('repeat-password', array('class' => 'form-control', 'id' => 'repeat-password', 'placeholder' => 'Repeat Password')) }}
	</div>
	<div class="form-group">

		<button type="reset" class="btn btn-default">
			Clear
		</button>
		<button type="submit" class="btn btn-primary">
			Register
		</button>
	</div>
	{{ Form::close() }}

</div>
@stop
