@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Animal LIST</div>

               <div class="card-body">
                <ul class="list-group">
                 @foreach ($animals as $animal)
                    <li class="list-group-item">
                       <div style="display: grid"><span style="align-self: center;">{{$animal->name}}</span> <span>Year of birth: {{$animal->birth_year}}</span></div>
                        <div class="list-align-right"> 
                        <a type="button" class="btn btn-primary" href="{{route('animal.edit', $animal)}}">Edit</a>
                        <form class="btn-inline" action="{{route('animal.destroy', $animal)}}" method="post">
                            <button class="btn btn-danger" type="submit">Delete</button>
                            @csrf
                        </form>
                        </div>
                    </li>
                 @endforeach
                </ul>
                <form action="{{route('animal.index2')}}" method="post">
                    <select name="sort">
                            <option value="name">Sort by Name</option>
                            <option value="birth_year">Sort by Birth</option>
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