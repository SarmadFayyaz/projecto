@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Reset Password') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="form-group bmd-form-group @error('email') has-danger @enderror">
                                        <label for="email" class="bmd-label-floating">
                                            {{ __('E-Mail Address') }} *
                                        </label>
                                        <input type="email" class="form-control" id="email" name="email" required
                                               autocomplete="email" autofocus value="{{ old('email') }}">
                                        @error('email')
                                        <label class="error">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Send Password Reset Link') }}
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
