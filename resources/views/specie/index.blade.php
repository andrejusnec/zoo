@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">List of Species</div>

               <div class="card-body">
                   <a href="{{route('specie.create')}}">Add new Specie</a>
                <ul>
                 @foreach ($species as $specie)
                    <li style="padding: 5px 0"><span class="padding-span">{{$specie->name}}</span>
                         <a type="button" class="btn btn-primary" href="{{route('specie.edit', $specie)}}">Edit</a>
                        <form class="btn-inline" action="{{route('specie.destroy', $specie)}}" method="post">
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