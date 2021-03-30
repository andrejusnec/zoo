@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Animal LIST</h2>
                    <form action="{{route('animal.index')}}" name="sort" method="get">
                        <div style="display: inline-block;">
                            <div style="padding-right: 5px;" class="form-select">
                                <select style="width: 150px" class="select2 form-control" name="manager_id">
                                    <option value="0" disabled @if($filterBy==0) selected @endif>Select Animal</option>
                                    @foreach ($managers as $manager)
                                    <option value="{{$manager->id}}" @if($filterBy==$manager->id) selected
                                        @endif>{{$manager->name}} {{$manager->surname}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <label for="Sort">Sort by:</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sort" id="sortAsc"
                                    value="byName" @if($sortBy == 'byName') checked @endif>
                                <label class="form-check-label" for="inlineRadio1">Name</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sort" id="inlineRadio1"
                                    value="byYear" @if($sortBy == 'byYear') checked @endif>
                                <label class="form-check-label" for="inlineRadio1">Year</label>
                            </div>
                            @csrf
                        </div>
                        <div class="buttons">
                            <button class="btn btn-primary" type="submit">Filter</button>
                            <button class="btn btn-danger" type="submit"><a
                                    href="{{route('animal.index')}}">All</a></button>
                        </div>
                    </form>

                </div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($animals as $animal)
                        <li class="list-group-item">
                            <div style="display: grid"><span style="align-self: center;">{{$animal->name}}</span>
                                <span>Year of birth: {{$animal->birth_year}}</span>
                                <small>Specie: {{$animal->animalSpecie->name}}</small>
                                <small>Manager: {{$animal->animalManager->name}} {{$animal->animalManager->surname}}</small>
                            </div>
                            <div class="list-align-right">
                                <a type="button" class="btn btn-primary"
                                    href="{{route('animal.edit', $animal)}}">Edit</a>
                                <a type="button" class="btn btn-primary"
                                    href="{{route('animal.show', $animal)}}">Show</a>
                                <form class="btn-inline" action="{{route('animal.destroy', $animal)}}" method="post">
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
<script>
    window.addEventListener('DOMContentLoaded', (event) => {
    $('#select').select2({
            width: 'resolve'
        });
    });
</script>
@endsection