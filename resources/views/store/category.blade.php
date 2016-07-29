@extends('layouts.app')

@section('content')
	<div class="container">	
		<div class="row">
				@foreach($products as $product)
					<div class="col-md-4 col-lg-4 col-sm-12">
							<li>{!! $product->title  !!} - ({!! $product->price !!})</li>
							<p> {!! $product->description !!}</p>
							<a href="http://localhost/ecom/store/{!! $product->id !!}">
								{!! Html::image($product->image ,$product->title) !!}</p>
							</a>		
						  {!! Form::close() !!}
					 </div>
				@endforeach
				
		</div>	
	</div>
@endsection