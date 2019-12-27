@extends('layouts.app')

@section('content')

@include('partials.shared.breadcrumb', ['page' => "Login"])

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Login Area Start -->
<section class="jobguru-login-area section_70">
    <div class="container">
        <div class="row">
           <div class="col-md-12">
              <div class="login-box">
                 <div class="login-title">
                    <h3>Sign in</h3>
                 </div>
                 <form>
                    @csrf
                    <div class="single-login-field">

                        <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Correo electrónico" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    <div class="single-login-field">

                       <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Contraseña">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    <div class="remember-row single-login-field clearfix">
                       <p class="checkbox remember">

                            <input class="checkbox-spin" type="checkbox" name="remember" id="Freelance" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="Freelance">
                                <span></span>Recordar
                            </label>
                       </p>
                       <p class="lost-pass">

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">
                                    Olvidaste tu contraseña
                                </a>
                            @endif
                            
                       </p>
                    </div>
                    <div class="single-login-field">
                       <button type="submit">Ingresar</button>
                    </div>
                 </form>
                 <div class="dont_have">
                    <a href="{{route('register')}}">¿Aún no tienes una cuenta?</a>
                 </div>
              </div>
           </div>
        </div>
    </div>
</section>
<!-- Login Area End -->
@endsection
