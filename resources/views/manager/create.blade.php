@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Add Manager</div>

               <div class="card-body">
                 <form action="{{route('manager.store')}}" method="post">
                    <label for="Name">Name</label>
                    <input type="text" name="manager_name">
                    <label for="Surname">Surname</label>
                    <input type="text" name="manager_surname">
                    <select name="specie_id">
                        @foreach ($species as $specie)
                            <option value="{{$specie->id}}">{{$specie->name}}</option>
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