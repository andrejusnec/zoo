@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Animal LIST</div>

               <div class="card-body">
                   <a href="{{route('animal.create')}}">New Manager</a>
                <ul>
                    <?php _d($animals) ?>
                 @foreach ($animals as $animal)
                    <li style="padding: 5px 0"><span class="padding-span">{{$animal->name}} {{$animal->birth_year}}</span>
                         <a type="button" class="btn btn-primary" href="{{route('animal.edit', $animal)}}">Edit</a>
                        <form class="btn-inline" action="{{route('animal.destroy', $animal)}}" method="post">
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