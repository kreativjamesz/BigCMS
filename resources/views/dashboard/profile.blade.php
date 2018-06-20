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
		<div class="row" style="margin-top:-25px;position: relative">
			<img src="{{asset('images/users/cover1.jpg')}}" alt="" class="img-fluid pl-3 pr-3" width="100%">
			<div class="card text-center" style="position:absolute;position:absolute;bottom:0;left:0;background:transparent;border:none;min-width:20">
				<div class="card-body">
					<img src="{{asset('images/users/superadministrator.jpg')}}" class="img-fluid rounded-circle img-thumbnail w-50 ml-1 mb-1">
					<p class="mb-0" style="color:#fff">{{ Auth::user()->name }}</p>
					<p class="mb-0" style="color:#fff">{{ Auth::user()->email }}</p>
				</div>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-md-3">
						<form action="{{ route('updateProfile') }}" method="post" enctype="multipart/form-data">
							@csrf
							<h3>Update Profile</h3>
							<fieldset class="form-group">
								<input class="form-control flat" type="text" name="name" id="name" value="{{ Auth::user()->name }}"/>
							</fieldset>
							<fieldset class="form-group">
								<input class="form-control flat" type="text" name="email" id="email" value="{{ Auth::user()->email }}"/>
							</fieldset>
							<fieldset class="form-group">
								<input class="form-control flat" type="password" name="old_password" id="old_password" placeholder="Old Password" />
							</fieldset>
							<fieldset class="form-group">
								<input class="form-control flat" type="password" name="new_password" id="new_password" placeholder="New Password" />
							</fieldset>
							<fieldset class="form-group">
								<input class="form-control flat" type="password" name="confirm_password" id="confirm_password" placeholder="Confirm New Password"/>
							</fieldset>
							<a href="" class="btn btn-warning btn-block">Update Profile</a>
						</form>
					</div>
					<div class="col-md-9">
						<ul class="nav nav-tabs" id="myTab" role="tablist">
						  	<li class="nav-item">
						    	<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Activities</a>
						  	</li>
						  	<li class="nav-item">
							    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Notifications</a>
						  	</li>
						  	<li class="nav-item">
							    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Messages</a>
						  	</li>
						</ul>
						<div class="tab-content" id="myTabContent">
						  	<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
						  		<h1>qweqweqwe</h1>	
						  	</div>
						  	<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
								<h1>qweqweqwe</h1>	
						  	</div>
						  	<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
								<h1>qweqweqwe</h1>	
						  	</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection