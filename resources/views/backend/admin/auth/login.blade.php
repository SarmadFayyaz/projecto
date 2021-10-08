@extends('layouts.auth')

@section('content')

    <div class="wrapper wrapper-full-page">
        <div class="page-header login-page header-filter" filter-color="black" style="background-image: url('{{ url('/') }}/assets/img/login.jpg'); background-size: cover; background-position: top center;">
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
                        <form method="POST" action="{{ route('admin.login') }}">
                            @csrf
                            <div class="card card-login card-hidden">
                                <div class="card-header card-header-rose text-center">
                                    <h4 class="card-title">Login</h4>
                                    {{--                                    <div class="social-line">--}}
                                    {{--                                        <a href="#pablo" class="btn btn-just-icon btn-link btn-white">--}}
                                    {{--                                            <i class="fa fa-facebook-square"></i>--}}
                                    {{--                                        </a>--}}
                                    {{--                                        <a href="#pablo" class="btn btn-just-icon btn-link btn-white">--}}
                                    {{--                                            <i class="fa fa-twitter"></i>--}}
                                    {{--                                        </a>--}}
                                    {{--                                        <a href="#pablo" class="btn btn-just-icon btn-link btn-white">--}}
                                    {{--                                            <i class="fa fa-google-plus"></i>--}}
                                    {{--                                        </a>--}}
                                    {{--                                    </div>--}}
                                </div>
                                <div class="card-body ">
                                    {{--                                    <p class="card-description text-center">Or Be Classical</p>--}}
                                    {{--                                    <span class="bmd-form-group">--}}
                                    {{--                                        <div class="input-group">--}}
                                    {{--                                            <div class="input-group-prepend">--}}
                                    {{--                                                <span class="input-group-text">--}}
                                    {{--                                                    <i class="material-icons">face</i>--}}
                                    {{--                                                </span>--}}
                                    {{--                                            </div>--}}
                                    {{--                                            <input type="text" class="form-control" placeholder="First Name...">--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </span>--}}
                                    <span class="bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="material-icons">email</i>
                                                </span>
                                            </div>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email..."
                                                   autocomplete="email" autofocus value="{{ old('email') }}">
                                            @error('email')
                                            <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </span>
                                    <span class="bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="material-icons">lock_outline</i>
                                                </span>
                                            </div>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Password..."
                                                   value="{{ old('password') }}">
                                            @error('password')
                                            <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </span>
                                </div>
                                <div class="card-footer justify-content-center">
                                    <button class="btn btn-rose btn-link btn-lg" type="submit">Lets Go</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            md.checkFullPageBackgroundImage();
            setTimeout(function() {
                // after 1000 ms we add the class animated to the login/register card
                $('.card').removeClass('card-hidden');
            }, 700);
        });
    </script>
@endsection
