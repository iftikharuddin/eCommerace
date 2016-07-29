@extends('layouts.app')

@section('content')
	{!! $product->title !!} <br>
	{!! $product->description !!} <br>
	{!! Html::image($product->image) !!}
	
	<hr>
	<a href="http://localhost/ecom/store" class="btn btn-default">Back to Store</a>
	<hr>
	
@endsection