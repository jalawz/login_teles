@extends('layouts.master')

@section('content')

    <div class="page-header">
        <h2>{{Auth::user()->getFirstNameOrUsername()}} edite seu perfil</h2>
    </div>

    <div class="row">

        <div class="col-sm-8 col-sm-offset-2">
            <form class="form-horizontal" method="post" action="{{ route('profile.update') }}">
            	<div class="form-group {{$errors->has('username') ? 'has-error' : ''}}">
            		<label for="username" class="col-sm-2 control-label">Usuário</label>
            		<div class="col-sm-10">
            			<input name="username" type="text" class="form-control" id="username"
            				placeholder="Entre com seu nome de usuário" value="{{$user->username}}">
                        @if ($errors->has('username'))
                            <span class="help-block">{{ $errors->first('username') }}</span>
                        @endif
            		</div>
            	</div>
                <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
            		<label for="email" class="col-sm-2 control-label">Email</label>
            		<div class="col-sm-10">
            			<input name="email" type="text" class="form-control" id="email"
            				placeholder="Entre com seu email" value="{{$user->email}}">
                        @if ($errors->has('email'))
                            <span class="help-block">{{ $errors->first('email') }}</span>
                        @endif
            		</div>
            	</div>
                <div class="form-group {{$errors->has('first_name') ? 'has-error' : ''}}">
            		<label for="first_name" class="col-sm-2 control-label">Nome</label>
            		<div class="col-sm-10">
            			<input name="first_name" type="text" class="form-control" id="first_name"
            				placeholder="Entre com seu nome" value="{{$user->first_name}}">
                        @if ($errors->has('email'))
                            <span class="help-block">{{ $errors->first('first_name') }}</span>
                        @endif
            		</div>
            	</div>
                <div class="form-group {{$errors->has('last_name') ? 'has-error' : ''}}">
            		<label for="last_name" class="col-sm-2 control-label">Sobrenome</label>
            		<div class="col-sm-10">
            			<input name="last_name" type="text" class="form-control" id="email"
            				placeholder="Entre com seu sobrenome" value="{{$user->last_name}}">
                        @if ($errors->has('last_name'))
                            <span class="help-block">{{ $errors->first('last_name') }}</span>
                        @endif
            		</div>
            	</div>
                <div class="form-group {{$errors->has('location') ? 'has-error' : ''}}">
            		<label for="location" class="col-sm-2 control-label">Cidade</label>
            		<div class="col-sm-10">
            			<input name="location" type="text" class="form-control" id="location"
            				placeholder="Entre com seu sobrenome" value="{{$user->location}}">
                        @if ($errors->has('location'))
                            <span class="help-block">{{ $errors->first('location') }}</span>
                        @endif
            		</div>
            	</div>
                <div class="form-group {{$errors->has('company') ? 'has-error' : ''}}">
            		<label for="company" class="col-sm-2 control-label">Empresa</label>
            		<div class="col-sm-10">
            			<input name="company" type="text" class="form-control" id="company"
            				placeholder="Entre com seu sobrenome" value="{{$user->company}}">
                        @if ($errors->has('company'))
                            <span class="help-block">{{ $errors->first('company') }}</span>
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

                <input type="hidden" name="id" value="{{$user->id}}">

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
