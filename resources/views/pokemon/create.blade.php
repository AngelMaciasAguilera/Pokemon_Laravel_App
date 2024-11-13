

@extends('default')

@section('title', 'Add new Pokemons!')


@section('content')

    <div class="form-container">
        <h1>Add a New Pokemon</h1>
        <form action="{{url('pokemon')}}" method="POST">
            @csrf

            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{old('name')}}" placeholder="Enter Pokemon Name">

            <label for="height">Height:</label>
            <input type="decimal" name="height" id="height" value="{{old('height')}}" placeholder="Enter Pokemon Height">

            <label for="weight">Weight:</label>
            <input type="decimal" name="weight" id="weight" value="{{old('weight')}}" placeholder="Enter Pokemon Weight">

            <label for="type">Type:</label>
            <select name="type" id="type">
                @foreach ($types as $type)
                    <option value="{{ $type }}" {{ old('type') == $type ? 'selected' : '' }}> <!-- Format comprobacion: ? si_verdadero : si_falso -->
                        {{ $type }}
                    </option>
                @endforeach
            </select>
            

            <label for="evolutions">Evolutions:</label>
            <input type="number" name="evolutions" id="evolutions" value="{{old('evolutions')}}" placeholder="Enter Number of Evolutions">

            <button type="submit" min="0" class="submit-btn">Añadir Pokemon</button>
        </form>
    </div>

@endsection