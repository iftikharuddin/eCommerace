@extends('layouts.app')

@section('content')
<div class="container">
	<h1> You have searched for <b> {!! $keyword !!}</b></h1>
	<hr>
	<div class="row">
		<div class="dropdown">
			<input class="dropdown-toggle" type="text">
			<div class="dropdown-text">Category</div>
				<ul class="dropdown-content">
					@foreach($catnav as $cat)
					<li>{!! Html::link('store/category/'.$cat->id, $cat->name) !!}</li>
					@endforeach
				</ul>
		</div>
	</div>
	<hr>
	<div class="row">
		@foreach($products as $product)
		<div class="col-md-4 col-lg-4 col-sm-12">
			<li>{!! $product->title !!} - ({!! $product->price !!})</li>
			<p> {!! $product->description !!}</p>
			<a href="http://localhost/ecom/store/{!! $product->id !!}">
								{!! Html::image($product->image ,$product->title) !!}</p>
							</a> {!! Form::close() !!}
		</div>
		@endforeach

	</div>
	<hr>
	

</div>
@endsection