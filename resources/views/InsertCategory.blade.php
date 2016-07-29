@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
				   {!! Form::open(array('url' => 'http://localhost/ecom/admin/categories' , 'method' => 'post')) !!} 

					  <div class="form-group">
						<label for="username">Category Name:</label>
						<input type="username" class="form-control" name="name" id="name">
					  </div>	
					  <button type="submit" class="btn btn-default">Submit</button>
				   {!! Form::close() !!}
					
			</div>
			
		</div>
	</div>
@endsection