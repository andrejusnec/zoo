@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">List of Species</div>

               <div class="card-body">
                <ul class="list-group">
                 @foreach ($species as $specie)
                     <li class="list-group-item">
                    <span style="align-self: center;">{{$specie->name}}</span>
                    <div class="list-align-right">
                         <a type="button" class="btn btn-primary" href="{{route('specie.edit', $specie)}}">Edit</a>
                        <form class="btn-inline" action="{{route('specie.destroy', $specie)}}" method="post">
                            <button class="btn btn-danger" type="submit">Delete</button>
                            @csrf
                        </form>
                    </div>
                    </li>
                 @endforeach
                </ul>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection