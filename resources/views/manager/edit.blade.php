@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Make changes</div>

               <div class="card-body">
                 <form action="{{route('manager.update', $manager)}}" method="post">
                    <div class="form-group">
                    <label for="Name">Name</label>
                    <input class="form-control" value="{{old('manager_name',$manager->name)}}" type="text" name="manager_name">
                    <small class="form-text text-muted">Managers name.</small>
                    <label for="Name">Surname</label>
                    <input class="form-control" value="{{old('manager_surname',$manager->surname)}}"type="text" name="manager_surname">
                    <small class="form-text text-muted">Managers Surname.</small>
                    <select name="specie_id">
                        @foreach ($species as $specie)
                            <option value="{{$specie->id}}" @if($specie->id == $manager->specie_id) selected @endif>{{$specie->name}}</option>
                        @endforeach
                 </select>
                 </div>
                    <button class="btn btn-primary" type="submit">Save changes</button>
                    @csrf
                </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection