<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use App\Models\Manager;
use App\Models\Specie;
use Validator;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $managers = Manager::all();
        //Filter
        if($request -> manager_id){
            $animals = Animal::where('manager_id', $request->manager_id)->get();
            $filterBy = $request->manager_id;
        } else {
            $animals = Animal::all();
        }
        //Sort
        if($request->sort && 'byName' == $request->sort ) {
            $animals = $animals->sortBy('name');
            $sortBy = 'name';
         } else if($request->sort && 'byYear' == $request->sort) {
          $animals = $animals->sortBy('birth_year');
          $sortBy = 'birth_year';
        } 
        
        return view('animal.index', ['animals' => $animals, 'managers' => $managers, 'filterBy' => $filterBy ?? 0, 'sortBy' => $sortBy ?? '' ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $species = Specie::all();
        $managers = Manager::all();
        return view('animal.create',['species' => $species, 'managers' => $managers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $validator = Validator::make($request->all(),
        [
            'animal_name' => ['required','regex:/^[A-Z][a-z_-]{2,63}$/', 'min:3', 'max:64'],
            'birth_year' => ['required','regex:/^[1-9]+/','not_in:0', 'max:4'],
            'animal_book' => ['required','string','between:3,200'],
        ],
 [
 ]);
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        $manager = Manager::find($request->manager_id);
        if($manager->specie_id != $request->specie_id) {
            return redirect()->back()->with('info_message', 'Manager you selected is not responsible for this specie.');
        }
        Animal::create($request);
        return redirect() -> route('animal.index')->with('success_message', 'New animal has been successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function show(Animal $animal)
    {
        return view('animal.show', ['animal' => $animal]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function edit(Animal $animal)
    {
        $species = Specie::all();
        $managers = Manager::all();
        return view('animal.edit', ['animal' => $animal, 'species' => $species, 'managers' => $managers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Animal $animal)
    {
        $validator = Validator::make($request->all(),
        [
            'animal_name' => ['required','regex:/^[A-Z][a-z_-]{2,63}$/', 'min:3', 'max:64'],
            'birth_year' => ['required','regex:/^[1-9]+/','not_in:0', 'max:4'],
            'animal_book' => ['required','string','between:3,200'],
        ],
 [
 ]);
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        $manager = Manager::find($request->manager_id);
        if($manager->specie_id != $request->specie_id) {
            return redirect()->back()->with('info_message', 'Manager you selected is not responsible for this specie.');
        }
        $animal->upd($request);
        return redirect() -> route('animal.index')->with('success_message', 'Animal information has been successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Animal $animal)
    {
        $animal->delete();
        return redirect() ->route('animal.index')->with('success_message', 'Animal has been successfully deleted.');
    }
}
