<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    use HasFactory;

    public static function create($request) {
        $manager = new self;
        $manager->name = $request->manager_name;
        $manager->surname = $request->manager_surname;
        $manager->specie_id = $request->specie_id;
        $manager->save();
    }
    public static function upd($manager, $request) {
        $manager->name = $request->manager_name;
        $manager->surname = $request->manager_surname;
        $manager->specie_id = $request->specie_id;
        $manager->save();
    }

}