@extends('layouts.app')

@section('content')
	@foreach($categories as $category)
		<li>{!! $category->name !!} </li>
		{!! Form::open(array('url' => 'http://localhost/ecom/admin/categories/destroy' , 'files'=>true, 'method' => 'delete')) !!}
		        {!! Form::hidden('id', $category->id) !!}
				<button type="submit" class="btn btn-default">Delete</button>
				<hr>
		{!! Form::close() !!}
	@endforeach
	
	<hr>
	<a class="btn btn-default" href="http://localhost/ecom/admin/categories/create"> Create New Category</a>
@endsection