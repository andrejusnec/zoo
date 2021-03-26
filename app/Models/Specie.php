<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specie extends Model
{
    use HasFactory;

    public static function create($request) {
        $specie = new self;
        $specie->name = $request->specie_name;
        $specie->save();
    }
}
