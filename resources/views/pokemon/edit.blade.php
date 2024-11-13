@extends('default')

@section('title','Edit the pokemons!')



@section('content')

    <div class="form-container">
        <h1>Editting Pokemon #{{$pokemon->id}}</h1>
        <form action="{{ url('pokemon/' . $pokemon->id)}}" method="POST">
            @csrf
            @method('put')
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" placeholder="Enter Pokemon Name" value="{{old('name',$pokemon->name)}}">

            <label for="height">Height:</label>
            <input type="decimal" name="height" id="height" placeholder="Enter Pokemon Height" value="{{old('height',$pokemon->height)}}">

            <label for="weight">Weight:</label>
            <input type="decimal" name="weight" id="weight" placeholder="Enter Pokemon Weight" value="{{old('weight',$pokemon->weight)}}">

            <label for="type">Type:</label>
            <select name="type" id="type">
                @foreach ($types as $type)
                    {{ $isSelected = ''; }}
                    @if ($type == $pokemon->type)
                        {{ $isSelected = 'selected'; }}
                    @endif
                    <option value="{{ $type }}" {{$isSelected}}  {{ old('type') == $type ? 'selected' : '' }} >{{ $type }}</option>
                @endforeach
            </select>

            <label for="evolutions">Evolutions:</label>
            <input type="number" name="evolutions" id="evolutions" placeholder="Enter Number of Evolutions" value="{{old('evolutions',$pokemon->evolutions)}}">

            <button type="submit" class="submit-btn">Editar Pokemon</button>
        </form>
    </div>

@endsection