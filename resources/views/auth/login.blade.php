@extends('layouts.app')

@section('content')

@include('partials.shared.breadcrumb', ['page' => "Ingresa"])

<!-- Login Area Start -->
<section class="jobguru-login-area section_70">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="login-box">
                    <div class="login-title">
                        <h3>Ingresa a tu cuenta</h3>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="single-login-field">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Correo electrónico" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="single-login-field">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Contraseña">
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
