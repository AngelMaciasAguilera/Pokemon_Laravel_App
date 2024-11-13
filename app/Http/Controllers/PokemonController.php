<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*
        Pokemon::orderBy ordena cada pokemon del array que devuelve get por su nombre. Get es un metodo de los handler de Laravel que 
          obtiene los pokemons de la base de datos de manera automatica al llamar al metodo, y te devuelve un array.
        */
        return view('pokemon.index', ['pokemons' => Pokemon::orderBy('id')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $enumValues = DB::select("SHOW COLUMNS FROM pokemons WHERE Field = 'type'");
        $typeEnumValues = $enumValues[0]->Type;
        preg_match_all("/'([^']+)'/", $typeEnumValues, $matches);
        $enumValuesArray = $matches[1];
        return view('pokemon.create', ['types' => $enumValuesArray]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       try {
            $validated = $request->validate([
                'name'  => 'required|unique:pokemons|max:150|min:2',
                'height' => 'required|numeric|gte:0|lte:100000',
                'weight' => 'required|numeric|gte:0|lte:100000',
                'type' => 'required|in:fire,water,grass,electric,ice,rock,ground,poison,bug,normal,fighting,psychic,ghost,dragon,fairy,steel,flying',
                'evolutions' => 'required|numeric|gte:0|lte:100000',
            ]);

            /*$object = new Pokemon($request->all());
            $result = $object->save();*/
            $object = Pokemon::create($request->all());
            return redirect('pokemon')->with(['message' => 'The pokemon has been added.']);
        } catch(\Exception $e) {
            //si no lo he guardado volver a la página anterior con sus datos para volver a rellenar el formulario y mensaje
            dd($e);
            return back()->withInput()->withErrors(['message' => 'The pokemon has not been added.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pokemon $pokemon)
    {
        return view('pokemon.view', ['pokemon' => $pokemon]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pokemon $pokemon)
    {
        $enumValues = DB::select("SHOW COLUMNS FROM pokemons WHERE Field = 'type'");
        $typeEnumValues = $enumValues[0]->Type;
        preg_match_all("/'([^']+)'/", $typeEnumValues, $matches);
        $enumValuesArray = $matches[1];

        return view('pokemon.edit', ['pokemon' => $pokemon, 'types' => $enumValuesArray]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pokemon $pokemon)
    {
        try {
            $validated = $request->validate([
                'name'  => 'required|unique:pokemons|max:150|min:2',
                'height' => 'required|numeric|gte:0|lte:100000',
                'weight' => 'required|numeric|gte:0|lte:100000',
                'type' => 'required|in:fire,water,grass,electric,ice,rock,ground,poison,bug,normal,fighting,psychic,ghost,dragon,fairy,steel,flying',
                'evolutions' => 'required|numeric|gte:0|lte:100000',
            ]);

            $result = $pokemon->update($request->all());
            return redirect('pokemon')->with(['message' => 'The pokemon has been updated.']);
        } catch(\Exception $e) {
            //si no lo he guardado volver a la página anterior con sus datos para volver a rellenar el formulario y mensaje
            dd($e);
            return back()->withInput()->withErrors(['message' => 'The pokemon has not been added.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pokemon $pokemon)
    {
        try {
            $pokemon->delete();
            return redirect('pokemon')->with(['message' => 'The pokemon has been deleted.']);
        } catch(\Exception $e) {
             return back()->withErrors(['message' => 'The pokemon has not been deleted.']);
        }
    }
}
