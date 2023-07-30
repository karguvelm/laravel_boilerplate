@extends('webadmin.layouts.login_layout')

@section('content')
@section('title',"Login")

<div class="container-min-full-height d-flex justify-content-center align-items-center">
    <div class="login-center">
        <div class="navbar-header login-logo text-center mt-2 mb-4">
            <img alt="" src="{{ asset('webadmin/img/logo-light.png') }}">
        </div>        
            {{ Form::open(['route' => ["webadmin.login"],'method' => 'POST', 'data-parsley-validate' => true, "data-parsley-trigger" => "change", 'autocomplete' => 'off' ]) }}
            <div class="form-group">
                {{ Form::label('email','Email') }}        
                {{ Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => "Email", 'required' => 'true', 'autofocus' => true]) }}
            </div>
            <div class="form-group">
                {{ Form::label('password','Password') }}    
                {{ Form::password('password', ['class' => 'form-control', 'placeholder' => "Password", 'required' => 'true', 'data-parsley-minlength' => 6 	]) }}
            </div>
            <div class="form-group">
                {{ Form::submit('Login', [ 'class' => 'btn btn-block btn-lg btn-primary text-uppercase fs-12 fw-600' ]) }}
            </div>
            <div class="form-group no-gutters mb-0">
                <div class="col-md-12 d-flex">
                    <div class="checkbox checkbox-primary mr-auto mr-0-rtl ml-auto-rtl">
                        <label class="d-flex">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> <span class="label-text" for="remember">{{ __('Remember Me') }}</span>
                        </label>
                    </div>
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" id="to-recover" class="my-auto pb-2 text-right"><i class="material-icons mr-2 fs-18">lock</i> Forgot Password?</a>
                    @endif
                </div>
            </div>
        {{ Form::close() }}
        <hr>                        
    </div>
</div>
@endsection
