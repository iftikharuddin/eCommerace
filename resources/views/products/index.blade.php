@extends('layouts.app')

@section('content')
	<div class="container">	
		<div class="row">
				@foreach($products as $product)
					<div class="col-md-4 col-lg-4 col-sm-12">
							<li>{!! $product->title  !!} - ({!! $product->price !!})</li>
							<p> {!! $product->description !!}</p>
							{!! Html::image($product->image ,$product->title, array('width'=>'50','height' =>'50')) !!}</p>
							{!! Form::open(array('url' => 'http://localhost/ecom/admin/products/destroy' , 'files'=>true, 'method' => 'delete')) !!}
										{!! Form::hidden('id', $product->id) !!}
										<button type="submit" class="btn btn-default">Delete</button>
										<hr>
						  {!! Form::close() !!}
					 </div>
				@endforeach
				<div class="col-md-12 col-lg-12 col-sm-12"
					<hr>
					<a class="btn btn-default" href="http://localhost/ecom/admin/products/create">Create New Product</a>
					<a class="btn btn-default" href="http://localhost/ecom/admin/categories"> View Categories</a>
				</div>
		</div>	
	</div>
@endsection