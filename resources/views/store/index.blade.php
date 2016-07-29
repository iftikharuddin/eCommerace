@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12">
			@if(Auth::check())
				<h1>Ehehehe Your are  signin! {!! Auth::user()->name !!}</h1>
				<li>{!! Html::link('/logout', 'Signout') !!}</li>
			@else
				<h1>Not logged babay</h1>
				<li>{!! Html::link('users/signin', 'SIGN IN') !!}</li>
				<li>{!! Html::link('users/create', 'Sign UP') !!}</li>

			@endif
		</div>
	</div>
	<div class="row">
		<div class="col-md-5 col-lg-5 col-sm-12"> 
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
		<div class="col-md-5 col-lg-5 col-sm-12"> 
			{!! Form::open(array('url'=>'store/search/' ,'method'=>'get'))!!}
			{!! Form::text('keyword',null , array('placeholder'=>'Search by Keyword...')) !!}
			{!! Form::submit('Search') !!}
			{!! Form::close() !!}
		</div>
	</div>
	<hr>
	<div class="row">
		@foreach($products as $product)
		<div class="col-md-4 col-lg-4 col-sm-12">
			<li>{!! $product->title !!} - ({!! $product->price !!})</li>
			<p> {!! $product->description !!}</p>
			<a href="store/{!! $product->id !!}">
								{!! Html::image($product->image ,$product->title) !!}</p>
							</a> {!! Form::close() !!}
		</div>
		@endforeach

	</div>
		<hr>


</div>
@endsection