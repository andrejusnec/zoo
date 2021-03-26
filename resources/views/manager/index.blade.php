@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Manager List</div>

               <div class="card-body">
                   <a href="{{route('manager.create')}}">New Manager</a>
                <ul>
                 @foreach ($managers as $manager)
                    <li style="padding: 5px 0"><span class="padding-span">{{$manager->name}} {{$manager->surname}}</span>
                         <a type="button" class="btn btn-primary" href="{{route('manager.edit', $manager)}}">Edit</a>
                        <form class="btn-inline" action="{{route('manager.destroy', $manager)}}" method="post">
                            <button class="btn btn-danger" type="submit">Delete</button>
                            @csrf
                        </form>
                    </li>
                 @endforeach
                </ul>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection