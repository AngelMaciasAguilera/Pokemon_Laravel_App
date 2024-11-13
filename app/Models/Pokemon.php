<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pokemon extends Model
{
    use HasFactory;
    
    protected $table = 'pokemons';
    public $timestamps = false;
    
    protected $fillable = ['name', 'height', 'weight', 'type','evolutions'];
}