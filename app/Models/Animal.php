<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    public function animalManager()
    {
        return $this->belongsTo(Manager::class, 'manager_id', 'id');
    }
    public function animalSpecie()
    {
        return $this->belongsTo(Specie::class, 'specie_id', 'id');
    }
    public static function create($request) {
        $animal = new self;
        $animal->name = $request->animal_name;
        $animal->birth_year = $request->birth_year;
        $animal->animal_book = $request->animal_book;
        $animal->specie_id = $request-> specie_id;
        $animal->manager_id = $request->manager_id;
        $animal->save();
    }
    public function upd($request) {
        $this->name = $request->animal_name;
        $this->birth_year = $request->birth_year;
        $this->animal_book = $request->animal_book;
        $this->specie_id = $request-> specie_id;
        $this->manager_id = $request->manager_id;
        $this->save();
    }
}
