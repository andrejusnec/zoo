@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Animal {{$animal->name}}</div>
               <div class="card-body">
                {!!$animal->animal_book!!}
               </div>
           </div>
       </div>
   </div>
</div>
@endsection