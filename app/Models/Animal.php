<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    public static function create($request) {
        $animal = new self;
        $animal->name = $request->animal_name;
        $animal->birth_year = $request->birth_year;
        $animal->animal_book = $request->animal_book;
        $animal->specie_id = $request-> specie_id;
        $animal->manager_id = $request->manager_id;
        $animal->save();
    }
    public static function upd($animal, $request) {
        $animal->name = $request->animal_name;
        $animal->birth_year = $request->birth_year;
        $animal->animal_book = $request->animal_book;
        $animal->specie_id = $request-> specie_id;
        $animal->manager_id = $request->manager_id;
        $animal->save();
    }
}
