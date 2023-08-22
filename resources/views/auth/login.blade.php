@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col s12 m6 offset-m3">
        <div class="card">
            <div class="card-content">
                <span class="card-title">{{ __('Login') }}</span>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <label for="email">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <label for="password" class="col m4">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <div class="col m10 offset m4">
                        <p>
                            <label>
                                <input id="remember" name="remember" type="checkbox" />
                                <span>{{ __('Manter conectado') }}</span>
                            </label>
                        </p>
                    </div>
                        
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>

                   <!-- @if (Route::has('password.request'))
                    <a class="btn " href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif-->
                </form>
            </div>
        </div>
    </div>
</div>
@endsection