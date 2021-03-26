@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Make changes</div>

               <div class="card-body">
                 <form action="{{route('manager.update', $manager)}}" method="post">
                    <label for="Name">Name</label>
                    <input value="{{$manager->name}}"type="text" name="manager_name">
                    <label for="Name">Surname</label>
                    <input value="{{$manager->surname}}"type="text" name="manager_surname">
                    <select name="specie_id">
                        @foreach ($species as $specie)
                            <option value="{{$specie->id}}">{{$specie->name}}</option>
                        @endforeach
                 </select>
                    <button class="btn btn-primary" type="submit">Save changes</button>
                    @csrf
                </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection