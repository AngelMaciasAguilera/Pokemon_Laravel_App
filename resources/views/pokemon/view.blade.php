@extends('default')

@section('title','Pokemon selected')


@section('content')

    <div class="poke-attr">
        <h1>Pokemon selected</h1>
        <h4>id: {{ $pokemon->id }}</h4>
        <h4>Name: {{ $pokemon->name }}</h4>
        <h4>Weight: {{ $pokemon->weight }}</h4>
        <h4>Height: {{ $pokemon->height }}</h4>
        <h4>Type: {{ $pokemon->type }}</h4>
        <h4>Evolutions: {{ $pokemon->evolutions }}</h4>
        <a href="{{url('pokemon')}}" class="button-comeback">Go Back</a>
    </div>
@endsection