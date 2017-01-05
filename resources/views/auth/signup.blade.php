@extends('layouts.master')

@section('content')
<div class="row">

    <div class="col-sm-8 col-sm-offset-2">
        <h2>Faça seu Cadastro</h2>
        <form class="form-horizontal" method="post" action="{{ route('auth.signup') }}">
        	<div class="form-group {{$errors->has('username') ? 'has-error' : ''}}">
        		<label for="username" class="col-sm-2 control-label">Usuário</label>
        		<div class="col-sm-10">
        			<input name="username" type="text" class="form-control" id="username"
        				placeholder="Entre com seu nome de usuário" value="{{old('username')}}">
                    @if ($errors->has('username'))
                        <span class="help-block">{{ $errors->first('username') }}</span>
                    @endif
        		</div>
        	</div>
            <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
        		<label for="email" class="col-sm-2 control-label">Email</label>
        		<div class="col-sm-10">
        			<input name="email" type="text" class="form-control" id="email"
        				placeholder="Entre com seu email" value="{{old('email')}}">
                    @if ($errors->has('email'))
                        <span class="help-block">{{ $errors->first('email') }}</span>
                    @endif
        		</div>
        	</div>
        	<div class="form-group {{$errors->has('password') ? 'has-error' : ''}}">
        		<label for="password" class="col-sm-2 control-label">Senha</label>
        		<div class="col-sm-10">
        			<input name="password" type="password" class="form-control" id="password"
        				placeholder="Entre com sua senha">
                    @if ($errors->has('password'))
                        <span class="help-block">{{ $errors->first('password') }}</span>
                    @endif
        		</div>
        	</div>
            <div class="form-group {{$errors->has('password_confirm') ? 'has-error' : ''}}">
        		<label for="password_confirm" class="col-sm-2 control-label">Confirme a senha</label>
        		<div class="col-sm-10">
        			<input name="password_confirm" type="password" class="form-control" id="password_confirm"
        				placeholder="Confirme sua Senha">
                    @if ($errors->has('password_confirm'))
                        <span class="help-block">{{ $errors->first('password_confirm') }}</span>
                    @endif
        		</div>
        	</div>

        	<div class="form-group">
        		<div class="col-sm-offset-2 col-sm-10">
        			<button type="submit" class="btn btn-primary">Registrar</button>
        		</div>
        	</div>
            {{ csrf_field() }}
        </form>
    </div>

</div>

@endsection
