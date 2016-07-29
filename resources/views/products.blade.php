@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
				   {!! Form::open(array('url' => 'http://localhost/ecom/admin/products' , 'files'=>true, 'method' => 'post')) !!} 

					  <div class="form-group">
						<label for="username">Product Name:</label>
						<input type="username" class="form-control" name="title" id="name">
					  </div>
							{!! Form::label('category_id', 'Category') !!}
							{!! Form::select('category_id', $categories) !!}
					  <div class="form-group">
						<label for="text">Product Description:</label>
						<input type="textarea" class="form-control" name="description" id="name">
					  </div>
					  <div class="form-group">
						<label for="username">Price:</label>
						{!! Form::text('price', null )!!}
					  </div>
					 {!! Form::label('image','Choose an Image') !!}
					 {!! Form::file('image') !!}
					<hr><br>	
					  <button type="submit" class="btn btn-default">Submit</button>
				   {!! Form::close() !!}
					
			</div>
		</div>
	</div>
@endsection