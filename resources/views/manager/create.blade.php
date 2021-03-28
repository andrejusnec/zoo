@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Add Manager</div>

               <div class="card-body">
                 <form action="{{route('manager.store')}}" method="post">
                    <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" class="form-control" name="manager_name" value="{{old('manager_name')}}">
                    <small class="form-text text-muted">Enter managers Name.</small>
                    <label for="Surname">Surname</label>
                    <input type="text" class="form-control" name="manager_surname" value="{{old('manager_surname')}}">
                    <small class="form-text text-muted">Enter managers Surname.</small>
                    <select name="specie_id">
                        @foreach ($species as $specie)
                            <option value="{{$specie->id}}">{{$specie->name}}</option>
                        @endforeach
                 </select>
                </div>
                    <button class="btn btn-primary" type="submit">Add</button>
                    @csrf
                </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection