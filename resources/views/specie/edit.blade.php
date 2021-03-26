@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Change animal specie</div>

               <div class="card-body">
                 <form action="{{route('specie.update', $specie)}}" method="post">
                    <label for="Name">Type of specie</label>
                    <input value="{{$specie->name}}"type="text" name="specie_name">
                    <button class="btn btn-primary" type="submit">Save changes</button>
                    @csrf
                </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection