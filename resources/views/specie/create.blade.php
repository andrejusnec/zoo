@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Add animal specie</div>

               <div class="card-body">
                 <form action="{{route('specie.store')}}" method="post">
                    <label for="Name">Type of specie</label>
                    <input type="text" name="specie_name">
                    <button class="btn btn-primary" type="submit">Add</button>
                    @csrf
                </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
