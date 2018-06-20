@extends('dashboard.layouts.master')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6">
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
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
				  	</button>
			    </div><br />
			@endif
			<div class="card">
				<div class="card-header bg-success"><h1>Hello</h1></div>
				<div class="card-body">
					<form method="post" action="{{action('Dashboard\ProductController@update', $id)}}" enctype="multipart/form-data">
					    {{csrf_field()}}
					    <input name="_method" type="hidden" value="PATCH">
					    <div class="form-group">
					        <input type="hidden" value="{{csrf_token()}}" name="_token" />
					        <label for="title">Title:</label>
					        <input type="text" class="form-control" name="title" id="title" value={{$product->title}} />
					    </div>
					    <div class="form-group">
					        <label for="description">Product Description:</label>
					        <textarea rows="4" class="form-control" name="description" id="description">{{$product->description}}</textarea>
					    </div>
					    <div class="form-group">
					    	<label for="product_image">Product Image:</label>
					    	<img class="img-fluid" src="{{asset('images/products')}}/{{$product->product_image}}" alt="{{$product->title}}">
					    	<input type="file" class="form-control mt-1" name="product_image" id="product_image" value={{$product->product_image}} />
					    </div>
					    <button type="submit" class="btn btn-primary">Update</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection