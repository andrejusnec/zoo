@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Make changes</div>

                <div class="card-body">
                        <form action="{{route('animal.update' , $animal)}}" method="post">
                            <div class="form-group">
                            <label for="Name">Name</label>
                            <input class="form-control" value="{{$animal->name}}" type="text" name="animal_name">
                            <small class="form-text text-muted">Animals name.</small>
                            <label for="Birth">Year of Birth</label>
                            <input class="form-control" value="{{$animal->birth_year}}" type="text" name="birth_year">
                            <small class="form-text text-muted">Animal birth date</small>
                            <label for="AnimalBook">Description</label>
                            <textarea class="form-control" id="summernote" type="text" name="animal_book"
                                >{{$animal->animal_book}}</textarea>
                            <div class="list-group">
                                <div class="list-group-item">
                                    <span>Species</span>
                                    <div style="justify-self: self-end;">
                                        <select style="width: 150px" class="select2" name="specie_id">
                                            @foreach ($species as $specie)
                                            <option value="{{$specie->id}}" @if($specie->id == $animal->specie_id)
                                                selected @endif>{{$specie->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="list-group-item">
                                    <span>Managers</span>
                                    <div style="justify-self: self-end;">
                                        <select style="width: 150px" class="select2" name="manager_id">
                                            @foreach ($managers as $manager)
                                            <option value="{{$manager->id}}" @if($manager->id == $animal->manager_id)
                                                selected @endif>{{$manager->name}} {{$manager->surname}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Apply changes</button>
                    @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        $('#summernote').summernote();
        $('.select2').select2({
            width: 'resolve'
        });
    });
</script>

@endsection