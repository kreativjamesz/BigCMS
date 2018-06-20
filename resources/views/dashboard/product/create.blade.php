@extends('dashboard.layouts.master')
@section('content')
<div class="container">
	@if(\Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{\Session::get('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
		  	</button>
        </div>
    @endif
	@if ($errors->any())
	    <div class="alert alert-danger alert-dismissible fade show">
	        <ul style="padding-left:0px;">
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
		  	</button>
	    </div><br />
	@endif
	<div class="row">
		<div class="col-md-4">
			<div class="card">
				<div class="card-body">
	            <div class="text-left">
	                <h2  style="display: inline-block;" class="mr-5">New Product</h2>
	            </div>
				<form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<input type="text" class="form-control flat" name="title" id="title" placeholder="Product Title Name..." autofocus>
					</div>
					<div class="form-group">
						<textarea class="form-control flat" name="description" id="description" rows="4" placeholder="Product Description..."></textarea>
					</div>
					<div class="form-group">
						<label for="image" class="image">Image</label>
						<input type="file" class="form-control flat" name="product_image" id="product_image" placeholder="Product Description..." >
					</div>
					<div class="form-group">
						<button class="btn btn-success btn-block flat">Save</button>
					</div>
				</form>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="card">
				<div class="card-body">
					<div class="text-left">
		                <h2  style="display: inline-block;" class="mr-5">List of Product</h2>
		                <a class="btn btn-warning btn-sm" href="{{ url('dashboard/product') }}" style="display: inline-block;float:right;"> Back</a>
		            </div>
					<table class="table table-hover table-inverse">
						<tr>
				            <th>No</th>
				            <th>Name</th>
				            <th>Details</th>
				            <th>Image</th>
				            <th>Action</th>
				        </tr>
				        @foreach ($products as $product)
					    <tr>
					        <td>{{ $product->id }}</td>
					        <td>{{ $product->title }}</td>
					        <td>{{ $product->description }}</td>
					        <td><a href='{{ asset("images/products/$product->product_image") }}'><img src="{{asset('images/products/')}}/{{ $product->product_image }}" class="img-fluid" width="32"></a></td>
					        <td><a href="{{ route('product.edit',$product->id) }}" class="btn btn-secondary btn-sm flat">Edit</a> | <a href="" class="btn btn-danger btn-sm flat">Delete</a></td>
					    </tr>
					    @endforeach
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection