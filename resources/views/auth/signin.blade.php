@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <h1 class="text-center login-title">Teles Lojas - Login</h1>
            <div class="account-wall">
                <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                    alt="">
                <form class="form-signin" method="post" action="{{route('auth.signin')}}">
                    <input name="email" type="text" class="form-control" placeholder="Email" autofocus>
                    @if ($errors->has('email'))
                        <span class="help-block">{{$errors->first('email')}}</span>
                    @endif
                    <input name="password" type="password" class="form-control" placeholder="Password">
                    @if ($errors->has('password'))
                        <span class="help-block">{{$errors->first('password')}}</span>
                    @endif
                    <button class="btn btn-lg btn-primary btn-block" type="submit">
                        Login</button>
                    <label class="checkbox pull-left">
                        <input type="checkbox" value="remember" name="remember">
                        Manter logado
                    </label>
                    <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
                    {{csrf_field()}}
                </form>
            </div>
            <a href="{{ route('auth.signup') }}" class="text-center new-account">Criar uma conta </a>
        </div>
    </div>
@endsection
