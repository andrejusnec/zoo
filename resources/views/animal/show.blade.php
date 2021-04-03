@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header"><h2>Information</h2></div>
               <div class="card-body">
                   <span>{{$animal->name}}</span>
                   <span>{{$animal->birth_year}}</span>
                   <span>{{$animal->animalSpecie->name}}</span>
                   <span>{{$animal->animalManager->name}} {{$animal->animalManager->surname}}</span>
                {!!$animal->animal_book!!}
               </div>
           </div>
       </div>
   </div>
</div>
@endsection