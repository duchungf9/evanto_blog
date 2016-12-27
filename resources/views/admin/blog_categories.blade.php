@extends('layouts.app')

@section('content')
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
		<h5>Creat Category</h5>
		<form action="/admin/category" method="post">
			<div class="input-group">
				<span class="input-group-addon">Name</span>
				<input type="text" class="form-control" name="name"/>
			</div>
				<br>
			<div class="input-group">
				<span class="input-group-addon">Slug</span>
				<input type="text" class="form-control" name="slug"/>
			</div>
				<br>
			<div class="input-group">
				<span class="input-group-addon">Description</span>
				<input type="text" class="form-control" name="description"/>
			</div>
				<br>
			{{ csrf_field() }}
			<button class="btn btn-info">Submit</button>
		</form>


	</div>



@endsection

