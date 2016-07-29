@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                    @if(Auth::user()->admin)
						<li> <a href="http://localhost/ecom/store">Goto Store</a></li>
						<li> <a href="http://localhost/ecom/admin/products">SHOW ALL Products</a></li>
						<li> <a href="http://localhost/ecom/admin/products/create">Create Products</a></li>
						<li> <a href="http://localhost/ecom/admin/categories/create">Create Category</a></li>
						<li> <a href="http://localhost/ecom/admin/categories">Show Categories</a></li>
               		@endif
               		@if(Auth::user())
               			<li> <a href="http://localhost/ecom/store">Goto Store</a></li>
               		@endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
