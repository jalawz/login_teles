@extends('layouts.master')

@section('content')

    @if (Auth::check())
        <h1>Bem Vindo, {{ Auth::user()->getFirstNameOrUsername() }}</h1>
    @else
        <h1>Teles Lojas Web</h1>
    @endif

@endsection
