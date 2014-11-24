@extends('auth.layouts.default')

{{-- Web site Title --}}
@section('title')
    {{{ Lang::get('main.sign_in') }}} | 
@stop


{{-- Content --}}
@section('content')

    <div class="login-wrapper">
        <a href="maxtraffic-dashboard.html">
            <!--<img class="logo" src="{{ asset('assets/img/maxtraffic-logo-white.png') }}">-->
        </a>

        <div class="box">
            <div class="content-wrap">
                @if ( Session::get('error') )
                <div class="alert alert-danger">{{{ Session::get('error') }}}</div>
                @endif

                @if ( Session::get('notice') )
                    <div class="alert alert-warning">{{{ Session::get('notice') }}}</div>
                @endif
                <form method="POST" action="{{{ Confide::checkAction('AuthController@do_login') ?: URL::to('/login') }}}" accept-charset="UTF-8">
                    <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
                    <h6>{{{ Lang::get('main.sign_in') }}}</h6>
                    <input name="email" id="email" class="form-control" type="text" placeholder="{{{ Lang::get('main.email_address') }}}" value="{{{ Input::old('email') }}}">
                    <input name="password" id="password" class="form-control" type="password" placeholder="{{{ Lang::get('main.your_password') }}}">
                    <div class="remember">
                        <input type="hidden" name="remember" value="0">
                        <input type="checkbox" name="remember" id="remember-me" value="1">
                        <label for="remember-me">{{{ Lang::get('main.remember_me') }}}</label>
                    </div>
                    <button class="btn-glow primary login" type="submit">{{{ Lang::get('main.login') }}}</button>
                </form>
            </div>
        </div>
    </div>
@stop
