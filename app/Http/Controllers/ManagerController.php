<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use Illuminate\Http\Request;
use App\Models\Specie;
use Validator;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //(Request $request)
    {
        $managers = Manager::all();
        return view('manager.index', ['managers' => $managers]);
        //$managers = Manager::orderBy('surname', 'desc') ->get() : Author:all(); 
        //$managers = $request->sort ? Manager::orderBy('surname', 'desc') ->get() : Author:all();
        //if('name' == $request->sort) {
        //    $managers = Manager::orderBy('name') ->get()
        // } else if('surname' == $request->sort) {
        //  $managers = Manager::orderBy('surname') ->get()
        //} else {
        //    $managers = Manager:all();
        //}
    }
    public function index2(Request $request) {
        if('name' == $request->sort) {
            $managers = Manager::orderBy('name') ->get();
         } else if('surname' == $request->sort) {
          $managers = Manager::orderBy('surname') ->get();
        } else{
            $managers = Manager::all();
        }
        return view('manager.index', ['managers' => $managers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $species = Specie::all();
        return view('manager.create', ['species' => $species]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*
    public function store(Request $request)
    {
        
        Manager::create($request);
        return redirect() -> route('manager.index');
    }*/
    public function store(Request $request)
   {
       $validator = Validator::make($request->all(),
       [
           'manager_name' => ['required','regex:/^[A-Z][a-z_-]{2,19}$/', 'min:3', 'max:64'],
           'manager_surname' => ['required','regex:/^[A-Z][a-z_-]{2,19}$/', 'min:3', 'max:64'],
       ],
[
    
]
       );
       if ($validator->fails()) {
           $request->flash();
           return redirect()->back()->withErrors($validator);
       }
       Manager::create($request);
        return redirect() -> route('manager.index')->with('success_message', 'New manager has been successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function show(Manager $manager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function edit(Manager $manager)
    {
        $species = Specie::all();
        return view('manager.edit', ['manager' => $manager, 'species' => $species]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manager $manager)
    {
        $validator = Validator::make($request->all(),
       [
           'manager_name' => ['required','regex:/^[A-Z][a-z_-]{2,19}$/', 'min:3', 'max:64'],
           'manager_surname' => ['required','regex:/^[A-Z][a-z_-]{2,19}$/', 'min:3', 'max:64'],
       ],
[
    
]
       );
       if ($validator->fails()) {
           $request->flash();
           return redirect()->back()->withErrors($validator);
       }
        Manager::upd($manager, $request);
        return redirect() -> route('manager.index')->with('success_message', 'Manager information has been successfully updated.');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manager $manager)
    {
        if($manager->managerHasAnimals->count()){
            return redirect() -> route('manager.index')->with('info_message', 'You cannot delete manager that has animals.');
        }
        $manager->delete();
        return redirect() -> route('manager.index')->with('success_message', 'Manager has been successfully deleted.');
    }
}
