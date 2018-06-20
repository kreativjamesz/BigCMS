@extends('dashboard.layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg mt-1 mb-2">
            <div class="text-left">
                <h2  style="display: inline-block;">List of Product Files</h2>
                <a class="btn btn-primary btn-sm flat" href="{{ url('dashboard/product/create') }}" style="display: inline-block;float:right"> Create New Product</a>
            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Description</th>
                <th class="text-center">Image</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->title }}</td>
                <td>{{ $product->description }}</td>
                <td align="center"><a href='{{ asset("images/products/$product->product_image") }}'><img src="{{asset('images/products/')}}/{{ $product->product_image }}" class="img-fluid" width="32"></a></td>
                <td align="center"><a href="" class="btn btn-secondary btn-sm flat">Edit</a> | <a href="" class="btn btn-danger btn-sm flat">Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $products->render() !!}
</div>  
@endsection
