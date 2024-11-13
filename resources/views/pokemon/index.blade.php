@extends('default')

@section('title','Index of the Pokerest App')

@section('content')


    <h1>The pokemons</h1>
    <hr>
        <div class="row">
            @if(session('user'))
                <a href="{{url('pokemon/create')}}" class="add-pokemon">add pokemon</a>
                <form id="formDelete" action="{{ url('pokemon/delete') }}" method="post">
                    @csrf
                    @method('delete')
                </form>
            @endif
        </div>
        <table id="tablaProducto">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>height</th>
                    <th>weight</th>
                    <th>type</th>
                    <th>evolutions</th>
                    @if(session('user'))
                        <th>delete</th>
                        <th>edit</th>
                    @endif
                    <th>view</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pokemons as $pokemon)
                    <tr>
                        <td>{{$pokemon->id}}</td>
                        <td>{{$pokemon->name}}</td>
                        <td>{{$pokemon->height}}</td>
                        <td>{{$pokemon->weight}}</td>
                        <td>{{$pokemon->type}}</td>
                        <td>{{$pokemon->evolutions}}</td>
                        @if(session('user'))
                            <td><a href="#" data-href="{{url('pokemon/' . $pokemon->id)}}" class = "borrar">delete</a></td>
                            <td><a href="{{url('pokemon/' . $pokemon->id . '/edit')}}" class="edit">edit</a></td>
                        @endif
                        <td><a href="{{url('pokemon/' . $pokemon->id)}}" class="view">view</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/delete.js') }}"></script>
@endsection
