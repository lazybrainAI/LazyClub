@extends('layouts.app')
@section('title', 'Login')


@section('id', 'login_background')
@section('main')
    <div class="container" id="login_section">
        <div class="row align-content-center justify-content-center" id="div_for_form">
            <div class=" col-md-6">
                <form id="login_form" method="POST" action="" accept-charset="UTF-8">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                @csrf

                                <h1 class="lazy_tittle" id="lazy_tittle">
                                    Club | LazyBrain
                                </h1>
                                <div>
                                    <input id="email" type="text" name="email" placeholder="email" required
                                           autocomplete="off"
                                           class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}">
                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback">
                                            <strong><h6> {{ $errors->first('username') }}</h6></strong>
                                    </span>
                                    @endif
                                </div>
                                <div>
                                    <input type="password" name="password" placeholder="password" id="password" required
                                           autocomplete="off"
                                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}">
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong><h6>{{ $errors->first('password') }}</h6></strong>
                                    </span>
                                    @endif

                                </div>
                                <div id="login_button">
                                    <button type="submit" class="btn btn-primary">log in</button>
                                </div>


                            </div>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
@endsection

@section("include_js")
    <script src={{ URL::asset('js/login_password_prevent_default.js') }}></script>
@endsection