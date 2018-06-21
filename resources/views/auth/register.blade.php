@extends('auth.layouts.master')

@section('content')
<div class="" style="overflow: hidden;
      position: absolute;
      width: 100%;
      height: 100%;
      display: flex;
      justify-content: center;
      align-items: center;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <a href="{{url('/')}}" class="btn btn-primary btn-sm flat"><i class="fa fa-home"></i> Home</a>
                <a href="{{url('login')}}" class="btn btn-primary btn-sm flat"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card" style="min-height: 450px;">
                    <div class="card-body">
                        <h1>{{ __('Register') }}</h1>
                        <hr>
                        <div class="default-avatar text-center">
                            <img src="{{asset('images/users/default.jpg')}}" class="img-fluid" style="border-radius:50%;">
                        </div>
                        <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                            @csrf

                            <div class="form-group row">
                                <div class="col-md-10 offset-md-1">
                                    <input id="name" type="text" class="flat form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="{{ __('Name here') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-10 offset-md-1">
                                    <input id="email" type="email" class="flat form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="{{ __('E-Mail Address') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-10 offset-md-1">
                                    <input id="password" type="password" class="flat form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Password') }}" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-10 offset-md-1">
                                    <input id="password-confirm" type="password" class="flat form-control" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-10 offset-md-1">
                                    <button type="submit" class="btn btn-primary btn-block flat">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
