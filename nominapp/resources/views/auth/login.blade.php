@extends('layouts.nlogin')

@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-form-title" style="background-image: url({{asset('logform/images/bg-01.jpg')}});">
                <span class="login100-form-title-1">
                    Nominapp SBC
                </span>
            </div>

            <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                @csrf

               
                <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                    <span class="label-input100">Correo Electrónico</span>
                    <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">

                    
                  
                    <span class="focus-input100"></span>
                    <span class="label-input100">Contraseña</span>
                    <input id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="focus-input100"></span>
                </div>

                <div class="flex-sb-m w-full p-b-30">
                    <div class="contact100-form-checkbox">
                        
                        <input class="input-checkbox100" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="label-checkbox100" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>

                   
                </div>

                <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                        {{ __('Iniciar Sesión') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
