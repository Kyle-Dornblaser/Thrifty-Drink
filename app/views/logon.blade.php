@extends('master')

@section('jumbotron')

<div class="col-sm-12">
	<h1>Logon and get all these benefits</h1>
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

<div class="col-sm-12">
	<h1>Logon</h1>
	{{ Form::open(array('action' => 'UserController@logon')) }}
		
		{{ Form::text('username', '') }}
		{{ Form::password('password') }}
		{{ Form::submit('Logon') }}
	{{ Form::close() }}

</div>
@stop
