@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Manager List</div>

               <div class="card-body">
                <ul class="list-group">
                    @foreach ($managers as $manager)
                        <li class="list-group-item">
                       <span style="align-self: center;">{{$manager->name}} {{$manager->surname}}</span>
                       <div class="list-align-right">
                            <a type="button" class="btn btn-primary" href="{{route('manager.edit', $manager)}}">Edit</a>
                           <form class="btn-inline" action="{{route('manager.destroy', $manager)}}" method="post">
                               <button class="btn btn-danger" type="submit">Delete</button>
                               @csrf
                           </form>
                       </div>
                       </li>
                    @endforeach
                   </ul>
                   <form action="{{route('manager.index2')}}" method="post">
                <select name="sort">
                        <option value="name">Sort by Name</option>
                        <option value="surname">Sort by Surname</option>
             </select>
             <button class="btn btn-primary" type="submit">Sort</button>
             @csrf
            </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection