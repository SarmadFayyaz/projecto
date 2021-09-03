@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('company.login') }}">
                            @csrf

                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="form-group bmd-form-group @error('email') has-danger @enderror">
                                        <label for="email" class="bmd-label-floating">
                                            {{ __('E-Mail Address') }} *
                                        </label>
                                        <input type="email" class="form-control" id="email" name="email"
                                               autocomplete="email" autofocus value="{{ old('email') }}">
                                        @error('email')
                                        <label class="error">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="form-group bmd-form-group @error('password') has-danger @enderror">
                                        <label for="password" class="bmd-label-floating">
                                            {{ __('Password') }} *
                                        </label>
                                        <input type="password" class="form-control" id="password" name="password"
                                               value="{{ old('password') }}">
                                        @error('password')
                                        <label class="error">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                   id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label p-0" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                            <span class="form-check-sign p-0">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0 justify-content-center">
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
@endsection
