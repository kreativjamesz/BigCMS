@extends('dashboard.layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg mt-1 mb-2">
			<div class="jumbotron flat">
				<h1 class="display-3">{{ __('Welcome to Dashboard') }}</h1>
				<p class="lead">{{ __('This is just a sample Dashboard Landing Page') }}</p>
				<hr class="m-y-md">
				<p>{{ __('If you want to avail the real admin dashboard page just contact me at ') }}<a href="/">webdeveloper@app.com</a>.</p>
				<p class="lead">
					<a class="btn btn-primary btn-lg flat" href="#" role="button">{{ __('Learn more') }}</a>
				</p>
			</div>
		</div>
	</div>
</div>
@endsection