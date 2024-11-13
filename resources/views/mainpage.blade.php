@extends('default')

@section('title','Main Page')

@section('content')

    <h1>Welcome to Our Pokemon Rest App</h1>

    <div class="buttons-container">

        @if (session('user'))
            <a class = "btn-session" href="{{ url('logout') }}"> Log out </a>
        @else
            <a class = "btn-session" href="{{ url('login') }}" > Log in </a>
        @endif

        <a class="btn-session" href="{{url('pokemon')}}">Pokemons</a>
    </div>

@endsection