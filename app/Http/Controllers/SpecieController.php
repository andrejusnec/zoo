<?php

namespace App\Http\Controllers;

use App\Models\Specie;
use Illuminate\Http\Request;
use Validator;

class SpecieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $species = Specie::all();
        return view('specie.index', ['species' => $species]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('specie.create');
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
           'specie_name' => ['required','regex:/^[A-Z][a-z_-]{2,19}$/', 'min:3', 'max:64'],
       ],
[
'specie_name.min' => 'Type do not meet minimum length requirement',
'specie_name.regex' => 'Type cannot contain illegal characters. Only letters.'
]);
       if ($validator->fails()) {
           $request->flash();
           return redirect()->back()->withErrors($validator);
       }
       Specie::create($request);
        return redirect()->route('specie.index')->with('success_message', 'New specie has been added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Specie  $specie
     * @return \Illuminate\Http\Response
     */
    public function show(Specie $specie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Specie  $specie
     * @return \Illuminate\Http\Response
     */
    public function edit(Specie $specie)
    {
        return view('specie.edit', ['specie' => $specie]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Specie  $specie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Specie $specie)
    {
        $validator = Validator::make($request->all(),
       [
           'specie_name' => ['required','regex:/^[A-Z][a-z_-]{2,19}$/', 'min:3', 'max:64'],
       ],
[
'specie_name.min' => 'Type do not meet minimum length requirement',
'specie_name.regex' => 'Type cannot contain illegal characters. Only letters.'
]);
       if ($validator->fails()) {
           $request->flash();
           return redirect()->back()->withErrors($validator);
       }
        $specie->name = $request->specie_name;
        $specie->save();
        return redirect()->route('specie.index')->with('success_message', 'Information has been successfully updated.');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Specie  $specie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specie $specie)
    {
        if($specie->specieHasManagers()->count()) {
            return redirect()->route('specie.index')->with('info_message', 'You cannot delete specie, because u have manager
            working with it.');
        }
        $specie->delete();
        return redirect()->route('specie.index')->with('success_message', 'Specie has been successfully deleted.');
    }
}
