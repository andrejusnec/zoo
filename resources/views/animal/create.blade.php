@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Add new Animal</div>

               <div class="card-body">
                 <form action="{{route('animal.store')}}" method="post">
                    <label for="Name">Name</label>
                    <input type="text" name="animal_name">
                    <label for="Birth">Year of Birth</label>
                    <input type="text" name="birth_year">
                    <label for="AnimalBook">Description</label>
                    <input type="text" name="animal_book">
                    <span>Species</span>
                    <select name="specie_id">
                        @foreach ($species as $specie)
                            <option value="{{$specie->id}}">{{$specie->name}}</option>
                        @endforeach
                 </select>
                 <span>Managers</span>
                 <select name="manager_id">
                    @foreach ($managers as $manager)
                        <option value="{{$manager->id}}">{{$manager->name}} {{$manager->surname}}</option>
                    @endforeach
             </select>
                    <button class="btn btn-primary" type="submit">Add</button>
                    @csrf
                </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection