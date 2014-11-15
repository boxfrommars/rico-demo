@extends('auth.layout')

@section('content')
<style>
    body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #eee;
    }

    .form-signin {
        max-width: 330px;
        padding: 15px;
        margin: 0 auto;
    }
    .form-signin .form-signin-heading,
    .form-signin .checkbox {
        margin-bottom: 10px;
    }
    .form-signin .checkbox {
        font-weight: normal;
    }
    .form-signin .form-control {
        position: relative;
        height: auto;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        padding: 10px;
        font-size: 16px;
    }
    .form-signin .form-control:focus {
        z-index: 2;
    }
    .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }
    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
</style>
    {{ Form::open(['url' => route('do-login'), 'class' => 'form-signin']) }}
    <h2 class="form-signin-heading">Вход</h2>
    <input type="email" class="form-control" tabindex="1" placeholder="Email" name="email" id="email" value="{{{ Input::old('email') }}}">
    <input class="form-control" placeholder="Пароль" type="password" name="password" id="password" required>
    <div class="checkbox">
        <label>
            <input type="hidden" name="remember" value="0">
            <input tabindex="4" type="checkbox" name="remember" id="remember" value="1"> Remember me
        </label>
    </div>
    @if (Session::get('error'))
        <div class="alert alert-error">{{{ Session::get('error') }}}</div>
    @endif

    @if (Session::get('notice'))
        <div class="alert">{{{ Session::get('notice') }}}</div>
    @endif
    <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
</form>
@endsection