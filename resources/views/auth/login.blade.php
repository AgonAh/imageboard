@extends('templates/app')
@section('content')


    <div class="container">
        <div class="" style="margin: auto; margin-top:25%;">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label>Username</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autofocus>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>

{{--                        <a href="/register" style="float: right;" class="btn btn-primary" >Register</a>--}}
                        <a href="/register"><button type="button" style="float: right;" class="btn btn-primary">Register</button></a>

                        @if (Route::has('password.request'))
{{--                            <a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--                                {{ __('Forgot Your Password?') }}--}}
{{--                            </a>--}}
                        @endif
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
