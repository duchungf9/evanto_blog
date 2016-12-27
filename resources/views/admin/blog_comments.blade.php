{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('post_id', 'Post_id:') !!}
			{!! Form::text('post_id') !!}
		</li>
		<li>
			{!! Form::label('status', 'Status:') !!}
			{!! Form::text('status') !!}
		</li>
		<li>
			{!! Form::label('ip', 'Ip:') !!}
			{!! Form::text('ip') !!}
		</li>
		<li>
			{!! Form::label('user_agent', 'User_agent:') !!}
			{!! Form::text('user_agent') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}